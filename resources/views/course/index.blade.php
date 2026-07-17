@extends('layouts.app')

@section('content')
<style>
    .page-content { padding: 40px; min-height: 80vh; max-width: 1000px; margin: 0 auto; }
    h1 { color: #39A900; text-align: center; margin-bottom: 30px; }
    
    /* Botón Nuevo Curso - Sin transformación para evitar parpadeo */
    .btn-nuevo { 
        background-color: #39A900; color: white; padding: 12px 25px; text-decoration: none; 
        border-radius: 6px; display: inline-block; margin-bottom: 20px; font-weight: bold;
        transition: background-color 0.3s ease;
    }
    .btn-nuevo:hover { background-color: #2d8700; }
    
    table { width: 100%; border-collapse: collapse; background: white; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 10px rgba(0,0,0,0.05); }
    th, td { padding: 15px; border: 1px solid #ddd; text-align: left; }
    th { background-color: #f8f9fa; }

    /* Botones de acción - Sin transformación */
    .btn-editar, .btn-borrar { 
        padding: 6px 12px; border-radius: 4px; font-weight: bold; cursor: pointer; border: none; 
        text-decoration: none; display: inline-block; transition: background-color 0.3s ease;
    }
    
    .btn-editar { background-color: #ffc107; color: black; }
    .btn-editar:hover { background-color: #e0a800; }
    
    .btn-borrar { background-color: #dc3545; color: white; }
    .btn-borrar:hover { background-color: #c82333; }
</style>

<div class="page-content">
    <h1>Listado de Cursos</h1>
    
    @if(session('success'))
        <div style="background-color: #d4edda; color: #155724; padding: 15px; margin-bottom: 20px; border-radius: 5px;">
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
                <th>Área</th>
                <th>Centro de Formación</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($courses as $course)
            <tr>
                <td>{{ $course->id }}</td>
                <td>{{ $course->course_number }}</td>
                <td>{{ $course->day }}</td>
                <td>{{ $course->area->name ?? 'Sin área' }}</td>
                <td>{{ $course->training_center->name ?? 'Sin centro' }}</td>
                <td>
                    <a href="{{ route('course.edit', $course->id) }}" class="btn-editar">Editar</a>
                    <form action="{{ route('course.destroy', $course->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('¿Seguro que deseas eliminar este curso?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn-borrar">Borrar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection