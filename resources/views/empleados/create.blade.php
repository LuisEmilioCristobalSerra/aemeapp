@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Agregar Empleado</h1>
    <form action="{{ route('empleados.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>
        <div class="form-group">
            <label for="apellido_paterno">Apellido Paterno</label>
            <input type="text" class="form-control" id="apellido_paterno" name="apellido_paterno" required>
        </div>
        <div class="form-group">
            <label for="apellido_materno">Apellido Materno</label>
            <input type="text" class="form-control" id="apellido_materno" name="apellido_materno" required>
        </div>
        <div class="form-group">
            <label for="puesto">Puesto</label>
            <input type="text" class="form-control" id="puesto" name="puesto" required>
        </div>
        <div class="form-group">
            <label for="departamento">Departamento</label>
            <input type="text" class="form-control" id="departamento" name="departamento" required>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection
