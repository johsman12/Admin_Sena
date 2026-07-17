@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-body">
            <h2 class="text-center" style="color: #39A900;">Editar Aprendiz</h2>
            <form action="{{ route('apprentice.update', $apprentice->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label>Nombre:</label>
                    <input type="text" name="name" class="form-control" value="{{ $apprentice->name }}" required>
                </div>
                <div class="mb-3">
                    <label>Email:</label>
                    <input type="email" name="email" class="form-control" value="{{ $apprentice->email }}" required>
                </div>
                <div class="mb-3">
                    <label>Celular:</label>
                    <input type="number" name="cell_number" class="form-control" value="{{ $apprentice->cell_number }}" required>
                </div>
                <div class="mb-3">
                    <label>Curso:</label>
                    <select name="course_id" class="form-select" required>
                        @foreach ($courses as $course)
                            <option value="{{ $course->id }}" {{ $apprentice->course_id == $course->id ? 'selected' : '' }}>
                                {{ $course->course_number }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label>Computador:</label>
                    <select name="computer_id" class="form-select" required>
                        @foreach ($computers as $computer)
                            <option value="{{ $computer->id }}" {{ $apprentice->computer_id == $computer->id ? 'selected' : '' }}>
                                {{ $computer->brand }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary w-100">Actualizar Información</button>
            </form>
        </div>
    </div>
</div>
@endsection