<div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark"
    style="width: 280px; height: 100vh; position: fixed; top: 0; left: 0; z-index: 1000;">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <span class="fs-4">GiX System</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="{{ route('home') }}" class="nav-link text-white {{ request()->is('home') ? 'active' : '' }}"
                aria-current="page">
                <i class="bi bi-speedometer2 me-2"></i>
                Dashboard
            </a>
        </li>
        <li class="mb-1">
            <button class="btn btn-toggle align-items-center rounded collapsed text-white w-100 text-start"
                data-bs-toggle="collapse" data-bs-target="#sistema-collapse" aria-expanded="true">
                <i class="bi bi-gear me-2"></i> Sistema
            </button>
            <div class="collapse show" id="sistema-collapse">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small ms-4">
                    <li><a href="{{ route('users.index') }}"
                            class="link-light rounded text-decoration-none">Usuarios</a></li>
                    <li><a href="{{ route('puestos.index') }}"
                            class="link-light rounded text-decoration-none">Puestos</a></li>
                </ul>
            </div>
        </li>
        <li class="mb-1">
            <button class="btn btn-toggle align-items-center rounded collapsed text-white w-100 text-start"
                data-bs-toggle="collapse" data-bs-target="#rh-collapse" aria-expanded="false">
                <i class="bi bi-people me-2"></i> Recursos Humanos
            </button>
            <div class="collapse" id="rh-collapse">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small ms-4">
                    <li><a href="{{ route('personal.index') }}"
                            class="link-light rounded text-decoration-none">Personal</a></li>
                </ul>
            </div>
        </li>
    </ul>
    <hr>
    <div class="dropdown">
        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1"
            data-bs-toggle="dropdown" aria-expanded="false">
            <strong>{{ Auth::user()->username ?? 'User' }}</strong>
        </a>
        <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
            <li>
                <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Sign out
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
</div>