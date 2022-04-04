<?php

namespace App\Http\Controllers;


use App\Models\LoteCompra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class VacasChartController extends Controller
{
    public function index(){

        $lotes = LoteCompra::all();
        //dd($lotes);

        $puntos = [];
        foreach ($lotes as $lote){
            $puntos[] = ['name' => 'Lote #: '.$lote[ 'COD_COMPRA_GANADO'], 'y' => floatval($lote['TOTAL_PRECIO'])];
        }
        return view('dashboard',["data" => json_encode($puntos)]);


        $lotes = LoteCompra::all();
     

        $puntos = [];
        foreach ($lotes as $lote){
            $puntos[] = ['name' => 'Lote #: '.$lote[ 'COD_COMPRA_GANADO'], 'y' => floatval($lote['CAN_TOTAL'])];
        }
        return view('dashboard',["DATA" => json_encode($puntos)]);

    }

    

}
