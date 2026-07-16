<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Curso</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { 
            font-family: Arial, sans-serif; 
            background-color: #f4f6f9; 
            display: flex; 
            justify-content: center; 
            align-items: center; 
            min-height: 100vh; 
            padding: 20px;
        }
        form { 
            background-color: white; 
            width: 100%; 
            max-width: 800px; /* Tamaño grande */
            padding: 50px;    /* Más espacio interno */
            border-radius: 15px; 
            box-shadow: 0 10px 25px rgba(0,0,0,0.1); 
            display: flex; 
            flex-direction: column; 
            gap: 20px;       /* Espacio entre elementos */
        }
        h1 { text-align: center; color: #39A900; margin-bottom: 10px; }
        label { font-weight: bold; color: #333; }
        input, select { 
            width: 100%; 
            padding: 15px;   /* Más grandes */
            border: 2px solid #ced4da; 
            border-radius: 8px; 
            font-size: 16px; 
            outline: none; 
            transition: 0.3s; 
        }
        /* Efecto al hacer clic */
        input:focus, select:focus { 
            border-color: #39A900; 
            box-shadow: 0 0 8px rgba(57,169,0,0.4); 
        }
        button { 
            background-color: #39A900; 
            color: white; 
            border: none; 
            padding: 18px; 
            border-radius: 8px; 
            cursor: pointer; 
            font-size: 18px; 
            font-weight: bold; 
            transition: 0.3s; 
        }
        button:hover { background-color: #2d8700; }
    </style>
</head>
<body>

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

</body>
</html>