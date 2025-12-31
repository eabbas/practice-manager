<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\lesson;
use App\Models\practice;
use App\Models\responses;
use App\Models\User;
use App\Models\practiceMedia;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;


class PracticeController extends Controller
{
     public function create(lesson $lesson){
        // dd($lesson);
        return view("practice.create" , ["lesson"=>$lesson]);
    }

     public function store(Request $request){
        //dd($request->all());
        $practiceId = practice::insertGetId(["lesson_id"=>$request->lesson_id , "title"=>$request->title , "deadLine"=>$request->deadLine , "description"=>$request->description]);
        //dd($practiceId);
        if($request->file('file')){
            $files = $request->file('file');
           foreach($files as $file){
               $name = $file->getClientOriginalName();
               $path = $file->storeAs('files', $name ,'public');
               $practiceMedia = practiceMedia::create(["practice_id"=>$practiceId , "media_path"=>$path]);
           }

        }
        //dd($path);
        // $path = "<img src='".asset("storage/images/$fileName") . ".>";
      
        return to_route('practices_list');

    }
    
    public function file_download(practiceMedia $media){
        return Storage::disk('public')->download($media->media_path);
    }


    public function index(){
        $practices = Auth::user()->practices;
        $pageNet=Auth::user()->paginate(5);
        return view('practice.index' , ["practiceWithLessons"=>$practices,"pageNet"=>$pageNet]);
    }

    public function show(practice $practice){
       
       $practice->load('master');
       $practice->load('practiceMedia');
       $responses = responses::where('practice_id',$practice->id)->whereIn('user_id' , [ Auth::id(), $practice->master->id])->get();
       $responses->load('users');

       return view('practice.single' , ["practice"=>$practice , 'responses'=>$responses]);
    }


    public function edit($id){
       $practice = practice::find($id);
       return view('practice.edit' , ["practice"=>$practice]);
    }
    

    public function update(Request $request){
        $practice = practice::find($request->id);
        $practice->title = $request->title;
        $practice->description = $request->description;
        $practice->lesson_id = $request->lesson_id;
        $practice->save();
        return to_route('practices_list');
    
    }

    public function delete($id){
        $practice = practice::find($id);
        $practice->delete();
        return to_route('practices_list');
    }

}
