<?php

namespace App\Http\Controllers;

use App\Models\People;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use File;

class PeopleController extends Controller {

    public function index() {
        $model = People::all();
        return view('people.index', ['model' => $model]);
    }

    public function form($id = NULL) {
        $statusTitle = 'Create';
        $model = [];
        if (strlen($id) > 0) {
            $model = People::where('id', $id)->first();
            if (!empty($model)) {
                $statusTitle = 'Edit';
            } else {
                return redirect('/people')->with('error', 'Data not found !');
            }
        }

        return view('people.form', [
            'model' => $model,
            'status_title' => $statusTitle
        ]);
    }

    public function save(Request $request) {
        $request->validate([
            'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'type' => 'required|max:50',
            'role' => 'required|max:255',
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
                $model = People::firstOrNew(['id' => $id]);
                $model->type = isset($request['type']) ? $request['type'] : NULL;
                $model->role = isset($request['role']) ? $request['role'] : NULL;
                $model->name = isset($request['name']) ? $request['name'] : NULL;
                $model->phone = isset($request['phone']) ? $request['phone'] : NULL;
                $model->email = isset($request['email']) ? $request['email'] : NULL;
                $model->description = isset($request['description']) ? $request['description'] : NULL;
                if ($request->file('image') && request('image') != '') {
                    if (!file_exists('images')) {
                        mkdir('images', 0777, true);
                    }
                    if (!file_exists('images/people/')) {
                        mkdir('images/people/', 0777, true);
                    }
                    if (!empty($model->image)) {
                        $imagePath = $_SERVER['DOCUMENT_ROOT'] . $model->image;
                        if (file_exists($imagePath)) {
                            File::delete($imagePath);
                        }
                    }
                    $nameImg = time() . '.' . $request->file('image')->getClientOriginalExtension();
                    $destinationPath = $_SERVER['DOCUMENT_ROOT'] . '/images/people/';
                    $imagePath = $destinationPath . $nameImg;
                    $request->file('image')->move($destinationPath, $nameImg);
                    $model->image = '/images/people/' . $nameImg;
                }
                $model->save();
            } catch (Exception $ex) {
                $success = false;
                $message = $ex->getMessage();
            }
        }

        if ($success) {
            return redirect('/people')->with('success', $message);
        } else {
            return redirect('/people/add')->with('error', $message);
        }
    }

    public function detail($id) {
        $model = People::where('id', $id)->first();
        return view('people.detail', compact('model'));
    }

    public function delete($id) {
        $model = People::where('id', $id)->first();
        if (strlen($model->image) > 0) {
            $imagePath = $_SERVER['DOCUMENT_ROOT'] . $model->image;
            if (file_exists($imagePath)) {
                File::delete($imagePath);
            }
        }
        $model->delete();

        return redirect()->route('people')->with('danger', 'Deleted successfully');
    }

}
