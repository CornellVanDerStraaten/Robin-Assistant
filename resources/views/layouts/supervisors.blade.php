<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        @toastScripts
        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased h-full">
    <livewire:toasts />
    <x-jet-banner />

    <main class="h-full">
        @include('partials.header')
        <div class="flex flex-row h-5/6">
            @include('partials.sidebar')
            <div>
                {{ $slot }}
            </div>
        </div>
    </main>

        @stack('modals')

        @livewireScripts
    </body>
</html>
