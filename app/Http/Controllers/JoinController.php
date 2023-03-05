<?php

namespace App\Http\Controllers;

use App\Models\JobBenefit;
use App\Models\JobDescription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use File;

class JoinController extends Controller {

    public function index() {
        $model = JobBenefit::all();
        return view('join.index', ['model' => $model]);
    }

    public function form($id = NULL) {
        $statusTitle = 'Create';
        $model = [];
        if (strlen($id) > 0) {
            $model = JobBenefit::where('id', $id)->first();
            if (!empty($model)) {
                $statusTitle = 'Edit';
            } else {
                return redirect('/join')->with('error', 'Data not found !');
            }
        }

        return view('join.form', [
            'model' => $model,
            'status_title' => $statusTitle
        ]);
    }

    public function save(Request $request) {
        $request->validate([
            'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'name' => 'required|max:255',
            'description' => 'required',
        ]);

        $success = true;
        $id = isset($request['id']) ? $request['id'] : NULL;
        if (strlen($id) > 0) {
            $message = 'Changed successfully';
        } else {
            $message = 'Successfully added';
        }

        if ($success) {
            try {
                $model = JobBenefit::firstOrNew(['id' => $id]);
                $model->name = isset($request['name']) ? $request['name'] : NULL;
                $model->description = isset($request['description']) ? $request['description'] : NULL;
                if ($request->file('image') && request('image') != '') {
                    if (!file_exists('images')) {
                        mkdir('images', 0777, true);
                    }
                    if (!file_exists('images/join/')) {
                        mkdir('images/join/', 0777, true);
                    }
                    if (!empty($model->image)) {
                        $imagePath = $_SERVER['DOCUMENT_ROOT'] . $model->image;
                        if (file_exists($imagePath)) {
                            File::delete($imagePath);
                        }
                    }
                    $nameImg = time() . '.' . $request->file('image')->getClientOriginalExtension();
                    $destinationPath = $_SERVER['DOCUMENT_ROOT'] . '/images/join/';
                    $imagePath = $destinationPath . $nameImg;
                    $request->file('image')->move($destinationPath, $nameImg);
                    $model->image = '/images/join/' . $nameImg;
                }
                $model->save();
            } catch (Exception $ex) {
                $success = false;
                $message = $ex->getMessage();
            }
        }

        if ($success) {
            return redirect('/join')->with('success', $message);
        } else {
            return redirect('/join/add')->with('error', $message);
        }
    }

    public function detail($id) {
        $model = JobBenefit::where('id', $id)->first();
        return view('join.detail', compact('model'));
    }

    public function delete($id) {
        $model = JobBenefit::where('id', $id)->first();
        if (strlen($model->image) > 0) {
            $imagePath = $_SERVER['DOCUMENT_ROOT'] . $model->image;
            if (file_exists($imagePath)) {
                File::delete($imagePath);
            }
        }
        $model->delete();

        return redirect('/join')->with('danger', 'Deleted successfully');
    }

    public function description() {

        $model = DB::table('job_description')->first();
        return view('join.description', [
            'data' => $model,
        ]);
    }

    public function descriptionSave(Request $request) {
        $success = true;
        $message = 'Update description success';
        $aboutId = isset($request['id']) ? $request['id'] : NULL;
        if ($success) {
            try {
                $about = JobDescription::firstOrNew(['id' => $aboutId]);
                $about->description = $request['description'];
                $about->save();
            } catch (Exception $ex) {
                $success = false;
                $message = $ex->getMessage();
            }
        }

        if (!$success) {
            return redirect('/join-description')->with('success', $message);
        } else {
            return redirect('/join-description')->with('error', $message);
        }
    }

}
