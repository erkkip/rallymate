<?php

namespace App\Livewire\Rally;

use App\Models\Rally;
use Livewire\Component;

class View extends Component
{
    public Rally $rally;

    public function render()
    {
        return view('livewire.rally.view');
    }
}
