<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StudentInfo;
use App\Enrollment;

class EnrollmentController extends Controller
{
    public function store(Request $request,$id){
	$user = StudentInfo::where('id','=',$id)->first();
	$subid = $request->input('subject_id');
        $term = $request->input('term');
	$partimplode = implode(',', $subid);
        $input = $request->except('subject_id');
        $input['subject_id'] = $subid;
	foreach($input['subject_id'] as $i){
            $act = Enrollment::firstOrCreate([
                'subjectid' => $i,
		'term' => $term,
		'studentid' => $user->student_id
            ]);
	}
	return redirect('enroll/regis')->with('success');
    }
}
