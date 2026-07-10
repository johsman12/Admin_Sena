<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crear Área - Admin-SENA</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f6f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        form {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 350px;
            display: flex;
            flex-direction: column;
        }
        label {
            font-weight: 600;
            color: #333333;
            margin-bottom: 8px;
            display: flex;
            flex-direction: column;
        }

        /* Input con enfoque verde */
        input[type="text"] {
            margin-top: 6px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
            transition: border-color 0.3s;
        }

        input[type="text"]:focus {
            outline: none;
            border-color: #39A900; /* Verde SENA al enfocar */
        }

        /* Botón verde SENA */
        button {
            background-color: #39A900;
            color: white;
            border: none;
            padding: 12px;
            font-size: 16px;
            font-weight: bold;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-top: 15px;
        }

        button:hover {
            background-color: #2d8700; /* Verde más oscuro al pasar el mouse */
        }
    </style>
</head>
<body>
    <form action="{{route('area.store')}}" method="POST" enctype="multipart/form-data">
        <h1 style="text-align: center; color: #39A900;">Area</h1>
        @csrf
        <label>
            Nombre:
            <input type="text" name="name" placeholder="Escribe el nombre aquí" required>
        </label>
        
        <button type="submit">Enviar Formulario</button>
    </form>
</body>
</html>