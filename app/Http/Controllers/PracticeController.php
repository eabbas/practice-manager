<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\lesson;
use App\Models\practice;
use App\Models\responses;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class PracticeController extends Controller
{
     public function create(lesson $lesson){
        // dd($lesson);
        return view("practice.create" , ["lesson"=>$lesson]);
    }

     public function store(Request $request){
        // dd($request->all());
        practice::create($request->all());
        // $type = request()->practiceMedia->getClientOriginalExtentsion();
        // $name = request()->practiceMedia->getClientOriginalName();
        // $fullName = Str::uuid()."_".$name;
        return to_route('practices_list');

    }

    public function index(){
        // $practiceWithLessons = practice::with("lesson")->get();
        $practices = Auth::user()->practices;
        // dd($practices);
        //dd($practiceWithLessons);
        return view('practice.index' , ["practiceWithLessons"=>$practices]);
    }

    public function show(practice $practice){
       
       $practice->load('master');

       $responses = responses::where('practice_id',$practice->id)->whereIn('user_id' , [ Auth::id(), $practice->master->id])->get();
       $responses->load('users');

       return view('practice.single' , ["practice"=>$practice , 'responses'=>$responses]);
    }


    public function edit($id){
       $practice = practice::find($id);
      
    //    dd($practiceWithLessons->lessons);
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
