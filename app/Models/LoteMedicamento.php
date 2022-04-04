<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoteMedicamento extends Model
{
    Protected $table = "TBL_PR_COMPRA_MEDICAMENTO";
    protected $primaryKey ="COD_COMPRA_MEDICAMENTO";
    
    use HasFactory;
    protected $fillable = [
        'FEC_LOTE',
        'FEC_VENCIMIENTO',
        'CAN_TOTAL',
        'STATUS_LOTE',
    ];
}
