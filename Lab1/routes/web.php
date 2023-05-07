<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\BlogController;

Route::get('/', [BlogController::class, 'postsIndex']);
Route::get('/posts', [BlogController::class, 'postsIndex'])->name('posts.index');
Route::get('/posts/create/', [BlogController::class, 'create'])->name('posts.create');
