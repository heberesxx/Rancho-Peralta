<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
class Bitacora extends Model
{
    use HasFactory, Notifiable;
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public static function search($search)
    {
        return empty($search) ? static::query()
            : static::query()->where('id', 'like', '%'.$search.'%')
            ->orWhere('fecha', 'like', '%'.$search.'%')
            ->orWhere('usuario', 'like', '%'.$search.'%')
            ->orWhere('tabla', 'like', '%'.$search.'%')
            ->orWhere('accion', 'like', '%'.$search.'%')
            ->orWhere('descripccion', 'like', '%'.$search.'%');

    }
}
