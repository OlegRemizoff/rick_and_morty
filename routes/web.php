<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;





// php artisan route:list --path=admin | просмотреть все маршруты

Route::get('/', [MainController::class, 'index'])->name('home');
Route::get('/store', [MainController::class, 'fillTheDatabase'])->name('fill');










// Route::get('/article/{slug}', [BlogController::class, 'show'])->name('posts.single');
// Route::get('/category/{slug}', [CategoryBlogController::class, 'index'])->name('posts.by.category');
// Route::get('/tag/{slug}', [TagBlogController::class, 'index'])->name('posts.by.tag');
// Route::post('/search', [SearchController::class, 'index'])->name('search');