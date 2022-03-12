<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Combustible extends Model
{
    //use HasFactory;
    protected $table = 'combustibles';
    protected $fillable = [
        'nombre'
    ];
}
