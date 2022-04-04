<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Actions\Fortify\PasswordValidationRules;

class LoginController extends Controller
{
    use PasswordValidationRules;
    public function login()
    {
        if (Auth()->user()->fecha_vencimiento >= date('Y-m-d')) {
            if (Auth()->user()->estado == 1) {

                if (Auth()->user()->primera_vez) {
                    return view('profile.password-first-time')->with('actualizada', 0);
                }
                $num_preguntas = 0;
                $num_preguntas = DB::select('select valor from parametros where parametro = ?', ['CANTIDAD DE PREGUNTAS DE SEGURIDAD']);
                $num_preguntas = $num_preguntas[0]->valor;
                if (Auth::user()->preguntas_contestadas < $num_preguntas) {
                    //$preguntas=DB::table('preguntas')->get();
                    $preguntas = DB::select('select * from preguntas p WHERE  NOT EXISTS(
                    SELECT null
                    FROM respuestas r
                    WHERE p.id=r.id_pregunta and r.id_usuario=?)', [Auth()->user()->id]);
                    return view('auth.configurar-preguntas')->with('preguntas', $preguntas);
                }

                return view('dashboard');
            } else if (Auth()->user()->estado == 0) {
                Auth::guard('web')->logout();
                return redirect('')->with('status', 'El usuario no se encuentra activo, contactar al administrador del sistema.');
            } else if (Auth()->user()->estado == 2) {
                Auth::guard('web')->logout();
                return redirect('')->with('status', 'El usuario  se encuentra bloqueado, contactar al administrador del sistema.');
            }
        }
        Auth::guard('web')->logout();
        return redirect('')->with('status', 'El usuario ya se ha vencido');
    }

    public function update_password(Request $request)
    {
        $current_password = DB::select('select password from users where id = ?', [Auth()->user()->id]);
        $current_password = $current_password[0]->password;

        if (Hash::check($request->current_password, $current_password)) {

            if ($request->current_password != $request->password) {
                $request->validate([
                    'password' => $this->passwordRules(),
                ]);

                $updated = DB::statement('update users set password=?,primera_vez=0 where id=?', [Hash::make($request->password), Auth()->user()->id]);

                if ($updated) {

                    $user = User::find(Auth()->user()->id);

                    Auth::login($user);
                    return view('profile.password-first-time')->with('actualizada', 'smon');
                    return back()->with('actualizada', 'smon');
                }
            }
            return back()->with('igual_anterior', 'La contraseña debe ser distinta a la actual.');
        }
        return back()->with('current_password', 'La contraseña actual no es correcta.');
    }

    public function configurar_pregunta(Request $request)
    {
        $insert = DB::statement(
            'insert into respuestas (id_usuario, id_pregunta,respuesta) values (?, ?,?)',
            [Auth()->user()->id, $request->pregunta, $request->respuesta]
        );
        if ($insert) {

            $update = DB::statement(
                'update users set preguntas_contestadas=? where id=?',
                [auth()->user()->preguntas_contestadas + 1, auth()->user()->id]
            );
            return back()->with('pregunta', 'Pregunta registrada con éxito.');
        }
        return back()->with('pregunta', 'Pregunta No registrada .');
    }

    public function metodo(Request $r)
    {

        if (DB::table('users')->where('username', $r->usuario)->exists()) {
            if ($r->metodo == "preguntas") {
                $id = DB::select('select id from users where username = ?', [$r->usuario]);
                $id = $id[0]->id;
                $preguntas = DB::select('select * from preguntas p WHERE  EXISTS(
                    SELECT null
                    FROM respuestas r
                    WHERE p.id=r.id_pregunta and r.id_usuario=?)', [$id]);
                return view('auth.preguntas')->with('preguntas', $preguntas)
                    ->with('usuario', $r->usuario);
            } else {
                $correo = DB::select('select email from users where username = ?', [$r->usuario]);
                $correo = $correo[0]->email;
                return view('auth.forgot-password', compact('correo'));
            }
        }
        return back()->with('mensaje', 'El usuario no existe.');
    }

    public function verificar_pregunta(Request $r)
    {


        $id_usuario = DB::select('select id from users where username = ?', [$r->usuario]);

        $max_intentos =   DB::select('select valor from parametros where parametro = ?', ['MAX_RESPUESTAS_CORRECTAS']);

        $max_intentos = $max_intentos[0]->valor;

        $intentos_usuario = DB::select('select intentos_preguntas from users where id = ?', [$id_usuario[0]->id]);

        if (DB::table('respuestas')->where('id_usuario', $id_usuario[0]->id)
            ->where('id_pregunta', $r->pregunta)->where('respuesta', $r->respuesta)->exists()
        ) {
            $max_preguntas =   DB::select('select valor from parametros where parametro = ?', ['MAX_PREGUNTAS_CONTESTAR']);
            $max_preguntas = $max_preguntas[0]->valor;
            $preguntas_correctas = DB::select('select preguntas_correctas from users where id = ?', [$id_usuario[0]->id]);
            // dd($preguntas_correctas[0]->preguntas_correctas+1);
            if ($max_preguntas > $preguntas_correctas[0]->preguntas_correctas) {
                DB::update('update users set preguntas_correctas = ? where id = ?', [$preguntas_correctas[0]->preguntas_correctas + 1, $id_usuario[0]->id]);
                return back()->with('mensaje', 'Conteste otra pregunta.');
            }
            return view('auth.cambiar-password')->with('usuario', $id_usuario[0]->id);
        }

        $intentos_usuario[0]->intentos_preguntas++;
        DB::update('update users set intentos_preguntas = ? where id = ?', [
            $intentos_usuario[0]->intentos_preguntas,
            $id_usuario[0]->id
        ]);
        if ($intentos_usuario[0]->intentos_preguntas >= $max_intentos) {
            DB::update('update users set estado = 2 where id = ?', [$id_usuario[0]->id]);
            return back()->with('bloqueado', 'Usuario Bloqueado, favor comunicarse con el administrador del sistema.');
        }
        return back()->with('mensaje', 'Respuesta y/o pregunta incorrecta.');
    }

    public function restablecer_password(Request $r)
    {

        if ($r->password == $r->password_confirmation) {
            $password = Hash::make($r->password);
            $data = ['password' => $password];
            $usuario = User::find($r->usuario);
            $usuario->update($data);
            Auth::login($usuario);
            // dd("HELLO");
            return redirect()->route('inicio')->with('status', 'Contraseña Cambiada con Éxito.');
        }

        return back()->with('mensaje', 'Las contraseñas deben ser iguales');
    }

    
}
