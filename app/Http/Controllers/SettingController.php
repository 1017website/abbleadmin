<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use File;

class SettingController extends Controller {

    public function index() {
        $model = DB::table('settings')->first();
        return view('setting.index', [
            'model' => $model,
        ]);
    }

    public function save(Request $request) {
        $success = true;
        $message = 'Update success';
        $id = isset($request['id']) ? $request['id'] : NULL;
        if ($success) {
            try {
                $about = Setting::firstOrNew(['id' => $id]);
                $about->email = isset($request['email']) ? $request['email'] : NULL;
                $about->name = isset($request['name']) ? $request['name'] : NULL;
                $about->domain_frontend = isset($request['domain_frontend']) ? $request['domain_frontend'] : NULL;
                $about->domain_backend = isset($request['domain_backend']) ? $request['domain_backend'] : NULL;
                $about->maintenance = isset($request['maintenance']) ? 1 : 0;
                $about->save();
            } catch (Exception $ex) {
                $success = false;
                $message = $ex->getMessage();
            }
        }

        if (!$success) {
            return redirect('/setting')->with('success', $message);
        } else {
            return redirect('/setting')->with('error', $message);
        }
    }

}
