    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
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
                flex-direction: column; /* Alinea el texto arriba y el input abajo */
            }

            /* Estilo del campo de texto (input) */
            input[type="text"] {
                margin-top: 6px;
                padding: 10px;
                border: 1px solid #ccc;
                border-radius: 4px;
                font-size: 14px;
                transition: border-color 0.3s;
            }

            /* Efecto azul cuando el usuario hace clic en el input */
            input[type="text"]:focus {
                outline: none;
                border-color: #007bff;
            }

            /* Estilo del botón */
            button {
                background-color: #007bff;
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

            /* Efecto cuando pasas el mouse por encima del botón */
            button:hover {
                background-color: #0056b3;
            }
        </style>
    </head>
    <body>
        <form action="{{route('area.store')}}" method="POST" enctype="multipart/form-data">
            <h1 style="text-align: center">Area</h1>
            @csrf
            <label>
                Nombre:
                <input type="text" name="name" placeholder="Escribe el nombre aquí">
            </label>
            
            <button type="submit">Enviar Formulario</button>
        </form>
    </body>
    </html>