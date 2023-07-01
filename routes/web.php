<?php

use App\Models\Post;
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

    $document = YamlFrontMatter::parseFile(
        resource_path('posts/my-fourth-post.html')
    );

    ddd($document->matter('excerpt'));

    // return view('posts', [
    //     'posts' => Post::all()
    // ]);
});


Route::get('posts/{post}', function($slug){
    // find a post by its slug & pass it to view called post

    return view('post', ['post' => Post::find($slug)]);

})->where('post', '[A-z_\-]+');
