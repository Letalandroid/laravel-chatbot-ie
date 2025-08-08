<?php

use App\Http\Controllers\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/posts', [Posts::class, 'show']);
