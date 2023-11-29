<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sucursalstock extends Model
{
    use HasFactory;
    protected $fillable = [
        'item_id',
        'sucursal_id',
        'stock',
        'precio_venta'
    ];
}
