<x-admin-layout>
    <x-slot name="title">
        {{ __('Manajemen Permission') }}
    </x-slot>

    <div class="container py-4">
        <a href="{{ route('permissions.create') }}" class="btn btn-success mb-3">+ Tambah Permission</a>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered align-middle bg-white">
            <thead class="table-light">
                <tr>
                    <th>Modul</th>
                    <th>Permissions</th>
                    <th width="150">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($modules as $module)
                <tr>
                    <td class="text-capitalize">{{ str_replace('_', ' ', $module) }}</td>
                    <td>
                        @foreach($grouped[$module] as $perm)
                            <span class="badge bg-secondary">{{ $perm->name }}</span>
                        @endforeach
                    </td>
                    <td width="150">
                        <a href="{{ route('permissions.edit', $module) }}" class="btn btn-sm btn-primary">
                            Edit
                        </a>
                        <form action="{{ route('permissions.destroy', $module) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus semua permissions di modul ini?')">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                    <tr><td colspan="3" class="text-center text-muted">Belum ada permission.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-admin-layout>
