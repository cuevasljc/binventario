<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vdetalle extends Model
{
    use HasFactory;
    protected $fillable = [
        'venta_id',
        'item_id',
        'cantidad',
        'precio',
        'observacion'
    ];
}
