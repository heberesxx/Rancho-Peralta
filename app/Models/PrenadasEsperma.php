<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrenadasEsperma extends Model
{
    Protected $table = "TBL_MG_PRENADA_ESPERMA";
    protected $primaryKey ="COD_PRENADA_ESPERMA";
    protected $nombre ="NOM_GANADO";
    use HasFactory;
}
