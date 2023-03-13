<?php

namespace App\Http\Controllers;

use App\Models\KnowledgeNews;
use App\Models\KnowledgeSalary;
use App\Models\KnowledgeThought;
use App\Models\KnowledgeSalaryDescription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use File;

class KnowledgeController extends Controller {

    public function newsIndex() {
        $model = DB::table('knowledge_news')->first();

        return view('knowledge.news_index', [
            'model' => $model,
        ]);
    }

    public function newsSave(Request $request) {
        $request->validate([
            'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'description' => 'required',
        ]);
        $success = true;
        $message = 'Update description success';
        $id = isset($request['id']) ? $request['id'] : NULL;
        if ($success) {
            try {
                $model = KnowledgeNews::firstOrNew(['id' => $id]);
                $model->description = isset($request['description']) ? $request['description'] : NULL;
                if ($request->file('image') && request('image') != '') {
                    if (!file_exists('images')) {
                        mkdir('images', 0777, true);
                    }
                    if (!file_exists('images/news/')) {
                        mkdir('images/news/', 0777, true);
                    }
                    if (!empty($model->image)) {
                        $imagePath = $_SERVER['DOCUMENT_ROOT'] . $model->image;
                        if (file_exists($imagePath)) {
                            File::delete($imagePath);
                        }
                    }
                    $nameImg = time() . '.' . $request->file('image')->getClientOriginalExtension();
                    $destinationPath = $_SERVER['DOCUMENT_ROOT'] . '/images/news/';
                    $imagePath = $destinationPath . $nameImg;
                    $request->file('image')->move($destinationPath, $nameImg);
                    $model->image = '/images/news/' . $nameImg;
                }
                $model->save();
            } catch (Exception $ex) {
                $success = false;
                $message = $ex->getMessage();
            }
        }

        if (!$success) {
            return redirect('/knowledge-news')->with('success', $message);
        } else {
            return redirect('/knowledge-news')->with('error', $message);
        }
    }

    public function thoughtIndex() {
        $model = DB::table('knowledge_thought')->first();

        return view('knowledge.thought_index', [
            'model' => $model,
        ]);
    }

    public function thoughtSave(Request $request) {
        $request->validate([
            'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'description' => 'required',
        ]);
        $success = true;
        $message = 'Update description success';
        $id = isset($request['id']) ? $request['id'] : NULL;
        if ($success) {
            try {
                $model = KnowledgeThought::firstOrNew(['id' => $id]);
                $model->description = isset($request['description']) ? $request['description'] : NULL;
                if ($request->file('image') && request('image') != '') {
                    if (!file_exists('images')) {
                        mkdir('images', 0777, true);
                    }
                    if (!file_exists('images/thought/')) {
                        mkdir('images/thought/', 0777, true);
                    }
                    if (!empty($model->image)) {
                        $imagePath = $_SERVER['DOCUMENT_ROOT'] . $model->image;
                        if (file_exists($imagePath)) {
                            File::delete($imagePath);
                        }
                    }
                    $nameImg = time() . '.' . $request->file('image')->getClientOriginalExtension();
                    $destinationPath = $_SERVER['DOCUMENT_ROOT'] . '/images/thought/';
                    $imagePath = $destinationPath . $nameImg;
                    $request->file('image')->move($destinationPath, $nameImg);
                    $model->image = '/images/thought/' . $nameImg;
                }
                $model->save();
            } catch (Exception $ex) {
                $success = false;
                $message = $ex->getMessage();
            }
        }

        if (!$success) {
            return redirect('/knowledge-thought')->with('success', $message);
        } else {
            return redirect('/knowledge-thought')->with('error', $message);
        }
    }

    public function knowledgeSalary() {
        $model = KnowledgeSalary::all();
        return view('knowledge.salary_index', [
            'model' => $model,
        ]);
    }

    public function knowledgeSalaryDescription() {
        $model = DB::table('knowledge_salary_description')->first();

        return view('knowledge.salary_description_index', [
            'model' => $model,
        ]);
    }

    public function knowledgeSalaryDescriptionSave(Request $request) {
        $request->validate([
            'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'description' => 'required',
        ]);
        $success = true;
        $message = 'Update description success';
        $id = isset($request['id']) ? $request['id'] : NULL;
        if ($success) {
            try {
                $model = KnowledgeSalaryDescription::firstOrNew(['id' => $id]);
                $model->description = isset($request['description']) ? $request['description'] : NULL;
                if ($request->file('image') && request('image') != '') {
                    if (!file_exists('images')) {
                        mkdir('images', 0777, true);
                    }
                    if (!file_exists('images/salary/')) {
                        mkdir('images/salary/', 0777, true);
                    }
                    if (!empty($model->image)) {
                        $imagePath = $_SERVER['DOCUMENT_ROOT'] . $model->image;
                        if (file_exists($imagePath)) {
                            File::delete($imagePath);
                        }
                    }
                    $nameImg = time() . '.' . $request->file('image')->getClientOriginalExtension();
                    $destinationPath = $_SERVER['DOCUMENT_ROOT'] . '/images/salary/';
                    $imagePath = $destinationPath . $nameImg;
                    $request->file('image')->move($destinationPath, $nameImg);
                    $model->image = '/images/salary/' . $nameImg;
                }
                $model->save();
            } catch (Exception $ex) {
                $success = false;
                $message = $ex->getMessage();
            }
        }

        if (!$success) {
            return redirect('/knowledge-salary-description')->with('success', $message);
        } else {
            return redirect('/knowledge-salary-description')->with('error', $message);
        }
    }

    
}
