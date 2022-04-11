<?php

namespace App\Exports;

use App\Models\Ganado;
use Maatwebsite\Excel\Concerns\FromCollection;

use App\Invoice;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class GanadoExport implements FromView, ShouldAutoSize
{
    public function view(): View
    {
        $usuarios = DB::select('select * from users where id = ?', [Auth()->user()->id]);
        return view('ganado.excel', [
            'ganados' => DB::select('select * from ganado_general')
        ],['usuarios' =>$usuarios]);
    }
}