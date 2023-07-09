<?php

use App\Http\Controllers\PostCommentsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\RegisterController;


Route::get('ping', function(){
    $mailchimp = new \MailchimpMarketing\ApiClient();

    $mailchimp->setConfig([
        'apiKey' => config('services.mailchimp.key'),
        'server' => 'us8'
    ]);

    // $response = $mailchimp->lists->getAllLists(); // at this point just one list so single id returned b09591bd3a
    $response = $mailchimp->lists->addListMember('b09591bd3a', [
        "email_address" => "prudence.mcvankab@example.com",
        "status" => "subscribed",
    ]);
    ddd($response);

});

Route::get('/', [PostController::class, 'index'])->name('home');

// route model binding = binding route key to underlying eloquent model
// wildcard must match the variable name
Route::get('posts/{post:slug}', [PostController::class, 'show']);
Route::post('posts/{post:slug}/comments', [PostCommentsController::class, 'store']);

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('login', [SessionController::class, 'create'])->middleware('guest');
Route::post('login', [SessionController::class, 'store'])->middleware('guest');

Route::post('logout', [SessionController::class, 'destroy'])->middleware('auth');

