<?php

namespace App\Http\Controllers;
use GuzzleHttp\Client;
use App\Models\LoteMedicamento;
use Illuminate\Http\Request;

class LoteMedicamentoController extends Controller
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
            "FEC_LOTE" => 'required',
            "FEC_VENCIMIENTO" => 'required',


        ]);

        $data = [
            'FEC_LOTE' => $request->FEC_LOTE,
            'FEC_VENCIMIENTO' => $request->FEC_VENCIMIENTO,

        ];

        



       LoteMedicamento::create($data);

        return redirect()->route('lote_medicamento.create')->with('info','Lote generado');
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
        $this->cliente->put('cancelar_lote_medicamento/'. $id);

        return redirect()->route('medicamento.index')->with('edit','Lote Cancelado');
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
