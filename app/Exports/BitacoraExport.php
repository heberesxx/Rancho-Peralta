<?php

namespace App\Exports;

use App\Models\Bitacora;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;


class BitacoraExport implements FromView,ShouldAutoSize
{
   public function view(): View
   {
    $usuarios = DB::select('select * from users where id = ?', [Auth()->user()->id]);
       return view('seguridad.bitacora.excel',[
           'bitacoras' => DB::select('select * from bitacora')]
           ,['usuarios' =>$usuarios]);
   }
}
