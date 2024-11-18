@use('\Illuminate\Support\Facades\Auth')
<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MoodMate</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand ms-4" href="/">
            <img src="{{ asset('resource/logo.svg') }}" alt="Logo" style="height:40px;">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto me-4">
                <li class="nav-item me-4">
                    <a class="nav-link" href="/user/emotiontrack">Emotion Track</a>
                </li>
                <li class="nav-item me-4">
                    <a class="nav-link" href="/user/boc">Breath of Calm</a>
                </li>
                <li class="nav-item me-4">
                    <a class="nav-link" href="/user/mindchat">Mind Chat</a>
                </li>
                <li class="nav-item me-4">
                    <a class="nav-link" href="/user/happyquest">Happy Quest</a>
                </li>
            </ul>
            @auth
                <div class="navbar-buttons me-4">
                    <a href="{{ route('profile.form') }}" class="btn btn-primary rounded-pill me-3" style="padding: 1px 8px;background-color: #A594F9; color: black;">{{ Auth::user()->name }}</a>
                </div>
            @else
                <div class="navbar-buttons me-4">
                    <a href="{{ route('register.form') }}" class="btn btn-primary rounded-pill me-3" style="padding: 1px 8px;background-color: #A594F9; color: black;">Register</a>
                    <a href="{{ route('login.form') }}" class="btn btn-dark rounded-pill me-3" style="padding: 1px 15px;">Login</a>
                </div>
            @endauth
           
        </div>
    </nav>

    <!-- Content -->
    <div>
        @yield('content')
    </div>

    <!-- Footer -->
    <footer class="text-center py-4" style="background-color: black">
        <div class="d-flex justify-content-center">
            <h2 style="color: white"><span class="highlight">Mood</span>Mate</h2>
            <img src="{{ asset('resource/logo.svg') }}" alt="Logo" style="height:40px;">
        </div>
        <div>
            <p class="font-weight-light" style="color: #F5F7F8">MoodMate is a comprehensive solution designed to support mental health and help individuals <br> with everyday emotional stress.</br> </p>
        </div>
        <div class="d-flex justify-content-center">
            <div class="me-3">
                <img src="{{ asset('resource/ic_linkedin.svg') }}" alt="">
            </div>
            <div class="me-3">
                <img src="{{ asset('resource/ic_ig.svg') }}" alt="">
            </div>
            <div class="me-3">
                <img src="{{ asset('resource/ic_wa.svg') }}" alt="">
            </div>
        </div>
        
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    @stack('scripts')
</body>
</html>
