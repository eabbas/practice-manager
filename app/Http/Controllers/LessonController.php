<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\lesson;
use App\Models\User;
use App\Models\practice;
use PDO;

use function PHPUnit\Framework\returnCallback;

class LessonController extends Controller
{
    public function create(){
        return view("lesson.create");
    }

    public function store(Request $request){
        lesson::create($request->all());
        return redirect('lessons');
    }


    public function index(){
       $lessons  = lesson::where('master_id', Auth::id())->get();
       return view('lesson.index' , ["lessons"=>$lessons]);
    }


    public function show($id){
       $lesson = lesson::find($id);
       $master = user::find($lesson->master_id);
       return view("lesson.single" , ["lesson"=>$lesson ,'master'=>$master]);
    }
    

    public function practice_list(lesson $lesson){

        $lesson->load('practices');
        return view('lesson.practice_list' , ['lesson'=>$lesson]);
    }



    public function edit($id){
        $lesson = lesson::find($id);
        return view("lesson.edit" , ["lesson"=>$lesson]);
    }
    
    public function update(Request $request){
        $lesson = lesson::find($request->id);
        $lesson->title = $request->title;
        $lesson->description = $request->description;
        $lesson->lesson_group = $request->lesson_group;
        $lesson->master_id = $request->master_id;
        $lesson->save();
        return to_route('lesson_list');
    }
    
    public function delete($id){
        $lesson = lesson::find($id);
        $lesson->delete();
         return to_route('lesson_list');
    }

}
