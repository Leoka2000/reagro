<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ReAgro</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <wireui:scripts />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased dark">
  <x-dialog />
    <div
        class="relative min-h-screen bg-gray-100 bg-center sm:flex sm:justify-center sm:items-center bg-dots-darker dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
        @if (Route::has('login'))
            <livewire:welcome.navigation />
        @endif

        <div class="mx-auto p-2d sm:px-5 max-w-7xl lg:p-8">
            <div class="flex justify-center">
                <div class='flex items-center justify-center w-24 h-24 mt-2'>
                    <img class='object-cover w-full h-full rounded-md' src="{{ asset('logo.png') }}" alt="sheesh"
                        title="sheesh" />
                </div>
            </div>

            <div class="mt-16">
                <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:gap-8">
                    <a href="{{ route('dashboard') }}"
                        class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:stroke-teal-500">
                        <div>
                            <div
                                class="flex items-center justify-center w-16 h-16 rounded-full stroke-teal-500 dark:bg-blue-600/20">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="stroke-teal-500" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 0 0-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 0 1-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 0 0 3 15h-.75M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm3 0h.008v.008H18V10.5Zm-12 0h.008v.008H6V10.5Z" />
                                </svg>

                            </div>

                            <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">ReAgro Marketplace</h2>

                            <p class="mt-4 text-sm leading-relaxed text-gray-500 dark:text-gray-400">
                                Texto exemplo Texto exemplo Texto exemplo Texto exemplo Texto exemplo Texto exemplo
                                Texto exemplo Texto exemplo Texto exemplo Texto exemplo Texto exemplo Texto exemplo
                                Texto exemplo Texto exemplo Texto exemplo Texto exemplo
                            </p>
                        </div>

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            class="self-center w-6 h-6 mx-6 shrink-0 stroke-teal-500">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                        </svg>
                    </a>

                    <a href="https://nuntecnologia.com.br/" target=_blank
                        class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                        <div>
                            <div
                                class="flex items-center justify-center w-16 h-16 rounded-full bg-red-50 dark:bg-blue-600/20">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="stroke-teal-500" class="w-6 h-6 stroke-teal-500">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 21a9.004 9.004 0 0 0 8.716-6.747M12 21a9.004 9.004 0 0 1-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 0 1 7.843 4.582M12 3a8.997 8.997 0 0 0-7.843 4.582m15.686 0A11.953 11.953 0 0 1 12 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0 1 21 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0 1 12 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 0 1 3 12c0-1.605.42-3.113 1.157-4.418" />
                                </svg>

                            </div>

                            <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">Nun Website</h2>

                            <p class="mt-4 text-sm leading-relaxed text-gray-500 dark:text-gray-400">
                                Acesse o website da Nun Tecnologia SustentávelAcesse o website da Nun Tecnologia
                                SustentávelAcesse o website da Nun Tecnologia SustentávelAcesse o website da Nun
                                Tecnologia SustentávelAcesse o website da Nun Tecnologia SustentávelAcesse o website da
                                Nun Tecnologia SustentávelAcesse o website da Nun Tecnologia Sustentável
                            </p>
                        </div>

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            class="self-center w-6 h-6 mx-6 shrink-0 stroke-teal-500">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                        </svg>
                    </a>


                </div>
            </div>

            <div class="flex justify-center px-0 mt-16 sm:items-center sm:justify-between">
                <div class="text-sm text-center text-gray-500 dark:text-gray-400 sm:text-start">
                    <div class="flex items-center gap-4">
                        <a href="https://www.linkedin.com/in/leoreus/"
                            class="inline-flex items-center group hover:text-gray-700 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5"
                                class="w-5 h-5 -mt-px me-1 stroke-gray-400 dark:stroke-gray-600 group-hover:stroke-gray-600 dark:group-hover:stroke-gray-400">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                            </svg>
                            Desenvolvido por Leo Reus
                        </a>
                    </div>
                </div>

                <div class="text-sm text-center text-gray-500 ms-4 dark:text-gray-400 sm:text-end sm:ms-0">
                    Nun Marketplace versão alpha 1.1
                </div>
            </div>
        </div>
    </div>
</body>

</html>