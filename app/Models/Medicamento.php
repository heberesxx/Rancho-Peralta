<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicamento extends Model
{
    Protected $table = "TBL_PR_MEDICAMENTO";
    protected $primaryKey ="COD_MEDICAMENTO";
    use HasFactory;
}
