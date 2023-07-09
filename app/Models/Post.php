<?php

namespace App\Models;

use App\Models\Comment;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    // option 3 never allow mass assignment
    // this is no longer needed as set in AppServiceProvider
    // protected $guarded = [];
    // option 2: protected $guarded = ['id'];
    // option 1: specifics which attrs can be mass/bulk assigned
    // protected $fillable = ['title', 'excerpt', 'body'];

    // public function getRouteKeyName()
    // {
    //     return 'slug';
    // }

    // default for every post query - eager loading
    // protected $with = ['category', 'author'];

    public function scopeFilter($query, array $filters) {
        // Post::newQuery()->filter()->where('title'....)
        // $query->where
        $query->when($filters['search'] ?? false, function ($query, $search){
            $query->where(fn($query) =>
                $query->where('title', 'like', '%' . $search . '%')
                ->orWhere('body', 'like', '%' . $search . '%')
            );
         });

         $query->when($filters['category'] ?? false, fn ($query, $category) =>
             $query->whereHas('category', fn($query) =>
             $query->where('slug', $category)
        ));

        $query->when($filters['author'] ?? false, fn ($query, $author) =>
            $query->whereHas('author', fn($query) =>
            $query->where('username', $author)
         ));
        //     $query
        //     ->whereExists(fn($query) =>
        //         $query->from('categories')
        //         // ->where('categories.id', 'posts.category.id') // this does not work posts.category.id is not a string change to column
        //         ->whereColumn('categories.id', 'posts.category.id')
        //         ->where('categories.slug', $category)
        //  );
    // });
    }

    public function comments(){
        return $this->hasMany(Comment::class, 'user_id');
    }

    public function category(){
        // hasOne, hasMany, belongsTo, belongsToMany
        // post belongs to one category
        return $this->belongsTo(Category::class);
    }

    public function author(){
        return $this->belongsTo(User::class, 'user_id'); // author of post
    }
}
