<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use  Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PrenadasEspermaController extends Controller
{
    private $cliente;

    public function __construct()
    {
        $this->cliente = new Client(['base_uri' => 'http://localhost:3001/']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $respuesta = $this->cliente->get('vaca_prenada_esperma');
        $cuerpo = $respuesta->getBody();

        return view(
            'prenadas_esperma.index',
            ['vacasprenadasesperma'   => json_decode($cuerpo)]
        );
    }

    public function pdf()
    {
        $vacasprenadasesperma = DB::select('select * from vacas_prenadas_esperma');
         $parametros = DB::select('select *  from parametros where parametro = "Nombre de la empresa"');
         $usuarios = DB::select('select * from users where id = ?', [Auth()->user()->id]);
        $pdf = PDF::loadView('prenadas_esperma.pdf', ['vacasprenadasesperma' => $vacasprenadasesperma],['usuarios' =>$usuarios]);
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $respuesta = $this->cliente->get('mostrar_vacaprenada-esperma/' . $id);
        $cuerpo = $respuesta->getBody();
        $vacaprenadaesperma = json_decode($cuerpo);

        $fecha = \Carbon\Carbon::parse($vacaprenadaesperma[0]->FEC_PARIO)->format('Y-m-d');

        return view('prenadas_esperma.edit', ['vacasprenadasesperma' => $vacaprenadaesperma, 'fecha' => $fecha]);
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
            "FEC_PARIR" => 'required|after_or_equal:01-01-2015',
            "OBS_VACAP" => 'nullable|max:100',
            "IND_PRENADA" => 'required',

        ]);

        $this->cliente->put('actualizar-vacap-esperma/' . $id, [
            'json' => $request->all()
        ]);

        return redirect()->route('prenadas_esperma.index')->with('edit', 'Vaca preñada actualizada');
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
