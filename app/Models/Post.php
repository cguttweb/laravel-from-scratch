<?php

namespace App\Models;

class Post 
{
  public static function find($slug){
        if (! file_exists($path = __DIR__ . "/../resources/posts/{$slug}.html")){
        // dump die useful for quick bugging
        // dd('file does not exist');
        // ddd('file does not exist');
        return redirect('/');
    }

    return $post = cache()->remember("posts.{$slug}", 1200, fn() => file_get_contents($path));


  }
}