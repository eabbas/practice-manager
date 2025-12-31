<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\lesson;
use App\Models\User;
use App\Models\userLesson;
use Illuminate\Support\Facades\Auth;

class UserLessonController extends Controller
{


  public function lesson_address(lesson $lesson)
  {
    //$sendLesson = $lesson->practices;
    $master = user::find($lesson->master_id);
    //dd($lesson);
    return view("userLesson.lesson_address", ['lesson' => $lesson, 'master' => $master]);
  }



  public function store(Request $request)
  {
    $userRequest = userLesson::where("lesson_id", $request->lesson_id)->where("user_id", Auth::id())->first();
    // dd($userRequest);

    if (!$userRequest) {
      userLesson::create(["lesson_id" => $request->lesson_id, "user_id" => Auth::id(), "status" => 0]);
    }
    return to_route('my_requests');
  }


  public function my_requests()
  {
    $user = Auth::user();
    $userLessons = $user->lessons;
    foreach ($userLessons as $userLesson) {
      $master = user::find($userLesson->master_id);
    }
    if (isset($userLesson)) {
      return view('userLesson.my_requests', ['userLesson' => $userLesson, 'master' => $master, 'user' => $user]);
    } else {
      return view('userLesson.without_request');
    }
  }

  
  public function request_list($id)
  {

    $lesson = lesson::find($id);
    //dd($lesson);
    $lesson->load("users");

    return view("userLesson.requests", ['lessonUsers' => $lesson]);
  }
  
  public function approveRequest($userId, $lessonId)
  {
    
    $userLesson = userLesson::where('user_id', $userId)->where('lesson_id', $lessonId)->first();
    $userLesson->status = 1;
    $userLesson->save();
    
    return redirect()->back();
  }
  
  public function delete_request($lessonId, $id)
  {
    userLesson::where('user_id', $id)->where('lesson_id', $lessonId)->delete();
    return redirect()->back();
  }
  
  public function delete($lessonId){
    $userLesson=userLesson::where('lesson_id',$lessonId)->where('user_id',Auth::id())->first();
    $userLesson->delete();
    return redirect()->back();

  
    
  }

  public function student_class()
  {
    $user = Auth::user();
    $user->load(['lessons' => function ($query) {
      $query->where('status', 1);
    }]);
    $user->lessons->load('master');

    // dd($user);
    //   foreach($userLessons as $userLesson){
    //   $x = userLesson::where('user_id' , $user->id)->where('status', $userLesson->pivot->status=='1')->get();

    //   $master=user::find($userLesson->master_id);
    // }

    // $user->load('lessons');
    // $user->lessons->load('master');
    // $user->lessons->load('status');


    // practices of the lesson
    // $lesson->load('practices');
    // $lesson->load('master');
    //dd($userLesson);

    return view("userLesson.student_class", ['user' => $user]);
  }



  public function user_select(Request $request)
  {
    // dd($request->all());
    if ($request->select == "accept") {
      foreach ($request->users as $user_id) {
        $userLesson = userLesson::where('user_id', $user_id)->where('lesson_id', $request->lesson_id)->first();
        // dd($userLesson);
        $userLesson->status = 1;
        $userLesson->save();
      }
    }
    
    if ($request->select == "remove") {
      foreach ($request->users as $user_id) {
        userLesson::where('user_id', $user_id)->where('lesson_id', $request->lesson_id)->delete();
      }
    }
    return redirect()->back();
  }
}
