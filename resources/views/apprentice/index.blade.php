@extends('layouts.app')

@section('content')
<div class="container bg-white p-4 rounded shadow-sm">
    <h1 style="color: #39A900;">Listado de Aprendices</h1>
    
    <a href="{{ route('apprentice.create') }}" class="btn btn-primary mb-3">+ Nuevo Aprendiz</a>
    
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Celular</th>
                <th>Curso</th>
                <th>Computador</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($apprentices as $apprentice)
            <tr>
                <td>{{ $apprentice->name }}</td>
                <td>{{ $apprentice->email }}</td>
                <td>{{ $apprentice->cell_number }}</td>
                <td>{{ $apprentice->course->course_number ?? 'Sin curso' }}</td>
                <td>{{ $apprentice->computer->brand ?? 'Sin equipo' }}</td>
                <td>
                    <a href="{{ route('apprentice.edit', $apprentice->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('apprentice.destroy', $apprentice->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('¿Estás seguro?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Borrar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection