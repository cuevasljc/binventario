<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'vendor_id',
        'lote',
        'fecha_hora',
        'observacion'
    ];
}
