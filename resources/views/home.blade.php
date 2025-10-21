@extends('layouts.public')

@section('content')
<section class="hero">
    <div class="container">
        <h1>Selamat Datang di <span class="text-primary">{{ config('app.name') }}</span></h1>
        <p>Platform pembelajaran sederhana berbasis Laravel, dirancang untuk mendukung proses belajar, manajemen guru, siswa, dan kelas secara efisien.</p>
        <a href="{{ route('login') }}" class="btn btn-primary btn-lg px-4">Masuk ke Dashboard</a>
    </div>
</section>

<section id="fitur" class="py-5 bg-light">
    <div class="container">
        <h3 class="text-center text-secondary mb-4">Fitur Utama</h3>
        <div class="row text-center">
            <div class="col-md-4 mb-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <h5 class="fw-bold text-primary">Manajemen Pengguna</h5>
                        <p class="text-muted mb-0">Kelola akun guru, siswa, dan admin dengan mudah dan terstruktur.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <h5 class="fw-bold text-primary">Pengaturan Role & Akses</h5>
                        <p class="text-muted mb-0">Atur hak akses tiap role secara dinamis sesuai kebutuhan sekolah.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <h5 class="fw-bold text-primary">Dashboard Interaktif</h5>
                        <p class="text-muted mb-0">Pantau aktivitas pembelajaran dengan tampilan yang bersih dan informatif.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="tentang" class="py-5">
    <div class="container text-center">
        <h3 class="text-secondary mb-3">Tentang JustLMS</h3>
        <p class="text-muted mx-auto" style="max-width: 700px;">
            JustLMS adalah sistem manajemen pembelajaran berbasis web yang dibangun dengan Laravel.
            Fokusnya adalah kesederhanaan, efisiensi, dan fleksibilitas untuk mendukung proses pembelajaran digital di lingkungan sekolah.
        </p>
    </div>
</section>
@endsection
