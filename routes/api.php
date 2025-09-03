<?php

use App\Http\Controllers\ChatController;
use App\Http\Controllers\Posts;
use Illuminate\Support\Facades\Route;

# Posts
Route::get('/posts', [Posts::class, 'show']);
Route::post('/posts', [Posts::class, 'store']);
Route::put('/posts/{id}', [Posts::class, 'update']);

#ChatBot
Route::post('/chat', [ChatController::class, 'response']);