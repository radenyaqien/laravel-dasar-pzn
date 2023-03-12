<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    public function upload(Request $request)
    {
        
        $picture = $request->file("picture");

        $picture->storePubliclyAs("pictures",$picture->getClientOriginalName(),"public");

        return "OK : ".$picture->getClientOriginalName();
    }
    public function uploadlocal(Request $request)
    {
        
        $picture = $request->file("picture");

        $picture->storePubliclyAs("pictures",$picture->getClientOriginalName(),"local");

        return "OK : ".$picture->getClientOriginalName();
    }
}