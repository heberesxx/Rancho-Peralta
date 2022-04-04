<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoteCompra extends Model
{
    Protected $table = "TBL_MC_COMPRA_GANADO";
    protected $primaryKey ="COD_COMPRA_GANADO";
    
    use HasFactory;
    protected $fillable = [
        'FEC_COMPRA',
        'COD_PROVEEDOR',
        'CAN_TOTAL',
        'TOTAL_PRECIO',
        'STATUS',
    ];
}
