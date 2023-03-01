<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AboutController;

Route::resource('dashboard', DashboardController::class)->middleware(['auth']);
Route::resource('/', DashboardController::class)->middleware(['auth']);

Route::get('generate', function () {
    \Illuminate\Support\Facades\Artisan::call('storage:link');
    echo 'ok';
});

//about
Route::get('/about-description', [AboutController::class, 'description'])->middleware(['auth']);
Route::post('/about-description/save', [AboutController::class, 'descriptionSave'])->middleware(['auth']);

Route::get('/about-value', [AboutController::class, 'valueIndex'])->middleware(['auth']);
Route::get('/about-value/add', [AboutController::class, 'valueForm'])->middleware(['auth']);
Route::get('/about-value/edit/{id}', [AboutController::class, 'valueForm'])->middleware(['auth']);
Route::post('/about-value/save', [AboutController::class, 'valueSave'])->middleware(['auth']);
Route::post('/about-value/delete', [AboutController::class, 'valueDelete'])->middleware(['auth']);
Route::get('/about-value/detail/{id}', [AboutController::class, 'valueDetail'])->middleware(['auth']);
//about


