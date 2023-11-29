<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $fillable = [
        'codigo',
        'nombre',
        'marca',
        'linea',
        'unidad',
        'costo',
        'precio_compra',
        'medida'
    ];
}
