<?php

use App\Http\Controllers\Api\CategoryApiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;

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

// Middleware for CategoryApiController
Route::middleware('auth:sanctum')->group(function () {
    Route::post('api/categories', [CategoryApiController::class, 'store'])->name('categories.store');
    Route::put('api/categories/{id}', [CategoryApiController::class, 'update'])->name('categories.update');
    Route::delete('api/categories/{id}', [CategoryApiController::class, 'destroy'])->name('categories.destroy');
    Route::get('api/categories/{id}', [CategoryApiController::class, 'show'])->name('categories.api.show');
    Route::get('api/categories', [CategoryApiController::class, 'index'])->name('categories.api.index');
});

## Document
Route::get('/documents', [App\Http\Controllers\DocumentController::class, 'index'])->name('documents.index');
Route::get('/documents/create', [App\Http\Controllers\DocumentController::class, 'create'])->name('documents.create');
Route::get('/documents/{id}/edit', [App\Http\Controllers\DocumentController::class, 'edit'])->name('documents.edit');
Route::get('/documents/{id}', [App\Http\Controllers\DocumentController::class, 'show'])->name('documents.show');
Route::put('/documents/{id}', [App\Http\Controllers\DocumentController::class, 'update'])->name('documents.update');


// Middleware for DocumentApiController
Route::middleware('auth:sanctum')->group(function () {
    // Route::post('/documents', [App\Http\Controllers\Api\DocumentApiController::class, 'store'])->name('documents.store');
    Route::put('api/documents/{id}', [App\Http\Controllers\Api\DocumentApiController::class, 'update'])->name('api.documents.update');
    Route::delete('api/documents/{id}', [App\Http\Controllers\Api\DocumentApiController::class, 'destroy'])->name('api.documents.destroy');
    Route::get('api/documents/{id}', [App\Http\Controllers\Api\DocumentApiController::class, 'show'])->name('api.documents.show');
    Route::get('api/documents/all', [App\Http\Controllers\Api\DocumentApiController::class, 'index'])->name('api.documents.index');
});
