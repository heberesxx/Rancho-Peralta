<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Client;
use App\Models\Respuesta;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use App\Rules\Uppercase;

class VerPreguntasController extends Controller
{
    public function __construct () {
        $this->cliente = new Client(['base_uri' => 'http://localhost:3001/']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $respuestas = DB::select('select * from ver_preguntas where id_usuario = ?', [Auth()->user()->id]);
        return view('verpreguntas.index')->with('respuestas',$respuestas);

        //dd($respuestas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $respuesta = Respuesta::find($id);
        return view('verpreguntas.edit')->with('respuesta', $respuesta);
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
            'respuesta' =>  "required",
        ]);

        $data   =   [
            'respuesta'      =>  $request->respuesta,
    
        ];
     //dd($request);

     $existe = Respuesta::where('respuesta', '=', $request->respuesta)
            ->where('id_respuesta', '<>', $id)->get();
        if (count($existe)) {
            $errors = new MessageBag();
            $errors->add('respuesta', 'Ya existe un registro con esa respuesta');
            return back()->with('errors', $errors);
        }

        $respuesta   =   Respuesta::find($id);
        $respuesta->update($data);

        return redirect()->route('perfil.index')->with('edit','Respuesta actualizada con éxito.');
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
