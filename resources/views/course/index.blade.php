<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Cursos</title>
    <style>
        body { font-family: Arial, Helvetica, sans-serif; background-color: #f4f6f9; padding: 40px; }
        .container { background-color: white; padding: 30px; border-radius: 10px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); }
        h1 { color: #39A900; text-align: center; margin-bottom: 20px; }
        
        /* Botón Nuevo - Con efecto de crecimiento */
        .btn-nuevo { 
            background-color: #39A900; color: white; padding: 10px 20px; text-decoration: none; 
            border-radius: 6px; display: inline-block; margin-bottom: 20px; font-weight: bold;
            transition: all 0.3s ease;
        }
        .btn-nuevo:hover { background-color: #2d8700; transform: scale(1.05); }

        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { padding: 12px; border: 1px solid #ddd; text-align: left; }
        th { background-color: #f8f9fa; }

        /* Botones de Acción - Con efecto de alumbrado */
        .btn-editar, .btn-borrar { 
            padding: 6px 12px; text-decoration: none; border-radius: 4px; 
            font-weight: bold; cursor: pointer; transition: all 0.3s ease; border: none;
        }
        
        .btn-editar { background-color: #ffc107; color: black; }
        .btn-editar:hover { background-color: #e0a800; box-shadow: 0 0 10px rgba(255, 193, 7, 0.7); }

        .btn-borrar { background-color: #dc3545; color: white; }
        .btn-borrar:hover { background-color: #c82333; box-shadow: 0 0 10px rgba(220, 53, 69, 0.7); }
    </style>
</head>
<body>

<div class="container">
    <h1>Listado de Cursos</h1>
    
    @if(session('success'))
        <div style="background-color: #d4edda; color: #155724; padding: 10px; margin-bottom: 15px; border-radius: 5px;">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('course.create') }}" class="btn-nuevo">+ Nuevo Curso</a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Número de Curso</th>
                <th>Día</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($courses as $course)
            <tr>
                <td>{{ $course->id }}</td>
                <td>{{ $course->course_number }}</td>
                <td>{{ $course->day }}</td>
                <td>
                    <a href="{{ route('course.edit', $course->id) }}" class="btn-editar">Editar</a>
                    
                    <form action="{{ route('course.destroy', $course->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('¿Seguro que deseas eliminar este curso?')">
                        @csrf
                        @method('DELETE')
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