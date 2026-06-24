<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body{
            font-family: Arial, Helvetica, sans-serif;
            background-color: #f4f6f9;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        form{
            background-color: white;
            width: 700px;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        h1{
            text-align: center;
        }
        input,
        select{
            width: 100%;
            padding: 12px;
            border: 1px solid #ced4da;
            border-radius: 6px;
            font-size: 15px;
            outline: none;
            transition: 0.3s;
        }
        input:focus,
        select:focus{
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0,123,255,0.4);
        }
        button{
            background-color: #007bff;
            color: white;
            border: none;
            padding: 12px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            transition: 0.3s;
        }
        button:hover{
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <form action="{{ route('course.peticion') }}" method="POST" enctype="multipart/form-data">
        <h1 style="text-align: center">Registro de Curso</h1>
        @csrf
        <label>
            numero de curso:
            <br>
            <input type="number" name="course_number">
        </label>
        <label>
            dia:
            <br>
            <input type="date" name="day">
        </label>
        <label for="area_id">Usuario</label>
        <select name="area_id" id="area_id" class="form-control">
            <option value="">Seleccione una area</option>

            @foreach ($areas as $area)
                <option value="{{ $area->id }}">
                    {{ $area->name }}
                </option>
            @endforeach
        </select>
        <select name="training_center_id">
            <option value="">Seleccione un centro de formación</option>
            @foreach ($training_centers as $training)
                <option value="{{ $training->id }}">
                    {{ $training->name }}
                </option>
            @endforeach
        </select>
        <br>
        <button type="submit">Enviar Formulario</button>
    </form>
</body>
</html>