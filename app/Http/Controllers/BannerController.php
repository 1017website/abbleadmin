<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use File;

class BannerController extends Controller {

    public function index() {
        $model = DB::table('banner')->first();

        return view('banner.index', [
            'model' => $model,
        ]);
    }

    public function save(Request $request) {
        $request->validate([
            'about' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'people' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'specializations' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'services' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'community' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'partnership' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'volunteering' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'diversityandinclusion' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'job' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'joinabblesearch' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'salarysurveys' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'contact' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);
        $success = true;
        $message = 'Update banner success';
        $id = isset($request['id']) ? $request['id'] : NULL;
        if ($success) {
            try {
                $model = Banner::firstOrNew(['id' => $id]);
                if ($request->file('about') && request('about') != '') {
                    if (!file_exists('images')) {
                        mkdir('images', 0777, true);
                    }
                    if (!file_exists('images/banner/')) {
                        mkdir('images/banner/', 0777, true);
                    }
                    if (!empty($model->about)) {
                        $imagePath = $_SERVER['DOCUMENT_ROOT'] . $model->about;
                        if (file_exists($imagePath)) {
                            File::delete($imagePath);
                        }
                    }
                    $nameImg = time() . '.' . $request->file('about')->getClientOriginalExtension();
                    $destinationPath = $_SERVER['DOCUMENT_ROOT'] . '/images/banner/';
                    $imagePath = $destinationPath . $nameImg;
                    $request->file('about')->move($destinationPath, $nameImg);
                    $model->about = '/images/banner/' . $nameImg;
                }
                
                if ($request->file('people') && request('people') != '') {
                    if (!file_exists('images')) {
                        mkdir('images', 0777, true);
                    }
                    if (!file_exists('images/banner/')) {
                        mkdir('images/banner/', 0777, true);
                    }
                    if (!empty($model->people)) {
                        $imagePath = $_SERVER['DOCUMENT_ROOT'] . $model->people;
                        if (file_exists($imagePath)) {
                            File::delete($imagePath);
                        }
                    }
                    $nameImg = time() . '.' . $request->file('people')->getClientOriginalExtension();
                    $destinationPath = $_SERVER['DOCUMENT_ROOT'] . '/images/banner/';
                    $imagePath = $destinationPath . $nameImg;
                    $request->file('people')->move($destinationPath, $nameImg);
                    $model->people = '/images/banner/' . $nameImg;
                }
                
                if ($request->file('specializations') && request('specializations') != '') {
                    if (!file_exists('images')) {
                        mkdir('images', 0777, true);
                    }
                    if (!file_exists('images/banner/')) {
                        mkdir('images/banner/', 0777, true);
                    }
                    if (!empty($model->specializations)) {
                        $imagePath = $_SERVER['DOCUMENT_ROOT'] . $model->specializations;
                        if (file_exists($imagePath)) {
                            File::delete($imagePath);
                        }
                    }
                    $nameImg = time() . '.' . $request->file('specializations')->getClientOriginalExtension();
                    $destinationPath = $_SERVER['DOCUMENT_ROOT'] . '/images/banner/';
                    $imagePath = $destinationPath . $nameImg;
                    $request->file('specializations')->move($destinationPath, $nameImg);
                    $model->specializations = '/images/banner/' . $nameImg;
                }
                
                if ($request->file('services') && request('services') != '') {
                    if (!file_exists('images')) {
                        mkdir('images', 0777, true);
                    }
                    if (!file_exists('images/banner/')) {
                        mkdir('images/banner/', 0777, true);
                    }
                    if (!empty($model->services)) {
                        $imagePath = $_SERVER['DOCUMENT_ROOT'] . $model->services;
                        if (file_exists($imagePath)) {
                            File::delete($imagePath);
                        }
                    }
                    $nameImg = time() . '.' . $request->file('services')->getClientOriginalExtension();
                    $destinationPath = $_SERVER['DOCUMENT_ROOT'] . '/images/banner/';
                    $imagePath = $destinationPath . $nameImg;
                    $request->file('services')->move($destinationPath, $nameImg);
                    $model->services = '/images/banner/' . $nameImg;
                }
                
                if ($request->file('community') && request('community') != '') {
                    if (!file_exists('images')) {
                        mkdir('images', 0777, true);
                    }
                    if (!file_exists('images/banner/')) {
                        mkdir('images/banner/', 0777, true);
                    }
                    if (!empty($model->community)) {
                        $imagePath = $_SERVER['DOCUMENT_ROOT'] . $model->community;
                        if (file_exists($imagePath)) {
                            File::delete($imagePath);
                        }
                    }
                    $nameImg = time() . '.' . $request->file('community')->getClientOriginalExtension();
                    $destinationPath = $_SERVER['DOCUMENT_ROOT'] . '/images/banner/';
                    $imagePath = $destinationPath . $nameImg;
                    $request->file('community')->move($destinationPath, $nameImg);
                    $model->community = '/images/banner/' . $nameImg;
                }
                
                if ($request->file('partnership') && request('partnership') != '') {
                    if (!file_exists('images')) {
                        mkdir('images', 0777, true);
                    }
                    if (!file_exists('images/banner/')) {
                        mkdir('images/banner/', 0777, true);
                    }
                    if (!empty($model->partnership)) {
                        $imagePath = $_SERVER['DOCUMENT_ROOT'] . $model->partnership;
                        if (file_exists($imagePath)) {
                            File::delete($imagePath);
                        }
                    }
                    $nameImg = time() . '.' . $request->file('partnership')->getClientOriginalExtension();
                    $destinationPath = $_SERVER['DOCUMENT_ROOT'] . '/images/banner/';
                    $imagePath = $destinationPath . $nameImg;
                    $request->file('partnership')->move($destinationPath, $nameImg);
                    $model->partnership = '/images/banner/' . $nameImg;
                }
                
                if ($request->file('volunteering') && request('volunteering') != '') {
                    if (!file_exists('images')) {
                        mkdir('images', 0777, true);
                    }
                    if (!file_exists('images/banner/')) {
                        mkdir('images/banner/', 0777, true);
                    }
                    if (!empty($model->volunteering)) {
                        $imagePath = $_SERVER['DOCUMENT_ROOT'] . $model->volunteering;
                        if (file_exists($imagePath)) {
                            File::delete($imagePath);
                        }
                    }
                    $nameImg = time() . '.' . $request->file('volunteering')->getClientOriginalExtension();
                    $destinationPath = $_SERVER['DOCUMENT_ROOT'] . '/images/banner/';
                    $imagePath = $destinationPath . $nameImg;
                    $request->file('volunteering')->move($destinationPath, $nameImg);
                    $model->volunteering = '/images/banner/' . $nameImg;
                }
                
                if ($request->file('diversityandinclusion') && request('diversityandinclusion') != '') {
                    if (!file_exists('images')) {
                        mkdir('images', 0777, true);
                    }
                    if (!file_exists('images/banner/')) {
                        mkdir('images/banner/', 0777, true);
                    }
                    if (!empty($model->diversityandinclusion)) {
                        $imagePath = $_SERVER['DOCUMENT_ROOT'] . $model->diversityandinclusion;
                        if (file_exists($imagePath)) {
                            File::delete($imagePath);
                        }
                    }
                    $nameImg = time() . '.' . $request->file('diversityandinclusion')->getClientOriginalExtension();
                    $destinationPath = $_SERVER['DOCUMENT_ROOT'] . '/images/banner/';
                    $imagePath = $destinationPath . $nameImg;
                    $request->file('diversityandinclusion')->move($destinationPath, $nameImg);
                    $model->diversityandinclusion = '/images/banner/' . $nameImg;
                }
                
                if ($request->file('job') && request('job') != '') {
                    if (!file_exists('images')) {
                        mkdir('images', 0777, true);
                    }
                    if (!file_exists('images/banner/')) {
                        mkdir('images/banner/', 0777, true);
                    }
                    if (!empty($model->job)) {
                        $imagePath = $_SERVER['DOCUMENT_ROOT'] . $model->job;
                        if (file_exists($imagePath)) {
                            File::delete($imagePath);
                        }
                    }
                    $nameImg = time() . '.' . $request->file('job')->getClientOriginalExtension();
                    $destinationPath = $_SERVER['DOCUMENT_ROOT'] . '/images/banner/';
                    $imagePath = $destinationPath . $nameImg;
                    $request->file('job')->move($destinationPath, $nameImg);
                    $model->job = '/images/banner/' . $nameImg;
                }
                
                if ($request->file('joinabblesearch') && request('joinabblesearch') != '') {
                    if (!file_exists('images')) {
                        mkdir('images', 0777, true);
                    }
                    if (!file_exists('images/banner/')) {
                        mkdir('images/banner/', 0777, true);
                    }
                    if (!empty($model->joinabblesearch)) {
                        $imagePath = $_SERVER['DOCUMENT_ROOT'] . $model->joinabblesearch;
                        if (file_exists($imagePath)) {
                            File::delete($imagePath);
                        }
                    }
                    $nameImg = time() . '.' . $request->file('joinabblesearch')->getClientOriginalExtension();
                    $destinationPath = $_SERVER['DOCUMENT_ROOT'] . '/images/banner/';
                    $imagePath = $destinationPath . $nameImg;
                    $request->file('joinabblesearch')->move($destinationPath, $nameImg);
                    $model->joinabblesearch = '/images/banner/' . $nameImg;
                }
                
                if ($request->file('salarysurveys') && request('salarysurveys') != '') {
                    if (!file_exists('images')) {
                        mkdir('images', 0777, true);
                    }
                    if (!file_exists('images/banner/')) {
                        mkdir('images/banner/', 0777, true);
                    }
                    if (!empty($model->salarysurveys)) {
                        $imagePath = $_SERVER['DOCUMENT_ROOT'] . $model->salarysurveys;
                        if (file_exists($imagePath)) {
                            File::delete($imagePath);
                        }
                    }
                    $nameImg = time() . '.' . $request->file('salarysurveys')->getClientOriginalExtension();
                    $destinationPath = $_SERVER['DOCUMENT_ROOT'] . '/images/banner/';
                    $imagePath = $destinationPath . $nameImg;
                    $request->file('salarysurveys')->move($destinationPath, $nameImg);
                    $model->salarysurveys = '/images/banner/' . $nameImg;
                }
                
                if ($request->file('contact') && request('contact') != '') {
                    if (!file_exists('images')) {
                        mkdir('images', 0777, true);
                    }
                    if (!file_exists('images/banner/')) {
                        mkdir('images/banner/', 0777, true);
                    }
                    if (!empty($model->contact)) {
                        $imagePath = $_SERVER['DOCUMENT_ROOT'] . $model->contact;
                        if (file_exists($imagePath)) {
                            File::delete($imagePath);
                        }
                    }
                    $nameImg = time() . '.' . $request->file('contact')->getClientOriginalExtension();
                    $destinationPath = $_SERVER['DOCUMENT_ROOT'] . '/images/banner/';
                    $imagePath = $destinationPath . $nameImg;
                    $request->file('contact')->move($destinationPath, $nameImg);
                    $model->contact = '/images/banner/' . $nameImg;
                }             
                
                $model->save();
            } catch (Exception $ex) {
                $success = false;
                $message = $ex->getMessage();
            }
        }

        if (!$success) {
            return redirect('/banner')->with('success', $message);
        } else {
            return redirect('/banner')->with('error', $message);
        }
    }

}
