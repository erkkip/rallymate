<div class="mb-5">
    <h1>
        <a href="{{ route('rally.show', $rally->id) }}" wire:navigate>
            {{ $rally->name }}
        </a>
    </h1>
    <h3 class="text-body-secondary text-uppercase mb-3"><small>{{ $rally->created_at->format('D j M Y') }}</small></h3>

    <livewire:rally.nav :rally="$rally" />
</div>
