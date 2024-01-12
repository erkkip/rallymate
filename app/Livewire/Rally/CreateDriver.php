<?php

namespace App\Livewire\Rally;

use App\Livewire\Events\DriverCreated;
use App\Models\Rally;
use Livewire\Component;

class CreateDriver extends Component
{
    public Rally $rally;

    public string $name = '';

    public function save()
    {
        $this->validate([
            'name' => 'required|min:3',
        ]);

        $this->rally->drivers()->create([
            'name' => $this->name,
        ]);

        $this->name = '';

        $this->dispatch(DriverCreated::class);
    }

    public function render()
    {
        return view('livewire.rally.create-driver');
    }
}
