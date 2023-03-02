<?php

namespace App\Http\Controllers;

use App\Models\AboutDescription;
use App\Models\AboutValues;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

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
                    if (!empty($model->image)) {
                        if (Storage::exists($model->image)) {
                            Storage::delete($model->image);
                        }
                    }
                    $model->image = $request->file('image')->storeAs('about-values', date('YmdHis') . '.' . $request->file('image')->getClientOriginalExtension());
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
        return view('about.value_show', compact('model'));
    }

    public function valueDelete($id) {
        $aboutValues = AboutValues::where('id', $id)->first();
        if (strlen($aboutValues->image) > 0) {
            if (Storage::exists($aboutValues->image)) {
                Storage::delete($aboutValues->image);
            }
        }
        $aboutValues->delete();

        return redirect()->route('about-values')->with('danger', 'Deleted successfully');
    }

}
