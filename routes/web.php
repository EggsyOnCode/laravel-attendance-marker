<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\SessionController;

// Reroute to login page
Route::get('/', function () {
    return redirect()->route('login');
});

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


Route::get('/create-session', [SessionController::class, 'create'])->name('create.session');
Route::post('/store-session', [SessionController::class, 'store'])->name('store.session');


Route::get('/mark_attendance/{sessionid}', [AttendanceController::class, 'create'])->name('attendance.create');
Route::post('/mark_attendance/{sessionid}', [AttendanceController::class, 'store'])->name('attendance.store');


