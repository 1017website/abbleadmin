<?php

namespace App\Http\Controllers;

use App\Models\Specialization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use File;

class SpecializationsController extends Controller {

    public function index() {
        $model = Specialization::all();
        return view('specializations.index', ['model' => $model]);
    }

    public function form($id = NULL) {
        $statusTitle = 'Create';
        $model = [];
        if (strlen($id) > 0) {
            $model = Specialization::where('id', $id)->first();
            if (!empty($model)) {
                $statusTitle = 'Edit';
            } else {
                return redirect('/specializations')->with('error', 'Data not found !');
            }
        }

        return view('specializations.form', [
            'model' => $model,
            'status_title' => $statusTitle
        ]);
    }

    public function save(Request $request) {
        $request->validate([
            'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'name' => 'required|max:255',        
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
                $model = Specialization::firstOrNew(['id' => $id]);
                $model->name = isset($request['name']) ? $request['name'] : NULL;
                $model->description = isset($request['description']) ? $request['description'] : NULL;
                if ($request->file('image') && request('image') != '') {
                    if (!file_exists('images')) {
                        mkdir('images', 0777, true);
                    }
                    if (!file_exists('images/specializations/')) {
                        mkdir('images/specializations/', 0777, true);
                    }
                    if (!empty($model->image)) {
                        $imagePath = $_SERVER['DOCUMENT_ROOT'] . $model->image;
                        if (file_exists($imagePath)) {
                            File::delete($imagePath);
                        }
                    }
                    $nameImg = time() . '.' . $request->file('image')->getClientOriginalExtension();
                    $destinationPath = $_SERVER['DOCUMENT_ROOT'] . '/images/specializations/';
                    $imagePath = $destinationPath . $nameImg;
                    $request->file('image')->move($destinationPath, $nameImg);
                    $model->image = '/images/specializations/' . $nameImg;
                }
                $model->save();
            } catch (Exception $ex) {
                $success = false;
                $message = $ex->getMessage();
            }
        }

        if ($success) {
            return redirect('/specializations')->with('success', $message);
        } else {
            return redirect('/specializations/add')->with('error', $message);
        }
    }

    public function detail($id) {
        $model = Specialization::where('id', $id)->first();
        return view('specializations.detail', compact('model'));
    }

    public function delete($id) {
        $model = Specialization::where('id', $id)->first();
        if (strlen($model->image) > 0) {
            $imagePath = $_SERVER['DOCUMENT_ROOT'] . $model->image;
            if (file_exists($imagePath)) {
                File::delete($imagePath);
            }
        }
        $model->delete();

        return redirect()->route('specializations')->with('danger', 'Deleted successfully');
    }

}
