<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StudentInfo;
use Auth;
use Alert;

class FirstRegisController extends Controller
{
    public function show(){
	alert()->warning('Becareful!','Some of this data cannot be edit again!')->persistent("OK");;
	return view('regis');
    }

    public function regis(Request $request){
	$id = $request->input("id");
	$sid = $request->input("sid");
	$iden = $request->input("identification_number");
	$f = $request->input("Firstname");
	$l = $request->input("Lastname");
	$ft = $request->input("FirstnameTH");
	$lt = $request->input("LastnameTH");
	$gender = $request->input("gender");
	$add = $request->input("address");
	$pEmail = $request->input("Personal_Email");
	$kMail = $request->input("Kmutt_Email");
	$phone = $request->input("phone_num");
	$dob = $request->input("DOB");
	$store = StudentInfo::updateOrCreate([
		'user_id' => $id,
		'student_id' => $sid,
		'Identification_Number' => $iden,
		'Firstname' => $f,
		'Lastname' => $l,
		'FirstnameTH' => $ft,
		'LastnameTH' => $lt,
		'gender' => $gender,
		'address' => $add,
		'phone_num' => $phone,
		'Personal_Email' => $pEmail,
		'Kmutt_Email' => $kMail,
		'DOB' => $dob
	]);
	alert()->success('Success','Two more step!!')->persistent("OK");;

	return redirect('/school/info');
    }
}
