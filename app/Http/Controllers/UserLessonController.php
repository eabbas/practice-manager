<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\lesson;
use App\Models\user;
use App\Models\userLesson;
use Illuminate\Support\Facades\Auth;

class UserLessonController extends Controller
{


     public function lesson_address(lesson $lesson){
        //$sendLesson = $lesson->practices;
        $master=user::find($lesson->master_id);
      return view("userLesson.lesson_address", ['lesson'=>$lesson ,'master'=>$master]);
    }



    public function store(Request $request){
      //userLesson::create(["lesson_id"=>$request->lesson_id , "user_id"=>Auth::id(),"status"=>0]);
      userLesson::create($request->all());
      return to_route('my_requests');
    }
 

    public function my_requests(){
      $user = Auth::user();
      $userLessons = $user->lessons;
      //dd($userLessons);
      
      foreach($userLessons as $userLesson){
        $master=user::find($userLesson->master_id);
      }

      return view('userLesson.my_requests' , ['userLesson'=>$userLesson,'master'=> $master, 'user'=>$user]);
    }


    public function request_list($id){

      $lesson =lesson::find($id);
      //dd($lesson);
      $lesson->load("users");

      return view("userLesson.requests",['lessonUsers'=>$lesson]);
    }

    public function approveRequest($userId,$lessonId){

      $userLesson = userLesson::where('user_id' , $userId)->where('lesson_id',$lessonId)->first();
      $userLesson->status = 1 ; 
      $userLesson->save();
      
      return redirect()->back();
    }
    
    public function student_class(){

      $user = Auth::user();
      $userLessons = $user->lessons;
      //dd($userLessons);
      
      foreach($userLessons as $userLesson){
      $master=user::find($userLesson->master_id);
      }
      // practices of the lesson
      // $lesson->load('practices');
      // $lesson->load('master');

      return view("userLesson.student_class",['userLesson'=>$userLesson,'master'=> $master, 'user'=>$user]);

    }
}
