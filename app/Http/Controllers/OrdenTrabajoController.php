<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Models\Medicamento;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;

class OrdenTrabajoController extends Controller
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
        $respuesta = $this->cliente->get('orden-trabajo');
        $cuerpo = $respuesta->getBody();


        $respuesta2 = $this->cliente->get('medicamentos_orden');
        $cuerpo2 = $respuesta2->getBody();


        return view('orden_trabajo.index', ['ordenesT' => json_decode($cuerpo)], 
        ['medicamentos' => json_decode($cuerpo2)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /******** Traer todos los medicamentos *******/
        $respuesta2 = $this->cliente->get('medicamentos_orden');
        $cuerpo2 = $respuesta2->getBody();

        $datos = array(
            "medicamentos" => json_decode($cuerpo2)
        );

        return view('orden_trabajo.create',['datos' => $datos]);
   
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
            "nombre_medicamento" => 'required',
            "CAN_MEDICAMENTO" => 'required|numeric|integer|gt:0',
        ]);


        $existe = Medicamento::where('CAN_DISPONIBLE','<',$request->CAN_MEDICAMENTO)
        ->where('COD_MEDICAMENTO','=',$request->COD_MEDICAMENTO)->get();
        if(count($existe)){
            return back()->with('CAN_MEDICAMENTO','Esta cantidad es mayor a la que existe en el inventario');
        }


        $this->cliente->post('agregar-ordent', [
            'json' => $request->all()
        ]);

        return redirect()->route('orden_trabajo.index')->with('info','Orden Registrada');
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