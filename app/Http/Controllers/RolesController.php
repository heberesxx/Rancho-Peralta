<?php

namespace App\Http\Controllers;

use App\Models\Objeto;
use App\Models\Rol;
use Spatie\Permission\Models\Role;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use  Barryvdh\DomPDF\Facade as PDF;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parametros = Role::all();
        return view('seguridad.roles.index')->with('roles', $parametros);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $objetos    = Objeto::all();
        return view('seguridad.roles.create')->with('objetos', $objetos);
    }


    public function pdf()
    {
        $roles = Rol::all();
        $parametros = DB::select('select *  from parametros where parametro = "Nombre de la empresa"');
        $usuarios = DB::select('select * from users where id = ?', [Auth()->user()->id]);
        $pdf = PDF::loadView('seguridad.roles.pdf', ['roles' => $roles], ['usuarios' => $usuarios]);



        return $pdf->stream();

        // return view('clientes.pdf')->with('personas', $clientes);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'name'          =>  "required|unique:roles|min:3|max:30",
            'permissions'   =>  "required"
        ]);


        $data = [
            'name' => $request->name,
        ];

        $permisos = Permission::whereIn('name', $request->permissions)->pluck('id');
        $rolCreado = Role::create($data);
        $rolCreado->permissions()->sync($permisos);

        return redirect()->action(
            ['App\Http\Controllers\BitacoraController@index'],
            [
                'tabla'        => 'ROLES',
                'accion'       => 'INSERTAR',
                'descripcion'  => 'SE INSERTÓ EL ROL: ' . $request->name,
                'ruta'         => 'roles.index',
                'msj'          => 'Rol creado con éxito.',

            ]

        );
        return redirect()->route('roles.index')->with('info', 'Rol creado con éxito');
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
        $rol = Role::find($id);
        $objetos    = Objeto::all();
        $permisos = DB::table('role_has_permissions')->where('role_id', $id)->pluck('permission_id');
        $nombres = Permission::whereIn('id', $permisos)->pluck('name');
        return view('seguridad.roles.edit')->with('rol', $rol)
            ->with('objetos', $objetos)->with('nombres', $nombres);
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
        $rol = Role::find($id);

        $originales = $rol->getOriginal();
        $rol->update($request->all());
        $cambios = $rol->getChanges();

        $permisos = Permission::whereIn('name', $request->permissions)->pluck('id');
        $rol->permissions()->sync($permisos);

        foreach ($cambios as $key => $value) {
            $anterior=$originales[$key];
            $campo="";
            if ($key!="updated_at") {
                if ($key=="name") {
                   $campo=" CAMBIO EN EL CAMPO NOMBRE  ";
                }elseif($key=="STATUS") {
                    $campo=" CAMBIO EN EL CAMPO STATUS  ";
                }
                DB::insert('insert into bitacoras (usuario,tabla,accion,descripccion,fecha) values (?, ?, ?, ?,?)', 
                [Auth()->user()->username, 'ROLES','EDITAR',
                'ID DEL REGISTRO EDITADO: '.$rol->id. $campo.'  --VALOR ANTERIOR: '.$anterior.'    --NUEVO VALOR: '.$value,now()]);
            }
        }

        return redirect()->route('roles.index')->with('info', 'Rol editado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
