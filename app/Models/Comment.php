<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;

    public function posts(){
        return $this->belongsTo(Post::class);
    }

    public function author(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
