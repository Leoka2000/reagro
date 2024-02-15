<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'ReAgro') }}</title>
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


    <!-- Scripts -->
    <wireui:scripts />
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
        <main class="relative">
            <div class='mt-2'>
                <div class='flex items-center justify-between px-3 sm:px-10 md:px-20'>
                    <div x-data="window.themeSwitcher()" x-init="switchTheme()" @keydown.window.tab="switchOn = false"
                        class="flex items-center justify-center space-x-1">
                        <input id="thisId" type="checkbox" name="switch" class="hidden" :checked="switchOn">

                        <button x-ref="switchButton" type="button" @click="switchOn = ! switchOn; switchTheme()"
                            :class="switchOn ? 'bg-green-600' : 'bg-neutral-200'"
                            class="relative inline-flex h-6 py-0.5 ml-4 focus:outline-none rounded-full w-10">
                            <span :class="switchOn ? 'translate-x-[18px]' : 'translate-x-0.5'"
                                class="w-5 h-5 duration-200 ease-in-out bg-white rounded-full shadow-md"></span>
                        </button>
                        <label @click="$refs.switchButton.click(); $refs.switchButton.focus()" :id="$id('switch')"
                            :class="{ 'text-blue-600': switchOn, 'text-gray-500': !switchOn }"
                            class="text-sm select-none">

                        </label>
                        <x-icon name="moon" class="w-5 h-5 text-gray-400" />
                    </div>
                    <div class='flex'>
                        <livewire:email-company.send-contact />
                    </div>
                </div>

            </div>

            {{ $slot }}

        </main>
        <div class="flex justify-center gap-1 p-10 sm:items-center sm:justify-between">
            <div class="text-sm text-center text-gray-400 dark:text-gray-500 sm:text-start">
                <div class="flex items-center gap-4">
                    <a href="https://www.linkedin.com/in/leoreus/" target='_blank'
                        class="inline-flex items-center group hover:text-green-700 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-green-500">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            class="w-5 h-5 -mt-px me-1 stroke-gray-400 dark:stroke-gray-500 group-hover:stroke-gray-500 dark:group-hover:stroke-gray-400">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                        </svg>
                        ReAgro Marketplace - Desenvolvido por Leo Reus
                    </a>
                </div>
            </div>


        </div>

    </div>
</body>

</html>
