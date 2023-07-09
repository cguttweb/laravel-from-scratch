@props(['comment'])
<x-panel class="bg-gray-100">
    <article class="flex space-x-3">
        <div class="flex-shrink-0">
            <img src="https://i.pravatar.cc/50?u={{ auth()->id() }}" alt="" height="50" width="50" class="rounded-xl">
        </div>
        <div class="bg-gray-100 p-3 rounded-xl">
            <header>
                <h3 class="font-bold">{{ $comment->author->username }}</h3>
                <p class="text-xs">{{ $comment->created_at }} timestamp ago</p>
            </header>
            <p>L{{ $comment->body }}</p>
        </div>
    </article>
</x-panel>
