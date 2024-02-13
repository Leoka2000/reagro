<?php

use Illuminate\Support\Facades\Artisan;

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Http\Controllers\NoteController;

use App\Models\Note;
use App\Models\User;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::view('notes', 'notes.show-notes')
    ->middleware(['auth'])
    ->name('notes.show-notes');

Route::view('my-notes', 'notes.my-notes')
    ->middleware(['auth'])
    ->name('notes.my-notes');
    
    Volt::route('profile/{note}/edit', 'notes.edit-note')
    ->middleware(['auth'])
    ->name('notes.edit');

    
Route::view('quero-vender', 'notes.sell-index')
->middleware(['auth'])
->name('notes.sell-index');




Route::get('image-upload', function () {

    return view('default');
});

Route::view('fazer-um-anuncio', 'notes.buy-index')
    ->middleware(['auth'])
    ->name('notes.buy-index');


    Route::post('/checkout/{note}', [NoteController::class, 'checkout'])->name('checkout');
    Route::get('/success', [NoteController::class, 'success'])->name('notes.payment.checkout-success');
Route::get('/cancel', [NoteController::class, 'cancel'])->name('notes.payment.checkout-cancel');
Route::post('/webhook', [NoteController::class, 'webhook'])->name('checkout.webhook');
  
    
    

      
Route::get('notes/view-offer/{note}', [NoteController::class, 'viewOffer'])->name('notes.view-offer');


require __DIR__ . '/auth.php';