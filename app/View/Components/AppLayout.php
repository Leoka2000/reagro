<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class AppLayout extends Component
{
    
    public $mode = false;

    public function toggleLight()
    {
        $this->mode = !$this->mode;
    }

    public function render(): View
    {
        return view('layouts.app');
    }
}
