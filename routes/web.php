<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;





// php artisan route:list --path=admin | просмотреть все маршруты

Route::get('/', [MainController::class, 'index'])->name('home');
Route::get('/character/{id}', [MainController::class, 'show'])->name('show');
Route::get('/store', [MainController::class, 'fillTheDatabase'])->name('store');
Route::get('/destroy', [MainController::class, 'destroy'])->name('destroy');
Route::post('/search', [MainController::class, 'search'])->name('search');

Route::get('/export', [MainController::class, 'export'])->name('export');