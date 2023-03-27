<?php

namespace App\Http\Controllers;

use App\Models\CommunityDescription;
use App\Models\CommunityDiversity;
use App\Models\CommunityPartnership;
use App\Models\CommunityVolunteering;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use File;

class CommunityController extends Controller {

    public function community() {

        $model = DB::table('community_description')->first();
        return view('community.description', [
            'data' => $model,
        ]);
    }

    public function communitySave(Request $request) {
        $success = true;
        $message = 'Update description success';
        $id = isset($request['id']) ? $request['id'] : NULL;
        if ($success) {
            try {
                $community = CommunityDescription::firstOrNew(['id' => $id]);
                $community->description = $request['description'];
                $community->save();
            } catch (Exception $ex) {
                $success = false;
                $message = $ex->getMessage();
            }
        }

        if (!$success) {
            return redirect('/community')->with('success', $message);
        } else {
            return redirect('/community')->with('error', $message);
        }
    }

    public function charityIndex() {
        $model = CommunityPartnership::all();
        return view('community.charity_index', ['model' => $model]);
    }

    public function charityForm($id = NULL) {
        $statusTitle = 'Create';
        $model = [];
        if (strlen($id) > 0) {
            $model = CommunityPartnership::where('id', $id)->first();
            if (!empty($model)) {
                $statusTitle = 'Edit';
            } else {
                return redirect('/community-charity')->with('error', 'Data not found !');
            }
        }

        return view('community.charity_form', [
            'model' => $model,
            'status_title' => $statusTitle
        ]);
    }

    public function charitySave(Request $request) {
        $request->validate([
            'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'description' => 'required',
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
                $model = CommunityPartnership::firstOrNew(['id' => $id]);
                $model->description = isset($request['description']) ? $request['description'] : NULL;
                if ($request->file('image') && request('image') != '') {
                    if (!file_exists('images')) {
                        mkdir('images', 0777, true);
                    }
                    if (!file_exists('images/charity/')) {
                        mkdir('images/charity/', 0777, true);
                    }
                    if (!empty($model->image)) {
                        $imagePath = $_SERVER['DOCUMENT_ROOT'] . $model->image;
                        if (file_exists($imagePath)) {
                            File::delete($imagePath);
                        }
                    }
                    $nameImg = time() . '.' . $request->file('image')->getClientOriginalExtension();
                    $destinationPath = $_SERVER['DOCUMENT_ROOT'] . '/images/charity/';
                    $imagePath = $destinationPath . $nameImg;
                    $request->file('image')->move($destinationPath, $nameImg);
                    $model->image = '/images/charity/' . $nameImg;
                }
                $model->save();
            } catch (Exception $ex) {
                $success = false;
                $message = $ex->getMessage();
            }
        }

        if ($success) {
            return redirect('/community-charity')->with('success', $message);
        } else {
            return redirect('/community-charity/add')->with('error', $message);
        }
    }

    public function charityDetail($id) {
        $model = CommunityPartnership::where('id', $id)->first();
        return view('community.charity_detail', compact('model'));
    }

    public function charityDelete($id) {
        $model = CommunityPartnership::where('id', $id)->first();
        if (strlen($model->image) > 0) {
            $imagePath = $_SERVER['DOCUMENT_ROOT'] . $model->image;
            if (file_exists($imagePath)) {
                File::delete($imagePath);
            }
        }
        $model->delete();

        return redirect('/community-charity')->with('danger', 'Deleted successfully');
    }

    public function volunteeringIndex() {
        $model = CommunityVolunteering::all();
        return view('community.volunteering_index', ['model' => $model]);
    }

    public function volunteeringForm($id = NULL) {
        $statusTitle = 'Create';
        $model = [];
        if (strlen($id) > 0) {
            $model = CommunityVolunteering::where('id', $id)->first();
            if (!empty($model)) {
                $statusTitle = 'Edit';
            } else {
                return redirect('/community-volunteering')->with('error', 'Data not found !');
            }
        }

        return view('community.volunteering_form', [
            'model' => $model,
            'status_title' => $statusTitle
        ]);
    }

    public function volunteeringSave(Request $request) {
        $request->validate([
            'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'description' => 'required',
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
                $model = CommunityVolunteering::firstOrNew(['id' => $id]);
                $model->description = isset($request['description']) ? $request['description'] : NULL;
                if ($request->file('image') && request('image') != '') {
                    if (!file_exists('images')) {
                        mkdir('images', 0777, true);
                    }
                    if (!file_exists('images/volunteering/')) {
                        mkdir('images/volunteering/', 0777, true);
                    }
                    if (!empty($model->image)) {
                        $imagePath = $_SERVER['DOCUMENT_ROOT'] . $model->image;
                        if (file_exists($imagePath)) {
                            File::delete($imagePath);
                        }
                    }
                    $nameImg = time() . '.' . $request->file('image')->getClientOriginalExtension();
                    $destinationPath = $_SERVER['DOCUMENT_ROOT'] . '/images/volunteering/';
                    $imagePath = $destinationPath . $nameImg;
                    $request->file('image')->move($destinationPath, $nameImg);
                    $model->image = '/images/volunteering/' . $nameImg;
                }
                $model->save();
            } catch (Exception $ex) {
                $success = false;
                $message = $ex->getMessage();
            }
        }

        if ($success) {
            return redirect('/community-volunteering')->with('success', $message);
        } else {
            return redirect('/community-volunteering/add')->with('error', $message);
        }
    }

    public function volunteeringDetail($id) {
        $model = CommunityVolunteering::where('id', $id)->first();
        return view('community.volunteering_detail', compact('model'));
    }

    public function volunteeringDelete($id) {
        $model = CommunityVolunteering::where('id', $id)->first();
        if (strlen($model->image) > 0) {
            $imagePath = $_SERVER['DOCUMENT_ROOT'] . $model->image;
            if (file_exists($imagePath)) {
                File::delete($imagePath);
            }
        }
        $model->delete();

        return redirect('/community-volunteering')->with('danger', 'Deleted successfully');
    }

    public function communityDiversity() {
        $model = DB::table('community_diversity')->first();
        return view('community.diversity_index', [
            'data' => $model,
        ]);
    }

    public function communityDiversitySave(Request $request) {
        $success = true;
        $message = 'Update description success';
        $id = $request['id'] ?: NULL;
        if ($success) {
            try {
                $about = CommunityDiversity::firstOrNew(['id' => $id]);
                $about->description = $request['description'];
                $about->save();
            } catch (Exception $ex) {
                $success = false;
                $message = $ex->getMessage();
            }
        }

        if (!$success) {
            return redirect('/community-diversity')->with('success', $message);
        } else {
            return redirect('/community-diversity')->with('error', $message);
        }
    }

}
