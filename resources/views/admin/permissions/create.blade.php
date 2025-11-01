<x-admin-layout>
    <x-slot name="title">
        {{ __('Manajemen Permission') }}
    </x-slot>
        
    <div class="container py-4">
        <h5 class="mb-3 text-primary">Tambah Permission Baru</h5>

        <a href="{{ route('permissions.index') }}" class="btn btn-sm btn-secondary mb-3">← Kembali</a>

        <div class="card shadow-sm">
            <div class="card-body">
                <form action="{{ route('permissions.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label>Nama Modul</label>
                        <input type="text" name="name" class="form-control" placeholder="contoh: wali_kelas" required>
                        <small class="text-muted">Nama akan digunakan sebagai prefix BREAD permission</small>
                    </div>

                    <div class="mb-3">
                        <label>Label (opsional)</label>
                        <input type="text" name="label" class="form-control" placeholder="contoh: Wali Kelas">
                    </div>

                    <label class="fw-bold mb-2">Pilih Aksi:</label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="actions[]" value="browse" checked>
                        <label class="form-check-label">Browse (Lihat daftar)</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="actions[]" value="read" checked>
                        <label class="form-check-label">Read (Detail)</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="actions[]" value="edit" checked>
                        <label class="form-check-label">Edit (Ubah data)</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="actions[]" value="add" checked>
                        <label class="form-check-label">Add (Tambah data)</label>
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" name="actions[]" value="delete" checked>
                        <label class="form-check-label">Delete (Hapus data)</label>
                    </div>

                    <button class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</x-admin-layout>
