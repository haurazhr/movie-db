<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;



Route::get('/', [MovieController::class, 'index']);


Route::get('/movie/{id}/edit', [MovieController::class, 'edit'])->middleware('auth')->name('movie.edit');
Route::put('/movie/{id}', [MovieController::class, 'update'])->middleware('auth')->name('movie.update');
Route::delete('/movie/{id}', [MovieController::class, 'destroy'])->middleware('auth')->name('movie.destroy');


Route::get('/movie/{id}/{slug}', [MovieController::class, 'detail_movie']);

Route::get('/genre/{category_name}', [MovieController::class, 'index']);



Route::get('/login', [AuthController::class, 'formLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/login');
});

Route::get('/movie/create', [MovieController::class, 'create'])->middleware('auth')->name('movie.create');
Route::post('/movie/store', [MovieController::class, 'store'])->middleware('auth');
Route::get('/movie/data', [MovieController::class, 'dataMoviePage'])->middleware('auth')->name('movie.data');
