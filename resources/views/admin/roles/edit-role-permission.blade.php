<x-admin-layout>
    <x-slot name="title">
        {{ __('Manajemen Role') }}
    </x-slot>

    <div class="container py-4">
        <h5 class="mb-3 text-primary">{{ __('Kelola Akses untuk Role: ') . ucfirst($role->name) }}</h5>

        <a href="{{ route('roles.index') }}" class="btn btn-secondary mb-3">&larr; Kembali</a>

        <form action="{{ route('role-permissions.update', $role->id) }}" method="POST">
            @csrf
            @method('PUT')

            @foreach($grouped as $module => $perms)
                <div class="card mb-4 shadow-sm">
                    <div class="card-header bg-light fw-bold text-capitalize">
                        Modul: {{ str_replace('_', ' ', $module) }}
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            @foreach($actions as $action)
                                @php
                                    $permName = $module . '_' . $action;
                                    $checked = in_array($permName, $rolePermissions);
                                    $exists = collect($perms)->contains(fn($p) => $p->name === $permName);
                                @endphp

                                <div class="col-md-2">
                                    <div class="form-check">
                                        <input
                                            class="form-check-input"
                                            type="checkbox"
                                            name="permissions[]"
                                            value="{{ $permName }}"
                                            id="perm_{{ $permName }}"
                                            {{ $checked ? 'checked' : '' }}
                                            {{ $exists ? '' : 'disabled' }}
                                        >
                                        <label class="form-check-label text-capitalize" for="perm_{{ $permName }}">
                                            {{ $action }}
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach

            <button type="submit" class="btn btn-primary">Simpan Akses</button>
        </form>
    </div>
</x-admin-layout>
