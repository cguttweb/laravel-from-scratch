<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Spatie\YamlFrontMatter\YamlFrontMatter;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {

    $posts = Post::latest();

    if(request('search')){
        $posts
        ->where('title', 'like', '%' . request('search') . '%')
        ->orWhere('body', 'like', '%' . request('search') . '%');
    }

    return view('posts', [
        'posts' => Post::latest()->with(['category', 'author'])->get(), 'categories' => Category::all()
    ]);
})->name('home');

// route model binding = binding route ky to underlying eloquent model
// wildcard must match the variable name
Route::get('posts/{post:slug}', function(Post $post){ //Post::where('slug', $post)->firstOrFail()
    return view('post', ['post' => $post]);
});

Route::get('categories/{category:slug}', function(Category $category){
    return view('posts', [
        'posts' => $category->posts,
    'categories' => Category::all()
    ]);
})->name('category');

Route::get('authors/{author:username}', function(User $author){
    // dd($author);
    return view('posts', ['posts' => $author->posts, 'categories' => Category::all() ]);
});
