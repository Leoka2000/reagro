<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Exception\ClientException;

class ProviderController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->stateless()->redirect();
    }

    public function callbackGoogle()
    {
        try {
            $google_user = Socialite::driver('google')->stateless()->user();
            $user = User::where('google_id', $google_user->getId())->first();
    
            if (!$user) {
                $user = User::where('email', $google_user->getEmail())->first();
    
                if (!$user) {
                    // If no user with the Google ID or email exists, create a new user
                    $user = User::create([
                        'name' => $google_user->getName(),
                        'email' => $google_user->getEmail(),
                        'google_id' => $google_user->getId()
                    ]);
                } else {
                    // If a user with the email exists but without Google ID, update the user
                    $user->update([
                        'google_id' => $google_user->getId()
                    ]);
                }
            }
    
            Auth::login($user);
    
            return redirect()->intended('dashboard');
        } catch (ClientException $e) {
            error_log($e);
        }
    }
}