<!-- resources/views/livewire/navigation-menu.blade.php -->
<nav class="navegacion">
    <a href="{{ route('receta.create') }}" class="navegacion__enlace">Crear nueva</a>

    @auth
        <!-- Links only available for authenticated users -->
        <a href="{{ route('profile.show') }}" class="navegacion__enlace">Perfil</a>
        <a href="{{ route('logout') }}" class="navegacion__enlace"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
           Cerrar sesión
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    @else
        <!-- Links for unauthenticated users -->
        <a href="{{ route('login') }}" class="navegacion__enlace">Iniciar sesión</a>
        <a href="{{ route('register') }}" class="navegacion__enlace">Registrarse</a>
    @endauth
</nav>
