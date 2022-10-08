<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Todo_listController;
use App\Http\Controllers\CategoryController;

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

Route::controller(Todo_listController::class)->group(function () {
    Route::get('/', 'index');
    Route::post('/todo_list/{id}', 'destroy');
    Route::post('/todo_list', 'store');
});

Route::controller(CategoryController::class)->group(function () {
    Route::post('/category/{id}', 'destroy');
    Route::post('/category', 'store');
});


