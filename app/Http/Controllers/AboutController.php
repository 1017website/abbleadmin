<?php

namespace App\Http\Controllers;

use App\Models\AboutDescription;
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
        $model = DB::table('about_values')->get();
        return view('about.value', ['model' => $model]);
    }

    public function valueForm($id = NULL) {
        $statusTitle = 'Create';
        $model = [];
        if (strlen($id) > 0) {
            $model = DB::table('about_values')->where('id', $id)->first();
            if (count($model) > 0) {
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
        
    }
    
    public function valueDetail($id){
        
    }

}
