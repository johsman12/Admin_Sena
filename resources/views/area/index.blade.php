<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Areas - Admin-SENA</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; background-color: #f4f6f9; padding: 40px; }
        .container { max-width: 800px; margin: auto; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 4px 12px rgba(0,0,0,0.1); }
        h1 { color: #39A900; text-align: center; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 12px; text-align: left; }
        th { background-color: #f8f9fa; }
        
        /* Estilos de botones con animación */
        .btn { 
            padding: 8px 12px; 
            text-decoration: none; 
            border-radius: 4px; 
            color: white; 
            display: inline-block; 
            transition: background-color 0.3s ease, transform 0.2s ease;
        }
        
        .btn:hover {
            transform: scale(1.05); /* Efecto de agrandado */
            filter: brightness(110%); /* Efecto de brillo */
        }

        .btn-new { background-color: #39A900; margin-bottom: 20px; }
        .btn-edit { background-color: #007bff; }
        .btn-delete { background-color: #dc3545; border: none; cursor: pointer; }
        .btn-back { background-color: #6c757d; } /* Color gris para regresar */
    </style>
</head>
<body>

<div class="container">
    <h1>LISTAR AREAS</h1>
    
    <!-- Botones de navegación -->
    <div style="margin-bottom: 20px;">
        <a href="{{ url('/') }}" class="btn btn-back">Volver al Dashboard</a>
        <a href="{{ route('area.create') }}" class="btn btn-new">Nueva Area</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($areas as $area)
            <tr>
                <td>{{ $area->id }}</td>
                <td>{{ $area->name }}</td>
                <td>
                    <a href="{{ route('area.edit', $area->id) }}" class="btn btn-edit">Editar</a>
                    
                    <form action="{{ route('area.destroy', $area->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-delete" onclick="return confirm('¿Estás seguro de borrar esta área?')">Borrar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

</body>
</html>