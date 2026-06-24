<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>formulario producto</h1>

<form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">

@csrf

<label>
    Nombre:
    <br>
    <input type="text" name="nombre">
</label>
<br>
<label>
    Descripcion:
    <br>
    <input type="text" name="descripcion">
</label>
<br>
<label>
    Precio:
    <br>
    <input type="number" name="precio">
</label>
<br>
<label>
    Cantidad:
    <br>
    <input type="number" name="cantidad">
</label>
<br>
<label>
    Peso:
    <br>
    <input type="number" name="peso">
</label>
<br>
<label>
    Tamano:
    <br>
    <input type="number" name="tamano">
</label>
<br>
<br>

<button type="submit">Ingresar Producto:</button>
</form>

</body>
</html>