<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleCompra extends Model
{
    Protected $table = "TBL_MC_DETALLE_COMPRAG";
    protected $primaryKey ="COD_DETALLE_COMPRA";
    protected $ForeignKey ="COD_COMPRA_GANADO";
    use HasFactory;
}
