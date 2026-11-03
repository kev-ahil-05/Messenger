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

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center p-4 sm:p-6 bg-slate-50 dark:bg-neutral-950">
    <!-- Logo Space (Optional) -->
    <div class="mb-4">
        {{-- Maaari mong ilagay ang logo mo rito kung gusto mo --}}
    </div>

    
    <div class="w-full sm:max-w-md bg-white dark:bg-neutral-900 border border-slate-200 dark:border-neutral-800 rounded-sm shadow-xl p-6 sm:p-8 transition-all overflow-hidden">
        {{ $slot }}
    </div>
</div>

    </body>
</html>
