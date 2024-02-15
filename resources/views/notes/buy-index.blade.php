<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Quero comprar') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="px-3 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <x-button icon="arrow-left" class="mb-8" href="{{ route('dashboard') }}"> Voltar</x-button>
            <div class="overflow-hidden bg-white rounded shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <livewire:notes.form-buy lazy />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
