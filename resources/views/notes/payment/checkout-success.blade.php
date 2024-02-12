<?php

use Livewire\Volt\Component;
use App\Models\Order;
new class extends Component {

     public function with(): array
    {
        return [
            'orders' => Order::all(),
        ];
    }
}; ?>

<div>
    <x-app-layout>
    
{{-- 
@foreach ($orders as $order )
    {{$order->status}}
@endforeach
--}}
         </x-app-layout>
</div>
