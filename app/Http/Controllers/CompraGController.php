<?php

namespace App\Http\Controllers;

use App\Models\DetalleCompra;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use  Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;



class CompraGController extends Controller
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
        $respuesta = $this->cliente->get('compras');
        $cuerpo = $respuesta->getBody();
        
        

        return view('compras.index', ['compras' => json_decode($cuerpo)]);
    }

    public function pdf()
    {
       $compras = DB::select('select * from vganado');
       $parametros = DB::select('select *  from parametros where parametro = "Nombre de la empresa"');
       $usuarios = DB::select('select * from users where id = ?', [Auth()->user()->id]);
    
        $pdf = PDF::loadView('compras.pdf',['compras'=>$compras],['usuarios' =>$usuarios]);

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
        // $respuesta3 = $this->cliente->get('detalle_proveedor');
        // $cuerpo3 = $respuesta3->getBody();

        // $respuesta4 = $this->cliente->get('detalle_fecha');
        // $cuerpo4 = $respuesta4->getBody();

        // $respuesta6 = $this->cliente->get('detalle_cantidad');
        // $cuerpo6 = $respuesta6->getBody();

        // $respuesta7 = $this->cliente->get('detalle_total');
        // $cuerpo7 = $respuesta7->getBody();

        $respuesta8 = $this->cliente->get('detalle_lote');
        $cuerpo8 = $respuesta8->getBody();

        
   
   
        /******** Traer todos los lugares *******/
        $respuesta5 = $this->cliente->get('lugar');
        $cuerpo5 = $respuesta5->getBody();

        $compras = DB::select('select * from COMPRA_GANADO_ACTUAL');

        $datos = array(
            "lugares" => json_decode($cuerpo5),
            "lotes" => json_decode($cuerpo8),
    
  
        );
       //DD($datos);

        return view('compras.create',['datos' => $datos],['compras'=>$compras]);
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
       
            "NOMBRE"  => 'required|min:2|max:50',
            "COLOR" =>  'required|alpha|min:2|max:30',
            "COD_ESTADO" =>  'required', 
            "LUGAR" => 'required',
            "SEXO" =>  'required', 
            "PRECIO" =>  'required|numeric|gt:0',     
            "PESO" =>  'nullable|numeric|gt:0',  
            "FIERRO"  => 'nullable|alpha|min:2|max:3',
            "COD_RAZA"  => 'nullable',
           
            "status"=> 'required',
        ]);

        $this->cliente->post('insertarcompraganado', [
            'json' => $request->all()
        ]);
        //$cod_Detalle = DetalleCompra::all()->last()->COD_DETALLE_COMPRA;

        

        //Alert::success('Compra Registrada');
        

        return redirect()->route('compras.create');


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
        $respuesta = $this->cliente->get('mostrar_lote/' . $id);
        $cuerpo = $respuesta->getBody();
        return view('compras.edit', ['lotes' => json_decode($cuerpo)]);
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
        $this->cliente->put('actualizarpersona/'.$id, [
            'json' => $request->all()
        ]);

        return redirect('/compras');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->cliente->delete('eliminaritem/' . $id);

        return redirect()->route('compras.create')
            ->with('info', 'El Registro se elimino correctamente');
    }
}