<?php

namespace App\Http\Controllers;
use App\Models\DetalleCompraEsperma;
use App\Models\LoteCompraEsperma;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\DB;
use  Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class LoteCompraEspermaController extends Controller
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
        $lotes = DB::select('select * from detalles_lotes_esperma');
        return view('lotescompras_esperma.index')->with('lotes', $lotes);
    }

    public function pdf()
    {
        $lotes = DB::select('select * from detalles_lotes_esperma');
        $parametros = DB::select('select *  from parametros where parametro = "Nombre de la empresa"');
        $usuarios = DB::select('select * from users where id = ?', [Auth()->user()->id]);
        $pdf = PDF::loadView('lotescompras_esperma.pdf',['lotes'=>$lotes],['usuarios' =>$usuarios]);

      
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
        LoteCompraEsperma::create($data);

        return redirect()->route('esperma.create')->with('info','Lote generado');
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
        $this->cliente->put('cancelar_loteesperma/'. $id);

        return redirect()->route('lotescompras_esperma.index')->with('edit','Lote Cancelado');
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
