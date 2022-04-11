<?php

namespace App\Http\Controllers;

use App\Models\Razas;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\DB;
use  App\Http\Controller\BitacoraController;
use  Barryvdh\DomPDF\Facade as PDF;
use App\Rules\Uppercase;

class RazasController extends Controller
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
        $razas = Razas::all();
        return view('razas.index')->with('razas', $razas);
    }

    public function pdf()
    {
       $razas = Razas::all();
        $parametros = DB::select('select *  from parametros where parametro = "Nombre de la empresa"');
        $usuarios = DB::select('select * from users where id = ?', [Auth()->user()->id]);
      
        $pdf = PDF::loadView('razas.pdf',['razas'=>$razas],['usuarios' =>$usuarios]);

      

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
        return view('razas.create');
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
            "NOM_RAZA" => ['required', 'max:30','min:3','unique:tbl_mg_raza',new Uppercase()],
            "DET_RAZA" => 'nullable|max:150',

        ]);

        $data = [
            'NOM_RAZA' => $request->NOM_RAZA,
            'DET_RAZA' => $request->DET_RAZA,
            'Creado_Por' => Auth()->user()->id,

        ];
        Razas::create($data);

        return redirect()->action(
            ['App\Http\Controllers\BitacoraController@index'],
            [
                'tabla'        => 'RAZAS',
                'accion'       => 'INSERTAR',
                'descripcion'  => 'SE INSERTÓ LA RAZA: ' . $request->NOM_RAZA,
                'ruta'         => 'razas.index',
                'msj'          => 'Raza creada.',

            ]
        );

        return redirect()->route('razas.index')->with('info', 'Raza creada.');
    
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
        $raza  =   Razas::find($id);
        return view('razas.edit')->with('raza', $raza);
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
            "NOM_RAZA" => ["required","min:2","max:30", new Uppercase()] ,
            "DET_RAZA" => 'max:150',
            "IND_RAZA"=>'required'

        ]);
        $data = [
            'NOM_RAZA' => $request->NOM_RAZA,
            'DET_RAZA' => $request->DET_RAZA,
            'IND_RAZA' => $request->IND_RAZA,
            'Actualizado_Por' => Auth()->user()->id,

        ];

        $existe = Razas::where('NOM_RAZA', '=', $request->NOM_RAZA)
            ->where('COD_RAZA', '<>', $id)->get();
        if (count($existe)) {
            $errors = new MessageBag();
            $errors->add('NOM_RAZA', 'Este nombre ya está en uso');
            return back()->with('errors', $errors);
        }

        $raza  = Razas::find($id);
        
    
        $originales = $raza->getOriginal();
        $raza->update($data);
        $cambios = $raza->getChanges();
     //  DD($originales);

     foreach ($cambios as $key => $value) {
        $anterior=$originales[$key];
        $campo="";
        if ($key!="updated_at") {
            if ($key=="NOM_RAZA") {
               $campo=" CAMBIO EN EL CAMPO NOMBRE  ";
            }elseif($key=="DET_RAZA") {
                $campo=" CAMBIO EN EL CAMPO DESCRIPCION  ";
            }elseif($key=="IND_RAZA") {
                $campo=" CAMBIO EN EL CAMPO DESCRIPCION  ";
            }
            DB::insert('insert into bitacoras (usuario,tabla,accion,descripccion,fecha) values (?, ?, ?, ?,?)', 
            [Auth()->user()->username, 'RAZAS','EDITAR',
            'ID DEL REGISTRO EDITADO: '.$raza->COD_RAZA. $campo.'  --VALOR ANTERIOR: '.$anterior.'    --NUEVO VALOR: '.$value,now()]);
        }
    }
    

    return redirect()->route('razas.index')->with('edit', 'Raza actualizada.');
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
