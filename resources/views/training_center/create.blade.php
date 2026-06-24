<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    
    <style>
        /* Fondo general de la página y centrado del formulario */
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

        /* Contenedor del formulario con diseño de tarjeta moderna */
        form {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            width: 100%;
            max-width: 400px;
            display: flex;
            flex-direction: column;
            gap: 20px; /* Reemplaza los <br> dando un espacio uniforme */
        }

        /* Estilo para las etiquetas de texto */
        label {
            font-size: 14px;
            font-weight: 600;
            color: #374151;
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        /* Estilo para los campos de entrada de texto */
        input[type="text"] {
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

        /* Efecto de enfoque azul al hacer clic en un input */
        input[type="text"]:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.15);
        }

        /* Estilo del botón de envío */
        button {
            background-color: #2563eb;
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

        /* Efecto al pasar el cursor sobre el botón */
        button:hover {
            background-color: #1d4ed8;
        }
        
        /* Efecto de clic en el botón */
        button:active {
            transform: scale(0.98);
        }
    </style>
</head>
<body>

    <form action="{{route('training_center.salidas')}}" method="POST" enctype="multipart/form-data">
        <h1 style="text-align: center">Registro del Centro de Formacion</h1>
        @csrf
        <label>
            Nombre:
            <input type="text" name="name" placeholder="Ej. Centro de Innovación">
        </label>
        
        <label>
            Ubicación:
            <input type="text" name="location" placeholder="Ej. Bloque B, Piso 2">
        </label>
        <button type="submit">Enviar Formulario</button>
    </form>
</body>
</html>