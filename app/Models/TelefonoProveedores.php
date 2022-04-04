<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TelefonoProveedores extends Model
{
    Protected $table = "TBL_MP_TELEFONO_PROVEEDORES";
    protected $primaryKey ="COD_TELEFENO";
    protected $foreignKey ="COD_PROVEEDOR";
    use HasFactory;
}
