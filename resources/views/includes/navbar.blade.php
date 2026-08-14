<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #39A900;">
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
                <li class="nav-item dropdown">
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
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Buscar..." aria-label="Search">
                <button class="btn btn-outline-light" type="submit">Buscar</button>
            </form>
        </div>
    </div>
</nav>