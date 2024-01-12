<div>
    <livewire:rally.header :rally="$rally" />

    <h1>Drivers</h1>
    <livewire:rally.create-driver :rally="$rally" />
    <livewire:rally.list-drivers :rally="$rally" />

    <div class="mb-5"></div>

    <h1>Stages</h1>
    <livewire:rally.create-stage :rally="$rally" />
    <livewire:rally.list-stages :rally="$rally" />
</div>
