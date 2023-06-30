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
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/1b1b574e94.js" crossorigin="anonymous"></script>
    <!-- Scripts -->
    @wireUiScripts
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Styles -->
    @livewireStyles

    @stack('styles')
</head>

<body class="font-sans antialiased">
    <x-banner />
    <x-notifications />
    <div class="min-h-scree">
        <x-menu-doctor-nav/>
        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif
        <!-- Page Content -->
        <main>
            <x-flash-messages></x-flash-messages>
            {{ $slot }}
        </main>
    </div>
    @stack('modals')
    @livewireScripts
    @stack('script')
    <script src="{{ asset('flowbite/dist/flowbite.min.js') }}"></script>
</body>

</html>
