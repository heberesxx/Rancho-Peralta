<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\LoteCompraEspermaController;
use  Barryvdh\DomPDF\Facade as PDF;
Use App\Rules\Uppercase;

class espermaController extends Controller
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
        $respuesta = $this->cliente->get('esperma');
        $cuerpo = $respuesta->getBody();

      
        return view('esperma.index', ['esperma' => json_decode($cuerpo)]);
    }

    public function pdf()
    {
        $esperma = DB::select('select * from compras_esperma');
        $parametros = DB::select('select *  from parametros where parametro = "Nombre de la empresa"');
        $usuarios = DB::select('select * from users where id = ?', [Auth()->user()->id]);
      

        $pdf = PDF::loadView('esperma.pdf',['esperma'=>$esperma],['usuarios' =>$usuarios]);

      
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
         $respuesta3 = $this->cliente->get('detalle_lote_esperma');
        $cuerpo3 = $respuesta3->getBody();

        $compras = DB::select('select * from compra_esperma_actual');

        $datos = array(
            "lotes" => json_decode($cuerpo3)
        );

        return view('esperma.create',['datos' => $datos],['compras'=>$compras]);
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
            "NUM_PAJILLA" => 'required|integer|gt:0|unique:tbl_mc_detalle_cesperma',
            "RAZ_TORO_DONADOR" => ["required","max:30",new Uppercase()],
            "PRE_ESPERMA" =>   'required|numeric|gt:0',
            "NOM_TORO_DONADOR"=>'nullable|max:30',
            "OBS_COMPRA_ESPERMA"=>'nullable|max:200',
            
            
        ]);
        
        $this->cliente->post('insertarcompraesperma', [
            'json' => $request->all()
        ]);

        return redirect()->route('esperma.create')->with('info', 'Item agregado.');
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
        $respuesta = $this->cliente->get('mostrar_loteesperma/' . $id);
        $cuerpo = $respuesta->getBody();
        return view('esperma.edit', ['lotes' => json_decode($cuerpo)]);
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
        $this->cliente->delete('eliminaritem_esperma/' . $id);

        return redirect()->route('esperma.create')
            ->with('info', 'El Registro se elimino correctamente');
    }
}