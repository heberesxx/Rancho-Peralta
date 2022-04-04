<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
    use HasFactory;
    Protected $table = "preguntas";
    protected $primaryKey ="id";

    protected $fillable = [
        'pregunta',
        'Creado_Por',];
}
