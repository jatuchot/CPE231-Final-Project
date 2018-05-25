<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StudentInfo;
use App\Enrollment;

class EnrollmentController extends Controller
{
    public function store(Request $request,$id){
	$subid = $request->input('subject_id');
	$partimplode = implode(',', $subid);
        $input = $request->except('subject_id');
        $input['subject_id'] = $subid;
	foreach($input['subject_id'] as $i){
            $act = Enrollment::firstOrCreate([
                'subjectid' => $i,
		'studentid' => $id
            ]);
	}
	return redirect('enroll/regis')->with('success');
    }
}
