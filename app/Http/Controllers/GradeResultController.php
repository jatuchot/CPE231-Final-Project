<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Enrollment;
use App\StudentInfo;
class GradeResultController extends Controller
{
    public function show(){
	$year = date('Y');
	$month = date('m');
	$term = 0;
	if($month >= 8){
	    $term = 1;
	}
	else if($month >=1 && $month < 8){
	    $term = 2;
	}
	$id = $term."/".$year;

	$curUser = Auth::user();
	$user = StudentInfo::where('user_id','=',$curUser->id)->first();
	$grade = DB::table('enrollments')
        ->join('grade_results','enrollments.enrollid','=','grade_results.enrollid')
        ->join('subject_info','enrollments.subjectid','=','subject_info.id')
        ->select('subject_info.*','grade_results.*')
        ->where('student_id','=',$user->student_id)
	->where('enrollments.term','=',$id)
        ->get();
	$grade1 = Enrollment::where('studentid','=',$user->student_id)->get();

	return view('grade.gradeResult',['user' => $user,'grade' => $grade, 'curUser' => $curUser, 'term' => $id , 'grade1' => $grade1]);
    }
    public function showTerm(Request $request){
	$id = $request->input('term');
	$curUser = Auth::user();
        $user = StudentInfo::where('user_id','=',$curUser->id)->first();
        $grade = DB::table('enrollments')
        ->join('grade_results','enrollments.enrollid','=','grade_results.enrollid')
        ->join('subject_info','enrollments.subjectid','=','subject_info.id')
        ->select('subject_info.*','grade_results.*')
        ->where('student_id','=',$user->student_id)
	->where('enrollments.term','=',$id)
        ->get();

        return view('grade.gradeResult',['user' => $user,'grade' => $grade, 'curUser' => $curUser, 'term' => $id]);
    }
}
