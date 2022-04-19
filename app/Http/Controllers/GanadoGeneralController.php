<?php

namespace App\Http\Controllers;

use App\Exports\InvoicesExport;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;
use App\Models\Ganado;
use App\Invoice;
use App\Exports\GanadoExport;
use  Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class GanadoGeneralController extends Controller
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
        $respuesta = $this->cliente->get('ganado_general');
        $cuerpo = $respuesta->getBody();
        return view('ganado.index', ['ganados' => json_decode($cuerpo)]);
    }

    public function pdf()
    {
       $ganados = DB::select('select * from ganado_general');
        $parametros = DB::select('select *  from parametros where parametro = "Nombre de la empresa"');
        $usuarios = DB::select('select * from users where id = ?', [Auth()->user()->id]);

        $pdf = PDF::loadView('ganado.pdf',['ganados'=>$ganados],['usuarios' =>$usuarios]);

      

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
        $respuesta2 = $this->cliente->get('estado');
        $cuerpo2 = $respuesta2->getBody();

        /******** Traer todos los lugares *******/
        $respuesta3 = $this->cliente->get('lugar');
        $cuerpo3 = $respuesta3->getBody();


        $datos = array(
            "estados" => json_decode($cuerpo2),
            "lugares" => json_decode($cuerpo3)
        );

        return view('ganado.create',['datos' => $datos]);

    }

    public function export() 
    {
        return Excel::download(new GanadoExport, 'ganado.xlsx');
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
            "NUM_ARETE" =>  'required|numeric|unique:tbl_mg_ganado|digits_between:1,3',
            "nombre_ganado"  => 'required|min:2|max:30',
            "color" =>  'required|min:2|max:30',
            "status" =>  'required', 
            "lugar" => 'required',
            "sexo_ganado" =>  'required', 
            "peso"=>'nullable|numeric|gt:0',
            "fierro"  => 'nullable|alpha|min:2|max:3',
            "COD_RAZA"  => 'required',
            "COD_ESTADO" => 'required',
            "nombre_raza"=>'required'
            
        ]
    );
        
        $this->cliente->post('insertarganado',['json'=> $request->all()]);
        return redirect()->route('ganado.index')->with('info','Ganado registrado');
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

        

        $respuesta = $this->cliente->get('ganado_general/' . $id);
        $cuerpo = $respuesta->getBody();

   

        /******** Traer todos los lugares *******/
        $respuesta3 = $this->cliente->get('lugar');
        $cuerpo3 = $respuesta3->getBody();


        $datos = array(
         
            "lugares" => json_decode($cuerpo3)
        );
        
        return view('ganado.edit', ['ganado' => json_decode($cuerpo)],['datos' => $datos]);
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
            "nombre_ganado"  => 'min:2|max:30',
            'NUM_ARETE' => "numeric|digits_between:1,3",
            "color" =>  'min:2|max:30',
            "fierro"  => 'nullable|alpha|min:2|max:3',
           
            
 
            
        ]);
        
        
        $existe= Ganado::where('NUM_ARETE','=',$request->NUM_ARETE)
        ->where('COD_REGISTRO_GANADO','<>',$id)->get();

        if(count($existe)){
        return back()->with('NUM_ARETE','El campo número de arete, ya está en uso');
        }

        $this->cliente->put('actualizarganado/'. $id, ['json' => $request->all()
        ]);

 
        return redirect()->route('ganado.index')->with('edit','Ganado Editado');
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
