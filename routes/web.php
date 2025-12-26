<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\AuthController;

//* Navigation Routes
Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/drop', function () {
    return view('drop');
})->name('drop');

Route::get('/draw', function () {
    return view('draw');
})->name('draw');

Route::get('/login', function () {
    return view('login');
})->name('login');


//* Action Routes (CRUD Operations)
// User Routes
Route::post('/drop', [MessageController::class, 'submitMessage'])->name('drop.submit');
Route::get('/draw/random', [MessageController::class, 'drawRandomMessage'])->name('draw.random');

// Admin Routes
Route::post('/login', [AuthController::class, 'login'])->name('login.submit'); 
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/dashboard', [MessageController::class, 'showDashboard'])->name('dashboard');
Route::get('/messages/{id}', [MessageController::class, 'showMessage'])->name('messages.show');
Route::get('/messages/{id}/edit', [MessageController::class, 'showEditForm'])->name('messages.edit');
Route::post('/messages/{id}/edit', [MessageController::class, 'editMessage'])->name('messages.update');
Route::delete('/messages/{id}', [MessageController::class, 'deleteMessage'])->name('messages.delete');
