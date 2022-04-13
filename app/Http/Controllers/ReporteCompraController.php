<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use  Barryvdh\DomPDF\Facade as PDF;
class ReporteCompraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('reportes_comprag.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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

        $compras = DB::select('select * from compra_ganado where FEC_COMPRA BETWEEN ? AND ?',[$v_inicio, $v_final]);
        $parametros[0] = DB::select('select *  from parametros where parametro = "Nombre de la empresa"');
        $parametros [1] = $v_inicio;
        $parametros [2] = $v_final;
       return redirect()->view('reportes_comprag')->with('compras',$compras)->with('parametros',$parametros);
      
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
