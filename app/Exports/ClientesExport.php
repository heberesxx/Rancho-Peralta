<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;

class ClientesExport implements FromView
{
    public function view(): View
    {
        $usuarios = DB::select('select * from users where id = ?', [Auth()->user()->id]);
        return view('clientes.excel', [
            'personas' => DB::select('select * from clientes_registrados')
        ],['usuarios' =>$usuarios]);
    }
}
