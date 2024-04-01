<?php

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;
use Illuminate\Http\Request;

new #[Layout('layouts.guest')] class extends Component {
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';

    public string $deliveryAddress = ''; // rua
    public string $companyPostalCode = '';
    public string $addressCity = '';
    public string $companyState = '';

    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
            'companyState' => ['required', 'string'],
            'addressCity' => ['required', 'string'],
            'companyPostalCode' => ['required', 'string'],
            'deliveryAddress' => ['required', 'string', 'min:5'], //street,
        ]);

        // Create a new user record
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'company_state' => $validated['companyState'],
            'address_city' => $validated['addressCity'],
            'company_postal_code' => $validated['companyPostalCode'],
            'delivery_address' => $validated['deliveryAddress'],
        ]);

        // Fire the registered event
        event(new Registered($user));

        // Log in the newly registered user
        Auth::login($user);

        // Redirect to the home page
        $this->redirect(RouteServiceProvider::HOME, navigate: true);
    }
    public function states()
    {
        return ['Rio Grande do Sul'];
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
            'Xangri-lá',
        ];
    }
}; ?>

<div class='py-2 my-4'>
    <form wire:submit="register">
        <div>
            <h1 class='mb-2 text-lg font-bold text-gray-700 dark:text-gray-300'> Registrar-se</h1>

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Nome')" />
                <x-text-input wire:model="name" id="name" class="block w-full mt-1" type="text" name="name"
                    required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input wire:model="email" id="email" class="block w-full mt-1" type="email" name="email"
                    required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Senha')" />

                <x-text-input wire:model="password" id="password" class="block w-full mt-1" type="password"
                    name="password" required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirmar Senha')" />

                <x-text-input wire:model="password_confirmation" id="password_confirmation" class="block w-full mt-1"
                    type="password" name="password_confirmation" required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>
        </div>
        <!-- INFOS EMPRESA -->

        <div>
            <div class="mt-8">

                <p class="mb-2 text-lg font-bold text-gray-700 dark:text-gray-300">Endereço da sua empresa</p>

                <x-input-label for="companyState"  class='pb-1' :value="__('Estado')" />

                <x-select name="companyState" id="companyState" wire:model="companyState" required :options="$this->states()"
                    class="block w-full" placeholder="Rio Grande do Sul" />
                <x-input-error :messages="$errors->get('companyState')" class="mt-2" />
            </div>

            <div class="mt-4">

                <x-input-label for="addressCity" class='pb-1' :value="__('Cidade')" />

                <x-select name="addressCity" id="addressCity" wire:model="addressCity" required :options="$this->cities()"
                    class="block w-full" placeholder="Porto Alegre" />
                <x-input-error :messages="$errors->get('addressCity')" class="mt-2" />
            </div>


            <div class="mt-4">
                <x-input-label for="deliveryAddress" :value="__('Rua')" />
                <x-text-input wire:model="deliveryAddress" id="deliveryAddress" class="block w-full mt-1" type="text"
                    name="deliveryAddress" required autocomplete="deliveryAddress" />
                <x-input-error :messages="$errors->get('deliveryAddress')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="companyPostalCode" :value="__('CEP')" />
                <x-text-input wire:model="companyPostalCode" id="companyPostalCode" class="block w-full mt-1"
                    type="text" name="companyPostalCode" required autocomplete="companyPostalCode" />
                <x-input-error :messages="$errors->get('companyPostalCode')" class="mt-2" />
            </div>


            <div class="flex items-center justify-end mt-4">
                <a class="text-sm text-gray-600 underline rounded-md dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                    href="{{ route('login') }}" wire:navigate>
                    {{ __('Já se registrou?') }}
                </a>

                <x-primary-button class="ms-4">
                    {{ __('Registrar-se') }}
                </x-primary-button>
            </div>
        </div>
    </form>
</div>
