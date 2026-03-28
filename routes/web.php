<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ArticleController; // Подключили наш контроллер
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Наши маршруты для статей (CRUD)
    Route::resource('articles', ArticleController::class);
});

require __DIR__.'/auth.php';