<div class="navbar bg-base-100 shadow-lg">
    {{-- logo --}}
    <div class="mx-2">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M15.75 2.25h-7.5A2.25 2.25 0 0 0 6 4.5v15a2.25 2.25 0 0 0 2.25 2.25h7.5A2.25 2.25 0 0 0 18 19.5v-15A2.25 2.25 0 0 0 15.75 2.25zm-3.75 16.5a1.125 1.125 0 1 1 0-2.25 1.125 1.125 0 0 1 0 2.25zM12 6.75a1.125 1.125 0 1 1 0-2.25 1.125 1.125 0 0 1 0 2.25z" />
        </svg>
    </div> {{-- menu móvil --}}
    <div class="flex-1 md:hidden">
        <div class="dropdown">
            <div tabindex="0" role="button" class="btn btn-ghost btn-circle">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
                </svg>
            </div>
            <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
                <li><a href="{{ route('home') }}">ReparaTec</a></li>
                <li><a href="{{ route('home') }}">Servicios</a></li>
                <li><a href="{{ route('categorias.index') }}">Categorias</a></li>
                <li><a href="{{ route('proveedors.index') }}">Proveedores</a></li>
                <li><a href="{{ route('clientes.index') }}">Clientes</a></li>
                <li><a href="{{ route('empleados.index') }}">Empleados</a></li>
                <li><a href="{{ route('productos.index') }}">Productos</a></li>
                <li><a href="{{ route('inventarios.index') }}">Inventario</a></li>
                <li><a href="{{ route('dispositivos.index') }}">Dispositivos</a></li>
                <li><a href="{{ route('solicituds.index') }}">Solicitudes</a></li>
                <li><a href="{{ route('reparacions.index') }}">Reparaciones</a></li>
                <li><a href="{{ route('facturas.index') }}">Facturas</a></li>
                <li><a href="{{ route('pagos.index') }}">Pagos</a></li>
                <li><a href="{{ route('home') }}">Acerca de nosotros</a></li>
            </ul>
        </div>
    </div>
    {{-- menu desktop --}}
    <div class="flex-1 hidden md:flex space-x-4">
        <a href="{{ route('home') }}" class="btn btn-ghost btn-sm">ReparaTec</a>
        <a href="{{ route('home') }}" class="btn btn-ghost btn-sm">Servicios</a>
        <a href="{{ route('productos.index') }}" class="btn btn-ghost btn-sm">Productos</a>
        <a href="{{ route('home') }}" class="btn btn-ghost btn-sm">Acerca de nosotros</a>
    </div>
    {{-- Si esta autenticado muestra menu de usuario, sino muestra botones de login y registro --}}
    @auth
        <h3 class="mr-2 font-semibold text-sm">Hola, {{ auth()->user()->name }}</h3>
        <div class="dropdown dropdown-end">
            <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar mr-4">
                <div class="w-10 rounded-full">
                    <img alt="photo user" src="https://picsum.photos/id/35/50" />
                </div>
            </div>
            <ul tabindex="0" class="mt-3 z-[1] p-2 shadow menu menu-sm dropdown-content bg-base-100 rounded-box w-52">
                <li>
                    <a href="{{ route('dashboard') }}">Dashboard</a>
                </li>
                <li>
                    <a href="{{ route('profile.edit') }}">Mi perfil</a>
                </li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault(); this.closest('form').submit();">Logout</a>
                    </form>
                </li>
            </ul>
        </div>
    @else
        <div class="mx-4 space-x-4">
            <a href="{{ route('login') }}" class="btn btn-outline btn-sm">Ingresar</a>
            <a href="{{ route('register') }}" class="btn btn-outline btn-sm">Registrarse</a>
        </div>
    @endauth
</div>
