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

Route::get('/about-description', [AboutController::class, 'description'])->middleware(['auth']);
Route::post('/about-description/save', [AboutController::class, 'descriptionSave'])->middleware(['auth']);

