<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\CommentsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::redirect('/', '/posts')->middleware('auth');

Route::resource('posts',PostsController::class)->middleware('auth');
Route::resource('comments',CommentsController::class)->except([
    'index', 'show', 'update', 'edit'
])->middleware('auth');
require __DIR__.'/auth.php';


