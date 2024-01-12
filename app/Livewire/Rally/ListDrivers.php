<?php

namespace App\Livewire\Rally;

use App\Livewire\Events\DriverCreated;
use App\Models\Rally;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\On;
use Livewire\Component;

class ListDrivers extends Component
{
    public Rally $rally;

    public Collection $drivers;

    #[On(DriverCreated::class)]
    public function render()
    {
        $this->drivers = $this->rally->drivers()->get();

        return view('livewire.rally.list-drivers');
    }
}
