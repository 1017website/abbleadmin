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

}
