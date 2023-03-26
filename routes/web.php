<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\PeopleController;
use App\Http\Controllers\SpecializationsController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\CommunityController;
use App\Http\Controllers\KnowledgeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\JobApplyController;
use App\Http\Controllers\JoinController;
use App\Http\Controllers\SettingController;
use Illuminate\Support\Facades\File;

Route::resource('dashboard', DashboardController::class)->middleware(['auth']);
Route::resource('/', DashboardController::class)->middleware(['auth']);

Route::get('generate', function () {
//    $targetFolder = storage_path('app/public');
//    $linkFolder = $_SERVER['DOCUMENT_ROOT'].'/storage';
//    symlink($targetFolder, $linkFolder);
    \Illuminate\Support\Facades\Artisan::call('storage:link');
});

//banner
Route::get('/banner', [BannerController::class, 'index'])->middleware(['auth'])->name('banner');
Route::post('/banner/save', [BannerController::class, 'save'])->middleware(['auth'])->name('banner.save');
//banner
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
//community charity
Route::get('/knowledge-news', [KnowledgeController::class, 'newsIndex'])->middleware(['auth'])->name('news');
Route::get('/knowledge-news/add', [KnowledgeController::class, 'newsForm'])->middleware(['auth'])->name('news.create');
Route::get('/knowledge-news/edit/{id}', [KnowledgeController::class, 'newsForm'])->middleware(['auth'])->name('news.edit');
Route::post('/knowledge-news/save', [KnowledgeController::class, 'newsSave'])->middleware(['auth'])->name('news.save');
Route::delete('/knowledge-news/delete/{id}', [KnowledgeController::class, 'newsDelete'])->middleware(['auth'])->name('news.delete');
Route::get('/knowledge-news/detail/{id}', [KnowledgeController::class, 'newsDetail'])->middleware(['auth'])->name('news.detail');
//community charity
//knowledge news
Route::get('/knowledge-news', [KnowledgeController::class, 'newsIndex'])->middleware(['auth'])->name('news');
Route::post('/knowledge-news/save', [KnowledgeController::class, 'newsSave'])->middleware(['auth'])->name('news.save');
//knowledge news
//knowledge thought
Route::get('/knowledge-thought', [KnowledgeController::class, 'thoughtIndex'])->middleware(['auth'])->name('thought');
Route::post('/knowledge-thought/save', [KnowledgeController::class, 'thoughtSave'])->middleware(['auth'])->name('thought.save');
//knowledge thought
//knowledge salary
Route::get('/knowledge-salary', [KnowledgeController::class, 'knowledgeSalary'])->middleware(['auth'])->name('knowledge.salary');
//knowledge salary description
Route::get('/knowledge-salary-description', [KnowledgeController::class, 'knowledgeSalaryDescription'])->middleware(['auth'])->name('knowledge.salary.description');
Route::post('/knowledge-salary-description/save', [KnowledgeController::class, 'knowledgeSalaryDescriptionSave'])->middleware(['auth'])->name('knowledge.salary.description.save');
//knowledge salary
//contact
Route::get('/contact', [ContactController::class, 'index'])->middleware(['auth'])->name('contact');
Route::get('/contact/add', [ContactController::class, 'form'])->middleware(['auth'])->name('contact.create');
Route::get('/contact/edit/{id}', [ContactController::class, 'form'])->middleware(['auth'])->name('contact.edit');
Route::post('/contact/save', [ContactController::class, 'save'])->middleware(['auth'])->name('contact.save');
Route::delete('/contact/delete/{id}', [ContactController::class, 'delete'])->middleware(['auth'])->name('contact.delete');
Route::get('/contact/detail/{id}', [ContactController::class, 'detail'])->middleware(['auth'])->name('contact.detail');
//contact
//master
Route::get('/master-specialization', [MasterController::class, 'specializationIndex'])->middleware(['auth'])->name('master.specialization');
Route::get('/master-specialization/add', [MasterController::class, 'specializationForm'])->middleware(['auth'])->name('master.specialization.create');
Route::get('/master-specialization/edit/{id}', [MasterController::class, 'specializationForm'])->middleware(['auth'])->name('master.specialization.edit');
Route::post('/master-specialization/save', [MasterController::class, 'specializationSave'])->middleware(['auth'])->name('master.specialization.save');
Route::delete('/master-specialization/delete/{id}', [MasterController::class, 'specializationDelete'])->middleware(['auth'])->name('master.specialization.delete');
Route::get('/master-specialization/detail/{id}', [MasterController::class, 'specializationDetail'])->middleware(['auth'])->name('master.specialization.detail');

Route::get('/master-hiring', [MasterController::class, 'hiringIndex'])->middleware(['auth'])->name('master.hiring');
Route::get('/master-hiring/add', [MasterController::class, 'hiringForm'])->middleware(['auth'])->name('master.hiring.create');
Route::get('/master-hiring/edit/{id}', [MasterController::class, 'hiringForm'])->middleware(['auth'])->name('master.hiring.edit');
Route::post('/master-hiring/save', [MasterController::class, 'hiringSave'])->middleware(['auth'])->name('master.hiring.save');
Route::delete('/master-hiring/delete/{id}', [MasterController::class, 'hiringDelete'])->middleware(['auth'])->name('master.hiring.delete');
Route::get('/master-hiring/detail/{id}', [MasterController::class, 'hiringDetail'])->middleware(['auth'])->name('master.hiring.detail');
//master
//job
Route::get('/job', [JobController::class, 'index'])->middleware(['auth'])->name('job');
Route::get('/job/add', [JobController::class, 'form'])->middleware(['auth'])->name('job.create');
Route::get('/job/edit/{id}', [JobController::class, 'form'])->middleware(['auth'])->name('job.edit');
Route::post('/job/save', [JobController::class, 'save'])->middleware(['auth'])->name('job.save');
Route::delete('/job/delete/{id}', [JobController::class, 'delete'])->middleware(['auth'])->name('job.delete');
Route::get('/job/detail/{id}', [JobController::class, 'detail'])->middleware(['auth'])->name('job.detail');
//job
//job apply
Route::get('/job-apply', [JobApplyController::class, 'index'])->middleware(['auth'])->name('job.apply');
Route::get('/job-apply/detail/{id}', [JobApplyController::class, 'detail'])->middleware(['auth'])->name('job.apply.detail');
//job apply
//join
Route::get('/join-description', [JoinController::class, 'description'])->middleware(['auth'])->name('join.description');
Route::post('/join-description/save', [JoinController::class, 'descriptionSave'])->middleware(['auth'])->name('join.description.save');

Route::get('/join', [JoinController::class, 'index'])->middleware(['auth'])->name('join');
Route::get('/join/add', [JoinController::class, 'form'])->middleware(['auth'])->name('join.create');
Route::get('/join/edit/{id}', [JoinController::class, 'form'])->middleware(['auth'])->name('join.edit');
Route::post('/join/save', [JoinController::class, 'save'])->middleware(['auth'])->name('join.save');
Route::delete('/join/delete/{id}', [JoinController::class, 'delete'])->middleware(['auth'])->name('join.delete');
Route::get('/join/detail/{id}', [JoinController::class, 'detail'])->middleware(['auth'])->name('join.detail');
//join
//setting
Route::get('/setting', [SettingController::class, 'index'])->middleware(['auth'])->name('setting');
Route::post('/setting/save', [SettingController::class, 'save'])->middleware(['auth'])->name('setting.save');
//setting

