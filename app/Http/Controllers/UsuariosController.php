<?php

namespace App\Http\Controllers;
use  App\Http\Controller\BitacoraController;
use App\Mail\UserCreated;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Auth\Passwords\PasswordBroker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password as FPassword;
use Laravel\Fortify\Rules\Password;
use Spatie\Permission\Models\Permission;
use App\Rules\Uppercase;
use  Barryvdh\DomPDF\Facade as PDF;


class UsuariosController extends Controller
{
    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $usuarios = User::all();
        
        return view('seguridad.usuarios.index')->with('usuarios', $usuarios);
        
    }

    public function pdf()
    {
        $usuarios = DB::select('select * from usuarios');
         $parametros = DB::select('select *  from parametros where parametro = "Nombre de la empresa"');
         $usuariosd = DB::select('select * from users where id = ?', [Auth()->user()->id]);
     
         $pdf = PDF::loadView('seguridad.usuarios.pdf',['usuarios'=>$usuarios],['usuariosd' =>$usuariosd]);

      
         $pdf->SetPaper('carta','landscape');
 
         return $pdf->stream();
        
       // return view('clientes.pdf')->with('personas', $clientes);
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('seguridad.usuarios.create')->with('roles',$roles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < 10; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
       
        $request->validate ([
            'name' => ['required', 'string', 'max:255','min:3'],
            'username' => ['required', 'string', 'max:255','min:4','unique:users', new Uppercase()],
            'email' => ['required',  'max:255', 'email','unique:users'],
            'password' => [''],
            'fecha_vencimiento'=> ['required'] ,
            'roles'=> ['required'] 
        ]);
        $request['password']=$randomString;

        
        $usuarioCreado= User::create([
            'name' => $request['name'],
            'username' => $request['username'],
            'email' => $request['email'],
            'password' => Hash::make($randomString),
            // 'password' => Hash::make($request['password']),
            'fecha_vencimiento' => $request['fecha_vencimiento'],
        ]);

        
       $usuarioCreado->roles()->sync($request->roles);
       Mail::to($request['email'])->send(new UserCreated($request));
    //    FPassword::sendResetLink($request->only(['email']));
        
       return redirect()->action(
            ['App\Http\Controllers\BitacoraController@index'],
            [
                'tabla'        => 'USUARIOS',
                'accion'       => 'INSERTAR',
                'descripcion'  => 'SE INSERTÓ EL USUARIO:'.$request->username,
                'ruta'         => 'usuarios.index',
                'msj'          => 'Usuario creado.',
            
            ]
            
        );
        return redirect()->route('usuarios.index')->with('info', 'Usuario creado.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roles      = Role::all();
        $usuario    = User::find($id);
        return view('seguridad.usuarios.edit')
            ->with('usuario',$usuario)->with('roles',$roles);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       $rol_actual=DB::select('select * from model_has_roles where model_id=?',[$id]);
        
        $request->validate ([
            'name' => ['required','string','max:255'],
            'username' =>'required|string|max:255|min:4',"unique:users,username,{$id}",new Uppercase(),
            'email' => 'required|string|max:255|email|',"unique:users,email,{$id}",
            'fecha_vencimiento'=> ['required'] ,
            'roles'=> ['required'] ,
            'estado'=> ['required'] 
        ]);
        $usuario    = User::find($id);
        
        $originales=$usuario->getOriginal();
        $usuario->update($request->all());
        $usuario->roles()->sync($request->roles);
        $cambios=$usuario->getChanges();

           if($rol_actual[0]->role_id!=$request->roles||$cambios){

            foreach ($cambios as $key => $value) {
                $anterior=$originales[$key];
                $campo="";
                if ($key!="updated_at") {
                    if ($key=="name") {
                       $campo=" CAMBIO EN EL CAMPO NOMBRE  ";
                    }elseif ($key=="email") {
                        $campo=" CAMBIO EN EL CAMPO CORREO  ";
                    }elseif ($key=="username") {
                        $campo=" CAMBIO EN EL CAMPO NOMBRE DE USUARIO ";
                    }elseif ($key=="fecha_vencimiento") {
                        $campo=" CAMBIO EN EL CAMPO FECHA DE VENCIMIENTO  ";
                    }

                    DB::insert('insert into bitacoras (usuario,tabla,accion,descripccion,fecha) values (?, ?, ?, ?,?)', 
                    [Auth()->user()->username, 'USUARIOS','EDITAR',
                    'ID DEL REGISTRO EDITADO: '.$usuario->id. $campo.'  --VALOR ANTERIOR: '.$anterior.'    --NUEVO VALOR: '.$value,now()]);
                }
            }

            if($rol_actual[0]->role_id!=$request->roles){
                $campo=" CAMBIO EN EL CAMPO ROL ";
                DB::insert('insert into bitacoras (usuario,tabla,accion,descripccion,fecha) values (?, ?, ?, ?,?)', 
                [Auth()->user()->username, 'USUARIOS','EDITAR',
                'ID DEL REGISTRO EDITADO: '.$usuario->id. $campo.'  --ID DEL VALOR ANTERIOR: '.$rol_actual[0]->role_id.'    --NUEVO VALOR: '.$request->roles,now()]);
           
            }
            return redirect()->route('usuarios.index')->with('edit', 'Usuario actualizado.');
        }else{
            return redirect()->route('usuarios.index')->with('edit', 'No ha hecho cambios en el usuario');
        } 
            
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('usuarios.index');
    }
}
