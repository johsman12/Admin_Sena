@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="card shadow-lg border-0">
        <!-- Encabezado verde institucional -->
        <div class="card-header text-white text-center" style="background-color: #39A900;">
            <h4 class="mb-0">Listado de Centros de Formación</h4>
        </div>
        <div class="card-body p-4">

            {{-- Mensaje de éxito --}}
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="mb-4">
                <a href="{{ route('training_center.create') }}" class="btn text-white" style="background-color: #39A900;">
                    <i class="fa fa-plus me-2"></i>Nuevo Centro
                </a>
            </div>

            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Ubicación</th>
                            <th class="text-center" style="width: 200px;">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($centers as $center)
                        <tr>
                            <td class="fw-bold">{{ $center->id }}</td>
                            <td>{{ $center->name }}</td>
                            <td>{{ $center->location }}</td>
                            <td class="text-center">
                                <div class="d-inline-flex gap-2">
                                    <!-- Botón Editar -->
                                    <a href="{{ route('training_center.edit', $center->id) }}" class="btn btn-warning btn-sm">
                                        <i class="fa fa-edit me-1"></i>Editar
                                    </a>

                                    <!-- Formulario y Botón Borrar -->
                                    <form action="{{ route('training_center.destroy', $center->id) }}" method="POST" onsubmit="return confirm('¿Seguro que deseas eliminar este centro de formación?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash me-1"></i>Borrar
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection