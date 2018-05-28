<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\SubjectInfo;
use App\ActivityInfo;
use App\SchoolInfo;
use Charts;
use DB;
class AnalysisController extends Controller
{
    public function show(){
	$count1 = User::count();
        $role1 = User::select(DB::raw("role as role"))->groupBy('role')->get()->toArray();
        $role1 = array_column($role1,'role');
        $users1 = User::select(DB::raw("COUNT(role) as total"))
                                ->groupBy('role')
                                ->get()->toArray();
        $users1 = array_column($users1,'total');
        $chart1 = Charts::database($users1,'bar','highcharts')
                        ->title("Total Number Of UserRole")
                        ->elementLabel("Total Users")
                        ->labels(['First Year Student','Second Year Student','Third Year Student','Administrator','Instructor'])
                        ->values($users1)
                        ->dimensions(500, 250)
                        ->responsive(true);

	$count2 = SubjectInfo::count();
        $role2 = SubjectInfo::select(DB::raw("subject_id as subject_id"))->groupBy('subject_id')->get()->toArray();
        $role2 = array_column($role2,'subject_id');
        $users2 = SubjectInfo::select(DB::raw("COUNT(subject_id) as total"))
                                ->groupBy('subject_id')
                                ->get()->toArray();
        $users2 = array_column($users2,'total');
        $chart2 = Charts::database($users2,'bar','highcharts')
                        ->title("Total Number of OpenCourse in This Term")
                        ->elementLabel("Total Course")
                        ->labels($role2)
                        ->values($users2)
                        ->dimensions(500, 250)
                        ->responsive(true);

	$count3 = ActivityInfo::count();
        $role3 = ActivityInfo::select(DB::raw("status as status"))->groupBy('status')->get()->toArray();
        $role3 = array_column($role3,'status');
        $users3 = ActivityInfo::select(DB::raw("COUNT(status) as total"))
                                ->groupBy('status')
				->orderBy('status','asc')
                                ->get()->toArray();
        $users3 = array_column($users3,'total');
        $chart3 = Charts::database($users3,'bar','highcharts')
                        ->title("Total Number of All Status in Activity")
                        ->elementLabel("Total Permit")
                        ->labels(['Pending','Approved','Ignored'])
                        ->values($users3)
                        ->dimensions(500, 250)
                        ->responsive(true);

	$count = ActivityInfo::count();
        $role = ActivityInfo::select(DB::raw("participant as part"))->groupBy('participant')->get()->toArray();
        $role = array_column($role,'part');
        $users = ActivityInfo::select(DB::raw("COUNT(participant) as total"))
                                ->groupBy('participant')
                                ->get()->toArray();
        $users = array_column($users,'total');
        $chart = Charts::database($users,'bar','highcharts')
                        ->title("Total Number of Participant in Activity")
                        ->elementLabel("Total Number")
                        ->labels(['First Year','Second Year','Third Year'])
                        ->values($users)
                        ->dimensions(500, 250)
                        ->responsive(true);

	$count5 = SubjectInfo::count();
        $role5 = SubjectInfo::select(DB::raw("term as term"))->groupBy('term')->get()->toArray();
        $role5 = array_column($role5,'term');
        $users5 = SubjectInfo::select(DB::raw("COUNT(term) as total"))
                                ->groupBy('term')
                                ->get()->toArray();
        $users5 = array_column($users5,'total');
        $chart5 = Charts::database($users5,'pie','highcharts')
                        ->title("Total amount of OpenCourse Between First and Second Term")
                        ->labels(['First Term','Second Term'])
                        ->values($users5)
                        ->dimensions(1000, 500)
                        ->responsive(true);

	$count6 = ActivityInfo::count();
        $role6 = ActivityInfo::select(DB::raw("activitiesName as hours"))->groupBy('activitiesName')->orderBy('activitiesName','asc')->distinct()->get()->toArray();
        $role6 = array_column($role6,'hours');
        $users6 = ActivityInfo::select(DB::raw("amountHours as test"))
                                ->orderBy('activitiesName','asc')
                                ->distinct()
                                ->get()->toArray();
        $users6 = array_column($users6,'test');

        $chart6 = Charts::database($users6,'bar','highcharts')
                        ->title("Finding highest given hours")
                        ->elementLabel("Total Hours")
                        ->colors(['#c58ec3', '#ffc0cb','#e7f586','#86b7f5','#c1fdc5'])
                        ->labels($role6)
                        ->values($users6)
                        ->dimensions(1000, 500)
                        ->responsive(true);

	$role7 = DB::table('student_info')->join('school_info','student_info.id','=','school_info.user_id')
                ->select(DB::raw("Firstname as name"))->orderBy('GPAX','desc')->get()->toArray();
        $role7 = array_column($role7,'name');
        $users7 = DB::table('student_info')->join('school_info','student_info.id','=','school_info.user_id')
                ->select(DB::raw("GPAX as gpax"))->orderBy('GPAX','desc')->get()->toArray();
        $users7 = array_column($users7,'gpax');

        $chart7 = Charts::database($users7,'bar','highcharts')
                        ->title("Who get highest GPAX before become CPE Student?")
                        ->elementLabel("Total GPAX")
                        ->colors(['#c58ec3', '#ffc0cb','#e7f586','#86b7f5','#c1fdc5'])
                        ->labels($role7)
                        ->values($users7)
                        ->dimensions(1000, 500)
                        ->responsive(true);
	$role8 = DB::table('enrollments')->join('subject_info','enrollments.subjectid','=','subject_info.id')
                ->select(DB::raw("subject_id as sid1"))
                ->groupBy('subject_id')
                ->orderBy('subject_id','desc')
                ->get()->toArray();
        $role8 = array_column($role8,'sid1');
        $users8 = DB::table('enrollments')->join('subject_info','enrollments.subjectid','=','subject_info.id')
                ->select(DB::raw("COUNT(subjectid) as sid"))
                ->groupBy('subject_id')
                ->orderBy('subject_id','desc')
                ->get()->toArray();
        $users8 = array_column($users8,'sid');

        $chart8 = Charts::database($users8,'bar','highcharts')
                        ->title("Which course does the student enroll the most? ")
                        ->elementLabel("Total Number")
                        ->colors(['#c58ec3', '#ffc0cb','#e7f586','#86b7f5','#c1fdc5'])
                        ->labels($role8)
                        ->values($users8)
                        ->dimensions(1000, 500)
                        ->responsive(true);

	$role9 = DB::table('student_info')->select(DB::raw("gender as g"))->groupBy('gender')->orderBy('gender','asc')->get()->toArray();
        $role9 = array_column($role9,'g');
        $users9 = DB::table('student_info')->select(DB::raw("COUNT(gender) as g1"))->groupBy('gender')->orderBy('gender','asc')->get()->toArray();
        $users9 = array_column($users9,'g1');

        $chart9 = Charts::database($users9,'donut','highcharts')
                        ->title("What is the ratio of Male:Female ?")
                        ->elementLabel("Total Number")
                        ->colors(['#c58ec3', '#ffc0cb','#e7f586','#86b7f5','#c1fdc5'])
                        ->labels(['Female','Male'])
                        ->values($users9)
                        ->dimensions(1000, 500)
                        ->responsive(true);
	$role10 = DB::table('subject_info')->join('teacher_info','subject_info.instructor','=','teacher_info.id')
                ->select('Firstname as f','Lastname as la')
                ->orderBy('teacher_info.id','asc')->get()->toArray();

        $role10 = array_column($role10,'f','la');
        $users10 = DB::table('subject_info')->join('teacher_info','subject_info.instructor','=','teacher_info.id')->select(DB::raw("COUNT(instructor) as g1"))->groupBy('instructor')
                ->orderBy('teacher_info.id','asc')->get()->toArray();

        $users10 = array_column($users10,'g1');

        $chart10 = Charts::database($users10,'bar','highcharts')
                        ->title("Which instructor have open the most course?")
                        ->elementLabel("Total Course")
                        ->colors(['#c58ec3', '#ffc0cb','#e7f586','#86b7f5','#c1fdc5'])
                        ->labels($role10)
                        ->values($users10)
                        ->dimensions(1000, 500)
                        ->responsive(true);


	return view('analysis/show',compact('chart1','chart2','chart3','chart','chart5','chart6','chart7','chart8','chart9','chart10'));
    }
    public function get1(){
	$count = User::count();
	$role = User::select(DB::raw("role as role"))->groupBy('role')->get()->toArray();
	$role = array_column($role,'role');
	$users = User::select(DB::raw("COUNT(role) as total"))
				->groupBy('role')
				->get()->toArray();
	$users = array_column($users,'total');
	$chart = Charts::database($users,'bar','highcharts')
			->title("Total Number Of UserRole")
			->elementLabel("Total Users")
			->labels(['First Year Student','Second Year Student','Third Year Student','Administrator','Instructor'])
			->values($users)
			->dimensions(1000, 500)
			->responsive(true);
	return view('analysis.1',compact('chart'));
    }
    public function get2(){
        $count = SubjectInfo::count();
        $role = SubjectInfo::select(DB::raw("subject_id as subject_id"))->groupBy('subject_id')->get()->toArray();
        $role = array_column($role,'subject_id');
        $users = SubjectInfo::select(DB::raw("COUNT(subject_id) as total"))
                                ->groupBy('subject_id')
                                ->get()->toArray();
        $users = array_column($users,'total');
        $chart = Charts::database($users,'bar','highcharts')
                        ->title("Total Number of OpenCourse in This Term")
                        ->elementLabel("Total Course")
                        ->labels($role)
                        ->values($users)
                        ->dimensions(1000, 500)
                        ->responsive(true);
        return view('analysis.2',compact('chart'));
    }
     public function get3(){
        $count = ActivityInfo::count();
        $role = ActivityInfo::select(DB::raw("status as status"))->groupBy('status')->get()->toArray();
        $role = array_column($role,'status');
        $users = ActivityInfo::select(DB::raw("COUNT(status) as total"))
                                ->groupBy('status')
                                ->get()->toArray();
        $users = array_column($users,'total');
        $chart = Charts::database($users,'bar','highcharts')
                        ->title("Total Number of All Status in Activity")
                        ->elementLabel("Total Permit")
                        ->labels(['Pending','Approved','Ignored'])
                        ->values($users)
                        ->dimensions(1000, 500)
                        ->responsive(true);
        return view('analysis.3',compact('chart'));
    } 

