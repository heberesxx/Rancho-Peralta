<?php

namespace App\Http\Controllers;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use  Barryvdh\DomPDF\Facade as PDF;

class VerFacturasController extends Controller
{
    public function __construct () {
        $this->cliente = new Client(['base_uri' => 'http://localhost:3001/']);
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
        $detalle = DB::select('select * from factura_detalle_venta where COD_VENTA = ?', [$id]);
        $cliente = DB::select('select * from factura_detalle_cliente where COD_VENTA = ?', [$id]);
        //DD($cliente);
          /******** Traer todos los estados *******/
        //   $respuesta2 = $this->cliente->get('detalle_venta/' . $id);
        //   $cuerpo2 = $respuesta2->getBody();
  
        //   /******** Traer todos los lugares *******/
        //   $respuesta3 = $this->cliente->get('detalle_cliente'. $id);
        //   $cuerpo3 = $respuesta3->getBody();

        //   $datos = array(
        //     "detalles" => json_decode($cuerpo2),
        //     "clientes" => json_decode($cuerpo3)
        // );
        $pdf = PDF::loadView('lotesventa.view_factura',['detalles'=>$detalle],['clientes' =>$cliente]);
 
         return $pdf->stream();
        
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
