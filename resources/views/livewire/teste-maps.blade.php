<?php

use Livewire\Volt\Component;
use Geocoder\Laravel\Facades\Geocoder;

new class extends Component {
    public $originLatitude;
    public $originLongitude;
    public $destinationLatitude;
    public $destinationLongitude;
    public $freightPrice;

    public function calculateFreight()
    {
        $origin = [$this->originLatitude, $this->originLongitude];
        $destination = [$this->destinationLatitude, $this->destinationLongitude];

        $distance = $this->calculateDistance($origin, $destination);

        // Perform freight price calculation based on distance
        // Replace this with your own freight price calculation logic
        $this->freightPrice = $distance * 0.1; // Example calculation, change it as per your business logic
    }

   public function cities()
{
    return [
        'Porto Alegre',
        'Caxias do Sul',
        'Pelotas',
        'Canoas',
        'Santa Maria',
        'Gravataí',
        'Viamão',
        'Novo Hamburgo',
        'São Leopoldo',
        'Rio Grande',
        'Alvorada',
        'Passo Fundo',
        'Sapucaia do Sul',
        'Uruguaiana',
        'Santa Cruz do Sul',
        'Cachoeirinha',
        'Bagé',
        'Bento Gonçalves',
        'Santa Rosa',
        'Santa Maria',
        'Camaquã',
        'Esteio',
        'Santana do Livramento',
        'São Gabriel',
        'Ijuí',
        'Alegrete',
        'Tramandaí',
        'Capão da Canoa',
        'São Lourenço do Sul',
        'Vacaria',
        'Cachoeira do Sul',
        'Guaíba',
        'Santo Ângelo',
        'Osório',
        'Farroupilha',
        'Torres',
        'Erechim',
        'Canela',
        'São Borja',
        'Montenegro',
        'Taquara',
        'Carazinho',
        'Lajeado',
        'São Sebastião do Caí',
        'Rio Pardo',
        'Santiago',
        'Venâncio Aires',
        'São Francisco de Paula',
        'São Jerônimo',
        'Igrejinha',
        'Tapejara',
        'São José do Norte',
        'Garibaldi',
        'São Luiz Gonzaga',
        'Dom Pedrito',
        'Tapes',
        'Encantado',
        'Sobradinho',
        'Rolante',
        'Arroio do Meio',
        'Marau',
        'Gramado',
        'Cidreira',
        'Constantina',
        'Teutônia',
        'Charqueadas',
        'São Sepé',
        'Butiá',
        'Veranópolis',
        'Carlos Barbosa',
        'Espumoso',
        'Ibirubá',
        'Arroio Grande',
        'Barra do Ribeiro',
        'São Borja',
        'São Marcos',
        'São Pedro do Sul',
        'São José dos Ausentes',
        'São Valentim do Sul',
        'Cacequi',
        'São Vicente do Sul',
        'São João do Polêsine',
        'São Francisco de Assis',
        'São Lourenço do Sul',
        'São Gabriel',
        'São Miguel das Missões',
        'São Pedro da Serra',
        'São Valentim',
        'Sapiranga',
        'Sapucaia',
        'Sarandi',
        'Seberi',
        'Sede Nova',
        'Serafina Corrêa',
        'Silveira Martins',
        'Sinimbu',
        'Sobradinho',
        'Soledade',
        'Tabaí',
        'Tapejara',
        'Tapes',
        'Taquara',
        'Taquari',
        'Teutônia',
        'Tio Hugo',
        'Tramandaí',
        'Travesseiro',
        'Três de Maio',
        'Três Palmeiras',
        'Três Passos',
        'Triunfo',
        'Tucunduva',
        'Tupanciretã',
        'Tupandi',
        'Turvo',
        'Ubiretama',
        'União da Serra',
        'Uruguaiana',
        'Vacaria',
        'Vale do Sol',
        'Vale Real',
        'Vale Verde',
        'Vanini',
        'Venâncio Aires',
        'Vera Cruz',
        'Veranópolis',
        'Vespasiano Correa',
        'Viadutos',
        'Viamão',
        'Vicente Dutra',
        'Victor Graeff',
        'Vila Flores',
        'Vila Lângaro',
        'Vila Maria',
        'Vila Nova do Sul',
        'Vista Alegre',
        'Vista Alegre do Prata',
        'Vista Gaúcha',
        'Vitória das Missões',
        'Westfália',
        'Xangri-lá'
    ];
}

// Call the cities() function and count the number of cities




// Call the mount() function



    protected function calculateDistance($origin, $destination)
    {
        $lat1 = $origin[0];
        $lon1 = $origin[1];
        $lat2 = $destination[0];
        $lon2 = $destination[1];

        $earthRadius = 6371; // Radius of the Earth in kilometers

        $dLat = deg2rad($lat2 - $lat1);
        $dLon = deg2rad($lon2 - $lon1);

        $a = sin($dLat / 2) * sin($dLat / 2) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * sin($dLon / 2) * sin($dLon / 2);
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
        $distance = $earthRadius * $c; // Distance in kilometers
        dd($distance);
        return $distance;
    }
}; ?>

<div class="dark:text-gray-300">

    <form wire:submit.prevent="calculateFreight">
        <div>
            <label for="origin_latitude">Origin Latitude:</label>
            <input type="text" wire:model="originLatitude" id="origin_latitude">
        </div>
        <div>
            <label for="origin_longitude">Origin Longitude:</label>
            <input type="text" wire:model="originLongitude" id="origin_longitude">
        </div>
        <div>
            <label for="destination_latitude">Destination Latitude:</label>
            <input type="text" wire:model="destinationLatitude" id="destination_latitude">
        </div>
        <div>
            <label for="destination_longitude">Destination Longitude:</label>
            <input type="text" wire:model="destinationLongitude" id="destination_longitude">
        </div>
        <div>
            <button type="submit">Calculate Freight</button>
        </div>
    </form>

    @if ($freightPrice)
        <div>
            <p>Freight Price: BRL{{ $freightPrice }}</p>
        </div>
    @endif
</div>
