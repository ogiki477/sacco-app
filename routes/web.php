<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
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

//Auth

Route::get('/',[AuthController::class,'login']);
Route::get('register',[AuthController::class,'register']);
Route::get('forgot',[AuthController::class,'forgot']);
Route::post('register',[AuthController::class,'register_insert']);

//Dashboard

Route::get('admin/dashboard',[DashboardController::class,'index']);
