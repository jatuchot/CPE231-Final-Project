<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StudentInfo;

class StudentInfoController extends Controller
{
     public function show(){
        return view('upload');
     }
}

