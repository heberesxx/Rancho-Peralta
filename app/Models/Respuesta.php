<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Respuesta extends Model
{
    use HasFactory;
    Protected $table = "respuestas";
    protected $primaryKey ="id_respuesta";

    protected $fillable = [
   
        'respuesta',];
}
