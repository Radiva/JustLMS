@extends('layouts.admin')

@section('content')
<div class="container py-4">
    <h4 class="mb-3 text-primary">Tambah Role Baru</h4>

    <a href="{{ route('roles.index') }}" class="btn btn-sm btn-secondary mb-3">← Kembali</a>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('roles.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Role <span class="text-danger">*</span></label>
                    <input type="text" id="name" name="name" class="form-control" placeholder="contoh: wali_kelas" required>
                    @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="mb-3">
                    <label for="label" class="form-label">Label (opsional)</label>
                    <input type="text" id="label" name="label" class="form-control" placeholder="contoh: Wali Kelas">
                </div>

                <button type="submit" class="btn btn-primary">Simpan Role</button>
            </form>
        </div>
    </div>
</div>
@endsection
