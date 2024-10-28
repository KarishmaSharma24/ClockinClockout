<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Backend\StaffController;

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

Route::get('/home', [HomeController::class, 'index'])->name('home');

Auth::routes();

Route::group(['middleware' => 'authCheck'], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/clockin', [HomeController::class, 'clockIn'])->name('clockin');
    Route::get('/clockout', [HomeController::class, 'clockOut'])->name('clockout');
    Route::post('/logout', [HomeController::class, 'logout'])->name('logout');
    Route::resource('/staff', StaffController::class);
    Route::get('/staff/destroy/{id}', [StaffController::class,'destroy'])->name('staff.destroy');
});


