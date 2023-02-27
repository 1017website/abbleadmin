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



        return view('description');
    }

}
