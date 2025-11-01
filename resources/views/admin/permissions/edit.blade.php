<x-admin-layout>
    <x-slot name="title">
        {{ __('Manajemen Permission') }}
    </x-slot>

    <div class="container py-4">
        <h5 class="mb-3 text-primary">{{ __('Edit Permission Modul: ') . str_replace('_', ' ', $module) }}</h5>

        <a href="{{ route('permissions.index') }}" class="btn btn-secondary mb-3">&larr; Kembali</a>

        <form action="{{ route('permissions.update', $module) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="card shadow-sm p-4">
                <h5 class="mb-3 text-capitalize">Hak Akses: {{ str_replace('_', ' ', $module) }}</h5>

                <div class="row g-3">
                    @foreach($actions as $action)
                        @php
                            $checked = in_array($module . '_' . $action, $permissions);
                        @endphp
                        <div class="col-md-2">
                            <div class="form-check">
                                <input
                                    class="form-check-input"
                                    type="checkbox"
                                    name="{{ $action }}"
                                    id="perm_{{ $action }}"
                                    {{ $checked ? 'checked' : '' }}
                                >
                                <label class="form-check-label text-capitalize" for="perm_{{ $action }}">
                                    {{ $action }}
                                </label>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </div>
        </form>
    </div>
</x-admin-layout>
