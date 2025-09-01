<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\UploadController;
// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [ContactController::class, 'index'])->name('home');
Route::get('/contact', [ContactController::class, 'showForm'])->name('contact');
Route::post('/contact', [ContactController::class, 'submitForm'])->name('contact.submit');
Route::get('/confirmation', [ContactController::class, 'confirmation'])->name('contact.confirmation');
Route::get('/projects', [ContactController::class, 'projects'])->name('projects');
Route::get('/resume', [ContactController::class, 'resume'])->name('resume');
Route::get('/upload', [UploadController::class, 'showForm'])->name('upload.form');
Route::post('/upload', [UploadController::class, 'handleUpload'])->name('upload.handle');