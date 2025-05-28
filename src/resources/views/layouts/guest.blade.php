<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMAS - Login/Register</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
        <div class="container">
            <a class="navbar-brand" href="/">ADMAS</a>
        </div>
    </nav>
    <main class="container d-flex justify-content-center align-items-center" style="min-height:80vh">
        <div class="w-100" style="max-width: 420px">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @yield('content')
        </div>
    </main>
    <footer class="text-center py-3 text-muted small">
        &copy; {{ date('Y') }} ADMAS
    </footer>
</body>
</html>
