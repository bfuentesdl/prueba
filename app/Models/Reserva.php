<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory; 

class Reserva extends Model
{
    use HasFactory;

    protected $fillable = [
        'cliente',
        'vehiculo_id',
        'fecha',
    ];

    public function vehiculo()
    {
        return $this->belongsTo(Vehiculo::class);
    }
}
