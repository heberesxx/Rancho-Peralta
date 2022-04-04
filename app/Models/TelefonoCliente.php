<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TelefonoCliente extends Model
{
    use HasFactory;
    Protected $table = "TBL_MP_TELEFONOS_CLIENTES";
    protected $primaryKey ="COD_TELEFENO";
    protected $foreignKey ="COD_CLIENTE";

    use HasFactory;
}
