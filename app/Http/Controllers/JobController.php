<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use File;

class JobController extends Controller {

    public function index() {
        $model = Job::all();
        return view('job.index', ['model' => $model]);
    }

    public function form($id = NULL) {
        $statusTitle = 'Create';
        $model = [];
        if (strlen($id) > 0) {
            $model = Job::where('id', $id)->first();
            if (!empty($model)) {
                $statusTitle = 'Edit';
            } else {
                return redirect('/job')->with('error', 'Data not found !');
            }
        }

        return view('job.form', [
            'model' => $model,
            'status_title' => $statusTitle
        ]);
    }

    public function save(Request $request) {
        $request->validate([
            'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'place' => 'required|max:255',
            'position' => 'required|max:255',
            'role' => 'required|max:255',
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
                $model = Job::firstOrNew(['id' => $id]);
                $model->place = isset($request['place']) ? $request['place'] : NULL;
                $model->position = isset($request['position']) ? $request['position'] : NULL;
                $model->role = isset($request['role']) ? $request['role'] : NULL;
                $model->description = isset($request['description']) ? $request['description'] : NULL;
                if ($request->file('image') && request('image') != '') {
                    if (!file_exists('images')) {
                        mkdir('images', 0777, true);
                    }
                    if (!file_exists('images/job/')) {
                        mkdir('images/job/', 0777, true);
                    }
                    if (!empty($model->image)) {
                        $imagePath = $_SERVER['DOCUMENT_ROOT'] . $model->image;
                        if (file_exists($imagePath)) {
                            File::delete($imagePath);
                        }
                    }
                    $nameImg = time() . '.' . $request->file('image')->getClientOriginalExtension();
                    $destinationPath = $_SERVER['DOCUMENT_ROOT'] . '/images/job/';
                    $imagePath = $destinationPath . $nameImg;
                    $request->file('image')->move($destinationPath, $nameImg);
                    $model->image = '/images/job/' . $nameImg;
                }
                $model->save();
            } catch (Exception $ex) {
                $success = false;
                $message = $ex->getMessage();
            }
        }

        if ($success) {
            return redirect('/job')->with('success', $message);
        } else {
            return redirect('/job/add')->with('error', $message);
        }
    }

    public function detail($id) {
        $model = Job::where('id', $id)->first();
        return view('job.detail', compact('model'));
    }

    public function delete($id) {
        $model = Job::where('id', $id)->first();
        if (strlen($model->image) > 0) {
            $imagePath = $_SERVER['DOCUMENT_ROOT'] . $model->image;
            if (file_exists($imagePath)) {
                File::delete($imagePath);
            }
        }
        $model->delete();

        return redirect('/job')->with('danger', 'Deleted successfully');
    }

}
