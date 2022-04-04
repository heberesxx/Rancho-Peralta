<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bitacora;
use  Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\DB;

class VerBitacoraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function pdf()
    {
       $bitacoras = Bitacora::all()->orderBy('id','desc');;
       $parametros = DB::select('select *  from parametros where parametro = "Nombre de la empresa"');
    
        $pdf = PDF::loadView('seguridad.bitacora.pdf',['bitacoras'=>$bitacoras],['parametros' =>$parametros]);

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
