<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    protected $table = 'citas';
    protected $fillable = [
        'asunto',
        'idvehiculo',
        'idvendedor',
        'idproveedor',
        'idcliente',
        'fecha',
        'hora',
        'sedes_id',
        'comentario'
    ];
}
