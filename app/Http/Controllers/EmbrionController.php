<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use  App\Http\Controller\BitacoraController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Rules\Uppercase;
use  Barryvdh\DomPDF\Facade as PDF;


class EmbrionController extends Controller
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
        $respuesta = $this->cliente->get('embrion');
        $cuerpo = $respuesta->getBody();


        return view('embrion.index', ['embrion' => json_decode($cuerpo)]);
    }
    public function pdf()
    {
        $embrion = DB::select('select * from compras_embriones');
        $parametros = DB::select('select *  from parametros where parametro = "Nombre de la empresa"');
        $usuarios = DB::select('select * from users where id = ?', [Auth()->user()->id]);
      
        $pdf = PDF::loadView('embrion.pdf',['embrion'=>$embrion],['usuarios' =>$usuarios]);

      
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

        $respuesta8 = $this->cliente->get('detalle_lote_embrion');
        $cuerpo8 = $respuesta8->getBody();

        $compras = DB::select('select * from compra_embrion_actual');

        $datos = array(
            "lotes" => json_decode($cuerpo8),
    
  
        );
       //DD($datos);

        return view('embrion.create',['datos' => $datos],['compras'=>$compras]);
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
            "raza_esperada" => ["required","max:40","min:3",new Uppercase()],
            "raza_donadora" => ["required","max:30","min:3",new Uppercase()],
            "raza_donador" => ["required","max:30","min:3",new Uppercase()],
            "precio_embrion" => 'required|numeric|gt:0',
            "vaca_donadora"=>'nullable|max:30',
            "toro_donador"=>'nullable|max:30',
            "observacion_compra"=>'nullable|max:150'

        ]);
        $this->cliente->post('insertarcompraembrion', [
            'json' => $request->all()
        ]);

        return redirect()->action(
            ['App\Http\Controllers\BitacoraController@index'],
            [
                'tabla'        => 'TBL_MC_COMPRA_EMBRION',
                'accion'       => 'INSERTAR',
                'descripcion'  => 'SE COMPRÓ PARA RAZA ESPERADA: ' . $request->raza_esperada,
                'ruta'         => 'embrion.create',
                'msj'          => 'Item Agregado',

            ]

        );


        return redirect()->route('embrion.create');
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
        $respuesta = $this->cliente->get('mostrar_loteembrion/' . $id);
        $cuerpo = $respuesta->getBody();
        return view('embrion.edit', ['lotes' => json_decode($cuerpo)]);
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
        $this->cliente->delete('eliminaritem_embrion/' . $id);

        return redirect()->route('embrion.create')
            ->with('info', 'El Registro se elimino correctamente');
    }
}
