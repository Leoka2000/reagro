<?php

use Illuminate\Support\Facades\Artisan;

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;


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

/*Volt::route('notes/{note}/edit', 'notes.edit-note')
    ->middleware(['auth'])
    ->name('notes.edit');
 */

  
    
    

      
 Route::get('notes/{note}', function (Note $note) {
    
    $user = $note->user;

    return view('notes.view', ['note' => $note, 'user' => $user]);
})->name('notes.view');


require __DIR__ . '/auth.php';