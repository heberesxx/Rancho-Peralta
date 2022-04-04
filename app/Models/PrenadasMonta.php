<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrenadasMonta extends Model
{
    Protected $table = "TBL_MG_PRENADA_MONTA";
    protected $primaryKey ="COD_PRENADA_MONTA";
    protected $nombre ="NOM_GANADO";
    use HasFactory;
}
