<?php

use App\Http\Controllers\Posts;
use Illuminate\Support\Facades\Route;

Route::get('/posts', [Posts::class, 'show']);
Route::post('/posts', [Posts::class, 'store']);
Route::put('/posts/{id}', [Posts::class, 'update']);
