<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin SENA</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        *{ margin:0; padding:0; box-sizing:border-box; font-family:'Segoe UI',sans-serif; }
        body{ display:flex; min-height:100vh; background:#f4f6f9; }

        /* SIDEBAR VERDE SENA */
        .sidebar{ width:260px; background:#39A900; color:white; padding:25px; position:fixed; height:100%; }
        .logo{ text-align:center; margin-bottom:40px; }
        .menu{ list-style:none; }
        .menu li{ margin:12px 0; }
        .menu a{ display:flex; align-items:center; gap:15px; text-decoration:none; color:white; padding:14px; border-radius:10px; transition:.3s; }
        .menu a:hover{ background:rgba(255,255,255,.2); transform:translateX(5px); }

        /* CONTENIDO */
        .main{ margin-left:260px; width:100%; padding:30px; }
        .header{ background:white; padding:20px; border-radius:15px; box-shadow:0 5px 15px rgba(0,0,0,.1); }
        .cards{ margin-top:30px; display:grid; grid-template-columns:repeat(auto-fit,minmax(250px,1fr)); gap:20px; }
        .card{ background:white; padding:25px; border-radius:15px; box-shadow:0 5px 15px rgba(0,0,0,.1); transition:.3s; }
        .card:hover{ transform:translateY(-8px); }
        .card .icon { color:#39A900; font-size:40px; margin-bottom:15px; }
        .card p { font-size:28px; font-weight:bold; color:#39A900; }

        /* BANNER VERDE */
        .banner{ margin-top:30px; background:linear-gradient(135deg,#39A900,#71d33d); color:white; padding:40px; border-radius:20px; }
    </style>
</head>
<body>

    <div class="sidebar">
        <div class="logo">
            <h1>SENA</h1>
            <p>Panel Administrativo</p>
        </div>
        <ul class="menu">
            <li><a href="{{route('area.create')}}"><i class="fas fa-layer-group"></i> Áreas</a></li>
            <li><a href="{{route('computer.create')}}"><i class="fas fa-computer"></i> Computadores</a></li>
            <li><a href="{{route('training_center.create')}}"><i class="fas fa-building"></i> Centros</a></li>
            <li><a href="{{ route('course.create') }}"><i class="fas fa-book"></i> Cursos</a></li>            <li><a href="{{route('teacher.create')}}"><i class="fas fa-chalkboard-user"></i> Instructores</a></li>
            <li><a href="{{route('apprentice.create')}}"><i class="fas fa-user-graduate"></i> Aprendices</a></li>
        </ul>
    </div>

    <div class="main">
        <div class="header">
            <h2>Dashboard Administrativo</h2>
            <p>Gestión Académica SENA</p>
        </div>
        <div class="banner">
            <h1>Bienvenido Administrador 👋</h1>
            <p>Desde este panel podrás administrar cursos, aprendices, instructores, centros de formación y equipos.</p>
        </div>
        <div class="cards">
            <div class="card">
                <div class="icon"><i class="fas fa-user-graduate"></i></div>
                <h3>Aprendices</h3>
                <p>{{ $totalAprendices ?? 0 }}</p>
            </div>
            <div class="card">
                <div class="icon"><i class="fas fa-chalkboard-user"></i></div>
                <h3>Instructores</h3>
                <p>{{ $totalInstructores ?? 0 }}</p>
            </div>
            <div class="card">
                <div class="icon"><i class="fas fa-book"></i></div>
                <h3>Cursos</h3>
                <p>{{ $totalCursos ?? 0 }}</p>
            </div>
            <div class="card">
                <div class="icon"><i class="fas fa-computer"></i></div>
                <h3>Equipos</h3>
                <p>{{ $totalEquipos ?? 0 }}</p>
            </div>
        </div>
    </div>
</body>
</html>