<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\role;
use App\Models\user_role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class userController extends Controller
{
  public function signup()
  {
    $roles = role::all();
    return view("users.signup", ["roles" => $roles]);
  }
  public function store(Request $request)
  {
    $password = Hash::make($request->code);
    $userId = User::insertGetId(["approved" => 0, "name" => $request->name, "family" => $request->family, "password" => $password, "phone" => $request->phone, "code" => $request->code]);
    user_role::create(["user_id" => $userId, "role_id" => $request->userRoles]);
    return to_route("home");
  }
  public function login()
  {
    return view("users.login");
  }
  
  public function check(Request $request)
  {
    if (Auth::check()) {
      return to_route("user.profile", [Auth::user()]);
    }
    $user = User::where("phone", $request->phone)->first();
    if (!$user) {
      return "not user";
    }
    $checkHash = Hash::check($request->password, $user->password);
    if ($checkHash) {
      Auth::login($user);
      return redirect()->intended(route('user.profile',[Auth::user()]));
      // return to_route("user.profile", [Auth::user()]);
    } else {
      return view('users.incorrect_password');
    }

  }
  public function profile(user $user)
  {
    $user->role;
    return view('users.profile', ['user' => $user ]);
  }
  public function logout()
  {
    Auth::logout();
    return to_route("home");
  }
  public function index()
  {
    $users = User::all();
    return view("users.index", ["users" => $users]);
  }
  public function edit($id)
  {
    $user = User::find($id);
    // dd($user);
    // return view("users.edit", ["user" => $user]);
  }

  
  public function edit_profile(){
    $roles = role::all();
    return view("users.edit_profile" , ["user" => Auth::user()->role , "roles"=>$roles]);
  }
  
  public function complete_profile(){
  return view("users.complete_profile" , ["user"=>Auth::user()->role]);
  }

  public function save(Request $request){
  $user = User::find($request->master_id);
  $user->collage = $request->collage;
  $user->email = $request->email;
  $user->save();
  return to_route("user.profile",[Auth::user()]);
  }

  
  public function update(Request $request)
  {
   // dd($request->master_id);
    $user = User::find($request->master_id);
    $user->name = $request->name;
    $user->family = $request->family;
    $user->phone = $request->phone;
    $user->collage = $request->collage;
    $user->email = $request->email;
    $user->code = $request->code;
    $password = Hash::make($request->code);
    $user->approved = $request->approved;
    $user->save();
    return to_route("user.profile",[Auth::user()]);
  }
  public function show($id)
  {
    $user = User::find($id);
    return view("users.single", ["user" => $user]);
  }
  public function delete($id)
  {
    $user = User::find($id);
    $user->delete();
    return redirect("/users");
  }
}
