<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\PeopleController;
use Illuminate\Support\Facades\File;

Route::resource('dashboard', DashboardController::class)->middleware(['auth']);
Route::resource('/', DashboardController::class)->middleware(['auth']);

Route::get('generate', function () {
//    $targetFolder = storage_path('app/public');
//    $linkFolder = $_SERVER['DOCUMENT_ROOT'].'/storage';
//    symlink($targetFolder, $linkFolder);
    \Illuminate\Support\Facades\Artisan::call('storage:link');
});

//about
Route::get('/about-description', [AboutController::class, 'description'])->middleware(['auth'])->name('about-description');
Route::post('/about-description/save', [AboutController::class, 'descriptionSave'])->middleware(['auth'])->name('about-description.save');

Route::get('/about-value', [AboutController::class, 'valueIndex'])->middleware(['auth'])->name('about-values');
Route::get('/about-value/add', [AboutController::class, 'valueForm'])->middleware(['auth'])->name('about-values.create');
Route::get('/about-value/edit/{id}', [AboutController::class, 'valueForm'])->middleware(['auth'])->name('about-values.edit');
Route::post('/about-value/save', [AboutController::class, 'valueSave'])->middleware(['auth'])->name('about-values.save');
Route::delete('/about-value/delete/{id}', [AboutController::class, 'valueDelete'])->middleware(['auth'])->name('about-values.delete');
Route::get('/about-value/detail/{id}', [AboutController::class, 'valueDetail'])->middleware(['auth'])->name('about-values.detail');
//about

//people
Route::get('/people', [PeopleController::class, 'index'])->middleware(['auth'])->name('people');
Route::get('/people/add', [PeopleController::class, 'form'])->middleware(['auth'])->name('people.create');
Route::get('/people/edit/{id}', [PeopleController::class, 'form'])->middleware(['auth'])->name('people.edit');
Route::post('/people/save', [PeopleController::class, 'save'])->middleware(['auth'])->name('people.save');
Route::delete('/people/delete/{id}', [PeopleController::class, 'delete'])->middleware(['auth'])->name('people.delete');
Route::get('/people/detail/{id}', [PeopleController::class, 'detail'])->middleware(['auth'])->name('people.detail');
//people


