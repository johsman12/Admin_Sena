<ul class="menu-lateral">
    <!-- Opciones para cualquier usuario logueado -->
    <li><a href="{{ route('dashboard') }}">Inicio</a></li>

    <!-- Opciones exclusivas para el Administrador -->
    @if(auth()->user()->role == 'admin')
        <li><a href="{{ route('areas.index') }}">Áreas</a></li>
        <li><a href="{{ route('centros.index') }}">Centros</a></li>
        <li><a href="{{ route('instructores.index') }}">Instructores</a></li>
        <li><a href="{{ route('aprendices.index') }}">Aprendices</a></li>
        <li><a href="{{ route('computadores.index') }}">Computadores</a></li>
    @endif

    <!-- Opciones exclusivas para el Aprendiz -->
    @if(auth()->user()->role == 'aprendiz')
        <li><a href="{{ route('aprendiz.mi-perfil') }}">Mi Información</a></li>
        <li><a href="{{ route('aprendiz.mi-computador') }}">Mi Computador Asignado</a></li>
    @endif
</ul>