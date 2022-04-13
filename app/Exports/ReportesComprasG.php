<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ReportesComprasG implements FromView, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $usuarios = DB::select('select * from users where id = ?', [Auth()->user()->id]);
        return view('ganado.excel', [
            'ganados' => DB::select('select * from ganado_general')
        ],['usuarios' =>$usuarios]);
    }
}
