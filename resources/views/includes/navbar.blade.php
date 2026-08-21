<nav class="navbar navbar-expand-lg navbar-dark px-4" style="background-color: #39A900;">
    <div class="container-fluid">
        <!-- Logo / Marca -->
        <a class="navbar-brand fw-bold" href="/">Admin-SENA</a>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Contenido del Navbar -->
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <!-- Enlace Home -->
                <li class="nav-item">
                    <a class="nav-link" href="/">Home</a>
                </li>
                
                <!-- Enlace Quiénes Somos -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('quienes.somos') }}">Quiénes Somos</a>
                </li>

                <!-- Menú Desplegable de Administración -->
                <li id="adminDropdownNav" class="nav-item dropdown d-none">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Administración
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{ route('area.create') }}">Áreas</a></li>
                        <li><a class="dropdown-item" href="{{ route('training_center.create') }}">Centros de Formación</a></li>
                        <li><a class="dropdown-item" href="{{ route('computer.create') }}">Computadores</a></li>
                        <li><a class="dropdown-item" href="{{ route('course.create') }}">Cursos</a></li>
                        <li><a class="dropdown-item" href="{{ route('teacher.create') }}">Instructores</a></li>
                        <li><a class="dropdown-item" href="{{ route('apprentice.create') }}">Aprendices</a></li>
                    </ul>
                </li>
            </ul>

            <!-- Barra de búsqueda alineada a la derecha -->
            <form class="d-flex me-3" role="search">
                <input class="form-control form-control-sm me-2" type="search" placeholder="Buscar..." aria-label="Search">
                <button class="btn btn-outline-light btn-sm" type="submit">Buscar</button>
            </form>
        </div>

        <!-- Contenedor dinámico de sesión (Derecha) -->
        <div id="authContainer" class="d-flex align-items-center">
            <!-- Se llena mediante JavaScript -->
        </div>
    </div>
</nav>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        checkAuthStatus();
    });

    // Escuchar cuando el localStorage cambie (por ejemplo, al iniciar o cerrar sesión)
    window.addEventListener('storage', function(e) {
        if (e.key === 'user_session' || e.key === 'user_role') {
            checkAuthStatus();
        }
    });

    function checkAuthStatus() {
        const userSession = JSON.parse(localStorage.getItem('user_session'));
        const authContainer = document.getElementById('authContainer');
        const adminDropdown = document.getElementById('adminDropdownNav');
        const userRole = localStorage.getItem('user_role') || '';

        // SI HAY SESIÓN EN LOCALSTORAGE
        if (userSession) {
            // MOSTRAR MENÚ DE ADMINISTRACIÓN SOLO SI EL ROL ES ADMINISTRADOR
            if (adminDropdown) {
                if (userRole.toLowerCase() === 'administrador') {
                    adminDropdown.classList.remove('d-none');
                } else {
                    adminDropdown.classList.add('d-none');
                }
            }

            // MOSTRAR FOTO, NOMBRE Y ETIQUETA DE ROL
            authContainer.innerHTML = `
                <div class="dropdown">
                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="${userSession.avatar}" alt="${userSession.name}" width="38" height="38" class="rounded-circle border border-2 border-white shadow-sm me-2 object-fit-cover">
                        <div class="d-none d-md-block text-start me-1">
                            <span class="fw-bold d-block small lh-1 text-white">${userSession.name}</span>
                            <span class="badge bg-light text-success mt-1" style="font-size: 10px;">${userSession.role}</span>
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end border-0 shadow-lg rounded-3 mt-2" aria-labelledby="profileDropdown">
                        <li>
                            <div class="px-3 py-2 border-bottom">
                                <p class="fw-bold mb-0 text-dark small">${userSession.name}</p>
                                <small class="text-muted d-block">${userSession.email}</small>
                                <span class="badge bg-success mt-1">${userSession.role}</span>
                            </div>
                        </li>
                        <li>
                            <button onclick="logout()" class="dropdown-item text-danger fw-bold py-2">
                                <i class="bi bi-box-arrow-right me-2"></i> Cerrar Sesión
                            </button>
                        </li>
                    </ul>
                </div>
            `;
        } 
        // SI NO HAY SESIÓN (INVITADO)
        else {
            // OCULTAR MENÚ DE ADMINISTRACIÓN
            if (adminDropdown) adminDropdown.classList.add('d-none');

            // MOSTRAR BOTÓN DE INICIAR SESIÓN CON OPCIONES
            authContainer.innerHTML = `
                <div class="dropdown">
                    <button class="btn btn-light text-success fw-bold btn-sm px-3 rounded-3 shadow-sm dropdown-toggle d-flex align-items-center gap-1" type="button" id="loginDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-circle"></i> Iniciar Sesión
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end border-0 shadow-lg rounded-3 mt-2" aria-labelledby="loginDropdown">
                        <li><a class="dropdown-item py-2" href="{{ route('login') }}?role=aprendiz"><i class="bi bi-person me-2 text-success"></i> Como Aprendiz</a></li>
                        <li><a class="dropdown-item py-2" href="{{ route('login') }}?role=administrador"><i class="bi bi-shield-lock me-2 text-success"></i> Como Administrador</a></li>
                    </ul>
                </div>
            `;
        }
    }

    // Función para cerrar sesión
    function logout() {
        localStorage.removeItem('user_session');
        localStorage.removeItem('user_role');
        checkAuthStatus();
        window.location.href = "{{ url('/') }}";
    }
</script>