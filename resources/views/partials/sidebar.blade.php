<aside class="sidebar d-flex flex-column p-3">
    <h4 class="text-center mb-4">{{ config('app.name') }}</h4>

    <nav>
        <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
            🏠 Dashboard
        </a>
        <a href="#" class="{{ request()->is('admin/users*') ? 'active' : '' }}">
            👤 Manajemen User
        </a>
        <a href="#" class="{{ request()->is('admin/roles*') ? 'active' : '' }}">
            🧩 Manajemen Role
        </a>
        <a href="#" class="{{ request()->is('admin/permissions*') ? 'active' : '' }}">
            🔐 Permission
        </a>
    </nav>

    <div class="mt-auto text-center small">
        <hr class="border-light">
        <span>&copy; {{ date('Y') }} JustLMS</span>
    </div>
</aside>
