<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\ManagerAuthController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\YearsController;
use App\Http\Middleware\CheckAuth;
use App\Http\Middleware\managerAuth;
use App\Http\Middleware\SetAuthGuard;
use App\Http\Middleware\teacherAuth;
use Illuminate\Support\Facades\Route;



Route::get('login_form' ,[ManagerAuthController::class , 'show_form'])->name('login_form');
Route::post('check_login' , [ManagerAuthController::class ,'check_form'])->name('check_login');

Route::middleware(managerAuth::class)->group(function(){

    Route::get('index' , [DashboardController::class , 'index'])->name('index');

    // Route::get('index', function () {
    //     return view('dashboard.pages.index');
    // })->name('index');

    Route::resource('year', YearsController::class);
    Route::resource('sub', SubController::class);
    Route::resource('teacher', TeacherController::class);
    Route::resource('manager', ManagerController::class);
    Route::resource('student', StudentController::class);
    Route::get('logout' , [ManagerAuthController::class , 'logout'])->name('logout');

});

Route::middleware(teacherAuth::class)->group(function(){

    Route::get('index2' , [DashboardController::class , 'index'])->name('index2');

    // Route::get('index2', function () {
    //     return view('dashboard.pages.index');
    // })->name('index2');
});

Route::middleware(CheckAuth::class)->group(function(){
    Route::resource('course' , CourseController::class);
    Route::get('lessons' , [LessonController::class , 'index'])->name('lesson.index');
    Route::resource('course.lesson' , LessonController::class);
});