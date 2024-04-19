<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;   

Route::get('/', function () {
    return view('welcome');
});

Route::get('/coba', function () {
    return view('coba');
});

Route::get('/haii', function () {
    return view('haii');
});

Route::get('/slider', function () {
    return view('cobacoba.slider');
});

Route::get('/slider1', function () {
    return view('cobacoba.slider1');
});

Route::get('/button', function () {
    return view('cobacoba.button');
});

Route::get('/graph', function () {
    return view('cobacoba.graph');
});

// Route::get('/export', function () {
//     return view('export');
// });

Route::get('/report', [UserController::class, 'index'])->name('report');
Route::get('/exportPost', [ExportController::class, 'index'])->name('exportPost');
Route::get('/exportAlbum', [ExportController::class, 'tampilan'])->name('exportAlbum');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/profile', [App\Http\Controllers\AlbumController::class, 'profile'])->name('profile');

Route::get('/albums', [App\Http\Controllers\AlbumController::class, 'index'])->name('index');
Route::get('/albums/create', [App\Http\Controllers\AlbumController::class, 'create'])->name('album-create');
Route::post('/albums/store', [App\Http\Controllers\AlbumController::class, 'store'])->name('album-store');
Route::get('/albums/{id}', [App\Http\Controllers\AlbumController::class, 'show'])->name('album-show');
Route::delete('/album/{id}', [App\Http\Controllers\AlbumController::class, 'destroy'])->name('album-delete');


Route::get('/posts', [PostsController::class, 'create'])->name('posts');
Route::post('/posts', [PostsController::class, 'store'])->name('posts');
Route::post('/posts/{id}/like', [PostsController::class, 'like'])->name('posts.like');
Route::delete('/posts/{id}',  [PostsController::class, 'destroy'])->name('posts.destroy');
Route::get('posts/{id}/edit', [PostsController::class, 'edit'])->name('posts.edit');
Route::put('posts/{id}', [PostsController::class, 'update'])->name('posts.update');
Route::get('/download-image/{id}', [PostsController::class, 'downloadImage'])->name('download.image');



Route::get('/post/{id}', [PostsController::class, 'show'])->name('photo-show');
Route::delete('/post/{id}',  [HomeController::class, 'hapus'])->name('photo-hapus');


Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');



// Route::group(['middlewere' => 'auth'], function(){
//     Route::prefix('/user/')->group(function(){
//         Route::get('galleries/create', [GalleryController::class, 'galleryCreate'])->name('galleryCreate');
//         Route::post('galleries/store', [GalleryController::class, 'galleryStore'])->name('galleryStore');
//     });
// });

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::group(['middleware' => ['web', 'auth']], function(){
//     Route::get('/', function () {
//         return view('welcome');
//     });
// });