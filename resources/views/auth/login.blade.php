@extends('layouts.app')

@section('content')
<style>
    /* Fondo fijo que cubre la pantalla completa */
    .login-full-bg {
        position: fixed;
        top: 0;
        left: 0;
        width: 100vw;
        height: 100vh;
        background: linear-gradient(rgba(0, 50, 77, 0.75), rgba(0, 0, 0, 0.85)), 
                    url('https://images.unsplash.com/photo-1523240795612-9a054b0db644?auto=format&fit=crop&w=1920&q=80') center/cover no-repeat;
        z-index: -1;
    }

    /* Centrado del formulario sobre el fondo */
    .login-wrapper {
        min-height: calc(100vh - 100px);
        display: flex;
        align-items: center;
        justify-content: center;
    }
</style>

<!-- Capa de imagen de fondo completo -->
<div class="login-full-bg"></div>

<!-- Contenido del Formulario -->
<div class="container login-wrapper py-4">
    <div class="row justify-content-center w-100">
        <div class="col-sm-10 col-md-6 col-lg-4">
            
            <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                
                <!-- Encabezado SENA -->
                <div class="card-header text-white text-center py-4 border-0" style="background-color: #39A900;">
                    <div class="mb-2">
                        <i class="bi bi-shield-lock-fill display-5"></i>
                    </div>
                    <h4 class="fw-bold mb-0">Iniciar Sesión</h4>
                    <small class="opacity-75">Ingrese sus credenciales de acceso</small>
                </div>

                <!-- Formulario -->
                <div class="card-body p-4 bg-white">
                    <form id="loginPageForm" onsubmit="executeLogin(event)">
                        
                        <div class="mb-3">
                            <label for="userName" class="form-label small fw-bold text-muted text-uppercase">
                                <i class="bi bi-person me-1"></i> Nombre Completo
                            </label>
                            <input type="text" id="userName" class="form-control bg-light border-0 rounded-3 py-2" placeholder="Ej: Carlos Pérez" required>
                        </div>

                        <div class="mb-3">
                            <label for="userEmail" class="form-label small fw-bold text-muted text-uppercase">
                                <i class="bi bi-envelope me-1"></i> Correo Electrónico
                            </label>
                            <input type="email" id="userEmail" class="form-control bg-light border-0 rounded-3 py-2" placeholder="ejemplo@sena.edu.co" required>
                        </div>

                        <div class="mb-4">
                            <label for="userPass" class="form-label small fw-bold text-muted text-uppercase">
                                <i class="bi bi-key me-1"></i> Contraseña
                            </label>
                            <input type="password" id="userPass" class="form-control bg-light border-0 rounded-3 py-2" placeholder="••••••••" required>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn text-white fw-bold py-2 rounded-3 shadow-sm d-flex align-items-center justify-content-center gap-2" style="background-color: #39A900;">
                                <span>Ingresar</span>
                                <i class="bi bi-box-arrow-in-right fs-5"></i>
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Pie de página de la tarjeta -->
                <div class="card-footer bg-light border-0 py-3 text-center">
        <a href="{{ route('home') }}" class="text-decoration-none small text-muted">
            <i class="bi bi-arrow-left me-1"></i> Volver al Inicio
        </a>
        </div>

         </div>

        </div>
    </div>
</div>

<script>
    function executeLogin(e) {
        e.preventDefault();
        
        const name = document.getElementById('userName').value.trim();
        const email = document.getElementById('userEmail').value.trim();

        // Detectar si entró como aprendiz o administrador desde la URL (?role=...)
        const urlParams = new URLSearchParams(window.location.search);
        const roleParam = urlParams.get('role') || 'aprendiz';
        
        // Formatear el texto del rol para que se vea bien (Ej: "Administrador" o "Aprendiz")
        const formattedRole = roleParam.charAt(0).toUpperCase() + roleParam.slice(1);

        const avatarUrl = `https://ui-avatars.com/api/?name=${encodeURIComponent(name)}&background=39A900&color=fff&bold=true`;

        const userSession = {
            name: name,
            email: email,
            avatar: avatarUrl,
            role: formattedRole
        };

        // Guardamos la sesión y el rol
        localStorage.setItem('user_session', JSON.stringify(userSession));
        localStorage.setItem('user_role', formattedRole);

        // Redirigir al inicio
        window.location.href = "{{ url('/') }}";
    }
</script>
@endsection