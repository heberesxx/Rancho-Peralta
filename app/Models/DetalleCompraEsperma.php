<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleCompraEsperma extends Model
{
    Protected $table = "TBL_MC_DETALLE_CESPERMA";
    protected $primaryKey ="COD_DETALLE_COMPRA";
    protected $ForeignKey ="COD_COMPRA_ESPERMA";
    use HasFactory;
}
