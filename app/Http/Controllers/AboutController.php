<?php

namespace App\Http\Controllers;

use App\Models\AboutDescription;
use App\Models\AboutValues;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use File;

class AboutController extends Controller {

    public function description() {

        $about = DB::table('about_description')->first();

        return view('about.description', [
            'data' => $about,
        ]);
    }

    public function descriptionSave(Request $request) {
        $success = true;
        $message = 'Update description success';
        $aboutId = $request['about_id'] ?: NULL;
        if ($success) {
            try {
                $about = AboutDescription::firstOrNew(['id' => $aboutId]);
                $about->description = $request['description'];
                $about->save();
            } catch (Exception $ex) {
                $success = false;
                $message = $ex->getMessage();
            }
        }

        if (!$success) {
            return redirect('/about-description')->with('success', $message);
        } else {
            return redirect('/about-description')->with('error', $message);
        }
    }

    public function valueIndex() {
        $model = AboutValues::all();
        return view('about.value', ['model' => $model]);
    }

    public function valueForm($id = NULL) {
        $statusTitle = 'Create';
        $model = [];
        if (strlen($id) > 0) {
            $model = AboutValues::where('id', $id)->first();
            if (!empty($model)) {
                $statusTitle = 'Edit';
            } else {
                return redirect('/about-value')->with('error', 'Data not found !');
            }
        }

        return view('about.value_form', [
            'model' => $model,
            'status_title' => $statusTitle
        ]);
    }

    public function valueSave(Request $request) {
        $request->validate([
            'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
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
                $model = AboutValues::firstOrNew(['id' => $id]);
                $model->description = isset($request['description']) ? $request['description'] : NULL;
                if ($request->file('image') && request('image') != '') {
                    if (!file_exists('images')) {
                        mkdir('images', 0777, true);
                    }
                    if (!file_exists('images/about-values/')) {
                        mkdir('images/about-values/', 0777, true);
                    }
                    if (!empty($model->image)) {
                        $imagePath = $_SERVER['DOCUMENT_ROOT'] . $model->image;
                        if (file_exists($imagePath)) {
                            File::delete($imagePath);
                        }
                    }
                    $nameImg = time() . '.' . $request->file('image')->getClientOriginalExtension();
                    $destinationPath = $_SERVER['DOCUMENT_ROOT'] . '/images/about-values/';
                    $imagePath = $destinationPath . $nameImg;
                    $request->file('image')->move($destinationPath, $nameImg);
                    $model->image = '/images/about-values/' . $nameImg;
                }
                $model->save();
            } catch (Exception $ex) {
                $success = false;
                $message = $ex->getMessage();
            }
        }

        if ($success) {
            return redirect('/about-value')->with('success', $message);
        } else {
            return redirect('/about-value/add')->with('error', $message);
        }
    }

    public function valueDetail($id) {
        $model = AboutValues::where('id', $id)->first();
        return view('about.value_detail', compact('model'));
    }

    public function valueDelete($id) {
        $aboutValues = AboutValues::where('id', $id)->first();
        if (strlen($aboutValues->image) > 0) {
            $imagePath = $_SERVER['DOCUMENT_ROOT'] . $aboutValues->image;
            if (file_exists($imagePath)) {
                File::delete($imagePath);
            }
        }
        $aboutValues->delete();

        return redirect()->route('about-values')->with('danger', 'Deleted successfully');
    }

}
