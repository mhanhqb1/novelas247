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
