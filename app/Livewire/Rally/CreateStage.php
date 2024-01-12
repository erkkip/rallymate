<?php

namespace App\Livewire\Rally;

use App\Livewire\Events\StageCreated;
use App\Models\Rally;
use Livewire\Component;

class CreateStage extends Component
{
    public Rally $rally;

    public string $name = '';

    public function save()
    {
        $this->validate([
            'name' => 'required|min:3',
        ]);

        $this->rally->stages()->create([
            'name' => $this->name,
        ]);

        $this->name = '';

        $this->dispatch(StageCreated::class);
    }

    public function render()
    {
        return view('livewire.rally.create-stage');
    }
}
