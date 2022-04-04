<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\DB;
use App\Models\Estados;
use  App\Http\Controller\BitacoraController;
use  Barryvdh\DomPDF\Facade as PDF;
use RealRashid\SweetAlert\Facades\Alert;

class EstadosController extends Controller
{

    public function __construct()
    {
        $this->cliente = new Client(['base_uri' => 'http://localhost:3000/']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estados = Estados::all();
        return view('estados.index')->with('estados', $estados);
    }

    public function pdf()
    {
        $estados = Estados::all();
        $parametros = DB::select('select *  from parametros where parametro = "Nombre de la empresa"');

        $pdf = PDF::loadView('estados.pdf', ['estados' => $estados], ['parametros' => $parametros]);
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
        return view('estados.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(rules: [
            "DET_ESTADO" => 'required|min:2|max:30|regex:([a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+)||unique:tbl_mg_estado_ganado',
            "descripcion_estado" => 'nullable|max:150',


        ]);

        $data = [
            'DET_ESTADO' => $request->DET_ESTADO,
            'DESCRIPCION_ESTADO' => $request->descripcion_estado,

        ];
        
       
        Estados::create($data);
       
       // Alert::success('Estado Registrado');
        return redirect()->action(
            
            ['App\Http\Controllers\BitacoraController@index',],
    
            [
                'tabla'        => 'ESTADOS GANADO',
                'accion'       => 'INSERTAR',
                'descripcion'  => 'SE INSERTÓ EL ESTADO: ' . $request->DET_ESTADO,
                'ruta'         => 'estados.index',
                'msj'          => 'Estado creado.',
                
            ],
         
            

        );
        
 
        return redirect()->route('estados.index')->with('info', 'Estado Registrado');

        

       
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
        $estado  =   Estados::find($id);
        return view('estados.edit')->with('estado', $estado);
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
        $request->validate(rules: [
            "DET_ESTADO" => 'nullable|min:2|max:30|regex:([a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+)',
            "descripcion_estado" => 'nullable|max:150|regex:([a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+)',
            "STATUS" => 'required',
        ]);

        $data = [
            'DET_ESTADO' => $request->DET_ESTADO,
            'DESCRIPCION_ESTADO' => $request->descripcion_estado,
            'STATUS' => $request->STATUS,

        ];

        $existe = Estados::where('DET_ESTADO', '=', $request->DET_ESTADO)
            ->where('COD_ESTADO', '<>', $id)->get();
        if (count($existe)) {
            $errors = new MessageBag();
            $errors->add('DET_ESTADO', 'Este nombre, ya está en uso');
            return back()->with('errors', $errors);
        }

        $estado  = Estados::find($id);


        $originales = $estado->getOriginal();
        $estado->update($data);
        $cambios = $estado->getChanges();
        //  DD($originales);

        foreach ($cambios as $key => $value) {
            $anterior = $originales[$key];
            $campo = "";
            if ($key != "updated_at") {
                if ($key == "DET_ESTADO") {
                    $campo = " CAMBIO EN EL CAMPO NOMBRE  ";
                } elseif ($key == "descripcion_estado") {
                    $campo = " CAMBIO EN EL CAMPO DESCRIPCION  ";
                } elseif ($key == "STATUS") {
                    $campo = " CAMBIO EN EL CAMPO DESCRIPCION  ";
                }
                DB::insert(
                    'insert into bitacoras (usuario,tabla,accion,descripccion,fecha) values (?, ?, ?, ?,?)',
                    [
                        Auth()->user()->username, 'ESTADOS', 'EDITAR',
                        'ID DEL REGISTRO EDITADO: ' . $estado->COD_ESTADO . $campo . '  --VALOR ANTERIOR: ' . $anterior . '    --NUEVO VALOR: ' . $value, now()
                    ]
                );
            }
        }


        return redirect()->route('estados.index')->with('edit', 'Estado actualizado.');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $estado = Estados::find($id);

        $estado->delete();

        return redirect()->route('estados.index')->with('info', 'Estado Eliminado.');
    }
}
