<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? config('app.name') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f7fa;
            color: #333;
        }
        nav {
            background: linear-gradient(90deg, #1f5f5b, #236e6a);
        }
        nav a.navbar-brand, nav a.nav-link {
            color: #eaf6f6 !important;
            font-weight: 500;
        }
        nav a.nav-link:hover {
            color: #fff !important;
        }
        .hero {
            padding: 100px 0;
            background: linear-gradient(180deg, #e7f3f2, #ffffff);
            text-align: center;
        }
        .hero h1 {
            font-size: 2.5rem;
            font-weight: 700;
            color: #1f5f5b;
        }
        .hero p {
            color: #555;
            max-width: 600px;
            margin: 15px auto 25px;
        }
        .btn-primary {
            background-color: #1f5f5b;
            border: none;
        }
        .btn-primary:hover {
            background-color: #236e6a;
        }
        footer {
            background-color: #f1f3f4;
            color: #555;
            text-align: center;
            padding: 15px;
            margin-top: 50px;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">{{ config('app.name') }}</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="#fitur">Fitur</a></li>
                    <li class="nav-item"><a class="nav-link" href="#tentang">Tentang</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Masuk</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Konten -->
    <main>
        @yield('content')
    </main>

    <footer>
        <span>&copy; {{ date('Y') }} JustLMS — Sistem Pembelajaran Sederhana</span>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
