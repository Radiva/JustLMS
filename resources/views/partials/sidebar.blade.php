@php
    $isActiveMgmt = request()->is('admin/users*') 
        || request()->is('roles*') 
        || request()->is('permissions*');
@endphp

<aside class="sidebar d-flex flex-column p-3">
    <h4 class="text-center mb-4">{{ config('app.name') }}</h4>

    <nav>
        <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
            🏠 Dashboard
        </a>

        <div class="dropdown-sidebar {{ $isActiveMgmt ? 'open' : '' }}">
            <button class="dropdown-toggle">
                🛠️ Manajemen Akses
            </button>

            <div class="dropdown-menu">
                <a href="{{ url('#') }}" class="{{ request()->is('admin/users*') ? 'active' : '' }}">👤 User</a>
                <a href="{{ url('/roles') }}" class="{{ request()->is('roles*') ? 'active' : '' }}">🧩 Role</a>
                <a href="{{ url('/permissions') }}" class="{{ request()->is('permissions*') ? 'active' : '' }}">🔐 Permission</a>
            </div>
        </div>
    </nav>

    {{-- <nav>
        <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
            🏠 Dashboard
        </a>
        <a href="#" class="{{ request()->is('admin/users*') ? 'active' : '' }}">
            👤 Manajemen User
        </a>
        <a href="/roles" class="{{ request()->is('roles*') ? 'active' : '' }}">
            🧩 Manajemen Role
        </a>
        <a href="/permissions" class="{{ request()->is('permissions*') ? 'active' : '' }}">
            🔐 Manajemen Permission
        </a>
    </nav> --}}

    <div class="mt-auto text-center small">
        <hr class="border-light">
        <span>&copy; {{ date('Y') }} JustLMS</span>
    </div>
</aside>
