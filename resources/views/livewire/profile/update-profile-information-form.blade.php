<?php

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Livewire\Volt\Component;
use WireUi\Traits\Actions;

new class extends Component {
    use Actions;
    public string $name = '';
    public string $email = '';

    public string $deliveryAddress = ''; // rua
    public string $companyPostalCode = '';
    public string $addressCity = '';
    public string $companyState = '';

    /**
     * Mount the component.
     */
    public function mount(): void
    {
        $this->name = Auth::user()->name;
        $this->email = Auth::user()->email;
        $this->deliveryAddress = Auth::user()->delivery_address;
        $this->addressCity = Auth::user()->address_city;
        $this->companyPostalCode = Auth::user()->company_postal_code;
        $this->companyState = Auth::user()->company_state;
    }

    /**
     * Update the profile information for the currently authenticated user.
     */
    public function updateProfileInformation(): void
    {
        $user = Auth::user();

        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($user->id)],
            'companyState' => ['required', 'string'],
            'addressCity' => ['required', 'string'],
            'companyPostalCode' => ['required', 'string'],
            'deliveryAddress' => ['required', 'string', 'min:5'], //street,
        ]);

        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->company_state = $validated['companyState']; // Make sure this matches your database column name
        $user->address_city = $validated['addressCity']; // Make sure this matches your database column name
        $user->company_postal_code = $validated['companyPostalCode']; // Make sure this matches your database column name
        $user->delivery_address = $validated['deliveryAddress']; // Make sure this matches your database column name

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();
        // {{-- dd($validated); --}}
        $this->dialog()->show([
            'icon' => 'success',
            'title' => 'Informações atualizadas!',
        ]);
        $this->dispatch('profile-updated', name: $user->name);
    }

    /**
     * Send an email verification notification to the current user.
     */
    public function sendVerification(): void
    {
        $user = Auth::user();

        if ($user->hasVerifiedEmail()) {
            $path = session('url.intended', RouteServiceProvider::HOME);

            $this->redirect($path);

            return;
        }

        $user->sendEmailVerificationNotification();

        Session::flash('status', 'verification-link-sent');
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

<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('
                                                                                                Informações do Perfil') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Atualize as informações do perfil da sua conta e o endereço de e-mail.') }}
        </p>
    </header>

    <form wire:submit="updateProfileInformation" class="mt-6 space-y-6">
        <div>
            <x-input-label for="name" :value="__('Nome')" />
            <x-text-input wire:model="name" id="name" name="name" type="text" class="block w-full mt-1" required
                autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input wire:model="email" id="email" name="email" type="email" class="block w-full mt-1"
                required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if (auth()->user() instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !auth()->user()->hasVerifiedEmail())
                <div>
                    <p class="mt-2 text-sm text-gray-800 dark:text-gray-200">

                        {{ __('Seu endereço de e-mail não foi verificado.') }}

                        <button wire:click.prevent="sendVerification"
                            class="text-sm text-gray-600 underline rounded-md dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500 dark:focus:ring-offset-gray-800">

                            {{ __('Clique aqui para reenviar o e-mail de verificação.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 text-sm font-medium text-green-600 dark:text-green-400">

                            {{ __('Um novo link de verificação foi enviado para o seu endereço de e-mail.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>
        <div class="mt-8">

            <p class="mb-2 text-lg font-medium text-gray-900 dark:text-gray-100">Seu endereço de entrega</p>

            <x-input-label for="companyState" class='pb-1' :value="__('Estado')" />

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
            <x-text-input wire:model="companyPostalCode" id="companyPostalCode" class="block w-full mt-1" type="text"
                name="companyPostalCode" required autocomplete="companyPostalCode" />
            <x-input-error :messages="$errors->get('companyPostalCode')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Salvar') }}</x-primary-button>

            <x-action-message class="me-3" on="profile-updated">
                {{ __('Salvo.') }}
            </x-action-message>
        </div>
    </form>
</section>
