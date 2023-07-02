{{-- can pass as an attribute if simple --}}
{{-- <x-layout content="Hello There"> --}}
{{-- <x-layout> --}}
{{-- or use x-slot --}}
    {{-- <x-slot name="content">Hello there</x-slot> --}}
{{-- </x-layout> --}}

<x-layout>
    @foreach ($posts as $post)
    <article>
        <h1>
            <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
        </h1>
        <p>{{ $post->excerpt }} </p>
    </article>
    @endforeach
</x-layout>


