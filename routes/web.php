<?php

use Illuminate\Support\Facades\Route;

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
    return view('posts');
});


Route::get('posts/{post}', function($slug){

   $path = __DIR__ . "/../resources/posts/{$slug}.html";

//    ddd($path);

    if (! file_exists($path)){
        // dump die useful for quick bugging
        // dd('file does not exist');
        // ddd('file does not exist');
        // abort(404)
        return redirect('/');
    }

    $post = cache()->remember("posts.{$slug}", 1200, function() use ($path) {
        return file_get_contents($path);
    });


    return view('post', [
        'post' => $post
    ]);
})->where('post', '[A-z_\-]+');
