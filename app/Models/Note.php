<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Note extends Model
{
    use HasFactory, HasUuids;


    protected $guarded = [
        'id',
    ];

    protected $casts = [
        'is_published' => 'boolean',
    ];
   /*
    public function toTerminal()
    {
        $user = auth()->user();
        $notes = $user->notes()->get(); #displays all the notes that a logged user has created
        $numberNotes = $user->notes()->get()->count(); #displays the number of notes that a logged user has created

        // Log information about each note
        foreach ($notes as $note) {
            Log::info("Note ID: {$note->id}, Name: {$note->name}, Email: {$note->email}, user_ID: {$note->user_id}");
        }

        Log::info($numberNotes);
        Log::info($numberNotes === 0);


        if ($numberNotes >= 1) {
            // Display an error message to the user
            Log::info('You cannot create more than one note!');
            
            return false;
        } else {
            Log::info('You can create');
            return true;
        }

}   */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}