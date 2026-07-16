<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro del Computador - Admin-SENA</title>
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
        }

        form {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        h1 { font-size: 24px; text-align: center; color: #39A900; }

        label { font-size: 14px; font-weight: 600; color: #374151; display: flex; flex-direction: column; gap: 6px; }

        input[type="text"], input[type="number"] {
            padding: 10px 14px;
            border: 1px solid #d1d5db;
            border-radius: 6px;
            font-size: 15px;
            outline: none;
            transition: all 0.2s ease-in-out;
        }

        input:focus { border-color: #39A900; box-shadow: 0 0 0 3px rgba(57, 169, 0, 0.15); }

        /* Estilos de botones con animación */
        .btn {
            padding: 12px;
            font-weight: 600;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            color: white;
            transition: all 0.2s ease;
        }

        .btn:hover {
            transform: scale(1.03);
            filter: brightness(110%);
        }

        .btn-submit { background-color: #39A900; }
        .btn-back { background-color: #6c757d; }
    </style>
</head>
<body>

    <form action="{{route('computer.store')}}" method="POST">
    @csrf
    <h1>Registro del Computador</h1>
    
    <label>
        Número de Serie:
        <input type="number" name="number" placeholder="Ej. 1024" required>
    </label>
    
    <label>
        Marca:
        <input type="text" name="brand" placeholder="Ej. Dell, Lenovo, HP" required>
    </label>

    <div style="display: flex; gap: 10px;">
        <button type="submit" class="btn btn-submit" style="width: 100%;">Enviar</button>
    </div>
</form>

</body>
</html>