<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use  Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\DB;

class CompraMedicamentoController extends Controller
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
      
    }

    public function pdf()
    {
       $ComprarMedicamentos = DB::select('select * from comp_medicamento');
        $parametros = DB::select('select *  from parametros where parametro = "Nombre de la empresa"');
        $usuarios = DB::select('select * from users where id = ?', [Auth()->user()->id]);
        $pdf = PDF::loadView('compra_medicamento.pdf',['ComprarMedicamentos'=>$ComprarMedicamentos],['usuarios' =>$usuarios]);

      

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

        /******** Traer todos los medicamentos *******/
        $respuesta2 = $this->cliente->get('detalle_lote_medicamento');
        $cuerpo2 = $respuesta2->getBody();

        /******** Traer todos los proveedores *******/

        $ventas = DB::select('select * from lote_medicamento_actual');
  
        $datos = array(
            "lotes" => json_decode($cuerpo2),
           
        );

        return view('compra_medicamento.create',['datos' => $datos],['ventas'=>$ventas]);
   
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
            "COD_MEDICAMENTO" => 'required',
            "CAN_MEDICAMENTO" => 'required|numeric|integer|gt:0'

        ]);

        $this->cliente->post('agregar-compra-medicamento', [
            'json' => $request->all()
        ]);

        return redirect()->route('lote_medicamento.create')->with('info','Item Agregado');
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
        
        $this->cliente->delete('eliminaritem_medicamento/' . $id);

        return redirect()->route('lote_medicamento.create')
            ->with('info', 'El Registro se elimino correctamente');
    }
}
