<?php

namespace App\Models;

use App\Models\Ciudad;
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
    function ciudadSede(){
        return $this->belongsTo(Ciudad::class, 'ciudad');
    }
}
