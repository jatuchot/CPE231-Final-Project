<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\StudentInfo;

class StudentInfoController extends Controller
{
     public function show(){
	return view('upload');
     }

     public function uploadPicture(Request $request,$id){
        $file = $request->file("webcam");
        $name = $id . "_profile_" . time() . ".jpeg";
        $file = $file->move(storage_path('app/uploads/profile-picture'), $name);
        $user = StudentInfo::where("student_id", "=", $id)->get()->first();
        $user->image_filename = $name;
        $user->save();
    }
}

