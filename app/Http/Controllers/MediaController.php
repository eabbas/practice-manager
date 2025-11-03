<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MediaController extends Controller
{
    public function index(){
        return view("media.upload");
    }

    public function upload(Request $request){

        $originalExtentsion = request()->file->getClientOriginalExtentsion();
        $originalName = request()->file->getClientOriginalName();
        $fileName = $originalName;



    }
}
