@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center" style="color: #39A900;">LISTAS DE COMPUTADORES</h1>
    
    <div style="margin-bottom: 20px;">
        <a href="{{ route('computer.create') }}" class="btn btn-new">Nuevo Computador</a>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Número de Serie</th>
                <th>Marca</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($computers as $computer)
            <tr>
                <td>{{ $computer->id }}</td>
                <td>{{ $computer->number }}</td>
                <td>{{ $computer->brand }}</td>
                <td>
                    <a href="{{ route('computer.edit', $computer->id) }}" class="btn btn-edit">Editar</a>
                    
                    <form action="{{ route('computer.destroy', $computer->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-delete" onclick="return confirm('¿Seguro que deseas borrar este computador?')">Borrar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<style>
    /* Estilos de tabla */
    table { width: 100%; border-collapse: collapse; margin-top: 20px; }
    th, td { border: 1px solid #ddd; padding: 12px; text-align: left; }
    th { background-color: #f8f9fa; }
    
    /* Botones */
    .btn { 
        padding: 8px 12px; 
        text-decoration: none; 
        border-radius: 4px; 
        color: white; 
        display: inline-block; 
        transition: background-color 0.2s; /* Solo transicionamos el color */
        text-align: center;
        min-width: 70px;
        font-weight: bold;
        border: none;
        cursor: pointer;
    }

    /* Hover sólido: sin escala, solo cambio de color */
    .btn-new:hover    { background-color: #2d8600; }
    .btn-edit:hover   { background-color: #0056b3; }
    .btn-delete:hover { background-color: #a71d2a; }
    
    /* Colores base */
    .btn-new    { background-color: #39A900; }
    .btn-edit   { background-color: #007bff; }
    .btn-delete { background-color: #dc3545; }
</style>
@endsection