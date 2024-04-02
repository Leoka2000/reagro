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
          
        ]);

        // Create a new user record
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'company_state' => $validated['companyState'],
         
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

               

                <x-input-label for="companyState"  class='pb-1' :value="__('Estado')" />

                <x-select name="companyState" id="companyState" wire:model="companyState" required :options="$this->states()"
                    class="block w-full" placeholder="Rio Grande do Sul" />
                <x-input-error :messages="$errors->get('companyState')" class="mt-2" />
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
