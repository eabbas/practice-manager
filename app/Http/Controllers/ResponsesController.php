<?php

namespace App\Http\Controllers;
use App\Models\practice;
use App\Models\responses;
use App\Models\User;
use App\Models\lesson;
use App\Models\response_status;


use App\Models\responseMedia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use DB;

class ResponsesController extends Controller
{
    public function store(Request $request){
    //  dd($request->all());
        //dd(['practice_id'=>$request->practice_id ,'user_id'=> $request->user_id , 'text'=>$request->text , 'seen'=>0]);
        $data = ['practice_id'=>$request->practice_id ,
        'user_id'=> $request->user_id , 
        'text'=>$request->text , 
        'seen'=>0,
        'status'=>0
    ];
    
    if(isset($request->student_id )){
        $data['student_id'] = $request->student_id ;
    }

    $responseId=responses::insertGetId($data);
    if($request->file("file")){
        $files=$request->file("file");
        foreach($files as $file){
            $originalName=$file->getClientOriginalName();
            $fullName=time()."_".$originalName;
            $path=$file->storeAs("files",$fullName,"public");
            $request->media_path=$path;
            $medias=responseMedia::create(["response_id"=>$responseId,"media_path"=>$path]);
        }
     }
    //   if(Auth::user()->roles[0]['title'] == 'استاد'){
    //     $statuses=response_status::where('practice_id',$request->practice_id)->where("status",0)->where('student_id', $request->student_id )->first();
    //     //dd($statuses);
    //          foreach($statuses as $status){
    //             $status->status=1;
    //             $status->save();
    //        }
    //        }else{
    //            $statuses=response_status::where('practice_id',$request->practice_id)->where("status",1)->where('student_id', $request->student_id )->first();
    //             foreach($statuses as $status){
                   
    //                 $status->status=0;
    //                 $status->save();
    //             } 
    //        }
    response_status::upsert(
        ['practice_id'=>$request->practice_id, 'student_id'=>$request->student_id, 'status'=>$request->status], 
        ['practice_id', 'student_id'], // unique
        ['status'] // fillable
    );
     
        return redirect()->back();
    }


    public function response_list(practice $practice){
        // $practice->load('master'); 
        // $practiceMasterId = ;
        
        $practice->load('master');
        $response = responses::select('user_id' , DB::raw('sum(if(seen = 0, 1,  0)) as userResponseCount') )
        ->where('user_id' , "!=" , $practice->master->id )->where('practice_id',$practice->id)->groupBy('user_id')->get();
        $response->load("users");  
        
       return view('responses.response_list' , ['practiceResponses'=>$response , 'practice'=>$practice]);
    }





    public function student_responses(User $student , practice $practice ,User $master){
        $currentUser = Auth::user();
        if($currentUser->roles[0]['title'] == 'استاد'){
            $responses = responses::where('practice_id',$practice->id)->whereIn('user_id' , [$student -> id , $master->id])->where('student_id' , $student->id)->get();
             $seens=responses::where('practice_id',$practice->id)->where("seen",0)->where('user_id', $student->id )->get();
             foreach($seens as $seen){
                $seen->seen=1;
                $seen->save();
           } 
        }else{
            $responses = responses::where('practice_id',$practice->id)->whereIn('user_id' , [$student -> id])->orWhere(function($query) use($master ,$student){
                $query->where('user_id' ,  $master->id)->where('student_id' , $student->id);
            })->get();
        }
          
        $responses->load('users');
        $responses->load('responseMedia');


        //$x = $responses->load('master');
         //dd($x);
 
        // $user->load(['responses' => function($query) use($practice){
        //     $query->where('practice_id' , $practice->id);
        // }]);

        return view('responses.student_responses' , ['student'=>$student ,'responses'=>$responses , "practice" => $practice ,"master"=>$master]);
    }


    public function downloadFile(responseMedia $media){
    //   dd($media);
    return Storage::disk("public")->download($media->media_path);
      
    }

}
