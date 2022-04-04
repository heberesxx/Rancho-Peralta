<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use  Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\DB;
class NacimientosController extends Controller
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
        $respuesta = $this->cliente->get('nacimientos');
        $cuerpo = $respuesta->getBody();
       

         

          return view('nacimientos.index', ['nacimientos' => json_decode($cuerpo)]);
    }

    public function pdf()
    {
       $nacimientos = DB::select('select * from nacimientos_embrion');
        $parametros = DB::select('select *  from parametros where parametro = "Nombre de la empresa"');
    
        $pdf = PDF::loadView('nacimientos.pdf',['nacimientos'=>$nacimientos],['parametros' =>$parametros]);

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
         /******** Traer todos los estados *******/
         $respuesta2 = $this->cliente->get('estados_ternero');
         $cuerpo2 = $respuesta2->getBody();
 
         /******** Traer todos los lugares *******/
         $respuesta3 = $this->cliente->get('lugar');
         $cuerpo3 = $respuesta3->getBody();

          /******** Traer todas las vacas recien paridas*******/
          $respuesta4 = $this->cliente->get('vacas-recien-paridas');
          $cuerpo4 = $respuesta4->getBody();
 
 
         $datos = array(
             "estados_ternero" => json_decode($cuerpo2),
             "lugares" => json_decode($cuerpo3),
             "vacasrecienp" => json_decode($cuerpo4)
         );

      
         return view('nacimientos.create',
        ['datos' => $datos]);
         
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
            "NUM_ARETE" =>  'nullable|numeric|unique:tbl_mg_ganado|digits_between:1,3',
            "NOM_GANADO"  => 'required|alpha|min:2|max:30',
            "CLR_GANADO" =>  'required|min:2|max:30',
            "COD_ESTADO" =>  'required', 
            "COD_LUGAR" => 'required',
            "COD_RAZA" => 'required',
            "status" => 'required',
            "SEX_GANADO" =>  'required', 
            "PES_ACTUAL"=>'nullable|numeric',
            "FIE_GANADO"  => 'nullable|alpha|min:2|max:3',
            "RAZ_GANADO"  => 'nullable|alpha_dash|max:25',
            "COD_PRENADA_EMBRION" =>  'required',
            "FEC_NACIMIENTO" =>  'required|after_or_equal:01-01-2015',
            "nombre_raza"=>'required'
            
        ]);
       // DD($request);

        $this->cliente->post('registrar-nacimiento',['json'=> $request->all()]);
        return redirect()->route('nacimientos.index')->with('info', 'Nacimiento por Embrión registrado.');

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
