<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Embriones extends Model
{
    Protected $table = "TBL_MG_EMBRION";
    protected $primaryKey ="COD_EMBRION";
    use HasFactory;
}
