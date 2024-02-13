<?php

use Livewire\Volt\Component;
use App\Models\User;
use App\Models\Note;
use App\Models\Order;
use Illuminate\Support\Facades\Log;
#use WireUi\Traits\Actions;

new class extends Component {
    #use \WireUi\Traits\Actions;

    public $showImageModal = false;

    public function successDialog()
    {
        $this->dialog()->show([
            'icon' => 'success',
            'title' => 'Success Dialog!',
            'description' => 'This is a description.',
        ]);
    }

    public function openImageModal()
    {
        $this->showImageModal = true;
    }

    public function closeImageModal()
    {
        $this->showImageModal = false;
    }

    public function displayConsole()
    {
        $userVariable = auth()->user();
        $numberNotes = $userVariable->email;

        error_log($numberNotes);
    }
}; ?>

<div>

    @if ($showImageModal)
        <x-modal wire:model.defer="showImageModal">
            <x-card title="Consent Terms">
                <p class="text-gray-600">
                    Lorem Ipsum...
                </p>

                <x-slot name="footer">
                    <div class="flex justify-end gap-x-4">
                        <x-button flat label="Cancel" x-on:click="close" />
                        <x-button primary label="I Agree" />
                    </div>
                </x-slot>
            </x-card>
        </x-modal>
    @endif
    <x-button primary sm rounded label='Test Button' wire:click="openImageModal" />
</div>
