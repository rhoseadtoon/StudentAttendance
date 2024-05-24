<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\SubjectController;

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


Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/', [HomeController::class, 'welcome']);

Route::get('/students', [StudentController::class, 'index'])->name('students');
Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
Route::post('/students/create', [StudentController::class, 'store'])->name('students.store');
Route::get('/students/{student}', [StudentController::class, 'edit'])->name('students.edit');
Route::post('/students/{student}', [StudentController::class, 'update']);
Route::delete('/students/delete/{student}', [StudentController::class, 'delete']);
Route::get('/student/pdf', [StudentController::class, 'pdf'])->name('student.pdf');

Route::get('/subjects', [SubjectController::class, 'index'])->name('subjects.index');
Route::get('/subjects/create', [SubjectController::class, 'create'])->name('subjects.create');
Route::post('/subjects/create', [SubjectController::class, 'store'])->name('subjects.store');
Route::get('/subjects/{subject}', [SubjectController::class, 'edit'])->name('subjects.edit');
Route::put('/subjects/{subject}', [SubjectController::class, 'update'])->name('subjects.update');
Route::delete('/subjects/{subject}', [SubjectController::class, 'delete'])->name('subjects.delete');

Route::get('/attendances', [AttendanceController::class, 'index'])->name('attendance.index');
Route::get('/attendances/create', [AttendanceController::class, 'create'])->name('attendance.create'); 
Route::post('/attendances/create', [AttendanceController::class, 'store'])->name('attendance.store');
Route::delete('/attendances/{attendance}', [AttendanceController::class, 'delete'])->name('attendance.delete');
Route::get('/attendances/export-csv', [AttendanceController::class, 'exportCsv'])->name('attendance.csv');
Route::get('/attendances/import-csv', [AttendanceController::class, 'importCsvForm'])->name('attendance.import');
Route::post('/attendances/import-csv', [AttendanceController::class, 'importCsv']);

Route::get('/scanner', function () {
    return view('pages.scanner');
})->name('scanner');
Route::post('/scanner/scan', [AttendanceController::class, 'handleScan'])->name('scanner.scan');