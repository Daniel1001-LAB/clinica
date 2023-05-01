<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @livewireStyles
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    <script src="https://kit.fontawesome.com/1b1b574e94.js" crossorigin="anonymous"></script>

    @stack('styles')
    <!-- Scripts -->
    @vite(['resources/js/app.js'])
</head>

<body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="100">
    <header class="header_wrapper">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="#home">
                    <img width="50" decoding="async" src="{{ asset('assets/onlyLogov2.svg') }}" class="img-fluid">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <!-- <span class="navbar-toggler-icon"></span> -->
                    <i class="fas fa-stream navbar-toggler-icon"></i>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav  menu-navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link text-capitalize active" aria-current="page" href="#home">{{ __('home') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-capitalize" href="#getstarted">{{ __('get started') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-capitalize" href="#services">{{ __('services') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-capitalize" href="#specialties">{{ __('specialties') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-capitalize" href="#doctors">{{ __('doctors') }}</a>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link text-capitalize" href="#testimonial">{{ __('Testimonial') }}</a>
                        </li> --}}
                        {{-- <li class="nav-item">
                            <a class="nav-link text-capitalize" href="#blog">{{ __('Blog') }}</a>
                        </li> --}}
                        <li class="nav-item mt-3 mt-lg-0">
                            <a class="nav-link text-capitalize" href="#contact">{{ __('contact') }}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div class="">
        {{ $slot }}
    </div>
</body>
@stack('modals')

@livewireScripts

@stack('script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
<script src="{{ asset('js/main.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous">
    </script>


</html>
