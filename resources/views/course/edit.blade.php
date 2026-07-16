<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Curso</title>
    <style>
        /* Puedes copiar el mismo <style> que tienes en tu create.blade.php para mantener el diseño */
        body { font-family: Arial; background-color: #f4f6f9; display: flex; justify-content: center; padding: 50px; }
        form { background: white; width: 700px; padding: 30px; border-radius: 10px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); }
        h1 { text-align: center; color: #39A900; }
        input, select { width: 100%; padding: 12px; margin: 10px 0; border: 1px solid #ced4da; border-radius: 6px; }
        button { background-color: #39A900; color: white; border: none; padding: 12px; width: 100%; border-radius: 6px; cursor: pointer; }
    </style>
</head>
<body>
    <form action="{{ route('course.update', $course->id) }}" method="POST">
        @csrf
        @method('PUT') 
        <h1>Editar Curso</h1>

        <label>Número de curso:</label>
        <input type="number" name="course_number" value="{{ $course->course_number }}" required>

        <label>Día:</label>
        <input type="date" name="day" value="{{ $course->day }}" required>

        <label>Área:</label>
        <select name="area_id">
            @foreach ($areas as $area)
                <option value="{{ $area->id }}" {{ $course->area_id == $area->id ? 'selected' : '' }}>
                    {{ $area->name }}
                </option>
            @endforeach
        </select>

        <label>Centro de formación:</label>
        <select name="training_center_id">
            @foreach ($training_centers as $training)
                <option value="{{ $training->id }}" {{ $course->training_center_id == $training->id ? 'selected' : '' }}>
                    {{ $training->name }}
                </option>
            @endforeach
        </select>

        <button type="submit">Actualizar Curso</button>
    </form>
</body>
</html>