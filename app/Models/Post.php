<?php

namespace App\Models;

use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Post 
{

  public $title;

  public $excerpt;

  public $date;

  public $body;

  public $slug;
  /**
   * Class constructor.
   */
  public function __construct($title, $excerpt, $date, $body, $slug)
  {
    $this->title = $title;
    $this->excerpt = $excerpt;
    $this->date = $date;
    $this->body = $body;
    $this->slug = $slug;
  }  

  public static function all(){

    return collect(File::files(resource_path('posts')))
    ->map(fn($file) => YamlFrontMatter::parseFile($file))
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
  }

  public static function find($slug){
    // base path is helper function
      base_path();
      if (!file_exists($path = resource_path("posts/{$slug}.html"))){
      // dump die useful for quick debugging
      // dd('file does not exist');
      // ddd('file does not exist');
      throw new ModelNotFoundException();
    }

    return cache()->remember("posts.{$slug}", 1200, fn() => file_get_contents($path));
  }
}