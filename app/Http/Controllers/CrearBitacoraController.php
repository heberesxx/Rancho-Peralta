<?php

namespace App\Http\Controllers;

use App\Models\Bitacora;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use  Barryvdh\DomPDF\Facade as PDF;

class CrearBitacoraController extends Controller
{
    public function index(){

        
        return view('seguridad.bitacora.index');
    }


}


