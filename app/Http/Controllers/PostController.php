<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;

class PostController extends Controller
{
    // common to stick with 7 restful actions - index, show, create, store, edit, update, destroy

    public function index() {

        return view('posts.index', [
            'posts' =>  Post::latest()->filter(
                request(['search', 'category', 'author']))
                ->paginate(3)->withQueryString(),
        ]);
    }

    public function show(Post $post) {
        return view('posts\show', [
            'post' => $post
        ]);
    }
}
