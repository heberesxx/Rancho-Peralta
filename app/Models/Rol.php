<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    use HasFactory;
    Protected $table = "roles";

    protected $fillable = [
        'name',
        'STATUS',
    ];
}
