<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImagenVehiculo extends Model
{
    protected $table = 'imagenes_vehiculos';
    protected $fillable=[
        'idvehiculo',
        'foto'
    ];
}
