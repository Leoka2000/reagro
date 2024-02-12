<?php

use Livewire\Volt\Component;
use App\Models\User;
use App\Models\Note;
use App\Models\Order;
use Illuminate\Support\Facades\Log;
use WireUi\Traits\Actions;

new class extends Component {
   use \WireUi\Traits\Actions;

 public function successDialog()
 
    {
        $this->dialog()->show([
            'icon' => 'success',
            'title' => 'Success Dialog!',
            'description' => 'This is a description.',
        ]);
    }


      public function displayConsole()
    {
    
       
           $userVariable = auth()->user();
            $numberNotes = $userVariable->email;
            $numberNotes = $userVariable->name;
         
            error_log( $numberNotes);
    }

}; ?>

<div >
  <x-button primary sm rounded label='Test Button' wire:click="displayConsole" />
</div>
