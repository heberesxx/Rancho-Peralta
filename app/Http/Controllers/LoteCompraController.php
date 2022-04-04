<?php

namespace App\Http\Controllers;

use App\Models\LoteCompra;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use  Barryvdh\DomPDF\Facade as PDF;

class LoteCompraController extends Controller
{
    public function __construct () {
        $this->cliente = new Client(['base_uri' => 'http://localhost:3000/']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lotes = DB::select('select * from detalles_lotes');
        return view('lotescompras.index')->with('lotes', $lotes);
    }

    public function pdf()
    {
        $lotes = DB::select('select * from detalles_lotes');
        $parametros = DB::select('select *  from parametros where parametro = "Nombre de la empresa"');
    
        $pdf = PDF::loadView('lotescompras.pdf',['lotes'=>$lotes],['parametros' =>$parametros]);
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
        $request->validate(rules: [
            "FEC_COMPRA" => 'required',
            "COD_PROVEEDOR" => 'required',


        ]);

        $data = [
            'FEC_COMPRA' => $request->FEC_COMPRA,
            'COD_PROVEEDOR' => $request->COD_PROVEEDOR,

        ];
        LoteCompra::create($data);

        return redirect()->route('compras.create')->with('info','Lote generado');

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
        $this->cliente->put('cancelar_lote/'. $id);

        return redirect()->route('lotescompras.index')->with('edit','Lote Cancelado');
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
        $this->cliente->delete('borrar_lote/' . $id);

        return redirect()->route('lotescompras.index')
            ->with('info', 'Se eliminó el lote correctamente');
    }
}