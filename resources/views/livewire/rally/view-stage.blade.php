<div>
    <livewire:rally.header :rally="$rally" />

    <h1 class="mb-5">SS{{ $stageNumber }} {{ $stage->name }}</h1>
    <h3>STAGE TIMES</h3>
    <livewire:rally.timetable :stage="$stage" :isTotals=false />
    <div class="mb-5"></div>
    <h3>OVERALL</h3>
    <livewire:rally.timetable :stage="$stage" :isTotals=true />
</div>
