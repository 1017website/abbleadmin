<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\PeopleController;
use App\Http\Controllers\SpecializationsController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\CommunityController;
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

//specializations
Route::get('/specializations', [SpecializationsController::class, 'index'])->middleware(['auth'])->name('specializations');
Route::get('/specializations/add', [SpecializationsController::class, 'form'])->middleware(['auth'])->name('specializations.create');
Route::get('/specializations/edit/{id}', [SpecializationsController::class, 'form'])->middleware(['auth'])->name('specializations.edit');
Route::post('/specializations/save', [SpecializationsController::class, 'save'])->middleware(['auth'])->name('specializations.save');
Route::delete('/specializations/delete/{id}', [SpecializationsController::class, 'delete'])->middleware(['auth'])->name('specializations.delete');
Route::get('/specializations/detail/{id}', [SpecializationsController::class, 'detail'])->middleware(['auth'])->name('specializations.detail');
//specializations

//service
Route::get('/service-description', [ServiceController::class, 'description'])->middleware(['auth'])->name('service-description');
Route::post('/service-description/save', [ServiceController::class, 'descriptionSave'])->middleware(['auth'])->name('service-description.save');

Route::get('/service', [ServiceController::class, 'index'])->middleware(['auth'])->name('service');
Route::get('/service/add', [ServiceController::class, 'form'])->middleware(['auth'])->name('service.create');
Route::get('/service/edit/{id}', [ServiceController::class, 'form'])->middleware(['auth'])->name('service.edit');
Route::post('/service/save', [ServiceController::class, 'save'])->middleware(['auth'])->name('service.save');
Route::delete('/service/delete/{id}', [ServiceController::class, 'delete'])->middleware(['auth'])->name('service.delete');
Route::get('/service/detail/{id}', [ServiceController::class, 'detail'])->middleware(['auth'])->name('service.detail');
//service

//community charity
Route::get('/community-charity', [CommunityController::class, 'charityIndex'])->middleware(['auth'])->name('charity');
Route::get('/community-charity/add', [CommunityController::class, 'charityForm'])->middleware(['auth'])->name('charity.create');
Route::get('/community-charity/edit/{id}', [CommunityController::class, 'charityForm'])->middleware(['auth'])->name('charity.edit');
Route::post('/community-charity/save', [CommunityController::class, 'charitySave'])->middleware(['auth'])->name('charity.save');
Route::delete('/community-charity/delete/{id}', [CommunityController::class, 'charityDelete'])->middleware(['auth'])->name('charity.delete');
Route::get('/community-charity/detail/{id}', [CommunityController::class, 'charityDetail'])->middleware(['auth'])->name('charity.detail');
//community charity

//community volunteering
Route::get('/community-volunteering', [CommunityController::class, 'volunteeringIndex'])->middleware(['auth'])->name('volunteering');
Route::get('/community-volunteering/add', [CommunityController::class, 'volunteeringForm'])->middleware(['auth'])->name('volunteering.create');
Route::get('/community-volunteering/edit/{id}', [CommunityController::class, 'volunteeringForm'])->middleware(['auth'])->name('volunteering.edit');
Route::post('/community-volunteering/save', [CommunityController::class, 'volunteeringSave'])->middleware(['auth'])->name('volunteering.save');
Route::delete('/community-volunteering/delete/{id}', [CommunityController::class, 'volunteeringDelete'])->middleware(['auth'])->name('volunteering.delete');
Route::get('/community-volunteering/detail/{id}', [CommunityController::class, 'volunteeringDetail'])->middleware(['auth'])->name('volunteering.detail');
//community volunteering

//community diversity
Route::get('/community-diversity', [CommunityController::class, 'communityDiversity'])->middleware(['auth'])->name('diversity.description');
Route::post('/community-diversity/save', [CommunityController::class, 'communityDiversitySave'])->middleware(['auth'])->name('diversity.description.save');
//community diversity



