<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::middleware('guest')->group(function () {
    Route::get('/login', [App\Http\Controllers\LoginController::class, 'showLoginForm'])->name('login');
    Route::get('/register', [App\Http\Controllers\RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/login', [App\Http\Controllers\LoginController::class, 'login'])->name('login.post');
    Route::post('/register', [App\Http\Controllers\RegisterController::class, 'register'])->name('register.post');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [App\Http\Controllers\LoginController::class, 'logout'])->name('logout');

    Route::get('/notes', [App\Http\Controllers\NoteController::class, 'index'])->name('notes.index');
    Route::get('/notes/create', [App\Http\Controllers\NoteController::class, 'create'])->name('notes.create');
    Route::get('/notes/{note}/show', [App\Http\Controllers\NoteController::class, 'show'])->name('notes.show');
    Route::get('/notes/{note}/edit', [App\Http\Controllers\NoteController::class, 'edit'])->name('notes.edit');

    Route::post('/notes', [App\Http\Controllers\NoteController::class, 'store'])->name('notes.store');
    Route::patch('/notes/{note}', [App\Http\Controllers\NoteController::class, 'update'])->name('notes.update');
    Route::delete('/notes/{note}', [App\Http\Controllers\NoteController::class, 'destroy'])->name('notes.destroy');
});

