<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    // option 3 never allow mass assignment
    protected $guarded = [];
    // option 2: protected $guarded = ['id'];
    // option 1: specifics which attrs can be mass/bulk assigned
    // protected $fillable = ['title', 'excerpt', 'body'];

    // public function getRouteKeyName()
    // {
    //     return 'slug';
    // }
}
