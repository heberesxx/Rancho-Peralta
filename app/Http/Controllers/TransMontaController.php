<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use  Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\DB;

class TransMontaController extends Controller
{
    private $cliente;

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
        $respuesta = $this->cliente->get('trans_monta');
        $cuerpo = $respuesta->getBody();
        

        return view('transmonta.index', ['transmontas'   => json_decode($cuerpo)]);

    }

    public function pdf()
    {
        $transmontas = DB::select('select * from monta');
        $parametros = DB::select('select *  from parametros where parametro = "Nombre de la empresa"');
        $usuarios = DB::select('select * from users where id = ?', [Auth()->user()->id]);
        $pdf = PDF::loadView('transmonta.pdf',['transmontas'=>$transmontas],['usuarios' =>$usuarios]);

      
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
        $respuesta2 = $this->cliente->get('vacas-sincronizadas');
        $cuerpo2 = $respuesta2->getBody();
        $datos = array(
            "vacassincro" => json_decode($cuerpo2)
        );

        return view('transmonta.create', ['datos' => $datos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate (  rules: [
            "COD_REGISTRO_GANADO" =>  'required',
            "RAZ_TORO"  => 'required|alpha_dash|max:25',
            "FEC_MONTA"=>'required|after_or_equal:01-01-2015'
        ]);

        $this->cliente->post('agregar-monta',['json'=> $request->all()]);
        return redirect()->route('transmonta.index')->with('info','Tranferencia de monta registrada');
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
        $respuesta = $this->cliente->get('trans_monta/'.$id);
        $cuerpo = $respuesta->getBody();
        
        return view('transmonta.edit', ['transmontas' => json_decode($cuerpo)]);
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

        $request->validate (  rules: [
            "IND_TRANS_MONTA" =>  'required',
         
        ]);
        $this->cliente->put('actualizar-transferencia-monta/'. $id, ['json' => $request->all()
    ]);

    return redirect()->route('transmonta.index')->with('edit','Monta de toro actualizada');
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
