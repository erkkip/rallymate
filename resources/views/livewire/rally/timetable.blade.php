<div class="table-responsive">
<table class="table table-striped table-responsive table-bordered table-sm">
    <thead>
    <tr>
        <th style="width: 25%">DRIVER</th>
        <th style="width: 25%">TIME</th>
        <th style="width: 25%">DIFF 1st</th>
        <th style="width: 25%">DIFF PREV</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($results as $result)
        <tr wire:key="{{ $result['driverId'] }}">
            <td>{{ $result['driver'] }}</td>
            <td class="font-monospace" style="min-width: 6em">
                @if ($isTotals)
                    {{ $result['time'] }}
                @else
                <div class="input-group">
                    <input wire:change="setTime({{ $result['driverId'] }})"
                           wire:model="results.{{ $result['driverId'] }}.time"
                           class="form-control text-light py-0 px-0 border-0"
                           style="background: none"
                           type="text"
                           inputmode="numeric"
                           placeholder="__:__.___"
                           x-mask="99:99.999">
                </div>
                @endif
            </td>
            <td class="font-monospace">{{ $result['diffFirst'] }}</td>
            <td class="font-monospace">{{ $result['diffPrev'] }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>
