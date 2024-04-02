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

    public string $companyState = '';

    /**
     * Mount the component.
     */
    public function mount(): void
    {
        $this->name = Auth::user()->name;
        $this->email = Auth::user()->email;
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
           
        ]);

        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->company_state = $validated['companyState']; // Make sure this matches your database column name
       

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

       

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Salvar') }}</x-primary-button>

            <x-action-message class="me-3" on="profile-updated">
                {{ __('Salvo.') }}
            </x-action-message>
        </div>
    </form>
</section>
