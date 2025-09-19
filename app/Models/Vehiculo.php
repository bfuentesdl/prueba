<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    use Hasfactory;

    protected $fillable = [
        'marca',
        'modelo',
        'anio',
        'precio',
        'disponibilidad',
        'caracteristicas',
        'imagen',
    ];
}
