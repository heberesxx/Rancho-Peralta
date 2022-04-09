<?php

namespace App\Http\Controllers;
use  Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class PrenadaMontaController extends Controller
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
        $respuesta = $this->cliente->get('vaca_prenada_monta');
        $cuerpo = $respuesta->getBody();

        return view(
            'prenadasmonta.index',
            ['vacasprenadasmonta'   => json_decode($cuerpo)]
        );
    }

    public function pdf()
    {
        $vacasprenadasmonta = DB::select('select * from vacas_prenadas_monta');
         $parametros = DB::select('select *  from parametros where parametro = "Nombre de la empresa"');
         $usuarios = DB::select('select * from users where id = ?', [Auth()->user()->id]);
        $pdf = PDF::loadView('prenadasmonta.pdf', ['vacasprenadasmonta' => $vacasprenadasmonta], ['parametros' => $parametros],['usuarios' =>$usuarios]);
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
        $respuesta = $this->cliente->get('mostrar_vacaprenada-monta/' . $id);
        $cuerpo = $respuesta->getBody();
        $vacaprenadamonta= json_decode($cuerpo);

        $fecha= \Carbon\Carbon::parse($vacaprenadamonta[0]->FEC_PARIO)->format('Y-m-d');

        return view('prenadasmonta.edit', ['vacasprenadasmonta' => $vacaprenadamonta, 'fecha'=>$fecha]);
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
            "FEC_PARIR" => 'required||after_or_equal:01-01-201',
            "OBS_VACAP" => 'nullable|max:200',
            "IND_PRENADA" => 'required',

        ]);

        
        $this->cliente->put('actualizar-vacap-monta/' . $id, [
            'json' => $request->all()
        ]);

        //DD($this->cliente);

        return redirect()->route('prenadasmonta.index')->with('edit', 'Vaca preñada actualizada');
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
