@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Listado de Ambientes</h2>
        <a href="{{ route('ambiente.create') }}" class="btn btn-primary text-white">
            <i class="fas fa-plus"></i> Registrar Ambiente
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Ubicación</th>
                            <th class="text-end">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($ambientes as $ambiente)
                            <tr>
                                <td>{{ $ambiente->id }}</td>
                                <td>{{ $ambiente->nombre }}</td>
                                <td>{{ $ambiente->ubicacion }}</td>
                                <td class="text-end">
                                    <a href="{{ route('ambiente.edit', $ambiente->id) }}" class="btn btn-sm btn-warning text-white me-1">
                                        <i class="fas fa-edit"></i> Editar
                                    </a>
                                    <form action="{{ route('ambiente.destroy', $ambiente->id) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Estás seguro de eliminar este ambiente?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="fas fa-trash"></i> Eliminar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted py-4">No hay ambientes registrados.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection