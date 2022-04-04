<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Esperma extends Model
{
    Protected $table = "TBL_MG_ESPERMA";
    protected $primaryKey ="COD_ESPERMA";
    protected $unique ="NUM_PAJILLA";
    use HasFactory;
}
