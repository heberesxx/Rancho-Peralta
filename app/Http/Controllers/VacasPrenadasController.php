<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use  Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class VacasPrenadasController extends Controller
{
    private $cliente;

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
        $respuesta = $this->cliente->get('vaca_prenada');
        $cuerpo = $respuesta->getBody();




        return view(
            'vaca_prenada.index',
            ['vacasprenadasesembriones'  => json_decode($cuerpo)]
        );
    }
    public function pdf()
    {
        $vacasprenadasesembriones = DB::select('select * from vacas_prenadas_embrion');
         $parametros = DB::select('select *  from parametros where parametro = "Nombre de la empresa"');
         $usuarios = DB::select('select * from users where id = ?', [Auth()->user()->id]);
        $pdf = PDF::loadView('vaca_prenada.pdf', ['vacasprenadasesembriones' => $vacasprenadasesembriones],['usuarios' =>$usuarios]);
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
        $respuesta = $this->cliente->get('vaca_prenada_embrion/' . $id);
        $cuerpo = $respuesta->getBody();
        $vacaprenadaembrion = json_decode($cuerpo);

        $fecha = \Carbon\Carbon::parse($vacaprenadaembrion[0]->FEC_PARIO)->format('Y-m-d');

        return view('vaca_prenada.edit', ['vacasprenadasesembriones' => $vacaprenadaembrion, 'fecha' => $fecha]);
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
            "OBS_VACAP" => 'nullable|max:200',
            "IND_PRENADA" => 'required',

        ]);

        $this->cliente->put('actualizar-vacap-embrion/' . $id, [
            'json' => $request->all()
        ]);

        //DD($this->cliente);

        return redirect()->route('vaca_prenada.index')->with('edit', 'Vaca preñada actualizada');
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
