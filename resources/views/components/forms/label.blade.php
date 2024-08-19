@props([
    'snippet' => null,
])

<label for="title" class="truncate">
    @if($snippet)
        @if($snippet->parent)
            &rang; {{ $snippet->parent->title }}
        @endif
        
        &rang; {{ $snippet->title }}
    @else
        &rang; {{ $slot }}
    @endif
</label>