    public function get4(){
        $count = ActivityInfo::count();
        $role = ActivityInfo::select(DB::raw("participant as part"))->groupBy('participant')->get()->toArray();
        $role = array_column($role,'part');
        $users = ActivityInfo::select(DB::raw("COUNT(participant) as total"))
                                ->groupBy('participant')
                                ->get()->toArray();
        $users = array_column($users,'total');
        $chart = Charts::database($users,'pie','highcharts')
                        ->title("Total Number of Participant in Activity")
                        ->elementLabel("Total Permit")
                        ->labels(['First Year','Second Year','Third Year'])
                        ->values($users)
                        ->dimensions(1000, 500)
                        ->responsive(true);
        return view('analysis.4',compact('chart'));
    }

     public function get5(){
        $count = SubjectInfo::count();
        $role = SubjectInfo::select(DB::raw("term as term"))->groupBy('term')->get()->toArray();
        $role = array_column($role,'term');
        $users = SubjectInfo::select(DB::raw("COUNT(term) as total"))
                                ->groupBy('term')
                                ->get()->toArray();
        $users = array_column($users,'total');
        $chart = Charts::database($users,'pie','highcharts')
                        ->title("Total Number of Participant in Activity")
                        ->elementLabel("Total Permit")
                        ->labels(['First Term','Second Term'])
                        ->values($users)
                        ->dimensions(1000, 500)
                        ->responsive(true);
        return view('analysis.5',compact('chart'));
    }

    public function get6(){
        $count = ActivityInfo::count();
        $role = ActivityInfo::select(DB::raw("activitiesName as hours"))->groupBy('activitiesName')->orderBy('activitiesName','asc')->distinct()->get()->toArray();
        $role = array_column($role,'hours');
        $users = ActivityInfo::select(DB::raw("amountHours as test"))
				->orderBy('activitiesName','asc')
				->distinct()
                                ->get()->toArray();
        $users = array_column($users,'test');

        $chart = Charts::database($users,'bar','highcharts')
                        ->title("Finding highest given hours")
                        ->elementLabel("Total Hours")
			->colors(['#c58ec3', '#ffc0cb','#e7f586','#86b7f5','#c1fdc5'])
                        ->labels($role)
                        ->values($users)
                        ->dimensions(1000, 500)
                        ->responsive(true);
        return view('analysis.6',compact('chart'));
    }

    public function get7(){
	$role = DB::table('student_info')->join('school_info','student_info.id','=','school_info.user_id')
		->select(DB::raw("Firstname as name"))->orderBy('GPAX','desc')->get()->toArray();
        $role = array_column($role,'name');
        $users = DB::table('student_info')->join('school_info','student_info.id','=','school_info.user_id')
		->select(DB::raw("GPAX as gpax"))->orderBy('GPAX','desc')->get()->toArray();
        $users = array_column($users,'gpax');

        $chart = Charts::database($users,'bar','highcharts')
                        ->title("Who get highest GPAX before become CPE Student?")
                        ->elementLabel("Total GPAX")
                        ->colors(['#c58ec3', '#ffc0cb','#e7f586','#86b7f5','#c1fdc5'])
                        ->labels($role)
                        ->values($users)
                        ->dimensions(1000, 500)
                        ->responsive(true);
        return view('analysis.7',compact('chart'));
    }

