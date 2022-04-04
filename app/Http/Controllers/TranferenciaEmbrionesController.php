<?php

namespace App\Http\Controllers;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use  Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\DB;

class TranferenciaEmbrionesController extends Controller
{
    private $cliente;

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
        $respuesta = $this->cliente->get('transferencias-de-embriones');
        $cuerpo = $respuesta->getBody();

        
        return view('transembriones.index', ['transembriones'=> json_decode($cuerpo)]);
    }

    public function pdf()
    {
        $transembriones = DB::select('select * from trans_embrion');
        $parametros = DB::select('select *  from parametros where parametro = "Nombre de la empresa"');
    
        $pdf = PDF::loadView('transembriones.pdf',['transembriones'=>$transembriones],['parametros' =>$parametros]);
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
        $respuesta2 = $this->cliente->get('detalles_embrion');
        $cuerpo2 = $respuesta2->getBody();

        $respuesta3 = $this->cliente->get('vacas-sincronizadas');
        $cuerpo3 = $respuesta3->getBody();

        $datos = array(
            "detalles" => json_decode($cuerpo2),
            "vacassincro" => json_decode($cuerpo3)
        );
        return view('transembriones.create',['datos' => $datos]);
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
            "COD_EMBRION" =>  'required',
            "COD_REGISTRO_GANADO" => 'required', 
            "detalle_embrion" =>  'required',
        ]);
        
        $this->cliente->post('registrar-transferencia-embrion',['json'=> $request->all()]);
        return redirect()->route('transembriones.index')->with('info','Tranferencia de embrión registrada');
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
        
        $respuesta = $this->cliente->get('transferencias-de-embriones/'.$id);
        $cuerpo = $respuesta->getBody();
        
        return view('transembriones.edit', ['transembriones' => json_decode($cuerpo)]);
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
            "IND_TRANS_EMBRION" =>  'required',
         
        ]);
        $this->cliente->put('actualizar-transferencia-embrion/'. $id, ['json' => $request->all()
    ]);

    return redirect()->route('transembriones.index')->with('edit','Transferencia de embrión actualizada');
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
