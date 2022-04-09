<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use function PHPSTORM_META\map;

class Parametro extends Model
{
    use HasFactory;

    protected $fillable = [
    'parametro',
    'valor',
    'Creado_Por',
'Modificado_Por'];
}
