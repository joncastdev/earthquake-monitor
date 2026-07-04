<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index']);

Route::get('/test', [HomeController::class, 'test']);

Route::get('/vals', [HomeController::class, 'vals']);

Route::get('/catalogs', [HomeController::class, 'catalogs']);

Route::get('/consultas', [HomeController::class, 'consultas']);
