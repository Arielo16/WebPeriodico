<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WriterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NewsLabelController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\LabelController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\CategoryController;



Route::get('get/news-labels', [NewsLabelController::class, 'index']);
Route::post('post/news-labels', [NewsLabelController::class, 'store']);
Route::get('get/news-labels/{id}', [NewsLabelController::class, 'show']);
Route::put('put/news-labels/{id}', [NewsLabelController::class, 'update']);
Route::delete('delete/news-labels/{id}', [NewsLabelController::class, 'destroy']);

Route::get('get/news', [NewsController::class, 'index']);
Route::post('post/news', [NewsController::class, 'store']);
Route::get('get/news/{id}', [NewsController::class, 'show']);
Route::put('put/news/{id}', [NewsController::class, 'update']);
Route::delete('delete/news/{id}', [NewsController::class, 'destroy']);

Route::get('get/labels', [LabelController::class, 'index']);
Route::post('post/labels', [LabelController::class, 'store']);
Route::get('get/labels/{id}', [LabelController::class, 'show']);
Route::put('put/labels/{id}', [LabelController::class, 'update']);
Route::delete('delete/labels/{id}', [LabelController::class, 'destroy']);

Route::get('get/images', [ImageController::class, 'index']);
Route::post('post/images', [ImageController::class, 'store']);
Route::get('get/images/{id}', [ImageController::class, 'show']);
Route::put('put/images/{id}', [ImageController::class, 'update']);
Route::delete('delete/images/{id}', [ImageController::class, 'destroy']);

Route::get('get/categories', [CategoryController::class, 'index']);
Route::post('post/categories', [CategoryController::class, 'store']);
Route::get('get/categories/{id}', [CategoryController::class, 'show']);
Route::put('put/categories/{id}', [CategoryController::class, 'update']);
Route::delete('delete/categories/{id}', [CategoryController::class, 'destroy']);

Route::prefix('users')->group(function () {
    Route::post('/register', [UserController::class, 'register']);
    Route::post('/login', [UserController::class, 'login']);
});

Route::prefix('writers')->group(function () {
    Route::post('/register', [WriterController::class, 'register']);
});
Route::prefix('news')->group(function () {
    Route::post('/register', [NewsController::class, 'register']);
});
