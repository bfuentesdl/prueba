@extends('layouts.app')

@section('title', 'Vehículos')

@section('content')
    <a href="{{ route('vehiculos.create') }}" class="btn btn-primary mb-3">Agregar Vehículo</a>

    <form method="GET" action="{{ route('vehiculos.index') }}" class="mb-3 row g-2">
        <div class="col-md-4">
            <input type="text" name="marca" value="{{ request('marca') }}" class="form-control" placeholder="Buscar por marca">
        </div>
        <div class="col-md-4">
            <input type="text" name="modelo" value="{{ request('modelo') }}" class="form-control" placeholder="Buscar por modelo">
        </div>
        <div class="col-md-2">
        <button type="submit" class="btn btn-primary w-100">Filtrar</button>
        </div>
        <div class="col-md-2">
            <a href="{{ route('vehiculos.index') }}" class="btn btn-secondary w-100">Limpiar</a>
        </div>
    </form>


    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Año</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($vehiculos as $vehiculo)
                <tr>
                    <td>{{ $vehiculo->id }}</td>
                    <td>{{ $vehiculo->marca }}</td>
                    <td>{{ $vehiculo->modelo }}</td>
                    <td>{{ $vehiculo->anio }}</td>
                    <td>Q {{ number_format($vehiculo->precio, 2) }}</td>
                    <td>
                        <a href="{{ route('vehiculos.edit', $vehiculo->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('vehiculos.destroy', $vehiculo->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que quieres eliminar este vehículo?')">Eliminar</button>
                            <a href="{{ route('reservas.create') }}?vehiculo_id={{ $vehiculo->id }}" class="btn btn-success btn-sm">Reservar</a>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
