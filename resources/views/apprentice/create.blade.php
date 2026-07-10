@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm border-0">
            <div class="card-body p-4">
                <!-- Título con color verde SENA -->
                <h1 class="text-center mb-4" style="color: #39A900;">Registro de Aprendiz</h1>
                
                <form action="{{ route('apprentice.completado') }}" method="POST">
                    @csrf
                    
                    <div class="mb-3">
                        <label class="form-label fw-bold">Nombre:</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Email:</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Número de celular:</label>
                        <input type="number" name="cell_number" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Curso:</label>
                        <select name="course_id" class="form-select">
                            <option value="">Seleccione un curso</option>
                            @foreach ($courses as $course)
                                <option value="{{ $course->id }}">{{ $course->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Computador:</label>
                        <select name="computer_id" class="form-select">
                            <option value="">Seleccione un computador</option>
                            @foreach ($computers as $computer)
                                <option value="{{ $computer->id }}">{{ $computer->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- El botón será verde automáticamente gracias al CSS de tu layout -->
                    <button type="submit" class="btn btn-primary w-100 py-2">Enviar Formulario</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection