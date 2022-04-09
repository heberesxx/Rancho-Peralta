<?php

namespace App\Http\Controllers;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Lugares;
use Illuminate\Support\MessageBag;
use  App\Http\Controller\BitacoraController;
use  Barryvdh\DomPDF\Facade as PDF;

class LugaresController extends Controller
{
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
        $lugares = DB::select('select* from lugares_ganado');
        return view('lugares.index')->with('lugares', $lugares);
    }

    public function pdf()
    {
       $lugares = Lugares::all();
        $parametros = DB::select('select *  from parametros where parametro = "Nombre de la empresa"');
        $usuarios = DB::select('select * from users where id = ?', [Auth()->user()->id]);
        $pdf = PDF::loadView('lugares.pdf',['lugares'=>$lugares],['usuarios' =>$usuarios]);

      
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
        return view('lugares.create');
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
            "DIR_LUGAR" => 'required|min:2|max:30||unique:tbl_mg_lugar',
            "ubicacion_exacta" => 'nullable|max:150',
            "status" =>'nullable'

        ]);

        $data = [
            'DIR_LUGAR' => $request->DIR_LUGAR,
            'UBI_EXACTA' => $request->ubicacion_exacta,
        ];

        Lugares::create($data);

        return redirect()->action(
            ['App\Http\Controllers\BitacoraController@index'],
            [
                'tabla'        => 'LUGARES',
                'accion'       => 'INSERTAR',
                'descripcion'  => 'SE INSERTÓ EL LUGAR: ' . $request->direccion_lugar,
                'ruta'         => 'lugares.index',
                'msj'          => 'Lugar Registrado.',

            ]
        );

        return redirect()->route('lugares.index')->with('info', 'Lugar Registrado.');
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
        $lugar  =   Lugares::find($id);
        return view('lugares.edit')->with('lugar', $lugar);
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
            "DIR_LUGAR" => 'required|min:2|max:30',
            "UBI_EXACTA" => 'max:150',
            "STATUS" => 'required'

        ]);
        $data = [
            'DIR_LUGAR' => $request->DIR_LUGAR,
            'UBI_EXACTA' => $request->UBI_EXACTA,
            'STATUS' => $request->STATUS,

        ];
        $existe = Lugares::where('DIR_LUGAR', '=', $request->DIR_LUGAR)
            ->where('COD_LUGAR', '<>', $id)->get();
        if (count($existe)) {
            $errors = new MessageBag();
            $errors->add('DIR_LUGAR', 'Este nombre, ya está en uso');
            return back()->with('errors', $errors);
        }

        $lugar  = Lugares::find($id);
        
    
        $originales = $lugar->getOriginal();
        $lugar->update($data);
        $cambios = $lugar->getChanges();
     //  DD($originales);

     foreach ($cambios as $key => $value) {
        $anterior=$originales[$key];
        $campo="";
        if ($key!="updated_at") {
            if ($key=="DIR_LUGAR") {
               $campo=" CAMBIO EN EL CAMPO NOMBRE  ";
            }elseif($key=="UBI_EXACTA") {
                $campo=" CAMBIO EN EL CAMPO UBICACIÓN EXACTA  ";
            }elseif($key=="STATUS") {
                $campo=" CAMBIO EN EL CAMPO STATUS  ";
            }
            DB::insert('insert into bitacoras (usuario,tabla,accion,descripccion,fecha) values (?, ?, ?, ?,?)', 
            [Auth()->user()->username, 'LUGARES','EDITAR',
            'ID DEL REGISTRO EDITADO: '.$lugar->COD_LUGAR. $campo.'  --VALOR ANTERIOR: '.$anterior.'    --NUEVO VALOR: '.$value,now()]);
        }
    }
    

    return redirect()->route('lugares.index')->with('edit', 'Lugar actualizado.');
   
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->cliente->delete('eliminar_lugar/' . $id);

        return redirect()->route('transaccionales.index')->with('info', 'Lugar Borrado');
    }
}
