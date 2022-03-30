<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table = 'pedidos';
    protected $fillable = [
        'cliente',
        'proveedor',
        'vehiculo',
        'fechaentrega',
        'valor',
        'created_at',
        'updated_at'	
    ];
}
