<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    protected $table = 'vehiculos';
    protected $fillable = [
        'user_id',
        'nombre',
        'marcas_id',
        'placa',
        'motor',
        'airbag',
        'modelo',
        'kilometraje',
        'combustibles_id',
        'tipocaja_id',
        'color',
        'estadovehiculo_id',
        'estadoaplicativo_id',
        'precio',
        'descripcion',
        'foto',
    ];
}