    public function get8(){
        $role = DB::table('enrollments')->join('subject_info','enrollments.subjectid','=','subject_info.id')
                ->select(DB::raw("subject_id as sid1"))
		->groupBy('subject_id')
		->orderBy('subject_id','desc')
		->get()->toArray();
        $role = array_column($role,'sid1');
        $users = DB::table('enrollments')->join('subject_info','enrollments.subjectid','=','subject_info.id')
                ->select(DB::raw("COUNT(subjectid) as sid"))
		->groupBy('subject_id')
		->orderBy('subject_id','desc')
		->get()->toArray();
        $users = array_column($users,'sid');

        $chart = Charts::database($users,'bar','highcharts')
                        ->title("Which course does the student enroll the most? ")
                        ->elementLabel("Total Number")
                        ->colors(['#c58ec3', '#ffc0cb','#e7f586','#86b7f5','#c1fdc5'])
                        ->labels($role)
                        ->values($users)
                        ->dimensions(1000, 500)
                        ->responsive(true);
        return view('analysis.8',compact('chart'));
    }

   public function get9(){
        $role = DB::table('student_info')->select(DB::raw("gender as g"))->groupBy('gender')->orderBy('gender','asc')->get()->toArray();
        $role = array_column($role,'g');
        $users = DB::table('student_info')->select(DB::raw("COUNT(gender) as g1"))->groupBy('gender')->orderBy('gender','asc')->get()->toArray();
        $users = array_column($users,'g1');

        $chart = Charts::database($users,'donut','highcharts')
                        ->title("What is the ratio of Male:Female ?")
                        ->elementLabel("Total Number")
                        ->colors(['#c58ec3', '#ffc0cb','#e7f586','#86b7f5','#c1fdc5'])
                        ->labels(['Female','Male'])
                        ->values($users)
                        ->dimensions(1000, 500)
                        ->responsive(true);
        return view('analysis.9',compact('chart'));
    }

    public function get10(){
        $role = DB::table('subject_info')->join('teacher_info','subject_info.instructor','=','teacher_info.id')
		->select('Firstname as f','Lastname as la')
		->orderBy('teacher_info.id','asc')->get()->toArray();

        $role = array_column($role,'f','la');
	$users = DB::table('subject_info')->join('teacher_info','subject_info.instructor','=','teacher_info.id')->select(DB::raw("COUNT(instructor) as g1"))->groupBy('instructor')
                ->orderBy('teacher_info.id','asc')->get()->toArray();

        $users = array_column($users,'g1');

        $chart = Charts::database($users,'bar','highcharts')
                        ->title("Which instructor have open the most course?")
                        ->elementLabel("Total Course")
                        ->colors(['#c58ec3', '#ffc0cb','#e7f586','#86b7f5','#c1fdc5'])
                        ->labels($role)
                        ->values($users)
                        ->dimensions(1000, 500)
                        ->responsive(true);
        return view('analysis.10',compact('chart'));
    }
}
