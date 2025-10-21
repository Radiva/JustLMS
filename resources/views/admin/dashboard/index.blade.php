@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12 mb-3">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <h5 class="card-title">Selamat Datang di JustLMS 👋</h5>
                <p class="text-muted mb-0">
                    Gunakan panel di sisi kiri untuk mengelola pengguna, peran, dan izin sistem.
                </p>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card shadow-sm border-0 mb-3">
            <div class="card-body">
                <h6 class="text-muted">Jumlah Pengguna</h6>
                <h3 class="fw-bold">23</h3>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card shadow-sm border-0 mb-3">
            <div class="card-body">
                <h6 class="text-muted">Jumlah Role</h6>
                <h3 class="fw-bold">5</h3>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card shadow-sm border-0 mb-3">
            <div class="card-body">
                <h6 class="text-muted">Permission</h6>
                <h3 class="fw-bold">18</h3>
            </div>
        </div>
    </div>
</div>
@endsection
