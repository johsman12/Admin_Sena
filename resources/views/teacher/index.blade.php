<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Instructores</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f6f9; padding: 20px; }
        .container { background: white; padding: 20px; border-radius: 10px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); }
        h1 { color: #39A900; margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 12px; text-align: left; }
        th { background-color: #f8f9fa; }

        /* Estilo del botón Nuevo Instructor */
        .btn-nuevo { 
            background: #39A900; 
            color: white; 
            padding: 10px 15px; 
            text-decoration: none; 
            border-radius: 5px; 
            font-weight: bold; 
            transition: 0.3s; 
            display: inline-block;
        }
        .btn-nuevo:hover { 
            background: #2e8b00; /* Color más oscuro al pasar el mouse */
            transform: scale(1.05); 
        }

        /* Estilos para botones de acción */
        .btn-editar { background: #ffc107; color: black; padding: 8px 12px; text-decoration: none; border-radius: 4px; transition: 0.3s; }
        .btn-editar:hover { background: #d39e00; transform: scale(1.05); }
        .btn-borrar { background: #dc3545; color: white; border: none; padding: 8px 12px; cursor: pointer; border-radius: 4px; transition: 0.3s; }
        .btn-borrar:hover { background: #c82333; transform: scale(1.05); }
    </style>
</head>
<body>
    <div class="container">
        <h1>Listado de Instructores</h1>
        <a href="{{ route('teacher.create') }}" class="btn-nuevo">+ Nuevo Instructor</a>
        
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Área</th>
                    <th>Centro de Formación</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($teachers as $teacher)
                <tr>
                    <td>{{ $teacher->name }}</td>
                    <td>{{ $teacher->email }}</td>
                    <td>{{ $teacher->area->name ?? 'N/A' }}</td>
                    <td>{{ $teacher->training_center->name ?? 'N/A' }}</td>
                    <td>
                        <a href="{{ route('teacher.edit', $teacher->id) }}" class="btn-editar">Editar</a>
                        <form action="{{ route('teacher.destroy', $teacher->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('¿Estás seguro?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn-borrar">Borrar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>