<?php

namespace App\Http\Controllers;
use  Barryvdh\DomPDF\Facade as PDF;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Models\Medicamento;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\DB;

class MedicamentoController extends Controller
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
        $respuesta = $this->cliente->get('todos-medicamentos');
        $cuerpo = $respuesta->getBody();
        return view('medicamento.index', ['medicamentos' => json_decode($cuerpo)]);
    }

    public function pdf()
    {
        $medicamentos = Medicamento::all();
        $parametros = DB::select('select *  from parametros where parametro = "Nombre de la empresa"');
    
        $pdf = PDF::loadView('medicamento.pdf',['medicamentos'=>$medicamentos],['parametros' =>$parametros]);
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
        return view('medicamento.create');
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
            "NOM_MEDICAMENTO" => 'required|min:2|max:30|unique:tbl_pr_medicamento',
            "CAN_REORDEN" => 'required|numeric|integer|gt:0',
            "ADM_MEDICAMENTO" => 'required|min:2|max:100',
            "TRA_MEDICAMENTO" => 'required|min:2|max:700',
            "DOS_MEDICAMENTO" => 'required|min:2|max:700'

        ]);

        $this->cliente->post('agregar-medicamento', [
            'json' => $request->all()
        ]);

        return redirect()->route('medicamento.index')->with('info', 'Medicamento Registrado');
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

        $respuesta = $this->cliente->get('medicamento/' . $id);
        $cuerpo = $respuesta->getBody();
        return view('medicamento.editar', ['medicamento' => json_decode($cuerpo)]);
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
            "NOM_MEDICAMENTO" => 'required|min:2|max:30',
            "CAN_REORDEN" => 'required|numeric|integer|gt:0',
            "ADM_MEDICAMENTO" => 'required|min:2|max:100',
            "TRA_MEDICAMENTO" => 'required|min:2|max:700',
            "DOS_MEDICAMENTO" => 'required|min:2|max:700'

        ]);
        $existe= Medicamento::where('NOM_MEDICAMENTO','=',$request->NOM_MEDICAMENTO)
        ->where('COD_MEDICAMENTO','<>',$id)->get();
        if(count($existe)){
            $errors = new MessageBag();
            $errors->add('NOM_MEDICAMENTO','Ya hay un medicamento registrado con este nombre');
        return back()->with('errors',$errors);
        }

        $this->cliente->put('actualizar-medicamento/' . $id, [
            'json' => $request->all()
        ]);

        return redirect()->route('medicamento.index')->with('info', 'Actualización exitosa');
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