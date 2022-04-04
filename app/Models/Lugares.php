<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lugares extends Model
{
    Protected $table = "TBL_MG_LUGAR";
    protected $primaryKey ="COD_LUGAR";
    protected $nombre ="NOM_LUGAR";
    use HasFactory;
    protected $fillable = [
        'DIR_LUGAR',
        'UBI_EXACTA',
        'STATUS',
    ];
}
