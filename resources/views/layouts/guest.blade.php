<!DOCTYPE html>
<html class="scroll-smooth" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/favicon.ico') }}">
    <link rel="shortcut icon" sizes="192x192" href="{{ asset('assets/favicon.ico') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @livewireStyles
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@500&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/1b1b574e94.js" crossorigin="anonymous"></script>
    @stack('styles')

    <!-- Scripts -->
    @wireUiScripts
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body style="font-family: Sora">
    {{-- <x-notifications position="top-right" /> --}}
    <x-dialog blur="md"/>
    <div class="">
        {{ $slot }}
    </div>
</body>
@stack('modals')

@livewireScripts

@stack('script')
<script src="{{ asset('flowbite/dist/flowbite.min.js') }}"></script>

{{-- <script src="{{ asset('js/main.js')}}"></script> --}}

</html>
