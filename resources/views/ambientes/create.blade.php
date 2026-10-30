@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-white">
                    <h4 class="mb-0">Registrar Nuevo Ambiente</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('ambiente.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre del Ambiente</label>
                            <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre" name="nombre" value="{{ old('nombre') }}" required>
                            @error('nombre')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="ubicacion" class="form-label">Ubicación</label>
                            <input type="text" class="form-control @error('ubicacion') is-invalid @enderror" id="ubicacion" name="ubicacion" value="{{ old('ubicacion') }}" required>
                            @error('ubicacion')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('ambiente.index') }}" class="btn btn-secondary">Cancelar</a>
                            <button type="submit" class="btn btn-primary">Guardar Ambiente</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection