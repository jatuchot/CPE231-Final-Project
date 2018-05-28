<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SchoolInfo;
use App\AcademicHistory;
use App\StudentInfo;
use Auth;
class SchoolInfoController extends Controller
{
    public function show()
    {
	return view('school.schoolinfo');
    }
    public function store(Request $request,$id){
	$user = Auth::user()->id;
	$student = StudentInfo::where('user_id','=',$user)->first();

    	$cert = $request->input('certlevel');
    	$gpax = $request->input('GPAX');
    	$schoolname = $request->input('schoolname');
	$phy10 = $request->input('phy10');
        $phy11 = $request->input('phy11');
        $phy12 = $request->input('phy12');
        $mth10 = $request->input('mth10');
        $mth11 = $request->input('mth11');
        $mth12 = $request->input('mth12');
        $mic10 = $request->input('mic10');
        $mic11 = $request->input('mic11');
        $mic12 = $request->input('mic12');
        $chm10 = $request->input('chm10');
        $chm11 = $request->input('chm11');
        $chm12 = $request->input('chm12');
        $eng10 = $request->input('eng10');
        $eng11 = $request->input('eng11');
        $eng12 = $request->input('eng12');
        $gpaxphy = ($phy10 + $phy11 +$phy12)/3;
        $gpaxmic = ($mic10 + $mic11 +$mic12)/3;
        $gpaxchm = ($chm10 + $chm11 +$chm12)/3;
        $gpaxmth = ($mth10 + $mth11 +$mth12)/3;
        $gpaxeng = ($eng10 + $eng11 +$eng12)/3;

            $act = SchoolInfo::updateOrCreate([
                'Cert_level' => $cert,
                'GPAX' => $gpax,
                'schoolname' => $schoolname,
                'user_id' => $id

            ]);

	    $act2 = AcademicHistory::updateOrCreate([
		'student_id' => $student->student_id,
                'phy10' => $phy10,
                'phy11' => $phy11,
                'phy12' => $phy12,
                'math10' => $mth10,
                'math11' => $mth11,
                'math12' => $mth12,
                'mic10' => $mic10,
                'mic11' => $mic11,
                'mic12' => $mic12,
                'chm10' => $chm10,
                'chm11' => $chm11,
                'chm12' => $chm12,
                'eng10' => $eng10,
                'eng11' => $eng11,
                'eng12' => $eng12,
                'GPAXphy' => $gpaxphy,
                'GPAXmth' => $gpaxmth,
                'GPAXchm' => $gpaxchm,
                'GPAXmic' => $gpaxmic,
                'GPAXeng' => $gpaxeng
		]);

	    alert()->success('Success','One more step left!.')->persistent("OK");
            return redirect('/upload/imageprofile')->with('success');
	}
}
