@extends('layouts.app')

@section('title', 'Editar Reserva')

@section('content')
    <a href="{{ route('reservas.index') }}" class="btn btn-secondary mb-3">Volver a Reservas</a>

    <form action="{{ route('reservas.update', $reserva->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="cliente" class="form-label">Nombre del cliente</label>
            <input type="text" name="cliente" id="cliente" class="form-control" value="{{ old('cliente', $reserva->cliente) }}" required>
        </div>

        <div class="mb-3">
            <label for="vehiculo_id" class="form-label">Vehículo</label>
            <select name="vehiculo_id" id="vehiculo_id" class="form-select" required>
                <option value="">Selecciona un vehículo</option>
                @foreach($vehiculos as $vehiculo)
                    <option value="{{ $vehiculo->id }}" @if(old('vehiculo_id', $reserva->vehiculo_id) == $vehiculo->id) selected @endif>
                        {{ $vehiculo->marca }} - {{ $vehiculo->modelo }} ({{ $vehiculo->anio }})
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="fecha" class="form-label">Fecha de reserva</label>
            <input type="date" name="fecha" id="fecha" class="form-control" value="{{ old('fecha', $reserva->fecha) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar Reserva</button>
    </form>
@endsection
