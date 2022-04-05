<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    protected $table = 'Citas';
    protected $fillable = [
        'asunto',
        'idvendedor',
        'idproveedor',
        'idcliente',
        'fecha',
        'sedes_id',
        'comentario',
        'idvehiculo'
    ];
}
