<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use App\Models\Vehiculo;
use Illuminate\Http\Request;

class ReservaController extends Controller
{
    public function index(Request $request)
    {
        $query = Reserva::with('vehiculo');

        if ($request->filled('cliente')) {
            $query->where('cliente', 'like', '%' . $request->cliente . '%');
        }
        if ($request->filled('vehiculo_id')) {
            $query->where('vehiculo_id', $request->vehiculo_id);
        }

        $reservas = $query->get();
        $vehiculos = Vehiculo::all();

        return view('reservas.index', compact('reservas', 'vehiculos'));
    }

    public function create()
    {
        $vehiculos = Vehiculo::all();
        return view('reservas.create', compact('vehiculos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'cliente' => 'required|string|max:255',
            'vehiculo_id' => 'required|exists:vehiculos,id',
            'fecha' => 'required|date',
        ]);

        Reserva::create($request->all());

        return redirect()->route('reservas.index')->with('success', 'Reserva creada correctamente.');
    }

    public function edit(Reserva $reserva)
    {
        $vehiculos = Vehiculo::all();
        return view('reservas.edit', compact('reserva', 'vehiculos'));
    }

    public function update(Request $request, Reserva $reserva)
    {
        $request->validate([
            'cliente' => 'required|string|max:255',
            'vehiculo_id' => 'required|exists:vehiculos,id',
            'fecha' => 'required|date',
        ]);

        $reserva->update($request->all());

        return redirect()->route('reservas.index')->with('success', 'Reserva actualizada correctamente.');
    }

    public function destroy(Reserva $reserva)
    {
        $reserva->delete();
        return redirect()->route('reservas.index')->with('success', 'Reserva eliminada correctamente.');
    }
}
