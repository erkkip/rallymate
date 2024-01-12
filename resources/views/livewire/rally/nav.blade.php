<nav class="border-bottom border-top" aria-label="breadcrumb">
    <ol class="breadcrumb my-2">
        @foreach ($stages as $i => $stage)
            @if(Route::is('rally.show-stage') && Route::current()->parameter('stage') == $stage)
                    <li class="breadcrumb-item active">SS{{$i + 1}}</li>
            @else
                <li class="breadcrumb-item">
                    <a href="{{ route('rally.show-stage', [$rally->id, $stage->id]) }}" wire:navigate>
                        SS{{$i + 1}}
                    </a>
                </li>
            @endif
        @endforeach
    </ol>
</nav>
