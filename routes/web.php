<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\LoanPlanController;
use App\Http\Controllers\LoanTypeController;
use App\Http\Controllers\LoanUserController;
use App\Http\Controllers\StaffController;
use Illuminate\Support\Facades\Route;
use PharIo\Manifest\AuthorCollectionIterator;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
    Route::get('admin/staff/view/{id}',[StaffController::class,'staff_view']);

    //Loan Types
    
    Route::get('admin/loan_types/list',[LoanTypeController::class,'index']);
    Route::get('admin/loan_types/add',[LoanTypeController::class,'create']);
    Route::post('admin/loan_types/add',[LoanTypeController::class,'store']);
    Route::get('admin/loan_types/edit/{id}',[LoanTypeController::class,'edit']);
    Route::post('admin/loan_types/edit/{id}',[LoanTypeController::class,'update']);
    Route::get('admin/loan_types/delete/{id}',[LoanTypeController::class,'destroy']);


    //Loan Plan 

    Route::get('admin/loan_plan/list',[LoanPlanController::class,'index']);
    Route::get('admin/loan_plan/add',[LoanPlanController::class,'create']);
    Route::post('admin/loan_plan/add',[LoanPlanController::class,'store']);
    Route::get('admin/loan_plan/edit/{id}',[LoanPlanController::class,'edit']);
    Route::post('admin/loan_plan/edit/{id}',[LoanPlanController::class,'update']);
    Route::get('admin/loan_plan/delete/{id}',[LoanPlanController::class,'destroy']);


    // Loans 

    Route::get('admin/loans/list',[LoanController::class,'index']);
    Route::get('admin/loans/add',[LoanController::class,'create']);
    Route::post('admin/loans/add',[LoanController::class,'store']);
    Route::get('admin/loans/edit/{id}',[LoanController::class,'edit']);    
    Route::post('admin/loans/edit/{id}',[LoanController::class,'update']);
    Route::get('admin/loans/delete/{id}',[LoanController::class,'destroy']);





    //LoanUser
    Route::get('admin/loan_user/list',[LoanUserController::class,'index']);
    Route::get('admin/loan_user/add',[LoanUserController::class,'create']);
    Route::post('admin/loan_user/add',[LoanUserController::class,'store']);
    Route::get('admin/loan_user/edit/{id}',[LoanUserController::class,'edit']);
    Route::post('admin/loan_user/update/{id}',[LoanUserController::class,'update']);
    Route::get('admin/loan_user/delete/{id}',[LoanUserController::class,'destroy']);


    //Profile 
    Route::get('admin/profile',[DashboardController::class,'profile']);
    Route::post('admin/profile/update',[DashboardController::class,'profile_update']);

   


});

//middleware/Staff
Route::group(['middleware' => 'staff'], function(){
    Route::get('staff/dashboard',[DashboardController::class,'index']);

    //Loan User
    Route::get('staff/loan_user/list',[LoanUserController::class,'staff_loan_user']);
    Route::get('staff/loan_user/delete/{id}',[LoanUserController::class,'delete_loan_user']);
    Route::get('staff/profile',[DashboardController::class,'profile_staff']);
    Route::post('staff/profile',[DashboardController::class,'profile_staff_update']);
    

    
});



