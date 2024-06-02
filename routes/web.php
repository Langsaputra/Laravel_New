<?php

use App\Http\Controllers\CoursesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Admin Controller
Route::get('admin/dashboard', [DashboardController::class, 'index'])->name('admin');

// Route menampilkan 
Route::get('admin/student', [StudentController::class, 'index']);

Route::get('admin/courses', [CoursesController::class, 'index']);

// Route untuk menampilkan form tambah student
Route::get('admin/student/create', [StudentController::class, 'create']);

// Route untuk menampilkan halaman create
Route::post('admin/student/create', [StudentController::class, 'store']);

// untuk menampilkan halaman edit
Route::get('admin/student/edit/{id}', [StudentController::class, 'edit'])->name('student.edit');

// Route untuk menyimpan hasil edit 
Route::put('admin/student/update/{id}', [StudentController::class, 'update']);

// Route untuk menghapus 
Route::delete('admin/student/delete/{id}', [StudentController::class, 'destroy']);