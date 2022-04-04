<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BitacoraController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index(
        $tabla,
        $accion,
        $descripcion,
        $ruta,
        $msj
    ) {
        DB::statement(
            'insert into bitacoras values(?,?,?,?,?,?)',
            [null, now(), Auth()->user()->username, $tabla, $accion, $descripcion]

        );

        return redirect()->route($ruta)->with('info', $msj);
    }

    
}
