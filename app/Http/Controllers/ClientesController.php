<?php

namespace App\Http\Controllers;
use  App\Http\Controller\BitacoraController;
use App\Models\Bitacora;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\Clientes;
use App\Models\TelefonoCliente;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;
use  Barryvdh\DomPDF\Facade as PDF;
use RealRashid\SweetAlert\Facades\Alert;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ClientesExport;

class ClientesController extends Controller
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
        $respuesta = $this->cliente->get('VistaClientes');
        $cuerpo = $respuesta->getBody();

      

        return view('clientes.index', ['personas' => json_decode($cuerpo)]);
    }

    public function pdf()
    {
       $personas = DB::select('select * from clientes_registrados');
       $parametros = DB::select('select *  from parametros where parametro = "Nombre de la empresa"');
       $usuarios = DB::select('select * from users where id = ?', [Auth()->user()->id]);
      
    
        $pdf = PDF::loadView('clientes.pdf',['personas'=>$personas],['usuarios' =>$usuarios]);

        return $pdf->stream();
       
      // return view('clientes.pdf')->with('personas', $clientes);
    }

    public function bitacora(){

        $bitacoras = Bitacora::all();
        $parametros = DB::select('select *  from parametros where parametro = "Nombre de la empresa"');
     
         $pdf = PDF::loadView('seguridad.bitacora.pdf',['bitacoras'=>$bitacoras],['parametros' =>$parametros]);
         $pdf->SetPaper('a4','landscape');
         return $pdf->stream();

    }

    public function export() 
    {
        return Excel::download(new ClientesExport, 'clientes.xlsx');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    

        return view('clientes.create');
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
            "primer_nombre" => 'required|min:3|max:50', 
            "primer_apellido" => 'required|min:3|max:50',
            "ID_CLIENTE" => 'required|numeric|digits_between:13,15|unique:tbl_mp_clientes',
            "numero_area" => 'required|numeric|digits_between:2,4|',
            "NUM_CELULAR" => 'required|numeric|digits_between:7,10|unique:tbl_mp_telefonos_clientes',
            "numero_telefono" => 'nullable|numeric|digits_between:7,10',
            "direccion"=>'nullable|max:255'
            
        ]);

        $this->cliente->post('insertarpersona',['json'=> $request->all()]);

        $id= Clientes::all()->last()->COD_CLIENTE;

       

        return redirect()->action(
            ['App\Http\Controllers\BitacoraController@index'],
            [
                'tabla'        => 'CLIENTES',
                'accion'       => 'INSERTAR',
                'descripcion'  => 'SE INSERTO EL CLIENTE: '.$request->primer_nombre.' '.$request->primer_apellido.' '.'CON EL ID '. $id,
                'ruta'         => 'clientes.index',
                'msj'          => 'Cliente Registrado.',
            
            ]
            
        );

      //  Alert::success('Cliente Registrado');
        return redirect()->route('clientes.index')->with('info', 'Cliente Registrado.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $COD_PERSONA
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
        $respuesta = $this->cliente->get('mostrar_cliente/'.$id);
        $cuerpo = $respuesta->getBody();
         //dd(json_decode($cuerpo));
            $persona= json_decode($cuerpo);
           
         $fecha= \Carbon\Carbon::parse($persona[0]->FEC_NACIMIENTO)->format('Y-m-d');
       return view('clientes.edit', ['personas' => $persona,'fecha'=>$fecha]);
        
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
        //dd(Clientes::all());
        
        $request->validate (  rules: [
            "COD_CLIENTE" => 'nullable',
            "primer_nombre" => 'required|min:3|max:50', 
            "primer_apellido" => 'required|min:3|max:50',
            "ID_CLIENTE" =>"required|numeric|digits_between:13,15",
            "numero_area" => 'required|numeric|digits_between:2,4|',
            "NUM_CELULAR" => 'required|numeric|digits_between:7,10',
            "numero_telefono" => 'nullable|numeric|digits_between:7,10',
            "direccion"=>'required|regex:([a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+)|max:255'
            
        ]);
       
        //dd($id);

        $existe= Clientes::where('ID_CLIENTE','=',$request->ID_CLIENTE)
        ->where('COD_CLIENTE','<>',$id)->get();
        if(count($existe)){
            $errors = new MessageBag();
            $errors->add('ID_CLIENTE','El campo DNI cliente, ya está en uso');
        return back()->with('errors',$errors);
        }
        
        $existe= TelefonoCliente::where('NUM_CELULAR','=',$request->NUM_CELULAR)
        ->where('COD_CLIENTE','<>',$id)->get();
        if(count($existe)){
            $errors = new MessageBag();
            $errors->add('NUM_CELULAR','El campo celular, ya está en uso');
        return back()->with('errors',$errors);
        }
        
       

        $this->cliente->put('actualizarcliente/'. $id, ['json' => $request->all()
        ]);

        return redirect()->route('clientes.index')->with('edit','Cliente Actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->cliente->delete('deletepersona/'. $id);
        return redirect('clientes.index');
    }
}
