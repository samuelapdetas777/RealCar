<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    protected $table = 'compras';
    protected $fillable = [
        'proveedor',
        'vehiculo',
        'valor',
        'created_at',
        'updated_at'	
    ];
}
