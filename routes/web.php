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
Route::get('/about-description', [AboutController::class, 'description'])->middleware(['auth'])->name('about-description');
Route::post('/about-description/save', [AboutController::class, 'descriptionSave'])->middleware(['auth'])->name('about-description.save');

Route::get('/about-value', [AboutController::class, 'valueIndex'])->middleware(['auth'])->name('about-values');
Route::get('/about-value/add', [AboutController::class, 'valueForm'])->middleware(['auth'])->name('about-values.create');
Route::get('/about-value/edit/{id}', [AboutController::class, 'valueForm'])->middleware(['auth'])->name('about-values.edit');
Route::post('/about-value/save', [AboutController::class, 'valueSave'])->middleware(['auth'])->name('about-values.save');
Route::delete('/about-value/delete/{id}', [AboutController::class, 'valueDelete'])->middleware(['auth'])->name('about-values.delete');
Route::get('/about-value/detail/{id}', [AboutController::class, 'valueDetail'])->middleware(['auth'])->name('about-values.show');
//about


