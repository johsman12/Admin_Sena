
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #39A900;">
    <div class="container-fluid">
    
        <a class="navbar-brand fw-bold" href="/">Admin-SENA</a>
        
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Contenido del Navbar -->
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <!-- Enlaces principales -->
                <li class="nav-item">
                    <a class="nav-link" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('area.create') }}">Area</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('training_center.create') }}">Trainingcenter</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('computer.create') }}">Computer</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('course.registro') }}">Course</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('teacher.create') }}">Teacher</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('apprentice.create') }}">Apprentice</a>
                </li>

                <!-- Menú Desplegable "Listas" -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Listas
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="{{ route('area.create') }}">Area</a></li>
                        <li><a class="dropdown-item" href="{{ route('training_center.create') }}">Trainingcenter</a></li>
                        <li><a class="dropdown-item" href="{{ route('computer.create') }}">Computer</a></li>
                        <li><a class="dropdown-item" href="{{ route('course.registro') }}">Course</a></li>
                        <li><a class="dropdown-item" href="{{ route('teacher.create') }}">Teacher</a></li>
                        <li><a class="dropdown-item" href="{{ route('apprentice.create') }}">Apprentice</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>