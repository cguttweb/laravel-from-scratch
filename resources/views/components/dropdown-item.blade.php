@props(['active' => false])

@php
    $classes = 'block px-3 text-left text-sm hover:bg-gray-300 focus:bg-gray-300';

    if($active) $classes = 'bg-blue-500 text-white';

@endphp


<a {{ $attributes(['class'=> $classes ]) }}
>{{ $slot }}</a>
