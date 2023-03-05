<?php

namespace App\Http\Controllers;

use App\Models\MasterSpecialization;
use App\Models\MasterCurrentlyHiring;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use File;

class MasterController extends Controller {

    public function specializationIndex() {
        $model = MasterSpecialization::all();
        return view('master.specialization_index', ['model' => $model]);
    }

    public function specializationForm($id = NULL) {
        $statusTitle = 'Create';
        $model = [];
        if (strlen($id) > 0) {
            $model = MasterSpecialization::where('id', $id)->first();
            if (!empty($model)) {
                $statusTitle = 'Edit';
            } else {
                return redirect('/master-specialization')->with('error', 'Data not found !');
            }
        }

        return view('master.specialization_form', [
            'model' => $model,
            'status_title' => $statusTitle
        ]);
    }

    public function specializationSave(Request $request) {
        $request->validate([
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
                $model = MasterSpecialization::firstOrNew(['id' => $id]);
                $model->name = isset($request['name']) ? $request['name'] : NULL;
                if ($request->file('image') && request('image') != '') {
                    if (!file_exists('images')) {
                        mkdir('images', 0777, true);
                    }
                    if (!file_exists('images/master-specialization/')) {
                        mkdir('images/master-specialization/', 0777, true);
                    }
                    if (!empty($model->image)) {
                        $imagePath = $_SERVER['DOCUMENT_ROOT'] . $model->image;
                        if (file_exists($imagePath)) {
                            File::delete($imagePath);
                        }
                    }
                    $nameImg = time() . '.' . $request->file('image')->getClientOriginalExtension();
                    $destinationPath = $_SERVER['DOCUMENT_ROOT'] . '/images/master-specialization/';
                    $imagePath = $destinationPath . $nameImg;
                    $request->file('image')->move($destinationPath, $nameImg);
                    $model->image = '/images/master-specialization/' . $nameImg;
                }
                $model->save();
            } catch (Exception $ex) {
                $success = false;
                $message = $ex->getMessage();
            }
        }

        if ($success) {
            return redirect('/master-specialization')->with('success', $message);
        } else {
            return redirect('/master-specialization/add')->with('error', $message);
        }
    }

    public function specializationDetail($id) {
        $model = MasterSpecialization::where('id', $id)->first();
        return view('master.specialization_detail', compact('model'));
    }

    public function specializationDelete($id) {
        $model = MasterSpecialization::where('id', $id)->first();
        if (strlen($model->image) > 0) {
            $imagePath = $_SERVER['DOCUMENT_ROOT'] . $model->image;
            if (file_exists($imagePath)) {
                File::delete($imagePath);
            }
        }
        $model->delete();

        return redirect('/master-specialization')->with('danger', 'Deleted successfully');
    }
    
    public function hiringIndex() {
        $model = MasterCurrentlyHiring::all();
        return view('master.hiring_index', ['model' => $model]);
    }

    public function hiringForm($id = NULL) {
        $statusTitle = 'Create';
        $model = [];
        if (strlen($id) > 0) {
            $model = MasterCurrentlyHiring::where('id', $id)->first();
            if (!empty($model)) {
                $statusTitle = 'Edit';
            } else {
                return redirect('/master-hiring')->with('error', 'Data not found !');
            }
        }

        return view('master.hiring_form', [
            'model' => $model,
            'status_title' => $statusTitle
        ]);
    }

    public function hiringSave(Request $request) {
        $request->validate([
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
                $model = MasterCurrentlyHiring::firstOrNew(['id' => $id]);
                $model->name = isset($request['name']) ? $request['name'] : NULL;
                if ($request->file('image') && request('image') != '') {
                    if (!file_exists('images')) {
                        mkdir('images', 0777, true);
                    }
                    if (!file_exists('images/master-hiring/')) {
                        mkdir('images/master-hiring/', 0777, true);
                    }
                    if (!empty($model->image)) {
                        $imagePath = $_SERVER['DOCUMENT_ROOT'] . $model->image;
                        if (file_exists($imagePath)) {
                            File::delete($imagePath);
                        }
                    }
                    $nameImg = time() . '.' . $request->file('image')->getClientOriginalExtension();
                    $destinationPath = $_SERVER['DOCUMENT_ROOT'] . '/images/master-hiring/';
                    $imagePath = $destinationPath . $nameImg;
                    $request->file('image')->move($destinationPath, $nameImg);
                    $model->image = '/images/master-hiring/' . $nameImg;
                }
                $model->save();
            } catch (Exception $ex) {
                $success = false;
                $message = $ex->getMessage();
            }
        }

        if ($success) {
            return redirect('/master-hiring')->with('success', $message);
        } else {
            return redirect('/master-hiring/add')->with('error', $message);
        }
    }

    public function hiringDetail($id) {
        $model = MasterCurrentlyHiring::where('id', $id)->first();
        return view('master.hiring_detail', compact('model'));
    }

    public function hiringDelete($id) {
        $model = MasterCurrentlyHiring::where('id', $id)->first();
        if (strlen($model->image) > 0) {
            $imagePath = $_SERVER['DOCUMENT_ROOT'] . $model->image;
            if (file_exists($imagePath)) {
                File::delete($imagePath);
            }
        }
        $model->delete();

        return redirect('/master-hiring')->with('danger', 'Deleted successfully');
    }

}
