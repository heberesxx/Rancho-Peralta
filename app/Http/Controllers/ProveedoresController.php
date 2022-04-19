<?php

namespace App\Http\Controllers;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use  App\Http\Controller\BitacoraController;
use App\Models\Proveedores;
use App\Models\TelefonoProveedores;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Validator;
use  Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\DB;

class ProveedoresController extends Controller
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
        $respuesta = $this->cliente->get('VistaProveedores');
        $cuerpo = $respuesta->getBody();

      

        return view('proveedores.index', ['proveedores' => json_decode($cuerpo)]);
    }

    public function pdf()
    {
       $proveedores = DB::select('select * from proveedores_registrados');
        $parametros = DB::select('select *  from parametros where parametro = "Nombre de la empresa"');
         $usuarios = DB::select('select * from users where id = ?', [Auth()->user()->id]);
      
        $pdf = PDF::loadView('proveedores.pdf',['proveedores'=>$proveedores],['usuarios' =>$usuarios]);

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
        return view('proveedores.crear');
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
            "primer_nombre" => 'required|min:2|max:30',
            "primer_apellido" => 'required|min:2|max:30',
            "id_proveedor" => 'required|numeric:min:13|numeric:max:15|unique:tbl_mp_proveedores',
            "numero_area" => 'required|numeric|digits_between:2,4|',
            "NUM_CELULAR" => 'required|numeric|digits_between:7,10|unique:tbl_mp_telefono_proveedores',
            "numero_telefono" => 'nullable|numeric|digits_between:7,10',
            "direccion"=>'nullable|max:255'
            
        ]);
        $this->cliente->post('insertarproveedor',['json'=> $request->all()]);

        return redirect()->action(
            ['App\Http\Controllers\BitacoraController@index'],
            [
                'tabla'        => 'PROVEEDORES',
                'accion'       => 'INSERTAR',
                'descripcion'  => 'SE INSERTÓ EL PROVEEDOR: '.$request->primer_nombre.' '.$request->primer_apellido,
                'ruta'         => 'proveedores.index',
                'msj'          => 'Proveedor Registrado.',
            
            ]
            
        );

        
        return redirect()->route('proveedores.index')->with('info', 'Proveedor Registrado.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $respuesta = $this->cliente->get('mostrar_proveedor/'.$id);
        $cuerpo = $respuesta->getBody();
        $proveedor= json_decode($cuerpo);
           
        $fecha= \Carbon\Carbon::parse($proveedor[0]->FEC_NACIMIENTO)->format('Y-m-d');
        return view('proveedores.edit', ['proveedores'=> $proveedor,'fecha'=>$fecha]);
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
            "primer_nombre" => 'required|min:3|max:50', 
            "primer_apellido" => 'required|min:3|max:50',
            "ID_PROVEEDOR" => 'required|numeric|digits_between:13,15|',
            "NUM_AREA" => 'required|numeric|digits_between:2,4|',
            "NUM_CELULAR" => 'required|numeric|digits_between:7,10',
            "numero_telefono" => 'nullable|numeric|digits_between:7,10',
            "DET_DIRECCION"=>'nullable|max:255'
            
            
        ]);
        $existe= Proveedores::where('ID_PROVEEDOR','=',$request->ID_PROVEEDOR)
        ->where('COD_PROVEEDOR','<>',$id)->get();
        if(count($existe)){
            $errors = new MessageBag();
            $errors->add('ID_PROVEEDOR','El campo DNI proveedor, ya está en uso');
        return back()->with('errors',$errors);
        }

        $existe= TelefonoProveedores::where('NUM_CELULAR','=',$request->NUM_CELULAR)
        ->where('COD_PROVEEDOR','<>',$id)->get();
        if(count($existe)){
            $errors = new MessageBag();
            $errors->add('NUM_CELULAR','El campo celular, ya está en uso');
        return back()->with('errors',$errors);
        }


        $this->cliente->put('actualizarproveedor/'. $id, ['json' => $request->all()
        ]);

        return redirect()->route('proveedores.index')->with('edit', 'Proveedor Actualizado.');
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
