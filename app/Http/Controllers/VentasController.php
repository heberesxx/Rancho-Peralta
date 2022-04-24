<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use  Barryvdh\DomPDF\Facade as PDF;

class VentasController extends Controller

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
        $respuesta = $this->cliente->get('detalle_de_ventas');
        $cuerpo = $respuesta->getBody();

        return view(
            'ventas.index',
            ['ventas' => json_decode($cuerpo)]
        );
    }


    public function pdf()
    {
        $ventas = DB::select('select * from detalle_de_ventas');
        $parametros = DB::select('select *  from parametros where parametro = "Nombre de la empresa"');
        $usuarios = DB::select('select * from users where id = ?', [Auth()->user()->id]);
        $pdf = PDF::loadView('ventas.pdf', ['ventas' => $ventas], ['usuarios' => $usuarios]);


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
        $respuesta8 = $this->cliente->get('detalle_clientes');
        $cuerpo8 = $respuesta8->getBody();


        $ventas = DB::select('select * from venta_actual');
        $datos = array(
            "lotes" => json_decode($cuerpo8),


        );

        return view('ventas.create', ['datos' => $datos], ['ventas' => $ventas]);
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

            "PRE_VENTA" => "required|numeric|digits_between:3,8",
            "COD_REGISTRO_GANADO" =>  "required",

            "nombre_ganado" => "required"

        ]);

        $this->cliente->post('insertardetalleventa', [
            'json' => $request->all()
        ]);

        return redirect()->route('ventas.create')->with('info', 'Venta Registrada.');
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
        $respuesta = $this->cliente->get('mostrar_loteventa/' . $id);
        $cuerpo = $respuesta->getBody();
        return view('ventas.edit', ['ventas' => json_decode($cuerpo)]);
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
        $this->cliente->delete('eliminaritem_venta/' . $id);
        return redirect()->route('ventas.create')
            ->with('info', 'El Registro se elimino correctamente');
    }
}
