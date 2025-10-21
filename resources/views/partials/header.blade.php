<header class="d-flex justify-content-between align-items-center">
    <h5 class="m-0">{{ $title ?? 'Dashboard' }}</h5>
    <div class="dropdown">
        <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
            {{ session('user')->name ?? 'Guest' }}
        </button>
        <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item" href="#">Profil</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item text-danger" href="{{ route('logout') }}">Logout</a></li>
        </ul>
    </div>
</header>
