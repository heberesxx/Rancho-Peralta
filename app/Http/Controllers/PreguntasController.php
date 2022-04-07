<?php

namespace App\Http\Controllers;
use  Barryvdh\DomPDF\Facade as PDF;
use App\Models\Pregunta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class PreguntasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $preguntas = Pregunta::all();
        return view('seguridad.preguntas.index')->with('preguntas', $preguntas);
    }

    public function pdf()
    {
       $preguntas = Pregunta::all();
        $parametros = DB::select('select *  from parametros where parametro = "Nombre de la empresa"');
    
        $pdf = PDF::loadView('seguridad.preguntas.pdf',['preguntas'=>$preguntas],['parametros' =>$parametros]);
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
        return view('seguridad.preguntas.create');
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
            'pregunta' => 'required|unique:preguntas|min:5|max:255'
        ]);

        $data   =   [
            'pregunta'      =>  $request->pregunta,
            'Creado_Por'    =>  Auth()->user()->id,
        ];

        Pregunta::create($data);



        return redirect()->action(
            ['App\Http\Controllers\BitacoraController@index'],
            [
                'tabla'        => 'PREGUNTAS',
                'accion'       => 'INSERTAR',
                'descripcion'  => 'SE INSERTÓ LA PREGUNTA: ' . $request->pregunta,
                'ruta'         => 'preguntas.index',
                'msj'          => 'Pregunta creada',

            ]

        );

        return redirect()->route('preguntas.index')->with('info', 'Pregunta creada.');
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
        $pregunta = Pregunta::find($id);
        return view('seguridad.preguntas.edit')->with('pregunta', $pregunta);
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
            'pregunta' => "required|unique:preguntas,pregunta,{$id}|min:5|max:255"
        ]);

        $data   =   [
            'pregunta'      =>  $request->pregunta,
            'Creado_Por'    =>  Auth()->user()->id,
        ];

        $pregunta   =   Pregunta::find($id);
        $pregunta->update($data);

        return redirect()->route('preguntas.index')->with('info', 'Pregunta actualizada con éxito.');
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
