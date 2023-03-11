<?php

namespace App\Http\Controllers;

use App\Models\JobApply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use File;

class JobApplyController extends Controller {

    public function index() {
        $model = JobApply::all();
        return view('job-apply.index', ['model' => $model]);
    }

    public function detail($id) {
        $model = JobApply::where('id', $id)->first();
        $urlFrontend = Controller::urlFrontend();
        
        return view('job-apply.detail', compact('model', 'urlFrontend'));
    }

}
