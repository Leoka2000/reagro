<?php

use Livewire\Volt\Component;
use App\Models\Note;
use App\Models\User;
use WireUi\Traits\Actions;


new class extends Component {
    use Actions;

    public $showModal = false;
    public $noteToDelete;

    public function openModal($noteId)
    {
        $this->noteToDelete = Note::find($noteId);
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
    }

    public function delete($noteId)
    {
        $note = Note::where('id', $noteId)->first();
        $this->authorize('delete', $note);
        $note->delete();
        $this->closeModal();

        $this->dialog()->show([
            'icon' => 'success',
            'title' => 'Anúncio deletado!',
        ]);
    }

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
            <p class="text-xl font-bold">Nenhum anúncio disponível</p>
            <p class="text-sm">Vamos criar o seu primeiro anúncio?</p>
            <x-button primary icon="plus" class="mt-6" href="{{ route('notes.sell-index') }}" wire:navigate>Criar um anúncio</x-button>
        </div>
    @else
        <div>
        <livewire:teste />

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
                                    {{--  
                                    <div class='flex items-center justify-center md:max-w-80 md:max-h-80'>
                                        <img class='object-cover w-full h-full rounded-md bg-slate-300'
                                            src="{{ asset('storage/' . $note->image) }}" alt="sheesh"
                                            title="sheesh" />
                                    </div>
                                    --}}
                                     <div class='flex items-center justify-center md:max-w-80 md:max-h-80'>
                                        <img class='object-cover w-full h-full rounded-md bg-slate-300'
                                            src="{{ $note->image }}" alt="sheesh"
                                            title="sheesh" />
                                    </div>
                                </div>
                            </header>
                            <div class='mt-5'>
                                <div class='pb-4'>
                                    <p class='text-sm font-bold break-words text-gray-950 dark:text-gray-200'>{{ Str::limit($note->description, 120) }}
                                    <p>
                                </div>
                                <div>
                                    <div class=pb-4>
                                        </p class='text-gray-900 dark:text-gray-300'> {{$note->product_quantity}} / {{ $note->price_perunit }}  </p>
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
                            <div class='flex items-center justify-end gap-2'>
                                @can('update', $note)
                                    <!-- Update button -->
                                    <x-button.circle href="{{ route('notes.edit', $note) }}" sm green outline
                                        icon="pencil-alt"></x-button.circle>
                                @endcan


                                @can('delete', $note)
                                    <x-button.circle sm icon="trash" red outline
                                        wire:click="openModal('{{ $note->id }}')"></x-button.circle>
                                @endcan
                            </div>
                            <div class='w-full mt-5'>
                                <x-button rounded sm class='w-full h-12' href="{{ route('notes.view', $note) }}"
                                    icon='shopping-cart' primary spinner label='Quero comprar' />
                            </div>
                        </x-card>
                        @if ($showModal)
                            <x-modal wire:model="showModal" class="" title="Simple Modal">
                                <div
                                    class='flex flex-col h-auto gap-2 p-12 bg-gray-900 dark:text-gray-300 w-96 rounded-xl '>
                                    <p class='mb-4 text-gray-300 bg-gray-900 sm:text-base'>Tem certeza que dejesas
                                        deletar o anúncio?</p>
                                    <x-button primary icon='arrow-left' wire:click="closeModal">Sair</x-button>
                                    <x-button flat negative outline icon='trash'
                                        wire:click="delete('{{ $noteToDelete->id }}')">Continuar</x-button>
                                </div>
                            </x-modal>
                        @endif
                    @endforeach
                </div>
            </main>
    @endif
</div>
