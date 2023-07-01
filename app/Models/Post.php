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

    return cache()->rememberForever('posts.all', function () {
      return collect(File::files(resource_path('posts')))
      ->map(fn($file) => YamlFrontMatter::parseFile($file))
      ->map(fn($document) => 
          new Post(
              $document->title,
              $document->excerpt,
              $document->date,
              $document->body(),
              $document->slug
          ))
          ->sortByDesc('date');
    });

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
    // find the blog post with the slug matches the one requested

    return static::all()->firstWhere('slug', $slug);
  }

  public static function findOrFail($slug){

    $post = static::find($slug);

    if (! $post) {
      throw new ModelNotFoundException();
    }

    return $post;
  }
}