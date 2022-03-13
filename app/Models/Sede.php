<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sede extends Model
{
    protected $table = 'sedes';
    protected $fillable=[
        'nombre',
        'telefono',
        'correo',
        'direccion',
        'ciudades_id'
    ];
}
