<?php

use Livewire\Volt\Component;
use Livewire\Attributes\Layout;
use App\Models\Order;
use App\Models\Note;
use App\Models\User;
use WireUi\Traits\Actions;
use App\Http\Controllers\NoteController;

new #[Layout('layouts.app')] class extends Component {}; ?>

<div>

    <x-app-layout>

        @if ($showImageModal)
            <x-modal wire:model.defer="showImageModal">
                <x-card title="Consent Terms">
                    <p class="text-gray-600">
                        Lorem Ipsum...
                    </p>

                    <x-slot name="footer">
                        <div class="flex justify-end gap-x-4">
                            <x-button flat label="Cancel" x-on:click="close" />
                            <x-button primary label="I Agree" />
                        </div>
                    </x-slot>
                </x-card>
            </x-modal>
        @endif
 
        <div class='flex px-3 py-12 sm:px-10 lg:pr-3 lg:pl-20 xl:pr-20 xl:pl-44'>
            
            <x-slot name="header">
                <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                    {{ $note->product_name }}

                </h2>
            </x-slot>

<div>
 <x-button icon="arrow-left" class="mb-8" href="{{ route('dashboard') }}"> Voltar</x-button>
            <div>
                <div class='flex flex-col items-center justify-center w-full gap-4 xl:items-start xl:flex-row'>

                    <div class='flex justify-center w-full gap-3 md:w-3/4'>
                        <x-card class='w-full max-w-3xl '>

                            <div class=''>
                                <div class='pb-4'>
                                    <p class='text-2xl font-bold text-gray-950 dark:text-gray-200'>
                                        {{ $note->product_name }}
                                    <p>
                                </div>
                                <div>
                                    <div class=pb-4>
                                        </p class='text-gray-900 dark:text-gray-300'>{{ $note->product_quantity }}
                                        BRL / {{ $note->price_perunit }} </p>
                                    </div>
                                </div>
                                <ul class='flex flex-col gap-2 mb-4 text-sm sm:text-base'>
                                    <li class='flex items-center w-full text-xs text-gray-500 dark:text-gray-400'>
                                        <x-icon name="check" green xl class="w-4 h-4" /> {{ $note->address_city }}
                                    </li>
                                     <li class='flex items-center w-full text-xs text-gray-500 dark:text-gray-400'>
                                        <x-icon name="check" green xl class="w-4 h-4" /> Frete gratis
                                    </li>
                                    <li class='flex items-center text-xs text-gray-500 dark:text-gray-400'>
                                        <x-icon name="check" green xl class="w-4 h-4" /> Disponível
                                    </li>
                                </ul>
                                <div class='grid grid-cols-1 gap-3 md:grid-cols-2 lg:grid-cols-3'>
                                    @foreach (explode(',', $note->image) as $imageLink)
                                        <div
                                            class='relative flex flex-col items-center border-gray-300 rounded-md dark:border-gray-700'>
                                            <div class='absolute left-14 bottom-16'>
                                                <!-- <x-button.circle sm primary label="+" /> -->
                                            </div>
                                            <img class='object-cover transition border border-gray-200 rounded-md sm:p-8 md:p-0 dark:border-gray-700 dark md:w-72 md:h-44'
                                                src="{{ asset('storage/' . $imageLink) }}" alt="Image"
                                                title="Image" />
                                        </div>
                                    @endforeach
                                </div>


                                <div class='flex flex-col'>
                                    <div>
                                        <div class='text-sm text-gray-500 break-words dark:text-gray-400'>

                                        </div>
                                    </div>
                                </div>
                        </x-card>
                    </div>
                </div>
                {{-- 
                    PAYMENT
                     --}}{{-- 
                    PAYMENT
                     --}}{{-- 
                    PAYMENT
                     --}}{{-- 
                    PAYMENT
                     --}}
                <main class='flex justify-center w-full h-full md:w-3/4'>
                    <x-card class='h-full gap-6 dark:border-gray-700 dark:bg-gray-800'>
                        <div>
                            <div class='mb-6'>
                                <p class='mb-2 text-2xl font-bold text-gray-900 dark:text-gray-200'>Comprar um produto</p>
                                <p class='text-lg text-gray-800 dark:text-gray-200'>{{ $note->product_name }}</p>
                            </div>
                            <div class='flex items-center justify-start gap-2 '>
                                <p class='text-lg text-gray-500 dark:text-gray-400'>Tipo:</p>
                                <p class='text-lg font-semibold text-gray-800 dark:text-gray-200'>
                                    {{ $note->residue_type }}
                                </p>
                            </div>

                        </div>
                        <div class='flex flex-col xl:w-96'>
                            <div>
                                <header class='mt-10 mb-5'>
                                    <p class='text-base font-bold text-gray-900 dark:text-gray-200'>Especificações
                                        do
                                        produto
                                    </p>
                                </header>
                            </div>
                            <div class='flex items-center justify-start w-full gap-1 mb-3 text-sm'>
                                <span> <x-icon name="user" class="w-5 h-5" solid
                                        class='w-6 h-6 text-gray-800 rounded-full dark:text-gray-300 ' />
                                </span>
                                <div class='font-thin text-left text-gray-500 dark:text-gray-400'>
                                    Publicado por
                                    <strong class='text-gray-800 dark:text-gray-300'>{{ $note->company_name }}<strong>
                                </div>
                            </div>
                            <div class='flex items-center justify-start w-full gap-1 mb-3 text-sm'>

                                <span> <x-icon name="calendar" class="w-5 h-5" solid
                                        class='w-6 h-6 text-gray-800 dark:text-gray-300' /> </span>
                                <div class='font-thin text-gray-500 dark:text-gray-400'>
                                    Postado em:
                                    <strong class='text-gray-800 dark:text-gray-300'>
                                        {{ $note->created_at }}<strong>
                                </div>
                            </div>
                            <div class='flex items-center justify-start w-full gap-1 mb-3 text-sm'>
                                <span> <x-icon name="beaker" class="w-5 h-5" solid
                                        class='w-6 h-6 text-gray-800 rounded-full dark:text-gray-300 ' />
                                </span>
                                <div class='font-thin text-left text-gray-500 dark:text-gray-400'>
                                    Nome:
                                    <strong class='text-gray-800 dark:text-gray-300'>{{ $note->product_name }}<strong>
                                </div>
                            </div>
                            <div class='flex items-center justify-start w-full gap-1 mb-3 text-sm'>
                                <span><x-icon name="calculator"
                                        class='w-6 h-6 text-gray-800 rounded-full dark:text-gray-300' />


                                </span>
                                <div class='font-thin text-gray-500 dark:text-gray-400'>
                                    Quantidade
                                    <strong class='text-gray-800 dark:text-gray-300'>{{ $note->product_quantity }}
                                        {{ $note->price_perunit }}
                                        <strong>
                                </div>
                            </div>
                            <div class='flex items-center justify-start w-full gap-1 mb-3 text-sm'>
                                <span><x-icon name="currency-dollar"
                                        class='w-6 h-6 text-gray-800 rounded-full dark:text-gray-300' />
                                </span>
                                <div class='font-thin text-gray-500 dark:text-gray-400'>
                                    Preço total:
                                    <strong class='text-green-600 dark:text-green-400'> R$ {{ $note->price }}
                                        <strong>
                                </div>
                            </div>
                            <div class='w-full'>
                                <div class='justify-start w-full gap-4 mb-1 text-sm'>
                                    <x-badge icon="check" class='w-auto h-7 ' outline rounded md positive
                                        label=" {{ $note->company_state }}" />
                                    <x-badge icon="check" class='w-auto h-7 ' outline rounded md positive
                                        label=" {{ $note->address_city }}" />
                                </div>
                                <x-badge icon="check" class='w-auto h-7 ' outline rounded md positive
                                    label=" CEP: {{ $note->postal_code }}" />
                                <x-badge icon="check" class='w-auto h-7 ' outline rounded md positive
                                    label="Frete: (null)" />
                            </div>

                            <div
                                class='flex items-center justify-start pt-5 pb-2 text-xs text-gray-500 font-extralight dark:text-gray-400'>
                                <a class='flex flex-col items-center mx-3'
                                    href="{{ 'mailto:' . $note->company_email }}">
                                    <x-button.circle md icon="inbox"></x-button.circle>
                                    <p class='mt-1'>Enviar email</p>
                                </a class='w-full mx-3' href="{{ 'mailto:' . $note->company_email }}">
                                <a class='flex flex-col items-center' href="{{ 'mailto:' . $note->company_email }}">
                                    <x-button.circle md icon="phone"></x-button.circle>
                                    <p class='mt-1'>       {{ $note->company_phone }}</p>
                                </a class='w-full ' href="{{ 'mailto:' . $note->company_email }}">
                            </div>
                        </div>


                        <x-slot name="footer" class="flex w-full h-full">
                            <form action="{{ route('checkout', ['note' => $note->id]) }}" method="POST"
                                class='flex flex-col items-center justify-center w-full gap-3'>
                                @csrf

                                <x-button sm primary type='submit' rounded spinner icon='shopping-cart'
                                    class='w-full h-12 px-6' label='Comprar' />
                            </form>

                        </x-slot>
                    </x-card>

                </main>
            </div>
            <div class='mt-5'>
                <x-card title="Descrição do produto">
                    <p class='mb-8 text-sm text-gray-500 break-words dark:text-gray-400'>
                        {{ $note->description }}
                    </p>

                    <div>

                        <div class="flex flex-col w-full h-full">
                            <div class='flex items-center justify-start gap-1 mb-4'>

                                <x-icon name="user" class="w-5 h-5" />
                                <p class='text-gray-700 break-words text-md dark:text-gray-400'>
                                    Informações do vendedor:
                                </p>
                            </div>
                            <p class='mb-2 text-sm text-gray-500 break-words dark:text-gray-400'>
                                Somos uma empresa de cométicos para criancas Somos
                                uma
                                empresa de cométicos para criancas Somos uma empresa
                                de
                                cométicos para criancas Somos uma empresa de
                                cométicos para
                                criancas Somos uma empresa de cométicos para
                                criancas Somos
                                uma empresa de cométicos para criancas Somos uma
                                empresa de
                                cométicos para criancas Somos uma empresa de
                                cométicos para
                                criancas Somos uma empresa de cométicos para
                                criancas Somos
                                uma empresa de cométicos para criancas Somos uma
                                empresa de
                                cométicos para criancas Somos uma empresa de
                                cométicos para
                                criancas Somos uma empresa de cométicos para
                                criancas Somos
                                uma empresa de cométicos para criancas Somos uma
                                empresa de
                                cométicos para criancas Somos uma empresa de
                                cométicos para
                                criancas Somos uma empresa de cométicos para
                                criancas Somos
                                uma empresa de cométicos para criancas Somos uma
                                empresa de
                                cométicos para criancas Somos uma empresa de
                                cométicos para
                                criancas Somos uma empresa de cométicos para
                                criancas Somos
                                uma empresa de cométicos para criancas Somos uma
                                empresa de
                                cométicos para criancas

                            </p>
                        </div>


                        
                        <p>
                </x-card>
            </div>

        </div>
</div>
</x-app-layout>
</div>
