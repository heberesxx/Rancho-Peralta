<?php

namespace App\Http\Controllers;
use App\Models\DetalleCompraEmbrion;
use App\Models\LoteCompraEmbrion;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use  Barryvdh\DomPDF\Facade as PDF;

class LoteCompraEmbrionController extends Controller
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
        $lotes = DB::select('select * from detalles_lotes_embrion');
        return view('lotescompras_embrion.index')->with('lotes', $lotes);
    }

    public function pdf()
    {
        $lotes = DB::select('select * from detalles_lotes_embrion');
        $parametros = DB::select('select *  from parametros where parametro = "Nombre de la empresa"');
    
        $pdf = PDF::loadView('lotescompras_embrion.pdf',['lotes'=>$lotes],['parametros' =>$parametros]);
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
        LoteCompraEmbrion::create($data);

        return redirect()->route('embrion.create')->with('info','Lote de Esperma Generado');
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
        $this->cliente->put('cancelar_loteembrion/'. $id);

        return redirect()->route('lotescompras_embrion.index')->with('edit','Lote Cancelado');
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
