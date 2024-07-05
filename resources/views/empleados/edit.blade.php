@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Empleado</h1>
    <form action="{{ route('empleados.update', $empleado->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $empleado->nombre }}" required>
        </div>
        <div class="form-group">
            <label for="apellido_paterno">Apellido Paterno</label>
            <input type="text" class="form-control" id="apellido_paterno" name="apellido_paterno" value="{{ $empleado->apellido_paterno }}" required>
        </div>
        <div class="form-group">
            <label for="apellido_materno">Apellido Materno</label>
            <input type="text" class="form-control" id="apellido_materno" name="apellido_materno" value="{{ $empleado->apellido_materno }}" required>
        </div>
        <div class="form-group">
            <label for="puesto">Puesto</label>
            <input type="text" class="form-control" id="puesto" name="puesto" value="{{ $empleado->puesto }}" required>
        </div>
        <div class="form-group">
            <label for="departamento">Departamento</label>
            <input type="text" class="form-control" id="departamento" name="departamento" value="{{ $empleado->departamento }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection
