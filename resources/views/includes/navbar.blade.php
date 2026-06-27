<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Admin-SENA</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('training_center.create') }}">Centros de Formacion</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('area.create') }}">Areas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('computer.create') }}">Equipos</a>
                </li>
            </ul>
        </div>
    </div>
</nav>