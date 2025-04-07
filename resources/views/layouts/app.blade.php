<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sarlavha')</title>
    <!-- Stil jadvallari -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @stack('styles')
</head>
<body>
    <!-- Navigatsiya paneli -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Brend</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">Bosh sahifa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('passport.index') }}">Passportlar</a>
                </li>
                <!-- Qo‘shimcha menyu elementlari -->
            </ul>
        </div>
    </div>
</nav>

    <!-- Asosiy kontent -->
    <div class="container">
        @yield('content')
    </div>

    <!-- Skriptlar -->
    <script src="{{ asset('js/app.js') }}"></script>
    @stack('scripts')
</body>
</html>