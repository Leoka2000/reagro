<?php

use Livewire\Volt\Component;

new class extends Component {}; ?>

<div>

    <x-app-layout>
        <div class='flex items-center justify-center mx-96 sm:p-12'>
            <x-card title="Compra cancelada">
                <x-slot name="action">
                    <x-badge negative lg rounded icon="x-circle" class='w-6 h-6 ' />
                </x-slot>
                <p class='mb-12'>
               
                <p>
                <div class='w-full'>
                <x-button icon="arrow-left" rounded href="{{ route('dashboard') }}" negative class="w-full"> Voltar</x-button>
                </div>
            </x-card>
    </x-app-layout>
</div>
