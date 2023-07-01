<?php

use App\Models\Post;
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

    $posts = collect(File::files(resource_path('posts')))
    ->map(fn($file) => $document = YamlFrontMatter::parseFile($file))
    ->map(fn($document) => 
        new Post(
            $document->title,
            $document->excerpt,
            $document->date,
            $document->body(),
            $document->slug
        ));
    // Functionality the same as array_map
    // $posts = array_map(function($file){
    //     $document = YamlFrontMatter::parseFile($file);
    //     return new Post(
    //         $document->title,
    //         $document->excerpt,
    //         $document->date,
    //         $document->body(),
    //         $document->slug
    //     );
    // }, $files);


    // ddd($posts[1]->body);
    return view('posts', [
        'posts' => $posts
    ]);
});


Route::get('posts/{post}', function($slug){
    // find a post by its slug & pass it to view called post

    return view('post', ['post' => Post::find($slug)]);

})->where('post', '[A-z_\-]+');
