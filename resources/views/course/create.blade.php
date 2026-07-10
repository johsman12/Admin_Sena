<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registro de Curso</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #f4f6f9;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        form {
            background-color: white;
            width: 700px;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        h1 {
            text-align: center;
            color: #39A900; /* Verde SENA */
        }
        input, select {
            width: 100%;
            padding: 12px;
            border: 1px solid #ced4da;
            border-radius: 6px;
            font-size: 15px;
            outline: none;
            transition: 0.3s;
        }
        /* Enfoque en verde SENA */
        input:focus, select:focus {
            border-color: #39A900;
            box-shadow: 0 0 5px rgba(57,169,0,0.4);
        }
        button {
            background-color: #39A900; /* Verde SENA */
            color: white;
            border: none;
            padding: 12px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            transition: 0.3s;
        }
        button:hover {
            background-color: #2d8700;
        }
    </style>
</head>
<body>
    <form action="{{ route('course.peticion') }}" method="POST" enctype="multipart/form-data">
        <h1>Registro de Curso</h1>
        @csrf
        <label>
            Numero de curso:
            <br>
            <input type="number" name="course_number" required>
        </label>
        <label>
            Dia:
            <br>
            <input type="date" name="day" required>
        </label>
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
        <br>
        <button type="submit">Enviar Formulario</button>
    </form>
</body>
</html>