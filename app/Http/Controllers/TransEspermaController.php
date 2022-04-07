<?php

namespace App\Http\Controllers;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use  Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\DB;

class TransEspermaController extends Controller
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
        $respuesta = $this->cliente->get('transferencias-de-esperma');
        $cuerpo = $respuesta->getBody();

        return view('transesperma.index', ['transespermas'   => json_decode($cuerpo)]);
    }

    public function pdf()
    {
        $transespermas = DB::select('select * from transf_esperma');
        $parametros = DB::select('select *  from parametros where parametro = "Nombre de la empresa"');
    
        $pdf = PDF::loadView('transesperma.pdf',['transespermas'=>$transespermas],['parametros' =>$parametros]);
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
            
        $respuesta2 = $this->cliente->get('detalles-esperma');
        $cuerpo2 = $respuesta2->getBody();

        $respuesta3 = $this->cliente->get('vacas-sincronizadas');
        $cuerpo3 = $respuesta3->getBody();

        $datos = array(
            "detalles" => json_decode($cuerpo2),
            "vacassincro" => json_decode($cuerpo3)
        );

        return view('transesperma.create',['datos' => $datos]);
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
            "NUM_PAJILLA" =>  'required',
            "COD_REGISTRO_GANADO" => 'required', 
            "detalle_esperma" => 'required', 
        ]);
        $this->cliente->post('registrar-transferencia-esperma',['json'=> $request->all()]);
        return redirect()->route('transesperma.index')->with('info','Tranferencia de Esperma Registrada');
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
        $respuesta = $this->cliente->get('transferencias-de-esperma/'.$id);
        $cuerpo = $respuesta->getBody();
        
        return view('transesperma.edit', ['transespermas' => json_decode($cuerpo)]);
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
            "IND_TRANS_ESPERMA" =>  'required',
         
        ]);
        $this->cliente->put('actualizar-transferencia-esperma/'. $id, ['json' => $request->all()
    ]);

    return redirect()->route('transesperma.index')->with('edit','Transferencia de Rsperma Actualizada');
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
