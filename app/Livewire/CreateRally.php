<?php

namespace App\Livewire;

use App\Livewire\Events\RallyCreated;
use App\Models\Rally;
use Livewire\Component;

class CreateRally extends Component
{
    public string $name = '';

    public function save()
    {
        $this->validate([
            'name' => 'required|min:3',
        ]);

        Rally::create([
            'name' => $this->name,
        ]);

        $this->name = '';

        $this->dispatch(RallyCreated::class);
    }

    public function render()
    {
        return view('livewire.create-rally');
    }
}
