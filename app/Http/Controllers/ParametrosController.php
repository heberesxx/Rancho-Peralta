<?php

namespace App\Http\Controllers;
use  App\Http\Controller\BitacoraController;
use App\Models\Parametro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use  Barryvdh\DomPDF\Facade as PDF;

class ParametrosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parametros = Parametro::all();
        return view('seguridad.parametros.index')->with('parametros',$parametros);
    }

    public function pdf()
    {
       $objetos = Parametro::all();
        $parametros = DB::select('select *  from parametros where parametro = "Nombre de la empresa"');
    
        $pdf = PDF::loadView('seguridad.parametros.pdf',['objetos'=>$objetos],['parametros' =>$parametros]);
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
        return view('seguridad.parametros.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'parametro' => 'required|unique:parametros',
            'valor' => 'required',
        ]);
        
        $data = [
            'parametro' => $request->parametro,
            'valor' => $request->valor ,  
            'Creado_Por' => Auth()->user()->id,

        ];
        Parametro::create($data);

        
       return redirect()->action(
        ['App\Http\Controllers\BitacoraController@index'],
        [
            'tabla'        => 'parametros',
            'accion'       => 'INSERTAR',
            'descripcion'  => 'SE INSERTÓ EL PARAMÉTRO: '.$request->parametro,
            'ruta'         => 'parametros.index',
            'msj'          => 'Parametro creado.',
        
        ]
        
    );

        return redirect()->route('parametros.index')->with('info', 'Parametro creado.');
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
        $parametro  =   Parametro::find($id);
        return view('seguridad.parametros.edit')->with('parametro',$parametro);
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
        $request->validate([

            'parametro' => "required|unique:parametros,parametro,{$id}",
            'valor'     => "required",
        ]);

        $parametro  = Parametro::find($id);


        $originales = $parametro->getOriginal();
        $parametro->update($request->all());
        $cambios = $parametro->getChanges();

        //dd($cambios);
        foreach ($cambios as $key => $value) {
            $anterior=$originales[$key];
            $campo="";
            if ($key!="updated_at") {
                if ($key=="parametro") {
                   $campo=" CAMBIO EN EL CAMPO NOMBRE  ";
                }elseif($key=="valor") {
                    $campo=" CAMBIO EN EL CAMPO DESCRIPCION  ";
                }
                DB::insert('insert into bitacoras (usuario,tabla,accion,descripccion,fecha) values (?, ?, ?, ?,?)', 
                [Auth()->user()->username, 'PARAMETROS','EDITAR',
                'ID DEL REGISTRO EDITADO: '.$parametro->id. $campo.'  --VALOR ANTERIOR: '.$anterior.'    --NUEVO VALOR: '.$value,now()]);
            }
        }
        
    
        return redirect()->route('parametros.index')->with('info', 'Parametro actualizado.');
       
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