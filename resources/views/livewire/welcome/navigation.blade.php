<div class="z-10 p-6 sm:fixed sm:top-0 sm:right-0 text-end">
    @auth
    <x-button href="{{ url('/dashboard') }}" wire:navigate rounded   right-icon="arrow-right" primary label="Dashboard" />
        
    @else
        <a href="{{ route('login') }}" rounded class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500" wire:navigate>Log in</a>

        @if (Route::has('register'))
            <a href="{{ route('register') }}" class="font-semibold text-gray-600 ms-4 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500" wire:navigate>Registro</a>
        @endif
    @endauth
</div>
