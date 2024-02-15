<?php

use Livewire\Volt\Component;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;
use WireUi\Traits\Actions;

new class extends Component {
    use Actions;
    public $showModal = false;
    public $name;
    public $email;
    public $topic;

    public function openModal()
    {
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
    }
    public function submit()
    {
        $validatedData = $this->validate([
            'name' => ['required', 'string', 'min:3'],
            'email' => ['required', 'email'],
            'topic' => ['required', 'string'],
        ]);

        Mail::to('lreusoliveira@gmail.com')->send(new ContactFormMail($validatedData['name'], $validatedData['email'], $validatedData['topic']));

        $this->showModal = false;

        $this->dialog()->show([
            'icon' => 'success',
            'title' => 'Mensagem enviada!',
        ]);
    }
}; ?>

<div>
    <div class='flex flex-col items-center justify-center text-gray-400 dark:text-gray-500'>
        <x-button.circle icon='inbox' sm outline wire:click="openModal" />
        <p class='text-xs'>Contate-nos</p>
    </div>
    @if ($showModal)
        <x-modal wire:model="showModal" class="bg-gray-800 " title="Simple Modal">


            <div
                class='flex flex-col items-center justify-center gap-2 p-5 mb-2 text-gray-300 bg-gray-800 rounded-md dark:bg-gray-800 md:p-12 dark:text-gray-400 '>

                <p class='w-64 mb-5 text-xl font-bold text-center dark:text-gray-300'>
                    Há dúvidas? Conte-nos.
                </p>

                <form class='flex flex-col w-full gap-2' wire:submit.prevent="submit">
                    <!-- Correct order of form inputs -->
                    <label for="name">Nome:</label>
                    <x-input class='text-gray-700 dark:text-gray-400' type="text" id="name"
                        wire:model.defer="name" />
                    <label for="email">Email:</label>
                    <x-input class='text-gray-700 dark:text-gray-400' type="text" id="email"
                        wire:model.defer="email" />

                    <label for="topic">Assunto</label>
                    <x-textarea class='text-gray-700 dark:text-gray-400' type="text" id="topic"
                        wire:model.defer="topic" />

                    <x-button class='mt-5' spinner='save' icon='paper-airplane' primary
                        type="submit">Enviar</x-button>
                    <x-button class='' spinner icon='x-circle' outline red
                        wire:click='closeModal'>Cancelar</x-button>
                </form>

            </div>
        </x-modal>
    @endif
</div>
