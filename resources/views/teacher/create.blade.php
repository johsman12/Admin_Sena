@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm border-0">
            <div class="card-body p-4">
                <h1 class="text-center mb-4" style="color: #39A900;">Registro de Instructor</h1>
                
                <form action="{{ route('teacher.store') }}" method="POST">
                    @csrf
                    
                    <div class="mb-3">
                        <label class="form-label fw-bold">Nombre del Instructor:</label>
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
                        <label class="form-label fw-bold">Área:</label>
                        <select name="area_id" class="form-select" required>
                            <option value="">Seleccione un área</option>
                            @foreach ($areas as $area)
                                <option value="{{ $area->id }}">{{ $area->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Centro de Formación:</label>
                        <select name="training_center_id" class="form-select" required>
                            <option value="">Seleccione un centro</option>
                            @foreach ($training_centers as $center)
                                <option value="{{ $center->id }}">{{ $center->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Curso:</label>
                        <select name="course_id" class="form-select" required>
                            <option value="">Seleccione un curso</option>
                            @foreach ($courses as $course)
                                <option value="{{ $course->id }}">{{ $course->course }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Computador:</label>
                        <select name="computer_id" class="form-select" required>
                            <option value="">Seleccione un computador</option>
                            @foreach ($computers as $computer)
                                <option value="{{ $computer->id }}">{{ $computer->id }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary w-100 py-2" style="background-color: #39A900; border: none;">
                        Guardar Instructor
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection