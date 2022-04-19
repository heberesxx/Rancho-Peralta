<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use  Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\DB;

class InsertarventaController extends Controller

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
        $respuesta = $this->cliente->get('detalle_lotes_ventas');
        $cuerpo = $respuesta->getBody();

        return view(
            'lotesventa.index',
            ['lotes' => json_decode($cuerpo)]
        );
    }

    public function pdf()
    {
        $lotes = DB::select('select * from detalles_lotes_ventas');
        $parametros = DB::select('select *  from parametros where parametro = "Nombre de la empresa"');
        $usuarios = DB::select('select * from users where id = ?', [Auth()->user()->id]);
    
        $pdf = PDF::loadView('lotesventa.pdf',['lotes'=>$lotes],['usuarios' =>$usuarios]);

      
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

        /* Traer los codigos de cliente **/
        $respuesta3 = $this->cliente->get('clientes');
        $cuerpo3 = $respuesta3->getBody();

        $datos = array(

            "clientes" => json_decode($cuerpo3)
        );

        return view('ventas.create', ['datos' => $datos]);
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
            "COD_CLIENTE" => "required",
            "FEC_VENTA" =>  "required|after_or_equal:01-01-2000",
            "nombre_cliente" =>  "required",

        ]);

            //dd($request);
        ;
        $this->cliente->post('insertarventa', [
            'json' => $request->all()
        ]);

        return redirect()->route('ventas.create')->with('info', 'Lote De Venta Registrada.');
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
        $this->cliente->put('cancelar_loteventa/'. $id);

        return redirect()->route('lotesventa.index')->with('edit','Lote Cancelado');
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
    }
}
