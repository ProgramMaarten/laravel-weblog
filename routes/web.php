<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/hello', function () {
    return 'Hello, World!';
});
Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/articles/user_index', [ArticleController::class, 'userIndex'])->name('articles.userIndex');
Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create');
Route::post('/articles', [ArticleController::class, 'store'])->name('articles.store');
Route::get('/articles/{article}', [ArticleController::class, 'show'])->name('articles.show');
Route::get('/articles/{article}/edit', [ArticleController::class, 'edit'])->name('articles.edit');
Route::put('/articles/{article}', [ArticleController::class, 'update'])->name('articles.update');
Route::delete('/articles/{article}', [ArticleController::class, 'destroy'])->name('articles.destroy');
// Redirect the homepage to the '/articles' route
Route::redirect('/', '/articles');

//Categories
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');

//Login session

Route::get('/login', [LoginController::class, 'create'])->name('auth.login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('auth.authenticate');
Route::post('/logout',[LoginController::class, 'destroy'])->name('auth.logout');

//User premium setting
Route::get('/premium',[UserController::class, 'edit'])->name('users.premium');