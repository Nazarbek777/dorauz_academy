<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\StudentRegisterController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\AttendanceController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/get-districts/{region_id}', [BranchController::class, 'getDistricts']);
Route::post('/transactions', [TransactionController::class, 'create']);
Route::get('/form', [TransactionController::class, 'form']);
Route::post('/test', [TransactionController::class, 'test']);

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'authenticate'])->name('login.authenticate');

Route::middleware(['checkRole:admin', 'auth'])->group(function () {
    Route::group(['prefix' => 'admin'], function () {
        Route::get('/dashboard', [MainController::class, 'index'])->name('admin');

        Route::resource('student_registers', StudentRegisterController::class);


        Route::resource('branch', BranchController::class);
        Route::resource('courses', CourseController::class);
        Route::resource('groups', GroupController::class);
        Route::get('/groups/students/store/{group}', [GroupController::class, 'studentStoreGet'])->name('studentStoreGet');
        Route::get('/groups/attendance/store/{group}', [GroupController::class, 'studentAttendance'])->name('studentAttendance');
        Route::get('/groups/showAttendance/store/{group}', [GroupController::class, 'showAttendance'])->name('showAttendance');
        Route::post('/groups/students/store', [GroupController::class, 'studentStore'])->name('studentStore');
        Route::resource('enrollments', EnrollmentController::class);
        Route::resource('payments', PaymentController::class);
        Route::get('/students/search', [GroupController::class, 'searchStudents'])->name('students.search');
        Route::post('/attendance/store', [GroupController::class, 'storeAttendance'])->name('attendance.store');
        Route::delete('/groups/{group}/students/{students}', [GroupController::class, 'removeStudent'])->name('groups.removeStudent');
        // Register routes
        Route::get('user/all', [LoginController::class, 'all'])->name('user.all');
        Route::get('user/admin', [LoginController::class, 'admin'])->name('user.admin');
        Route::get('user/students', [LoginController::class, 'student'])->name('user.students');
        Route::get('user/teacher', [LoginController::class, 'teacher'])->name('user.teacher');
        Route::get('register', [LoginController::class, 'register'])->name('register');
        Route::post('register', [LoginController::class, 'register_store'])->name('register.store');
        Route::post('logout', [LoginController::class, 'logout'])->name('logout');
        Route::get('/user/{id}/edit', [LoginController::class, 'edit'])->name('user.edit');
        Route::put('/user/{id}', [LoginController::class, 'update'])->name('user.update');
        Route::delete('/user/{id}', [LoginController::class, 'destroy'])->name('user.destroy');
    });
});

Route::post('/get-month-attendance', [GroupController::class, 'getMonthAttendance'])->name("getMonthAttendance");

Route::get('/', function () {
    return redirect()->route('login');
});
