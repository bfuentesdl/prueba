@extends('layouts.app')

@section('title', 'Crear Reserva')

@section('content')
    <a href="{{ route('reservas.index') }}" class="btn btn-secondary mb-3">Ir a Reservas</a>
    <a href="{{ route('vehiculos.index') }}" class="btn btn-secondary mb-3">Volver a Vehículos</a>

    <form action="{{ route('reservas.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="cliente" class="form-label">Nombre del cliente</label>
            <input type="text" name="cliente" id="cliente" class="form-control" value="{{ old('cliente') }}" required>
        </div>

        <div class="mb-3">
            <label for="vehiculo_id" class="form-label">Vehículo</label>
           <select name="vehiculo_id" id="vehiculo_id" class="form-select" required>
                @if(request('vehiculo_id'))
                    @php
                        $vehiculoSeleccionado = $vehiculos->where('id', request('vehiculo_id'))->first();
                    @endphp
                    <option value="{{ $vehiculoSeleccionado->id }}" selected>
                        {{ $vehiculoSeleccionado->marca }} - {{ $vehiculoSeleccionado->modelo }} ({{ $vehiculoSeleccionado->anio }})
                    </option>
                @else
                    <option value="">Selecciona un vehículo</option>
                    @foreach($vehiculos as $vehiculo)
                        <option value="{{ $vehiculo->id }}">{{ $vehiculo->marca }} - {{ $vehiculo->modelo }} ({{ $vehiculo->anio }})</option>
                    @endforeach
                @endif
            </select>
        </div>

        <div class="mb-3">
            <label for="fecha" class="form-label">Fecha de reserva</label>
            <input type="date" name="fecha" id="fecha" class="form-control" value="{{ old('fecha') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Guardar Reserva</button>
    </form>
@endsection
