<?php

namespace App\Models;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ganado extends Model
{
    
    Protected $table = "TBL_MG_GANADO";
    protected $primaryKey ="COD_REGISTRO_GANADO";
    protected $nombre ="NOM_GANADO";
    protected $unique ="NUM_ARETE";
    
    use HasFactory;

    public static function search($search)
{
    return empty($search) ? static::query():
    static::query()->where('NOM_GANADO','like','%'.$search.'%')
    ->orWhere('NUM_ARETE','like','%'.$search.'%');
    
}
}

