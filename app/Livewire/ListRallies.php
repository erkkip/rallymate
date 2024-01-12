<?php

namespace App\Livewire;

use App\Livewire\Events\RallyCreated;
use App\Models\Rally;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\On;
use Livewire\Component;

class ListRallies extends Component
{
    public Collection $rallies;

    #[On(RallyCreated::class)]
    public function render()
    {
        $this->rallies = Rally::query()->latest()->get();

        return view('livewire.list-rallies');
    }
}
