<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    {{-- script for dark mode --}}
    <script>
        window.themeSwitcher = function() {
            return {
                switchOn: JSON.parse(localStorage.getItem('isDark')) || false,
                switchTheme() {
                    if (this.switchOn) {
                        document.documentElement.classList.add('dark')
                    } else {
                        document.documentElement.classList.remove('dark')
                    }
                    localStorage.setItem('isDark', this.switchOn)
                }
            }
        }
    </script>
      {{-- script for dark mode --}}
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <wireui:scripts />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body x-data="themeSwitcher()" :class="{ 'dark': switchOn } relative">
        <x-dialog />


    <div class="relative min-h-screen bg-gray-100 dark:bg-gray-900">

        <livewire:layout.navigation />

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white shadow dark:bg-gray-800">
                <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>
            <div class='absolute left-0 flex top-36'>
                <div x-data="window.themeSwitcher()" x-init="switchTheme()" @keydown.window.tab="switchOn = false"
                    class="flex items-center justify-center space-x-2">
                    <input id="thisId" type="checkbox" name="switch" class="hidden" :checked="switchOn">

                    <button x-ref="switchButton" type="button" @click="switchOn = ! switchOn; switchTheme()"
                        :class="switchOn ? 'bg-blue-600' : 'bg-neutral-200'"
                        class="relative inline-flex h-6 py-0.5 ml-4 focus:outline-none rounded-full w-10">
                        <span :class="switchOn ? 'translate-x-[18px]' : 'translate-x-0.5'"
                            class="w-5 h-5 duration-200 ease-in-out bg-white rounded-full shadow-md"></span>
                    </button>

                    <label @click="$refs.switchButton.click(); $refs.switchButton.focus()" :id="$id('switch')"
                        :class="{ 'text-blue-600': switchOn, 'text-gray-400': !switchOn }" class="text-sm select-none">
                        Modo escuro
                    </label>
                </div>
            </div>
            {{ $slot }}
        </main>
    </div>
</body>

</html>
