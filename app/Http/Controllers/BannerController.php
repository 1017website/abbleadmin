<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class BannerController extends Controller {

    public function index() {
        $model = DB::table('banner')->first();

        return view('banner.index', [
            'model' => $model,
        ]);
    }

    public function save() {

        return view('banner.index');
    }

}
