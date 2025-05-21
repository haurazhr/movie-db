<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[MovieController::class,'index']);
Route::get('/movie/{id}/{slug}',[MovieController::class,'detail_movie']);
Route::get('/movie/create',[MovieController::class,'create']);
Route::post('/movie/store',[MovieController::class,'store']);