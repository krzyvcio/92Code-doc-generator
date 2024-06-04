<?php

use App\Http\Controllers\Api\CategoryApiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Category\CategoryController;

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/login', function () {
    return view('auth.login');
});
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/dashboard', function () {
    return view('dashboard.show');
})->middleware(['auth'])->name('dashboard.show');

## Category
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/{id}', [CategoryController::class, 'show'])->name('categories.show');
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
//middleware for CategoryApiController
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/categories', [CategoryApiController::class, 'store'])->name('categories.store');
    Route::put('/categories/{id}', [CategoryApiController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{id}', [CategoryApiController::class, 'destroy'])->name('categories.destroy');
    Route::get('/categories/{id}', [CategoryApiController::class, 'show'])->name('categories.show');
    Route::get('/categories', [CategoryApiController::class, 'index'])->name('categories.index');
});


## Document
Route::view('/documents', 'documents.index')->name('documents.index');
Route::view('/documents/create', 'documents.create')->name('documents.create');
Route::view('/documents/{id}/edit', 'documents.edit')->name('documents.edit');
//middleware for DocumentApiController
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/documents', [App\Http\Controllers\Api\DocumentApiController::class, 'store'])->name('documents.store');
    Route::put('/documents/{id}', [App\Http\Controllers\Api\DocumentApiController::class, 'update'])->name('documents.update');
    Route::delete('/documents/{id}', [App\Http\Controllers\Api\DocumentApiController::class, 'destroy'])->name('documents.destroy');
    Route::get('/documents/{id}', [App\Http\Controllers\Api\DocumentApiController::class, 'show'])->name('documents.show');
    Route::get('/documents', [App\Http\Controllers\Api\DocumentApiController::class, 'index'])->name('documents.index');
});