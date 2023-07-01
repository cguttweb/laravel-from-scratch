<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;

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
    // resource is a helper function
    $files = File::files(resource_path("posts/"));

    return array_map(function($file){
      return $file->getContents();
    }, $files);
    // converted to arrow function
    // return array_map(fn($file) => $file->getContents(), $files);
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