<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Alert;

class EditProfileController extends Controller
{
	public function show()
	{
		return view('editProfile');
	}
	public function showI()
        {
                return view('editInstructor');
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
	alert()->success('Success','Your data has been updated!.')->persistent("OK");
        return redirect('/edit');
    }

    public function updateI(Request $request, $id)
    {
        $passport= \App\TeacherInfo::find($id);
        $passport->Firstname=$request->get('pfirstname');
        $passport->Lastname=$request->get('plastname');
        $passport->LastnameTH=$request->get('psurname');
        $passport->FirstNameTh=$request->get('pfirstTH');
        $passport->address=$request->get('paddress');
        $passport->phone_num=$request->get('phone');
        $passport->Personal_Email=$request->get('personal_email');
        $passport->Identification_Number=$request->get('pidentification');
        $passport->save();
	alert()->success('Success','Your data has been updated!.')->persistent("OK");
        return redirect('edit/instructor');
    }

}

