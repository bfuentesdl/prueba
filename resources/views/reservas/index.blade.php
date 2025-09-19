@extends('layouts.app')

@section('title', 'Reservas')

@section('content')
    <a href="{{ route('reservas.create') }}" class="btn btn-primary mb-3">Agregar Reserva</a>

    <!-- Filtro -->
    <form method="GET" action="{{ route('reservas.index') }}" class="mb-3 row g-2">
        <div class="col-md-4">
            <input type="text" name="cliente" value="{{ request('cliente') }}" class="form-control" placeholder="Buscar por cliente">
        </div>
        <div class="col-md-4">
            <select name="vehiculo_id" class="form-select">
                <option value="">Todos los vehículos</option>
                @foreach($vehiculos as $vehiculo)
                    <option value="{{ $vehiculo->id }}" @if(request('vehiculo_id')==$vehiculo->id) selected @endif>
                        {{ $vehiculo->marca }} - {{ $vehiculo->modelo }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-primary w-100">Filtrar</button>
        </div>
        <div class="col-md-2">
            <a href="{{ route('reservas.index') }}" class="btn btn-secondary w-100">Limpiar</a>
        </div>
    </form>

    <!-- Tabla -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>Vehículo</th>
                <th>Fecha</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reservas as $reserva)
                <tr>
                    <td>{{ $reserva->id }}</td>
                    <td>{{ $reserva->cliente }}</td>
                    <td>{{ $reserva->vehiculo->marca }} - {{ $reserva->vehiculo->modelo }}</td>
                    <td>{{ $reserva->fecha }}</td>
                    <td>
                        <a href="{{ route('reservas.edit', $reserva->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('reservas.destroy', $reserva->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que quieres eliminar esta reserva?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
