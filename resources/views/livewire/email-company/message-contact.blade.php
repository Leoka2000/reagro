<x-guest-layout>
    <main class='px-3 my-4 text-gray-800 dark:text-gray-300'>
        <x-card title="Nova mensagem">
            <x-slot name="action">
                <x-badge positive lg rounded icon="check" class='w-6 h-6 ' />
            </x-slot>
            <div class='gap-2 py-12 text-gray-800 dark:text-gray-300'>
                <p>Nome: <strong> {{ $name }}</strong> </p>
                <p>Email: <strong>{{ $email }} </strong></p>
                <p>Mensagem <strong>{{$topic}} </strong></p>
              
            </div>

        </x-card>
    </main>
</x-guest-layout>
