<?php

use Livewire\Volt\Component;
use WireUi\Traits\Actions;

new class extends Component {
    use Actions;
}; ?>

<div>

    <x-app-layout>
        <div class='flex items-center justify-center mx-96 sm:p-12'>
            <x-card title="Compra concluída.">
                <x-slot name="action">
                    <x-badge positive lg rounded icon="check" class='w-6 h-6 ' />
                </x-slot>
                <p class='mb-12'>
                Parabéns pela compra!
                <p>
                <div class='w-full'>
                <x-button icon="arrow-left" rounded href="{{ route('dashboard') }}" positive class="w-full"> Voltar</x-button>
                </div>
            </x-card>
    </x-app-layout>
</div>
