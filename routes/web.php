<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;

Route::get('/', function () {
    return view('login');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// });

// Route::get('/students', function () {
//     return view('students.index');
// });

// Route::get('/students/edit', function () {
//     return view('students.edit');
// });

// Route::get('/teachers', function () {
//     return view('teachers.index');
// });

// Route::get('/teachers/edit', function () {
//     return view('teachers.edit');
// });

Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post'); 
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post'); 
Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard'); 
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::resource('students', StudentController::class);
Route::resource('teachers', TeacherController::class);