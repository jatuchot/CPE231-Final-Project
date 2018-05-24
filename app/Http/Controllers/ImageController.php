<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
class ImageController extends Controller
{
    public function profilePicture($img_name){

        $path = 'uploads/profile-picture/' . $img_name;

        if( ! Storage::exists($path) ) return;

        $file = Storage::get($path);
        $type = Storage::mimeType($path);

        $response = response()->make($file, 200);
        $response->header("Content-Type", $type);

        return $response;

    }
}

