<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EditProfileController extends Controller
{
	public function show()
	{
		return view('editProfile');
	}

    public function update(Request $request, $id)
    {
        $passport= \App\StudentInfo::find($id);
        $passport->Firstname=$request->get('pfirstname');
        $passport->Lastname=$request->get('plastname');
        $passport->LastnameTH=$request->get('psurname');
        $passport->FirstNameTh=$request->get('pfirstTH');
        $passport->address=$request->get('paddress');
        $passport->phone_num=$request->get('phone');
        $passport->Personal_Email=$request->get('personal_email');
        $passport->Identification_Number=$request->get('pidentification');
        $passport->save();
        return view('editProfile', [ 'withSuccess' => true ]);
    }
}

