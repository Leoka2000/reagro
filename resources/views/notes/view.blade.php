<?php

use function Livewire\Volt\{state};
use App\Models\Order;
use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

?>

<div>
    <x-app-layout>
        <div class='px-3 py-12 sm:px-10 lg:pr-3 lg:pl-20 xl:pr-20 xl:pl-44'>
            <x-slot name="header">
                <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                    Produto -> nome
                </h2>
            </x-slot>
            <header>
                <div class='flex items-center justify-center'>
                    <div class='w-full h-full sm:w-48 sm:h-48'>
                        <div class='flex items-center justify-center w-full h-full p-2 py-8'>
                            <img src="{{ asset('logo.png') }}" alt="profile pic" title="bruuvynsons"
                                class='object-cover w-full h-fullimg rounded-xl' />
                        </div>
                    </div>
                </div>
            </header>
            <div>
                <div>
                    <div class='flex flex-col items-center justify-center w-full gap-4 xl:items-start xl:flex-row'>

                        <div class='w-full md:w-3/4'>
                            <x-card class='w-full max-w-3xl my-2'>
                                <header>
                                    <div class="flex justify-center">
                                        <div class='flex items-center justify-center md:w-64 md:h-64'>
                                            <img class='object-cover w-full h-full rounded-md bg-slate-300'
                                                src="{{ $note->image }}" alt="sheesh" title="sheesh" />
                                        </div>
                                    </div>
                                </header>
                                <div class='mt-5'>
                                    <div class='pb-4'>
                                        <p class='text-sm font-bold text-gray-950 dark:text-gray-200'>
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
                                            <x-icon name="check" green xl class="w-4 h-4" /> Frete gratis
                                        </li>
                                        <li class='flex items-center text-xs text-gray-500 dark:text-gray-400'>
                                            <x-icon name="check" green xl class="w-4 h-4" /> Disponível
                                        </li>
                                    </ul>

                                    <div class='flex flex-col'>
                                        <div>
                                            <div class='w-full mt-5'>
                                                <x-card title="Descrição do produto">
                                                    <p
                                                        class='mb-2 text-sm text-gray-500 break-words dark:text-gray-400'>
                                                        {{ $note->description }}
                                                    </p>
                                                    <p
                                                        class='mb-2 text-sm text-gray-500 break-words dark:text-gray-400'>

                                                    </p>
                                                   
                                                    <x-slot name="footer" class="flex w-full h-full">
                                <p
                                                        class='text-gray-900 break-words text-md dark:text-gray-400'>
                                                        Informações do vendedor:
                                                    </p>
                                                    <p
                                                        class='mb-2 text-sm text-gray-500 break-words dark:text-gray-400'>
Somos uma empresa de cométicos para criancas
                                                    </p>


                            </x-slot>
                                                    <p>
                                                </x-card>
                                            </div>
                                        </div>
                                    </div>
                            </x-card>
                        </div>


                    </div>
                    <main class='flex justify-center w-full md:w-3/4'>
                        <x-card class='gap-6 dark:border-gray-700 dark:bg-gray-800'>
                            <div>
                                <div class='mb-6'>
                                    <p class='mb-2 font-bold text-gray-900 dark:text-gray-200'>Comprar um produto</p>
                                    <p class='font-thin text-gray-500 dark:text-gray-400'>{{ $note->product_name }}</p>
                                </div>
                                <div class='flex items-center justify-start gap-2 '>
                                    <p class='text-lg text-gray-500 dark:text-gray-400'>Tipo:</p>
                                    <p class='text-3xl text-gray-900 dark:text-gray-200'> {{ $note->residue_type }}
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
                                        Tipo do produto:
                                        <strong
                                            class='text-gray-800 dark:text-gray-300'>{{ $note->residue_type }}<strong>
                                    </div>
                                </div>
                                <div class='flex items-center justify-start w-full gap-1 mb-3 text-sm'>
                                    <span><x-icon name="information-circle"
                                            class='w-6 h-6 text-gray-800 rounded-full dark:text-gray-300' />


                                    </span>
                                    <div class='font-thin text-gray-500 dark:text-gray-400'>
                                        Preço por unidade
                                        <strong class='text-gray-800 dark:text-gray-300'>{{ $note->product_quantity }}
                                            / {{ $note->price_perunit }}
                                            <strong>
                                    </div>
                                </div>
                                <div class='flex items-center justify-start w-full gap-1 mb-3 text-sm'>
                                    <span><x-icon name="globe-alt"
                                            class='w-6 h-6 text-gray-800 rounded-full dark:text-gray-300' />


                                    </span>
                                    <div class='font-thin text-gray-500 dark:text-gray-400'>
                                        Estado:
                                        <strong class='text-gray-800 dark:text-gray-300'> {{ $note->company_state }}
                                            <strong>
                                    </div>
                                </div>


                            </div>


                            <x-slot name="footer" class="flex w-full h-full">
                                <form action="{{ route('checkout', ['note' => $note->id]) }}" method="POST"
                                    class='flex flex-col items-center justify-center w-full gap-3'>
                                    @csrf
                                    <x-button sm primary rounded icon='inbox' spinner class='w-full h-12 py-5 mt-3'
                                        label='Deseja enviar uma mensagem antes de comprar?' />
                                    <x-button sm primary type='submit' rounded spinner icon='shopping-cart'
                                        class='w-full h-12 px-6' label='Comprar' />
                                </form>

                            </x-slot>
                        </x-card>
                    </main>
                </div>

            </div>
        </div>
    </x-app-layout>
