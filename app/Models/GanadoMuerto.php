<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GanadoMuerto extends Model
{
    Protected $table = "TBL_MG_GANADO_MUERTO";
    protected $primaryKey ="COD_MUERTE";
    use HasFactory;

    protected $fillable = [
        'ETA_PRODUCTIVA',
        'CAUSA',
        'OBS_MUERTE',
    ];


}
