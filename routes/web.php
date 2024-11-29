<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AttendanceController;

// Login Page
Route::get('/login', function () {
    return view('login');
})->name('login');

// Handle Login
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::middleware(['auth'])->group(function () {

    Route::middleware(['role:teacher'])->group(function () {
        Route::get('/teacher', [TeacherController::class, 'dashboard'])->name('teacher.dashboard');
        Route::post('/mark_attendance', [AttendanceController::class, 'markAttendance'])->name('mark.attendance');
    });

    Route::middleware(['role:student'])->group(function () {
        Route::get('/student', [StudentController::class, 'dashboard'])->name('student.dashboard');
    });

});



