<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrenadasEmbrion extends Model
{
    Protected $table = "TBL_MG_PRENADA_EMBRION";
    protected $primaryKey ="COD_PRENADA_EMBRION";
    protected $nombre ="NOM_GANADO";
    use HasFactory;
}
