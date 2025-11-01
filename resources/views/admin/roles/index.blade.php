<x-admin-layout>
    <x-slot name="title">
        {{ __('Manajemen Role') }}
    </x-slot>

    <div class="container py-4">
        <a href="{{ route('roles.create') }}" class="btn btn-success mb-3">+ Tambah Role</a>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered align-middle bg-white">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Label</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($roles as $role)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $role->name }}</td>
                        <td>{{ $role->label ?? '-' }}</td>
                        <td>
                            <a href="{{ route('role-permissions.edit', $role->id) }}" class="btn btn-primary btn-sm">
                                Kelola Akses
                            </a>
                            <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('roles.destroy', $role->id) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus role ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="text-center text-muted">Belum ada role.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-admin-layout>
