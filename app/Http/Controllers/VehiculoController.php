<?php

namespace App\Http\Controllers;

use App\Models\Vehiculo;
use Illuminate\Http\Request;

class VehiculoController extends Controller
{
    
    public function index(Request $request)
    {
        $query = Vehiculo::query();

        if($request->filled('marca')){
            $query->where('marca', 'like', '%'.$request->marca.'%');
        }

        if($request->filled('modelo')){
            $query->where('modelo', 'like', '%'.$request->modelo.'%');
        }

        $vehiculos = $query->get();

        return view('vehiculos.index', compact('vehiculos'));
    }

 
    public function create()
    {
          return view('vehiculos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'marca' => 'required',
            'modelo' => 'required',
            'anio' => 'required|digits:4|integer',
            'precio' => 'required|numeric',
        ]);

        Vehiculo::create($request->all());
        return redirect()->route('vehiculos.index')->with('success', 'Vehículo creado correctamente.');
    
    }

    public function show(Vehiculo $vehiculo)
    {
            return view('vehiculos.show', compact('vehiculo'));
    }


    public function edit(Vehiculo $vehiculo)
    {
        return view('vehiculos.edit', compact('vehiculo'));
    }

 
    public function update(Request $request, Vehiculo $vehiculo)
    {
         $request->validate([
            'marca' => 'required',
            'modelo' => 'required',
            'anio' => 'required|digits:4|integer',
            'precio' => 'required|numeric',
        ]);

        $vehiculo->update($request->all());
        return redirect()->route('vehiculos.index')->with('success', 'Vehículo actualizado correctamente.');
    }

  
    public function destroy(Vehiculo $vehiculo)
    {
        $vehiculo->delete();
        return redirect()->route('vehiculos.index')->with('success', 'Vehículo eliminado correctamente.');
    }
}
