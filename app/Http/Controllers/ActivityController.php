<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\ActivityInfo;
use App\StudentInfo;
use Storage;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('activity/create');
    }

    public function showApprove()
    {
	return view('activity/approve');	
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pact = $request->input('pact');
        $pactID = $request->input('pactID');
        $advisor = $request->input('padvisor');
        $start = $request->input('start_from');
        $end = $request->input('end_at');
        $part = $request->input('participant');
        $hour = $request->input('hour');
        $actname = $request->input('actname');
	$name = $pactID . "-" . $pact . "-request.pdf" ;
        $partimplode = implode(',', $part);
        $input = $request->except('participant');
        $input['participant'] = $part;
        if($request->hasFile('file')) {
            $file = $request->file("file");
            $name = $pactID . "-" . $actname . "-request.pdf" ;
            $file = $file->move(storage_path('app/uploads/activity-pdf'), $name);
            $actFile = $name;
            foreach($input['participant'] as $i){
            $act = ActivityInfo::firstOrCreate([
            	'activitiesName' => $actname,
            	'participant' => $i,
            	'presidentAct' => $pact,
            	'presidentID' => $pactID,
            	'advisor' => $advisor,
            	'amountHours' => $hour,
            	'startFrom' => $start,
            	'endAt' => $end,
		'PDF_filename' => $actFile
            ]);
	    }
	    return view('activity.create' ,[
                'withSuccess' =>true,
                'PDFuploaded' => $actFile
            ]);
        }
	else{
		foreach($input['participant'] as $i){
            	$act = ActivityInfo::firstOrCreate([
                'activitiesName' => $actname,
                'participant' => $i,
                'presidentAct' => $pact,
                'presidentID' => $pactID,
                'advisor' => $advisor,
                'amountHours' => $hour,
                'startFrom' => $start,
                'endAt' => $end
            ]);
            }
	   return view('activity.create', [ 'withSuccess' => true ]);
	}
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
	switch($request->input('action')){
		case "1":
			ActivityInfo::where('id',$id)->update(['status' => 1]);
			return redirect('/activity/approve')->with('success', 'Activity has been approved');
		break;
		case "2":
			ActivityInfo::where('id',$id)->update(['status' => 2]);
			return redirect('/activity/approve')->with('success', 'Activity has been ignored');
		break;
	}	
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ActivityInfo::where('id',$id)->delete();
	return redirect('activity/create')->with('success','Activity has been deleted');
    }
}
