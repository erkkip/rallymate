<table class="table table-striped table-bordered">
    <thead>
    <tr>
        <th>#</th>
        <th>Stage</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($stages as $i => $stage)
        <tr wire:key="{{ $stage->id }}">
            <td>
                SS{{ $i+1 }}
            </td>
            <td>
                {{ $stage->name }}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
