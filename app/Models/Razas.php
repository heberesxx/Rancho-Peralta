<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Razas extends Model
{
    use HasFactory;
    Protected $table = "TBL_MG_RAZA";
    protected $primaryKey ="COD_RAZA";
    protected $nombre ="NOM_RAZA";

    protected $fillable = [
        'NOM_RAZA',
        'DET_RAZA',
        'IND_RAZA',
    ];
    
}
