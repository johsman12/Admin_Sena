<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registro del Computador</title>
    
    <style>
        body {
            font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
            background-color: #f3f4f6;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 20px;
            box-sizing: border-box;
        }

        form {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            width: 100%;
            max-width: 400px;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        h1 {
            font-size: 24px;
            text-align: center;
            color: #39A900; /* Verde SENA */
        }

        label {
            font-size: 14px;
            font-weight: 600;
            color: #374151;
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        input[type="text"],
        input[type="number"] {
            padding: 10px 14px;
            border: 1px solid #d1d5db;
            border-radius: 6px;
            font-size: 15px;
            color: #1f2937;
            background-color: #fff;
            outline: none;
            transition: all 0.2s ease-in-out;
            box-sizing: border-box;
            width: 100%;
        }

        /* Enfoque en verde SENA */
        input[type="text"]:focus,
        input[type="number"]:focus {
            border-color: #39A900;
            box-shadow: 0 0 0 3px rgba(57, 169, 0, 0.15);
        }

        /* Botón verde SENA */
        button {
            background-color: #39A900;
            color: #ffffff;
            font-size: 15px;
            font-weight: 600;
            padding: 12px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.2s ease;
            margin-top: 5px;
        }
        button:hover {
            background-color: #2d8700;
        }
        button:active {
            transform: scale(0.98);
        }
    </style>
</head>
<body>
    <form action="{{route('computer.store')}}" method="POST" enctype="multipart/form-data">
        <h1>Registro del Computador</h1>
        @csrf        
        <label>
            Numero:
            <input type="number" name="number" placeholder="Ej. 1024" required>
        </label>
        <label>
            Marca:
            <input type="text" name="brand" placeholder="Ej. Dell, Lenovo, HP" required>
        </label>
        <button type="submit">Enviar Formulario</button>
    </form>
</body>
</html>