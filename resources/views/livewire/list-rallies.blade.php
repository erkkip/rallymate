<table class="table table-striped table-bordered">
    <thead>
    <tr>
        <th>Rally</th>
        <th>Created at</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($rallies as $rally)
        <tr wire:key="{{ $rally->id }}">
            <td>
                <a href="{{ route('rally.show', $rally->id) }}" wire:navigate>
                    {{ $rally->name }}
                </a>
            </td>
            <td>
                {{ $rally->created_at->diffForHumans() }}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
