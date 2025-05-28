<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang di ADMAS</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
        <div class="container">
            <a class="navbar-brand" href="/">ADMAS</a>
        </div>
    </nav>
    <div class="container d-flex flex-column align-items-center justify-content-center" style="min-height:70vh">
        <div class="card shadow p-4" style="max-width: 420px; width:100%">
            <h1 class="mb-3 text-center">Selamat Datang di <span class="text-primary">ADMAS</span></h1>
            <p class="text-center mb-4">Aplikasi Pengaduan Masyarakat berbasis web.</p>
            <a href="{{ route('login') }}" class="btn btn-primary w-100">Login atau Register Masyarakat</a>
        </div>
    </div>
    <footer class="text-center py-3 text-muted small">
        &copy; {{ date('Y') }} ADMAS
    </footer>
</body>
</html>
