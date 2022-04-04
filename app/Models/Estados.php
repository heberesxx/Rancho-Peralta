<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estados extends Model
{
    Protected $table = "TBL_MG_ESTADO_GANADO";
    protected $primaryKey ="COD_ESTADO";
    use HasFactory;

    protected $fillable = [
        'DET_ESTADO',
        'DESCRIPCION_ESTADO',
        'STATUS',
    ];
}
