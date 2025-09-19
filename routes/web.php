<?php

use App\Http\Controllers\VehiculoController;
use App\Http\Controllers\ReservaController;
use Illuminate\Support\Facades\Route;

Route::resource('vehiculos', VehiculoController::class);
Route::resource('reservas', ReservaController::class);
