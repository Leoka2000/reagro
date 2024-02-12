<x-guest-layout>
    <main class='py-4 text-gray-800 dark:text-gray-300'>
        <x-card title="Compra realizada">
            <x-slot name="action">
                <x-badge positive lg rounded icon="check" class='w-6 h-6 ' />
            </x-slot>
            <div class='gap-2 py-12 text-gray-800 dark:text-gray-300'>
                <p>Status de compra: <strong> {{ $orderStatus }} (pago)</strong> </p>
                <p>Nome da Empresa: <strong>{{ $companyName }} </strong></p>
                <p>Email da empresa <strong>{{ $companyEmail }} </strong></p>
                <p>Quantidade: <strong>{{ $productQuantity }} </strong></p>
                <p>Estado de entrega:<strong> {{ $companyState }} </strong></p>
                <p>Cidade de entrega: <strong>{{ $companyCity }} </strong></p>
                <p>Código postal: <strong>{{ $companyPostalCode }} </strong></p>
                <p>Rua:<strong> {{ $deliveryAddress }}</strong></p>
                <p>Tipo de resíduo:<strong> {{ $residueType }} </strong></p>
            </div>

        </x-card>
    </main>
</x-guest-layout>
