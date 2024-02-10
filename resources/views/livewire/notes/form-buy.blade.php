<?php

use Livewire\Volt\Component;
use App\Models\Note;
use App\Models\User;

new class extends Component {
    public function with(): array
    {
        return [
            'notes' => Note::all(),
        ];
    }
    public function placeholder()
    {
        return <<<'HTML'
                <div role="status">
            <svg aria-hidden="true" class="w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
            </svg>
            <span class="sr-only">Loading...</span>
        </div>
        HTML;
    }
}; ?>

<div>
    @if ($notes->isEmpty())
        <div class="text-center dark:text-gray-300">
            <p class="text-xl font-bold">No notes yet</p>
            <p class="text-sm">Let's create your first note to send.</p>
            <x-button primary icon-right="plus" class="mt-6" href="{{ route('notes.create') }}" wire:navigate>Create
                note</x-button>
        </div>
    @else
        <div>

            <header class='flex items-center justify-start gap-1 dark:text-gray-300'>
                <div class='flex justify-center w-full gap-3 gp-2 dm:w-1/4'>
                    <x-card title="Filtro">
                        <x-slot name="action">
                            <button class="rounded-full focus:outline-none focus:ring-2 focus:ring-indigo-600">
                                <x-icon name="dots-vertical" class="w-4 h-4 text-gray-500" />
                            </button>
                        </x-slot>

                        <x-native-select icon='filter' id='select' name='select' label="Select Status">
                            <option value='Sólido'>Sólido</option>
                            <option value='Líquido'>Líquido</option>
                            <option value='Semisólido'>Semisólido</option>
                        </x-native-select>
                    </x-card>
                    <x-card title="Filtro">
                        <x-slot name="action">
                            <button class="rounded-full focus:outline-none focus:ring-2 focus:ring-indigo-600">
                                <x-icon name="dots-vertical" class="w-4 h-4 text-gray-500" />
                            </button>
                        </x-slot>

                        <x-native-select icon='filter' id='select' name='select'
                            label="Filtre por data do anűncio">
                            <option value='Sólido'>Uma Semana atrás</option>
                            <option value='Líquido'>Um mes atrás</option>

                        </x-native-select>
                    </x-card>

            </header>
            <main class='my-12'>
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach ($notes as $note)
                        <x-card class='my-2 ' wire:key='{{ $note->id }}'>
                            <header>
                                <div class="flex justify-center">
                                    <div class='flex items-center justify-center md:w-full md:h-full'>
                                        <img class='object-cover w-full h-full rounded-md bg-slate-300'
                                            src="{{ asset('logo.png') }}" alt="sheesh" title="sheesh" />
                                    </div>
                                </div>
                            </header>
                            <div class='mt-5'>
                                <div class='pb-4'>
                                    <p class='text-sm font-bold text-gray-950 dark:text-gray-200'>Residuo quimico para
                                        gricultura fazendeira para feertilizar diferentrs tipos de plantass
                                    <p>
                                </div>
                                <div>
                                    <div class=pb-4>
                                        </p class='text-gray-900 dark:text-gray-300'>$74.95</p>
                                    </div>
                                </div>
                                <ul class='flex flex-col gap-2 mb-4 text-sm sm:text-base'>
                                    <li class='flex items-center w-full text-xs text-gray-500 dark:text-gray-400'>
                                        <x-icon name="check" green xl class="w-4 h-4" /> Frete gratis
                                    </li>
                                    <li class='flex items-center text-xs text-gray-500 dark:text-gray-400'>
                                        <x-icon name="check" green xl class="w-4 h-4" /> Disponível
                                    </li>
                                </ul>
                            </div>
                            <div class='flex items-center justify-end gap-1'>

                                <x-button.circle  sm icon="pencil-alt"></x-button.circle>
                                <x-button.circle href="{{ route('notes.view', $note) }}" sm icon="eye" outline></x-button.circle>
                                <x-button.circle sm icon="trash" outline></x-button.circle>
                                </div>
                                <div class='w-full mt-5'> 
                                <x-button sm class='w-full h-12' icon=shopping-cart primary spinner label='Quero comprar' />
                                </div>
                        </x-card>
                    @endforeach
                </div>
            </main>
    @endif
</div>




{{--  <div class='flex items-center justify-center max-width-96'>
        <div>
        
    
        </div>
<div class='mt-5'>
        <x-badge.circle for='select' positive outline md icon="filter" />
        </div> --}}
