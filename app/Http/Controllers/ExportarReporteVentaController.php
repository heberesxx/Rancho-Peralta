<?php

namespace App\Http\Controllers;
use  Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Client as Client;
use Illuminate\Http\Request;


class ExportarReporteVentaController extends Controller
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
        //
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

        $request->validate(rules: [
            "inicio" => 'required',
            "final" => 'required'

        ]);

        $v_inicio = $request->input('inicio');
        $v_final = $request->input('final');
        $client = new Client();
        
        $respuesta = $client->request('GET', 'http://localhost:3000/venta_ganado?inicio=' . $v_inicio . '&final=' . $v_final);
        $cuerpo = $respuesta->getbody();
        $parametros = DB::select('select *  from parametros where parametro = "Nombre de la empresa"');
        $pdf = PDF::loadView('reporteventas.pfd', ['venta' => json_decode($cuerpo)], ['parametros' => $parametros]);
        return $pdf->stream('reporteventas.pdf');
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
        //
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
        //
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