<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
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

    $posts = Post::all();

    // ddd($posts);

    return view('posts', [
        'posts' => $posts
    ]);
});


Route::get('posts/{post}', function($slug){
    // find a post by its slug & pass it to view called post

    return view('post', ['post' => Post::find($slug)]);

})->where('post', '[A-z_\-]+');
