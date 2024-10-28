<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoanTypeController;
use App\Http\Controllers\StaffController;
use Illuminate\Support\Facades\Route;
use PharIo\Manifest\AuthorCollectionIterator;

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
Route::post('login_post',[AuthController::class,'login_insert']);
Route::get('register',[AuthController::class,'register']);
Route::get('forgot',[AuthController::class,'forgot']);
Route::post('register',[AuthController::class,'register_insert']);
Route::get('logout',[AuthController::class,'logout']);

//middleware/Admin
Route::group(['middleware' => 'admin'], function(){
    //Staff
    Route::get('admin/dashboard',[DashboardController::class,'index']);
    Route::get('admin/staff/list',[StaffController::class,'index']);
    Route::get('admin/staff/add',[StaffController::class,'add']);
    Route::post('admin/staff/add',[StaffController::class,'add_insert']);
    Route::get('admin/staff/edit/{id}',[StaffController::class,'edit']);
    Route::post('admin/staff/edit/{id}',[StaffController::class,'edit_insert']);
    Route::get('admin/staff/delete/{id}',[StaffController::class,'delete_insert']);

    //Loan Types
    
    Route::get('admin/loan_types/list',[LoanTypeController::class,'index']);

});

//middleware/Staff
Route::group(['middleware' => 'staff'], function(){
    Route::get('staff/dashboard',[DashboardController::class,'index']);
});



