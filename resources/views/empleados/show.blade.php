@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalles del Empleado</h1>
    <div>
        <strong>Nombre:</strong> {{ $empleado->nombre }}
    </div>
    <div>
        <strong>Apellido Paterno:</strong> {{ $empleado->apellido_paterno }}
    </div>
    <div>
        <strong>Apellido Materno:</strong> {{ $empleado->apellido_materno }}
    </div>
    <div>
        <strong>Puesto:</strong> {{ $empleado->puesto }}
    </div>
    <div>
        <strong>Departamento:</strong> {{ $empleado->departamento }}
    </div>
    <a href="{{ route('empleados.index') }}" class="btn btn-primary">Volver</a>
</div>
@endsection
