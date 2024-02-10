<?php

use Livewire\Volt\Component;
use WireUi\Traits\Actions;

new class extends Component {
    use Actions;

        public function successDialog(): void
    {
        $this->dialog()->show([
            'icon' => 'success',
            'title' => 'Success Dialog!',
            'description' => 'This is a description.',
        ]);
    }
}; ?>

<div >
  <x-button primary sm rounded label='Test Button' wire:click="successDialog" />
</div>
