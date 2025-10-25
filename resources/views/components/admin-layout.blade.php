<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? config('app.name') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f5f7fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .sidebar {
            height: 100vh;
            background: linear-gradient(180deg, #1f5f5b, #236e6a);
            color: #fff;
            position: fixed;
            top: 0; left: 0;
            width: 240px;
            overflow-y: auto;
        }
        .sidebar a {
            color: #eaf6f6;
            text-decoration: none;
            display: block;
            padding: 10px 15px;
            border-radius: 5px;
            margin: 5px 10px;
        }
        .sidebar a:hover, .sidebar a.active {
            background-color: rgba(255,255,255,0.1);
        }
        .main-content {
            margin-left: 240px;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        header {
            background-color: #ffffff;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            padding: 10px 20px;
        }
        footer {
            background-color: #f1f3f4;
            color: #666;
            text-align: center;
            padding: 10px;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>
    @include('partials.sidebar')

    <div class="main-content">
        @include('partials.header')

        <main class="p-4 flex-grow-1">
            {{ $slot }}
        </main>

        @include('partials.footer')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
