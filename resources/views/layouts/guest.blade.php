<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('logo.png') }}" type="image/x-icon">
    <title>{{ config('app.name', 'ReAgro') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <wireui:scripts />
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
     @wireUiScripts
</head>

<body class="font-sans antialiased text-gray-900 dark dark:text-gray-300">
  <x-dialog />


    <div class="flex flex-col items-center min-h-screen pt-6 bg-gray-100 sm:justify-center sm:pt-0 dark:bg-gray-900">
        <div>
            <a href="/" wire:navigate>
                <div class="flex justify-center">
                    <div class='flex items-center justify-center w-24 h-24 mt-2'>
                        <img class='object-cover w-full h-full rounded-md' src="{{ asset('logo.png') }}" alt="sheesh"
                            title="sheesh" />
                    </div>
                </div>
            </a>
        </div>

        <div
            class="w-full px-6 py-4 mt-6 overflow-hidden bg-white shadow-md sm:max-w-md dark:bg-gray-800 sm:rounded-lg">

            {{ $slot }}
        </div>
    </div>
</body>

</html>
