<?php

use App\Http\Controllers\PostController;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;

Route::get('/', [PostController::class, 'index'])->name('home');

// route model binding = binding route key to underlying eloquent model
// wildcard must match the variable name
Route::get('posts/{post:slug}', [PostController::class, 'show']);
