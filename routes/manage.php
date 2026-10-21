<?php

use App\Http\Controllers\ManagerAuthController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\SubController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\YearsController;
use Illuminate\Support\Facades\Route;

Route::get('index', function () {
    return view('dashboard.pages.index');
})->name('index');

Route::resource('year', YearsController::class);
Route::resource('sub', SubController::class);
Route::resource('teacher', TeacherController::class);
Route::resource('manager', ManagerController::class);

Route::get('login_form' ,[ManagerAuthController::class , 'show_form'])->name('login_form');
Route::post('check_login' , [ManagerAuthController::class ,'check_form'])->name('check_login');
Route::get('logout' , [ManagerAuthController::class , 'logout'])->name('logout');