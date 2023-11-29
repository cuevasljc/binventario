<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Traspaso extends Model
{
    use HasFactory;
    protected $fillable = [
        'sucursal_envio_id',
        'sucursal_recepcion_id',
        'user_id',
        'fecha_hora',
        'item_id',
        'cantidad'
    ];
}
