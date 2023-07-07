@props(['comment'])

<article class="flex space-x-3">
    <div class="flex-shrink-0">
        <img src="https://via.placeholder/40x40" alt="" width="40">
    </div>
    <div class="bg-gray-300 p-3 rounded">
        <header>
            <h3 class="font-bold">{{ $comment->author->username }}</h3>
            <p class="text-xs">{{ $comment->created_at }} timestamp ago</p>
        </header>
        <p>L{{ $comment->body }}</p>
    </div>
</article>
