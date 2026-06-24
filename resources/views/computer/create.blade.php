<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    
    <style>
        /* Centra el formulario en la pantalla y da un fondo suave */
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

        /* Contenedor tipo tarjeta del formulario */
        form {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            width: 100%;
            max-width: 400px;
            display: flex;
            flex-direction: column;
            gap: 20px; /* Controla la separación entre elementos de forma limpia sin usar <br> */
        }

        /* Estructura y diseño de las etiquetas de texto */
        label {
            font-size: 14px;
            font-weight: 600;
            color: #374151;
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        /* Estilos comunes para los inputs (tanto text como number) */
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

        /* Cambia el color del borde y añade un leve brillo al hacer clic */
        input[type="text"]:focus,
        input[type="number"]:focus {
            border-color: #4f46e5;
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.15);
        }

        /* Botón de envío estilizado */
        button {
            background-color: #007bff;
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
            background-color: #256cb8;
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
            Número:
            <input type="number" name="numero" placeholder="Ej. 1024">
        </label>
        <label>
            Marca:
            <input type="text" name="marca" placeholder="Ej. Dell, Lenovo, HP">
        </label>
        <button type="submit">Enviar Formulario</button>
    </form>
</body>
</html>