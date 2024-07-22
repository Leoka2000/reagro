<div class="z-10 p-4  sm:fixed bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-gray-900 dark:ring-1 dark:ring-inset dark:ring-white/5  shadow-gray-500/20 dark:shadow-none transition-all duration-250 focus:outline focus:outline-2 focus:stroke-teal-500 flex shadow  items-center  justify-between w-full sm:top-0 sm:right-0 text-end">
    <div class="flex flex-col justify-center items-center">
        <a wire:click='redirectHome' class='cursor-pointer'>
            <div class='flex items-center justify-center w-16 h-16'>
                <img class='object-cover w-full h-full rounded-md' src="{{ asset('logo.png') }}" alt="sheesh" title="sheesh" />
            </div>
        </a>
     
    </div>
    <div class="flex justify-center gap-2 items-center">
        @auth
        <x-button href="{{ url('/dashboard') }}" wire:navigate rounded right-icon="arrow-right" primary label="Entrar" />

        @else
        <x-button   href="{{ route('login') }}" rounded right-icon="arrow-right" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm " wire:navigate label="Login" />

        @if (Route::has('register'))
        <x-button href="{{ route('register') }}" right-icon='user' primary rounded class="font-semibold text-gray-600 ms-4 hover:text-gray-50 dark:text-gray-50 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm " wire:navigate label="Registrar-se" />
        @endif
        @endauth
    </div>
</div>