<?php

namespace App\Livewire\Rally;

use App\Livewire\Events\StageCreated;
use App\Models\Rally;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\On;
use Livewire\Component;

class ListStages extends Component
{
    public Rally $rally;

    public Collection $stages;

    #[On(StageCreated::class)]
    public function render()
    {
        $this->stages = $this->rally->stages()->oldest()->get();

        return view('livewire.rally.list-stages');
    }
}
