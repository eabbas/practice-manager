<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lesson;
use App\Models\practice;
use Illuminate\Support\Str;


class PracticeController extends Controller
{
     public function create(){
        $lessons = lesson::all();
        // dd($lessons);
        return view("practice.create" , ["lessons"=>$lessons]);
    }

     public function store(Request $request){
        practice::create($request->all());
        // $type = request()->practiceMedia->getClientOriginalExtentsion();
        // $name = request()->practiceMedia->getClientOriginalName();
        // $fullName = Str::uuid()."_".$name;
        return to_route('practice_list');

    }

    public function index(){
        $practiceWithLessons = practice::with("lessons")->get();
        return view('practice.index' , ["practiceWithLessons"=>$practiceWithLessons]);
    }

    public function show($id){
       $practiceWithLessons = practice::find($id)->load("lessons");
       return view('practice.single' , ["practiceWithLessons"=>$practiceWithLessons]);
    }

    public function edit($id){
       $practice = practice::find($id);
       $lessons = lesson::all();
    //    dd($practiceWithLessons->lessons);
       return view('practice.edit' , ["practice"=>$practice , "lessons"=>$lessons]);
    }
    

    public function update(Request $request){
        $practice = practice::find($request->id);
        $practice->title = $request->title;
        $practice->description = $request->description;
        $practice->lesson_id = $request->lessonId;
        $practice->save();
    
    }

    public function delete($id){
        $practice = practice::find($id);
        $practice->delete();
    }

}
