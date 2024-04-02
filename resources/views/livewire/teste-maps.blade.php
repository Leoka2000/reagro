<?php

use Livewire\Volt\Component;
use Geocoder\Laravel\Facades\Geocoder;

new class extends Component {
    public $originLatitude;
    public $originLongitude;
    public $destinationLatitude;
    public $destinationLongitude;
    public $distance;
    
     public function mount()
    {
        // Initialize properties with default values (optional)
        $this->originLatitude = null;
        $this->originLongitude = null;
        $this->destinationLatitude = null;
        $this->destinationLongitude = null;
        $this->distance = null;
    }

    public function calculateDistance()
    {
        $this->validate([
            'originLatitude' => 'required|numeric',
            'originLongitude' => 'required|numeric',
            'destinationLatitude' => 'required|numeric',
            'destinationLongitude' => 'required|numeric',
        ]);

        $origin = Geocoder::make([$this->originLatitude, $this->originLongitude]);
        $destination = Geocoder::make([$this->destinationLatitude, $this->destinationLongitude]);

        $this->distance = $origin->geocode()->distance($destination);
    }

     public function calculateFreightPrice($distance)
    {
        // Implement your pricing logic here
        // This example uses a hypothetical price per kilometer
        $pricePerKm = 0.5; // Replace with your actual pricing
        return $distance * $pricePerKm;
    }
    
}; ?>

<div class="dark:text-gray-300">
    <form wire:submit.prevent="calculateDistance">
        <label for="origin_latitude">Origin Latitude:</label>
        <input wire:model="originLatitude" id="origin_latitude" required>

        <label for="origin_longitude">Origin Longitude:</label>
        <input wire:model="originLongitude" id="origin_longitude" required>

        <label for="destination_latitude">Destination Latitude:</label>
        <input wire:model="destinationLatitude" id="destination_latitude" required>

        <label for="destination_longitude">Destination Longitude:</label>
        <input wire:model="destinationLongitude" id="destination_longitude" required>

        <button type="submit">Calculate Freight Price</button>
    </form>

    @if ($distance)
        <p>Distance: {{ $distance }} meters</p>
        <p>Freight Price: {{ calculateFreightPrice($distance) }} (based on your pricing logic)</p>
    @endif

    </div>
