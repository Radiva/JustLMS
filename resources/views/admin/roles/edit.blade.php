<x-admin-layout>
    <x-slot name="title">
        {{ __('Manajemen Role') }}
    </x-slot>

    <div class="container py-4">
        <h5 class="mb-3 text-primary">Edit Role</h5>

        <a href="{{ route('roles.index') }}" class="btn btn-sm btn-secondary mb-3">← Kembali</a>

        <div class="card shadow-sm">
            <div class="card-body">
                <form action="{{ route('roles.update', $role->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Role <span class="text-danger">*</span></label>
                        <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $role->name) }}" required>
                        @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="label" class="form-label">Label (opsional)</label>
                        <input type="text" id="label" name="label" class="form-control" value="{{ old('label', $role->label) }}">
                    </div>

                    <button type="submit" class="btn btn-primary">Perbarui Role</button>
                </form>
            </div>
        </div>
    </div>
</x-admin-layout>
