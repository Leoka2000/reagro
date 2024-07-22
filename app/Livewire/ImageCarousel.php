<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ImageCarousel extends Component
{
    public $showImageModal = false;
    public $images = [];
    public $currentImage = '';

    protected $listeners = ['openModal' => 'showModal'];

    public function showModal($images, $currentImage)
    {
        $this->images = $images;
        $this->currentImage = $currentImage;
        $this->showImageModal = true;
    }

    public function closeModal()
    {
        $this->showImageModal = false;
    }

    public function render()
    {
        return view('livewire.image-carousel');
    }
}
