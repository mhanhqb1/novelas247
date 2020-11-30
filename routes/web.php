<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/movie/{slug}', [HomeController::class, 'movieDetail'])->name('home.movie_detail');
Route::get('/video/{movieSlug}/{videoNumber}', [HomeController::class, 'videoDetail'])->name('home.video_detail');

$routeAdmin = 'admin';
Route::get("/{$routeAdmin}/movies", [AdminController::class, 'movies'])->name('admin.movies');
Route::get("/{$routeAdmin}/movie/add", [AdminController::class, 'movieAdd'])->name('admin.movie_add');
Route::post("/{$routeAdmin}/movie/save", [AdminController::class, 'movieSave'])->name('admin.movie_save');
Route::get("/{$routeAdmin}/video/add/{movieId}", [AdminController::class, 'videoAdd'])->name('admin.video_add');
Route::post("/{$routeAdmin}/video/save", [AdminController::class, 'videoSave'])->name('admin.video_save');
