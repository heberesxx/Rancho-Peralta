<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use  Barryvdh\DomPDF\Facade as PDF;
Use Illuminate\Support\Facades\DB;

class ProduccionLeche_controller extends Controller
{

    private $cliente;

    public function __construct()
    {
        $this->cliente = new Client(['base_uri' => 'http://localhost:3000/']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $respuesta = $this->cliente->get('produccion');
        $cuerpo = $respuesta->getBody();

        return view('produccion_leche.index', ['produccion_leches' => json_decode($cuerpo)]);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /* Traer los codigos de ganado **/
        $respuesta2 = $this->cliente->get('vacas_ordenio');
        $cuerpo2 = $respuesta2->getBody();

        $datos = array(
            "ganados" => json_decode($cuerpo2)
        );
        return view('produccion_leche.create', ['datos' => $datos]);
    }

    public function pdf()
    {
       $produccion_leches = DB::select('select * from produccion');
       $usuarios = DB::select('select * from users where id = ?', [Auth()->user()->id]);
      
    
        $pdf = PDF::loadView('produccion_leche.pdf',['produccion_leches'=>$produccion_leches],['usuarios' =>$usuarios]);

        return $pdf->stream();
       
      // return view('clientes.pdf')->with('personas', $clientes);
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
            "COD_REGISTRO_GANADO" => "required",
            "PRD_LITROS" => 'required|numeric|gt:0',
            "FEC_ORDEÑO" => "required|date",
            "DIA_LACTANCIA"=> "nullable|numeric",
            "OBS_REGISTRO"=>'nullable|max:200'

        ]);

        $this->cliente->post('insertarleche', ['json' => $request->all()]);
        return redirect()->route('produccion_leche.index')->with('info', ' Registro Ingresado.');;
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
        
        $respuesta = $this->cliente->get('mostrar_produccion/'.$id);
        $cuerpo = $respuesta->getBody();
        return view('produccion_leche.editar', ['produccion_leche' => json_decode($cuerpo)]);
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

        $request->validate(rules: [
           
            "PRD_LITROS" => "required|numeric|gt:0",
            "FEC_ORDENIO" => "required|date",
            "DIA_LACTANCIA"=> "nullable|numeric|integer|gt:0",
            "OBS_REGISTRO"=>'nullable|max:200'
           

        ]);

        $this->cliente->put('actualizar-produccion-leche/' . $id, [
            'json' => $request->all()
        ]);

        return redirect()->route('produccion_leche.index')
            ->with('info', 'Registro editado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $this->cliente->delete('EliminarRegistro/' . $id);

        return redirect('/produccion_leche')
            ->with('message', 'El Registro se elimino correctamente');
    }
}