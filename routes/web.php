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
Route::get("/{$routeAdmin}/movie/detail/{movieId}", [AdminController::class, 'movieDetail'])->name('admin.movie_detail');
Route::get("/{$routeAdmin}/movie/edit/{movieId}", [AdminController::class, 'movieEdit'])->name('admin.movie_edit');
Route::post("/{$routeAdmin}/movie/save", [AdminController::class, 'movieSave'])->name('admin.movie_save');
Route::get("/{$routeAdmin}/video/add/{movieId}", [AdminController::class, 'videoAdd'])->name('admin.video_add');
Route::post("/{$routeAdmin}/video/save", [AdminController::class, 'videoSave'])->name('admin.video_save');
Route::get("/{$routeAdmin}/video/edit/{videoId}", [AdminController::class, 'videoEdit'])->name('admin.video_edit');


//Clear Cache facade value:
Route::get('/s-clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    return '<h1>Cache facade value cleared</h1>';
});

//Reoptimized class loader:
Route::get('/s-migrate', function() {
    $exitCode = Artisan::call('migrate');
    return '<h1>migrate</h1>';
});

//Reoptimized class loader:
Route::get('/s-optimize', function() {
    $exitCode = Artisan::call('optimize');
    return '<h1>Reoptimized class loader</h1>';
});

//Route cache:
Route::get('/s-route-cache', function() {
    $exitCode = Artisan::call('route:cache');
    return '<h1>Routes cached</h1>';
});

//Clear Route cache:
Route::get('/s-route-clear', function() {
    $exitCode = Artisan::call('route:clear');
    return '<h1>Route cache cleared</h1>';
});

//Clear View cache:
Route::get('/s-view-clear', function() {
    $exitCode = Artisan::call('view:clear');
    return '<h1>View cache cleared</h1>';
});

//Clear Config cache:
Route::get('/s-config-cache', function() {
    $exitCode = Artisan::call('config:cache');
    $exitCode = Artisan::call('view:clear');
    $exitCode = Artisan::call('route:clear');
    $exitCode = Artisan::call('route:cache');
    $exitCode = Artisan::call('cache:clear');
    return '<h1>Clear Config cleared</h1>';
});