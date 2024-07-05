@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Empleados</h1>
    <a href="{{ route('empleados.create') }}" class="btn btn-primary">Agregar Empleado</a>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>Puesto</th>
                <th>Departamento</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($empleados as $empleado)
            <tr>
                <td>{{ $empleado->id }}</td>
                <td>{{ $empleado->nombre }}</td>
                <td>{{ $empleado->apellido_paterno }}</td>
                <td>{{ $empleado->apellido_materno }}</td>
                <td>{{ $empleado->puesto }}</td>
                <td>{{ $empleado->departamento }}</td>
                <td>
                    <a href="{{ route('empleados.show', $empleado->id) }}" class="btn btn-info">Ver</a>
                    <a href="{{ route('empleados.edit', $empleado->id) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('empleados.destroy', $empleado->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
