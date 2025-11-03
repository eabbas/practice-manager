<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\User;
use App\models\role;
use App\models\user_role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;



class userController extends Controller
{
  public function signup()
  {
    $roles = role::all();

    $roles = [["id" => 2, "title" => "master"], ["id" => 3, "title" => "student"]];

    return view("users.signup", ["roles" => $roles]);
  }
  public function store(Request $request)
  {
    $password = Hash::make($request->code);
    $userId = User::insertGetId(["approved" => 0, "name" => $request->name, "family" => $request->family, "password" => $password, "phone" => $request->phone, "code" => $request->code]);
    user_role::create(["user_id" => $userId, "role_id" => $request->userRoles]);
    return view("users.login");
  }
  public function login()
  {
    return view("users.login");
  }
  public function check(Request $request)
  {
    $user = User::where("phone", $request->phone)->first();
    if (!$user) {
      return "not user";
    }
    $checkHash = Hash::check($request->password, $user->password);
    if ($checkHash) {
      if (Auth::check()) {
        return view("users.panel", ["user" => $user]);
      }
      if (!Auth::check()) {
        Auth::login($user);
        return view("users.panel", ["user" => $user]);
      }
    } else {
      echo "incorrect password";
    }
  }
  public function logout()
  {
    Auth::logout();
    return redirect("/user/signup");
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
    return view("users.edit", ["user" => $user]);
  }
  public function update(Request $request)
  {
    // dd($request->all());
    $user = User::find($request->id);
    $user->name = $request->name;
    $user->family = $request->family;
    $user->phone = $request->phone;
    $user->code = $request->code;
    $password = Hash::make($request->code);
    $user->approved = $request->approved;
    $user->save();
    return redirect("/users");
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
