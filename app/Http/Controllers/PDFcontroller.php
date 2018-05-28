<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StudentInfo;
use Storage;

class PDFcontroller extends Controller
{
    public function download($PDF_filename){

        $path = 'uploads/activity-pdf/' . $PDF_filename;

        if( ! Storage::exists($path) ) return;

        $file = Storage::get($path);
        $type = Storage::mimeType($path);

        $response = response()->make($file, 200);
        $response->header("Content-Type", $type);

        return $response;
    }
}
