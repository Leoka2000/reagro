<?php

use Livewire\Volt\Component;
use WireUi\Traits\Actions;
use App\Models\User;
use App\Models\Note;
use Illuminate\Support\Facades\Log;

new class extends Component {

      public function displayConsole()

    
    {
           $userVariable = auth()->user();
            $numberNotes = $userVariable->notes()->get();
            error_log($numberNotes);
    }

}; ?>

<div >
  <x-button primary sm rounded label='Test Button' wire:click="displayConsole" />
</div>
