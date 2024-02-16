<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Início') }}
        </h2>
    </x-slot>

   <div class="py-12">
        <div class="px-4 mx-auto sm:px-6 max-w-7xl lg:px-8">
            <div class="overflow-hidden bg-white border rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 bg-white rounded-lg shadow-lg dark:bg-gray-800">
                    <div class="flex items-center">
                        <div>
                            <p class="text-lg font-medium leading-6 text-gray-900 dark:text-gray-300">welcome</p>
                        </div>
                    </div>
                    <div class="mt-6">
                        <p class="text-sm leading-9 text-gray-900 dark:text-gray-300">Aqui virá um texto descritivo sobre
                            o
                            marketplace e suas funcionalidadesAqui virá um texto descritivo sobre o marketplace e suas
                            funcionalidadesAqui virá um texto descritivo sobre o marketplace e suas funcionalidadesAqui
                            virá um
                            texto descritivo sobre o marketplace e suas funcionalidadesAqui virá um texto descritivo
                            sobre o
                            marketplace e suas funcionalidadesAqui virá um texto descritivo sobre o marketplace e suas
                            funcionalidadesAqui virá um texto descritivo sobre o marketplace e suas funcionalidadesAqui
                            virá um
                            texto descritivo sobre o marketplace e suas funcionalidadesAqui virá um texto descritivo
                            sobre o
                            marketplace e suas funcionalidadesAqui virá um texto descritivo sobre o marketplace e suas
                            funcionalidades
                        </p>
                    </div>

                </div>
            </div>
            <main class="flex flex-col items-center justify-center gap-4 mt-4 sm:justify-start sm:flex-row dark:text-gray-300">
               <div class='w-full px-8 py-12 bg-white border border-gray-200 rounded-md shadow-md dark:bg-gray-800 dark:border-gray-700 sm:w-96'>
                    <span><svg width="140" height="140" viewBox="0 0 140 140" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_4014_33508)">
                                <circle cx="70" cy="70" r="69" fill="lightgray" stroke="#cbd5e1"
                                    stroke-width="2" />
                                <rect x="42.7419" y="40.4346" width="57.9224" height="57.9224" stroke="#14b8a6" />
                                <path
                                    d="M94.4146 62.5949C103.778 62.5949 111.369 55.004 111.369 45.6402C111.369 36.2764 103.778 28.6855 94.4146 28.6855C85.0508 28.6855 77.46 36.2764 77.46 45.6402C77.46 55.004 85.0508 62.5949 94.4146 62.5949Z"
                                    fill="#0C0C0C" />
                                <path
                                    d="M70 82.9412C72.233 78.3681 75.7056 74.514 80.0221 71.8181C84.3386 69.1222 89.3255 67.6929 94.4147 67.6929C99.5039 67.6929 104.491 69.1222 108.807 71.8181C113.124 74.514 116.596 78.3681 118.829 82.9412"
                                    fill="#0C0C0C" />
                                <path
                                    d="M45.5853 84.3258C54.9491 84.3258 62.54 76.735 62.54 67.3712C62.54 58.0074 54.9491 50.4165 45.5853 50.4165C36.2215 50.4165 28.6306 58.0074 28.6306 67.3712C28.6306 76.735 36.2215 84.3258 45.5853 84.3258Z"
                                    fill="#14b8a6" stroke="#14b8a6" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path
                                    d="M21.1707 104.672C23.4037 100.099 26.8762 96.245 31.1928 93.5491C35.5093 90.8532 40.4962 89.4238 45.5854 89.4238C50.6746 89.4238 55.6615 90.8532 59.978 93.5491C64.2945 96.245 67.7671 100.099 70.0001 104.672"
                                    fill="#14b8a6" stroke="#14b8a6" stroke-width="2" stroke-linecap="square"
                                    stroke-linejoin="round" />
                            </g>
                            <defs>
                                <clipPath id="clip0_4014_33508">
                                    <rect width="140" height="140" fill="lightgray" />
                                </clipPath>
                            </defs>
                        </svg></span>
                    <div class='my-3'>
                        <h1 class='text-lg'>Sou um vendedor e desejo publicar um anúncio na plataforma
                        </h1>
                    </div>
                    <x-button class='w-full h-12' wire:navigate rounded href="{{ route('notes.sell-index') }}"  primary icon="shopping-cart" >Quero vender</x-button>
                </div>
                           <div class='w-full px-8 py-12 bg-white border border-gray-200 rounded-md shadow-md dark:bg-gray-800 dark:border-gray-700 sm:w-96'>
                    <span>
                        <svg width="140" height="140" viewBox="0 0 140 140" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_4014_33527)">
                                <circle cx="70" cy="70" r="69" fill="lightgray" stroke="#cbd5e1"
                                    stroke-width="2" />
                                <circle cx="70.0001" cy="60.7476" r="31.8537" stroke="#14b8a6"
                                    stroke-width="1.49398" />
                                <rect x="61.9763" y="96.5801" width="16.0478" height="15.2729" fill="#0C0C0C" />
                                <circle cx="70.0001" cy="60.7479" r="26.6474" fill="#14b8a6" stroke="lightgray"
                                    stroke-width="1.55545" />
                            </g>
                            <defs>
                                <clipPath id="clip0_4014_33527">
                                    <rect width="140" height="140" fill="white" />
                                </clipPath>
                            </defs>
                        </svg></span>

                    <div class='my-3'>
                        <h1 class='text-lg'>Sou um comprador e desejo analizar os anúncios disponíveis</h1>
                    </div>
                    <x-button  class='w-full h-12' href="{{ route('notes.buy-index') }}" wire:navigate sp  primary rounded icon='eye' >Ver anúncios</x-button>
                </div>
            </main>
        </div>
    </div>
</x-app-layout>