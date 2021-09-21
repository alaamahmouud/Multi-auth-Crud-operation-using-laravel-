<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\labOneController;
use App\Http\Controllers\PostCotroller;
// use Illuminate\Routing\Route::post;

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

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', [PostCotroller::class, 'index'])->name('home')->middleware('auth');


Route::get('posts' ,[PostCotroller::class , 'index' ]) ->name('posts.index')->middleware('auth');//->1
Route::get('posts/create' ,[PostCotroller::class , 'create' ])->name('posts.create')->middleware('auth'); //->2

Route::get('posts/{post}' ,[PostCotroller::class , 'show' ])->name('posts.show')->middleware('auth'); //->3
Route::post('/posts' ,[PostCotroller::class , 'store' ])->name('posts.store')->middleware('auth');  //->4

Route ::get('/posts/{post}/edit' , [PostCotroller::class , 'edit'])->name('posts.edit')->middleware('auth'); //->5

Route::put('/posts/{post}' , [PostCotroller::class , 'update'])->name('posts.update')->middleware('auth'); //->6
Route ::delete('/posts/{post}' , [PostCotroller::class , 'destroy'])->name('posts.destroy')->middleware('auth'); //->7

Route::get('/search' ,[PostCotroller::class , 'search' ])->name('search')->middleware('auth'); //->8
  
use Laravel\Socialite\Facades\Socialite;

Route::get('/auth/redirect', function () {
    return Socialite::driver('github')->redirect();
});

Route::get('/auth/callback', function () {
    $user = Socialite::driver('github')->user();

    // $user->token
});