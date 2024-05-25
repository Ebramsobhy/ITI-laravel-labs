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


use App\Http\Controllers\UserController;
Route::get('/users',[UserController::class,'index'])->name('users');



use App\Http\Controllers\AmazonController;
use App\Http\Controllers\PostController;

Route::get('posts/objects', [PostController::class, 'get_posts'] );



Route::get('/products',[AmazonController::class,'products']);
Route::get('/aboutus',[AmazonController::class,'aboutUs']);
Route::get('/contactus',[AmazonController::class,'contactUs']);

Route::get('/allposts',[PostController::class,'index'])->name('posts.showPost')->middleware('auth');
Route::get('/posts/create',[PostController::class,'create'])->name('posts.create')->middleware('auth');
Route::post('/allposts',[PostController::class,'store'])->name('posts.store')->middleware('auth');
Route::get('/posts/{post}',[PostController::class,'show'])->name('posts.show')->middleware('auth');
Route::get('/posts/{post}/edit',[PostController::class,'edit'])->name('posts.edit')->middleware('auth');
Route::put('/posts/{post}',[PostController::class,'update'])->name('posts.update')->middleware('auth');
Route::delete('/posts/{post}/delete',[PostController::class,'destroy'])->name('posts.destroy')->middleware('auth');

Route::delete('/posts/{post}', [PostController::class, 'delete'])->name('posts.delete')->middleware('auth');

Route::get('/users/{id}', [UserController::class, 'show'])->name('users.showPostUser')->middleware('auth');

Route::get('/users', [UserController::class, 'index'])->name('users.showUsers')->middleware('auth');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('/users/{user}', [UserController::class, 'show'])->name('users.showPostUser');

Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');

