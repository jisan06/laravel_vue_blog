<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/all-blogs', [BlogController::class, 'allBlog']);
Route::get('/blog-details/{id}', [BlogController::class, 'blogDetails']);

Route::post('comment/reply', [CommentController::class,'reply']);

Route::resource('comment', CommentController::class);

