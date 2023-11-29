<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cdetalle extends Model
{
    use HasFactory;
    protected $fillable = [
        'compra_id',
        'item_id',
        'cantidad',
        'precio',
        'observacion'
    ];
}
