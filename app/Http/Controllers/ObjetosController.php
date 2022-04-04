<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Objeto;
use Illuminate\Http\Request;
use  Barryvdh\DomPDF\Facade as PDF;

class ObjetosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $objetos = Objeto::all();
        // dd($objetos);
        return view('seguridad.objetos.index', compact('objetos'));
    }

    public function pdf()
    {
       $objetos = Objeto::all();
        $parametros = DB::select('select *  from parametros where parametro = "Nombre de la empresa"');
    
        $pdf = PDF::loadView('seguridad.objetos.pdf',['objetos'=>$objetos],['parametros' =>$parametros]);
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
        return view('seguridad.objetos.create');
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

            'objeto'        =>  "required|unique:objetos|min:1|max:255",
            'Descripcion'   =>  "required|max:255"
        ]);

        $data = [
            'objeto'        =>  $request->objeto,
            'Descripcion'   =>  $request->Descripcion,
            'Creado_Por' => Auth()->user()->id,
        ];

        Objeto::create($data);

        return redirect()->action(
            ['App\Http\Controllers\BitacoraController@index'],
            [
                'tabla'        => 'OBJETOS',
                'accion'       => 'INSERTAR',
                'descripcion'  => 'SE INSERTÓ EL OBJETO:' . $request->objeto,
                'ruta'         => 'objetos.index',
                'msj'          => 'Objeto creado.',

            ]

        );

        return redirect()->route('objetos.index')->with('info', 'Objeto creado.');
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
        $objeto = Objeto::find($id);
        return view('seguridad.objetos.edit')->with('objeto', $objeto);
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

            'objeto'        => "required|unique:objetos,objeto,{$id}",
            "Descripcion" => "nullable|max:250",
            "status" =>"nullable"
        ]);


        $objeto  = Objeto::find($id);

        $originales = $objeto->getOriginal();
        $objeto->update($request->all());
        $cambios = $objeto->getChanges();

        //dd($cambios);
        foreach ($cambios as $key => $value) {
            $anterior=$originales[$key];
            $campo="";
            if ($key!="updated_at") {
                if ($key=="objeto") {
                   $campo=" CAMBIO EN EL CAMPO NOMBRE  ";
                }elseif($key=="Descripcion") {
                    $campo=" CAMBIO EN EL CAMPO DESCRIPCION  ";
                }
                DB::insert('insert into bitacoras (usuario,tabla,accion,descripccion,fecha) values (?, ?, ?, ?,?)', 
                [Auth()->user()->username, 'OBJETOS','EDITAR',
                'ID DEL REGISTRO EDITADO: '.$objeto->id. $campo.'  --VALOR ANTERIOR: '.$anterior.'    --NUEVO VALOR: '.$value,now()]);
            }
        }
        
        return redirect()->route('objetos.index')->with('info', 'Objeto Editado.');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $objeto = Objeto::find($id);

        $objeto->delete();

        return redirect()->route('objetos.index')->with('info', 'Objeto Eliminado.');
    }
}
