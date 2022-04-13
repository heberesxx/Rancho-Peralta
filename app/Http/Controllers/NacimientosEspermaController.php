<?php

namespace App\Http\Controllers;
use GuzzleHttp\Client;
use  Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class NacimientosEspermaController extends Controller
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
        $respuesta = $this->cliente->get('nacimientos_esperma');
        $cuerpo = $respuesta->getBody();
  

          return view('nacimientos_esperma.index', ['nacimientosesperma' => json_decode($cuerpo)]);
    }

    public function pdf()
    {
       $nacimientosesperma = DB::select('select * from nacimientos_esperma');
        $parametros = DB::select('select *  from parametros where parametro = "Nombre de la empresa"');
        $usuarios = DB::select('select * from users where id = ?', [Auth()->user()->id]);
        $pdf = PDF::loadView('nacimientos_esperma.pdf',['nacimientosesperma'=>$nacimientosesperma],['usuarios' =>$usuarios]);

      

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
         $respuesta4 = $this->cliente->get('recien-paridas-esperma');
         $cuerpo4 = $respuesta4->getBody();


        $datos = array(
            "estados_ternero" => json_decode($cuerpo2),
            "lugares" => json_decode($cuerpo3),
            "recienp_esperma" => json_decode($cuerpo4)
        );

        return view('nacimientos_esperma.create',['datos' => $datos]);
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
            "NOM_GANADO"  => 'required|min:2|max:30',
            "CLR_GANADO" =>  'required|min:2|max:30',
            "COD_ESTADO" =>  'required', 
            "COD_LUGAR" => 'required',
            "COD_RAZA" => 'required',
            "status" => 'required',
            "SEX_GANADO" =>  'required', 
            "PES_ACTUAL"=>'nullable|numeric|gt:0',
            "FIE_GANADO"  => 'nullable|alpha|min:2|max:3',
            "RAZ_GANADO"  => 'nullable|alpha_dash|max:25',
            "COD_PRENADA_ESPERMA" =>  'required',
            "FEC_NACIMIENTO" =>  'required|after_or_equal:01-01-2015',
            "nombre_raza"=>'required'
            
        ]);
        
        $this->cliente->post('registrar-nacimiento-esperma',['json'=> $request->all()]);
        return redirect()->route('nacimientos_esperma.index') ->with('info', 'Nacimiento por Esperma registrado.');
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
