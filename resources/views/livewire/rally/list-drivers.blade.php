<table class="table table-striped table-bordered">
    <thead>
    <tr>
        <th>Driver</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($drivers as $driver)
        <tr wire:key="{{ $driver->id }}">
            <td>
                {{ $driver->name }}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
