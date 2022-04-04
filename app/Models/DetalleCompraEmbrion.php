<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleCompraEmbrion extends Model
{
    Protected $table = "TBL_MC_DETALLE_CEMBRION";
    protected $primaryKey ="COD_DETALLE_COMPRA";
    protected $ForeignKey ="COD_COMPRA_EMBRION";
    use HasFactory;
}
