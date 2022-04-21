<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\EnrollmentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [StudentController::class, 'welcome'])->name('student.welcome');

Route::get('students', [StudentController::class, 'index'])->name('students.index');
Route::get('student/{id}/show', [StudentController::class, 'show'])->name('students.show');
Route::post('student-store', [StudentController::class, 'store'])->name('students.store');
Route::put('student/{id}/update', [StudentController::class, 'update'])->name('students.update');
Route::get('student/{student}/view', [StudentController::class, 'view'])->name('students.view');
Route::get('student/filter', [StudentController::class, 'filter'])->name('student.filter');

Route::get('country', [StudentController::class, 'getCountry'])->name('students.country');

// Enrollment
Route::get('create/{id}', [EnrollmentController::class, 'create'])->name('enrollment.create');
Route::post('enrollment-store/{id}', [EnrollmentController::class, 'store'])->name('enrollment.store');
Route::get('enrollment/{id}/edit', [EnrollmentController::class, 'edit'])->name('enrollment.edit');
Route::put('update/{id}', [EnrollmentController::class, 'update'])->name('enrollment.update');
Route::put('unenroll/{id}', [EnrollmentController::class, 'unEnroll'])->name('enroll.unenroll');



