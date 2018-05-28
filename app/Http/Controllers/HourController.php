<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Activities;
use App\ActivityInfo;
use App\StudentInfo;
use DB;

class HourController extends Controller
{
    public function list(){
	$user = Auth::user();
	$student = StudentInfo::where('user_id','=',$user->id)->first();
	$hour = DB::table('activities')
		->join('activities_info','activities.act_id','=','activities_info.id')
		->where('user_id','=',$student->id)
		->get();
	$count = DB::table('activities')
                ->join('activities_info','activities.act_id','=','activities_info.id')
                ->where('user_id','=',$student->id)
                ->count();
	$all = DB::table('activities')
                ->join('activities_info','activities.act_id','=','activities_info.id')
		->select('amountHours')
                ->where('user_id','=',$student->id)
		->sum('amountHours');

	return view('activity.list',['hour' => $hour , 'all' => $all , 'count' => $count]);
    }
}
