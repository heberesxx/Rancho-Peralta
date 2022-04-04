<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedores extends Model
{
    protected $table = "TBL_MP_PROVEEDORES";
    protected $primaryKey ="COD_PROVEEDOR";
    use HasFactory;
}
