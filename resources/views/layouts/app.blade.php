<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin-SENA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        /* Botones primarios en verde SENA */
        .btn-primary {
            background-color: #39A900 !important;
            border-color: #39A900 !important;
        }
        .btn-primary:hover {
            background-color: #2d8700 !important;
            border-color: #2d8700 !important;
        }

        /* Campos de formulario con enfoque verde */
        .form-control:focus, .form-select:focus {
            border-color: #39A900 !important;
            box-shadow: 0 0 0 0.25rem rgba(57, 169, 0, 0.25) !important;
        }
    </style>
</head>
<body>

    @include('includes.navbar')

    <div class="container mt-4">
        @yield('content')
    </div>

    @include('includes.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>