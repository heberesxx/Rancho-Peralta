<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    use HasFactory;
    Protected $table = "TBL_MP_CLIENTES";
    protected $primaryKey ="COD_CLIENTE";
    

    protected $fillable = [
        'name',];
}