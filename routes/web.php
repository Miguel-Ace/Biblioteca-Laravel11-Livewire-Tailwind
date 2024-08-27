<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', 'libros');

Route::get('libros', [DashboardController::class,'libros'])
    ->middleware(['auth', 'verified'])
    ->name('libros');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('categorias', [DashboardController::class,'categorias'])
    ->middleware(['auth'])
    ->name('categorias');

Route::get('autores', [DashboardController::class,'autores'])
    ->middleware(['auth'])
    ->name('autores');

require __DIR__.'/auth.php';
