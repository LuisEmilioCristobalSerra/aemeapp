<!DOCTYPE html>
<html>
<head>
    <title>Información del Empleado</title>
</head>
<body>
    <h1>{{ $empleado->nombre }} {{ $empleado->apellido_paterno }} {{ $empleado->apellido_materno }}</h1>
    <p><strong>Puesto:</strong> {{ $empleado->puesto }}</p>
    <p><strong>Departamento:</strong> {{ $empleado->departamento }}</p>
    <h2>Artículos</h2>
    <ul>
        @foreach($empleado->articulos as $articulo)
            <li>{{ $articulo->tipo }} - {{ $articulo->descripcion }} - {{ $articulo->marca }} - {{ $articulo->modelo }} - {{ $articulo->serie }}</li>
        @endforeach
    </ul>
    <div>
        {!! $qrCode !!}
    </div>
</body>
</html>
