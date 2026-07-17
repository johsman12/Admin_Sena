@extends('layouts.app')

@section('content')
<style>
    .form-container { 
        background-color: white; 
        width: 100%; 
        max-width: 600px; /* Reduje un poco el ancho total */
        padding: 40px; 
        border-radius: 15px; 
        box-shadow: 0 10px 25px rgba(0,0,0,0.1); 
        display: flex; 
        flex-direction: column; 
        gap: 15px; /* Reduje el espacio entre elementos */
        margin: 40px auto;
    }
    h1 { text-align: center; color: #39A900; margin-bottom: 10px; }
    label { font-weight: bold; color: #333; font-size: 14px; }
    input, select { 
        width: 100%; 
        padding: 10px 12px; /* Reduje el padding para que el recuadro sea más delgado */
        border: 2px solid #ced4da; 
        border-radius: 6px; 
        font-size: 14px; 
    }
    input:focus, select:focus { border-color: #39A900; outline: none; }
    
    /* Ajuste del botón */
    button { 
        background-color: #39A900; 
        color: white; 
        border: none; 
        padding: 12px; 
        border-radius: 6px; 
        cursor: pointer; 
        font-size: 16px; 
        font-weight: bold; 
        margin-top: 20px; /* Separación extra arriba del botón */
        transition: 0.3s;
    }
    button:hover { background-color: #2d8700; }
</style>

<div class="form-container">
    <form action="{{ route('course.store') }}" method="POST">
        @csrf
        <h1>Registro de Curso</h1>
        
        <label>Número de curso:</label>
        <input type="number" name="course_number" required>

        <label>Día:</label>
        <input type="date" name="day" required>

        <label for="area_id">Área:</label>
        <select name="area_id" id="area_id">
            <option value="">Seleccione una área</option>
            @foreach ($areas as $area)
                <option value="{{ $area->id }}">{{ $area->name }}</option>
            @endforeach
        </select>
        
        <label for="training_center_id">Centro de formación:</label>
        <select name="training_center_id" id="training_center_id">
            <option value="">Seleccione un centro de formación</option>
            @foreach ($training_centers as $training)
                <option value="{{ $training->id }}">{{ $training->name }}</option>
            @endforeach
        </select>
        
        <button type="submit">Enviar Formulario</button>
    </form>
</div>
@endsection