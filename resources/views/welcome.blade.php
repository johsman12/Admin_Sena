<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin SENA - Panel Administrativo</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        *{ margin:0; padding:0; box-sizing:border-box; font-family:'Segoe UI',sans-serif; }
        body{ display:flex; min-height:100vh; background:#f4f6f9; }

        /* SIDEBAR VERDE SENA */
        .sidebar{ width:260px; background:#39A900; color:white; padding:25px; position:fixed; height:100%; overflow-y:auto; }
        .logo{ text-align:center; margin-bottom:30px; }
        .sena-logo { width: 65px; height: auto; border-radius: 50%; margin-bottom: 10px; object-fit: cover; border: 2px solid white; }
        .logo h2 { font-size: 20px; font-weight: bold; letter-spacing: 1px; color: white; }
        .logo p { font-size: 12px; opacity: 0.9; color: white; }
        
        .menu{ list-style:none; }
        .menu li{ margin:10px 0; }
        .menu a{ display:flex; align-items:center; gap:15px; text-decoration:none; color:white; padding:12px 15px; border-radius:10px; transition:.3s; }
        .menu a:hover{ background:rgba(255,255,255,.2); transform:translateX(5px); }

        /* CONTENIDO PRINCIPAL */
        .main{ margin-left:260px; width:calc(100% - 260px); padding:30px; }
        .header{ background:white; padding:15px 30px; border-radius:15px; box-shadow:0 5px 15px rgba(0,0,0,.05); display: flex; justify-content: space-between; align-items: center; }
        .header h2 { color: #333; font-size: 22px; }
        .header p { color: #666; font-size: 13px; }
        
        /* SECCIÓN DE USUARIO / AUTENTICACIÓN EN EL HEADER */
        .user-section { display: flex; align-items: center; gap: 15px; }
        .header-link { background: #39A900; color: white; padding: 8px 15px; border-radius: 8px; text-decoration: none; font-weight: 600; font-size: 13px; transition: .3s; }
        .header-link:hover { background: #2e8700; color: white; }
        
        .profile-container { display: flex; align-items: center; gap: 10px; background: #f8f9fa; padding: 6px 12px; border-radius: 30px; border: 1px solid #dee2e6; }
        .profile-pic { width: 38px; height: 38px; border-radius: 50%; object-fit: cover; border: 2px solid #39A900; }
        .profile-icon-default { width: 38px; height: 38px; border-radius: 50%; background: #e9ecef; color: #495057; display: flex; align-items: center; justify-content: center; font-size: 18px; border: 2px solid #ced4da; }
        .user-info { display: flex; flex-direction: column; text-align: left; }
        .user-name { font-size: 13px; font-weight: bold; color: #333; }
        .user-role { font-size: 11px; color: #39A900; font-weight: 600; }

        /* BANNER VERDE */
        .banner{ margin-top:25px; background:linear-gradient(135deg,#39A900,#71d33d); color:white; padding:35px; border-radius:15px; box-shadow:0 5px 15px rgba(57,169,0,.2); }
        .banner h1 { font-size: 26px; margin-bottom: 8px; }
        .banner p { font-size: 15px; opacity: 0.95; }

        /* TARJETAS DE ESTADÍSTICAS */
        .cards{ margin-top:25px; display:grid; grid-template-columns:repeat(auto-fit,minmax(220px,1fr)); gap:20px; }
        .card{ background:white; padding:25px; border-radius:15px; box-shadow:0 5px 15px rgba(0,0,0,.05); transition:.3s; }
        .card:hover{ transform:translateY(-5px); box-shadow:0 8px 20px rgba(0,0,0,.1); }
        .card .icon { color:#39A900; font-size:32px; margin-bottom:12px; }
        .card h3 { font-size: 16px; color: #555; margin-bottom: 5px; }
        .card p { font-size:26px; font-weight:bold; color:#39A900; }

        /* SECCIÓN DE NUEVAS OFERTAS Y ANUNCIOS */
        .news-section { margin-top: 35px; }
        .news-title { font-size: 20px; color: #333; margin-bottom: 20px; font-weight: bold; }
        .news-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 20px; }
        .news-card { background: white; border-radius: 15px; overflow: hidden; box-shadow: 0 5px 15px rgba(0,0,0,.05); transition: .3s; display: flex; flex-direction: column; }
        .news-card:hover { transform: translateY(-5px); box-shadow: 0 8px 20px rgba(0,0,0,.1); }
        .news-header-bg { background: #39A900; color: white; padding: 25px; text-align: center; font-size: 28px; }
        .news-body { padding: 20px; display: flex; flex-direction: column; flex-grow: 1; }
        .news-body h4 { font-size: 17px; color: #333; margin-bottom: 10px; }
        .news-body p { font-size: 13px; color: #666; margin-bottom: 20px; line-height: 1.4; flex-grow: 1; }
        
        /* BOTÓN MODAL */
        .btn-ver-mas { align-self: flex-start; padding: 8px 16px; background: transparent; border: 2px solid #39A900; color: #39A900; border-radius: 8px; text-decoration: none; font-weight: 600; font-size: 13px; cursor: pointer; transition: .3s; }
        .btn-ver-mas:hover { background: #39A900; color: white; }

        /* VENTANA MODAL (POPUP) */
        .modal { display: none; position: fixed; z-index: 1000; left: 0; top: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); align-items: center; justify-content: center; }
        .modal-content { background: white; padding: 30px; border-radius: 15px; width: 90%; max-width: 500px; box-shadow: 0 10px 25px rgba(0,0,0,0.2); position: relative; animation: fadeIn 0.3s ease; }
        .close-modal { position: absolute; right: 20px; top: 15px; font-size: 24px; cursor: pointer; color: #aaa; }
        .close-modal:hover { color: #333; }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(-10px); } to { opacity: 1; transform: translateY(0); } }
    </style>
</head>
<body>

    <!-- SIDEBAR -->
    <div class="sidebar">
        <div class="logo">
            <img src="{{ asset('images/SENA1.jpg') }}" alt="Logo SENA" class="sena-logo">
            <h2>Admin-SENA</h2>
            <p>Panel Administrativo</p>
        </div>
        <ul class="menu">
            <li><a href="{{route('area.create')}}"><i class="fas fa-layer-group"></i> Áreas</a></li>
            <li><a href="{{route('computer.create')}}"><i class="fas fa-computer"></i> Computadores</a></li>
            <li><a href="{{route('training_center.create')}}"><i class="fas fa-building"></i> Centros</a></li>
            <li><a href="{{route('course.create')}}"><i class="fas fa-book"></i> Cursos</a></li>
            <li><a href="{{route('teacher.create')}}"><i class="fas fa-chalkboard-user"></i> Instructores</a></li>
            <li><a href="{{route('apprentice.create')}}"><i class="fas fa-user-graduate"></i> Aprendices</a></li>
        </ul>
    </div>

    <!-- CONTENIDO PRINCIPAL -->
    <div class="main">
        <div class="header">
            <div>
                <h2>Dashboard Administrativo</h2>
                <p>Gestión Académica SENA</p>
            </div>
            
            <div class="user-section">
                <a href="{{ route('quienes.somos') }}" class="header-link"><i class="fas fa-users"></i> Quiénes Somos</a>

                <!-- CONDICIONAL DE AUTENTICACIÓN -->
                @guest
                    <!-- CUANDO NO HA INICIADO SESIÓN (Muestra Icono Genérico y Botón de Acceso) -->
                    <div class="profile-container">
                        <div class="profile-icon-default">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="user-info">
                            <span class="user-name">Invitado</span>
                            <span class="user-role">Sin sesión</span>
                        </div>
                    </div>
                    <!-- Cambia las rutas 'login' según el sistema de autenticación que utilices (Jetstream, Breeze o rutas personalizadas) -->
                    <a href="#" class="header-link" style="background: #495057;">Iniciar Sesión</a>
                @else
                    <!-- CUANDO YA INICIÓ SESIÓN (Muestra la foto de perfil del Administrador o Aprendiz) -->
                    <div class="profile-container">
                        <!-- Si el usuario tiene foto en base de datos la carga, sino muestra una por defecto -->
                        <img src="{{ Auth::user()->profile_photo_url ?? asset('images/SENA1.jpg') }}" alt="Perfil" class="profile-pic">
                        <div class="user-info">
                            <span class="user-name">{{ Auth::user()->name ?? 'Usuario' }}</span>
                            <!-- Valida el rol de forma dinámica -->
                            <span class="user-role">{{ Auth::user()->role ?? 'Administrador / Aprendiz' }}</span>
                        </div>
                    </div>
                @endguest
            </div>
        </div>

        <div class="banner">
            <h1>Bienvenido Administrador 👋</h1>
            <p>Desde este panel podrás administrar cursos, aprendices, instructores, centros de formación y equipos de manera eficiente.</p>
        </div>

        <!-- TARJETAS DE CONTEO -->
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

        <!-- SECCIÓN DE NUEVAS OFERTAS Y ANUNCIOS -->
        <div class="news-section">
            <h3 class="news-title">Anuncios y Nuevas Ofertas</h3>
            <div class="news-grid">
                
                <div class="news-card">
                    <div class="news-header-bg"><i class="fas fa-bullhorn"></i></div>
                    <div class="news-body">
                        <h4>Convocatoria de Formación Titulada</h4>
                        <p>Entérate de las nuevas ofertas educativas disponibles para este trimestre y las inscripciones abiertas.</p>
                        <button class="btn-ver-mas" onclick="openModal('modal1')">Ver más</button>
                    </div>
                </div>

                <div class="news-card">
                    <div class="news-header-bg"><i class="fas fa-laptop-code"></i></div>
                    <div class="news-body">
                        <h4>Mantenimiento de Equipos</h4>
                        <p>Consulta el cronograma de revisión técnica y actualización de software para los computadores de las áreas.</p>
                        <button class="btn-ver-mas" onclick="openModal('modal2')">Ver más</button>
                    </div>
                </div>

                <div class="news-card">
                    <div class="news-header-bg"><i class="fas fa-calendar-alt"></i></div>
                    <div class="news-body">
                        <h4>Capacitaciones y Talleres</h4>
                        <p>Participa en las jornadas especiales de desarrollo web, control de versiones y bases de datos organizadas por la institución.</p>
                        <button class="btn-ver-mas" onclick="openModal('modal3')">Ver más</button>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- VENTANAS MODALES PARA EL BOTÓN "VER MÁS" -->
    <div id="modal1" class="modal">
        <div class="modal-content">
            <span class="close-modal" onclick="closeModal('modal1')">&times;</span>
            <h3 style="color:#39A900; margin-bottom:15px;">Convocatoria de Formación Titulada</h3>
            <p style="color:#555; line-height: 1.6;">Las inscripciones están abiertas para técnicos y tecnólogos. Acércate al centro de formación o revisa los requisitos académicos en la plataforma Sofia Plus del SENA para postularte antes de las fechas límite.</p>
        </div>
    </div>

    <div id="modal2" class="modal">
        <div class="modal-content">
            <span class="close-modal" onclick="closeModal('modal2')">&times;</span>
            <h3 style="color:#39A900; margin-bottom:15px;">Cronograma de Mantenimiento</h3>
            <p style="color:#555; line-height: 1.6;">El soporte técnico preventivo de los equipos de cómputo se realizará por bloques de áreas. Asegúrate de respaldar tu información y apagar correctamente los terminales al finalizar la jornada.</p>
        </div>
    </div>

    <div id="modal3" class="modal">
        <div class="modal-content">
            <span class="close-modal" onclick="closeModal('modal3')">&times;</span>
            <h3 style="color:#39A900; margin-bottom:15px;">Capacitaciones de Desarrollo</h3>
            <p style="color:#555; line-height: 1.6;">Talleres prácticos orientados al uso de herramientas modernas de desarrollo web (Laravel, PHP, React y control de versiones con Git). Cupos limitados para aprendices e instructores inscritos.</p>
        </div>
    </div>

    <!-- SCRIPT PARA MANEJAR LAS VENTANAS EMERGENTES -->
    <script>
        function openModal(modalId) {
            document.getElementById(modalId).style.display = 'flex';
        }
        function closeModal(modalId) {
            document.getElementById(modalId).style.display = 'none';
        }
        window.onclick = function(event) {
            if (event.target.classList.contains('modal')) {
                event.target.style.display = "none";
            }
        }
    </script>
</body>
</html>