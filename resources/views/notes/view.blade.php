<?php

use function Livewire\Volt\{state};

//

?>

<div>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                Produto -> nome
            </h2>
        </x-slot>
        <header>
            <div class='flex items-center justify-center'>
                <div class='w-full h-full sm:w-28 sm:h-28'>
                    <div class='flex items-center justify-center w-full h-full p-2 py-8'>
                        <img src="{{ asset('logo.png') }}" alt="profile pic" title="bruuvynsons" class='object-cover w-full h-fullimg rounded-xl' />
                    </div>
                </div>
            </div>
        </header>
        <div>
            <div>
                <div class='flex flex-col items-center justify-center gap-2'>
                    <div class='flex justify-end  lg:gap-24'>
                        <div class='w-full'>
                            <x-card class='max-w-3xl my-2'>
                                <header>
                                    <div class="flex justify-center">
                                        <div class='flex items-center justify-center md:w-64 md:h-64'>
                                            <img class='object-cover w-full h-full rounded-md bg-slate-300' src="{{ asset('logo.png') }}" alt="sheesh" title="sheesh" />
                                        </div>
                                    </div>
                                </header>
                                <div class='mt-5'>
                                    <div class='pb-4'>
                                        <p class='text-sm font-bold text-gray-950 dark:text-gray-200'>Residuo quimico
                                            para
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

                                    <div class='flex flex-col'>
                                        <div>
                                            <div class='w-full mt-5'>
                                                <x-card title="Descricoe do produto">
                                                    <p class='mb-2 text-sm text-gray-500 break-words dark:text-gray-400'>
                                                        dscricaodscricaodscricaodscricaodscricaodscricaodscricaodscricaodscricaodscricaodscaodscricaodscricaodscricaodscaodscricaodscricaodscricaodscaodscricaodscricaodscricaodscaodscricaodscricaodscricaodscaodscricaodscricaodscricaodscaodscricaodscricaodscricaodscaodscricaodscricaodscricaodscaodscricaodscricaodscricaodscaodscricaodscricaodscricaodscricaodscricao
                                                    </p>
                                                    <p class='mb-2 text-sm text-gray-500 break-words dark:text-gray-400'>
                                                        dscricaod dscricaod dscricaod dscricaod dscricaod dscricaod
                                                        dscricaod dscricaod dscricaod dscricaod dscricaod dscricaod
                                                        dscricaod dscricaod dscricaod dscricaod dscricaod dscricaod
                                                        dscricaod dscricaod dscricaod dscricaod dscricaod dscricaod
                                                        dscricaod
                                                        dscricaodscricaodscricaodscricaodscricaodscricaodscricaodscricaodscricaodscricaodscricaodscricao
                                                    </p>
                                                </x-card>
                                            </div>
                                        </div>
                                    </div>
                            </x-card>
                        </div>
                    </div>

                </div>
                <main class='flex justify-center mt-6 m'>
                    <x-card class='w-full gap-6 dark:border-gray-700 dark:bg-gray-800'>
                        <div>
                            <div class='mb-6'>
                                <p class='mb-2 font-bold text-gray-900 dark:text-gray-200'>Comprar um produto</p>
                                <p class='font-thin text-gray-500 dark:text-gray-400'>{{ $note->product_name }}</p>
                            </div>
                            <div class='flex items-center justify-start gap-2 '>
                                <p class='text-lg text-gray-500 dark:text-gray-400'>Preco por unidade:</p>
                                <p class='text-2xl text-gray-900 dark:text-gray-200'> {{ $note->price_perunit }} </p>
                            </div>

                        </div>
                        <div class='flex flex-col items-start gap-1'>
                            <div>
                                <header class='mt-10 mb-5'>
                                    <p class='text-base font-bold text-gray-900 dark:text-gray-200'>Especificacoes do
                                        produto
                                    </p>
                                </header>
                            </div>

                            <div class='flex items-center justify-start w-full gap-1 mb-3 text-sm'>

                                <span> <x-icon name="calendar" class="w-5 h-5" solid class='w-6 h-6 text-gray-800 dark:text-gray-300' /> </span>
                                <div class='font-thin text-gray-500 dark:text-gray-400'>
                                    Postado em:
                                    <strong class='text-gray-800 dark:text-gray-300'> {{ $note->created_at }}<strong>
                                </div>
                            </div>
                            <div class='flex items-center justify-start w-full gap-1 mb-3 text-sm'>
                                <span> <x-icon name="beaker" class="w-5 h-5" solid class='w-6 h-6 text-gray-800 rounded-full dark:text-gray-300 ' />
                                </span>
                                <div class='font-thin text-left text-gray-500 dark:text-gray-400'>
                                    Tipo do produto:
                                    <strong class='text-gray-800 dark:text-gray-300'>{{ $note->residue_type }}<strong>
                                </div>
                            </div>
                            <div class='flex items-center justify-start w-full gap-1 mb-3 text-sm'>
                                <span><x-icon name="information-circle" class='w-6 h-6 text-gray-800 rounded-full dark:text-gray-300' />


                                </span>
                                <div class='font-thin text-gray-500 dark:text-gray-400'>
                                    Quantidade disponíivel:
                                    <strong class='text-gray-800 dark:text-gray-300'> {{ $note->product_quantity }}
                                        <strong>
                                </div>
                            </div>
                            <div class='flex items-center justify-start w-full gap-1 mb-3 text-sm'>
                                <span><x-icon name="globe-alt" class='w-6 h-6 text-gray-800 rounded-full dark:text-gray-300' />


                                </span>
                                <div class='font-thin text-gray-500 dark:text-gray-400'>
                                    Cidade do produto:
                                    <strong class='text-gray-800 dark:text-gray-300'> {{ $note->address_city }} <strong>
                                </div>
                            </div>


                        </div>
                        <div class='flex flex-col gap-2 mt-5 mb-2 w-full'>
                            <x-button sm primary rounded icon='inbox' class='w-full' label='Deseja enviar uma mensagem antes de comprar?' />
                            <x-button sm primary rounded icon='shopping-cart' class='w-full' label='Comprar' />

                        </div>

                    </x-card>
                </main>
            </div>


        </div>
    </x-app-layout>