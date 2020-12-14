<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
    public function login(Request $request){
        $credentials=$request->only(['email','password']);
        if(Auth::attempt($credentials)){
            return back()->with('success','Logged IN!');
        }
            return back()->with('error','User Not Found!');

    }
    public function logout(){
        Auth::logout();
        return redirect()->route('home')->with('success','Logged Out!');
    }
    public function signUp(Request $request){
       $request->validate(
           [
               "name" => "required|min:3|max:15",
               "surname" => "required|min:3|max:15",
                "mail" => "required|email:rfc,dns|unique:App\Models\User,email",
                "password" => "required|min:5|same:password2",
                "password2" => "required"
           ]
           );
           $hashedPassword = Hash::make($request->password);
           $user =  User::create(
               [
                    "email" => $request->mail,
                    "name" => $request->name,
                    "surname" => $request->surname,
                    "password" => $hashedPassword
               ]
               );
               //dd($credentials);
               if($user ){
                    return redirect()->route('home')->with("success","Account Created! Please Login!");
                }
                    return redirect()->back()->with('error','Error when Creating Account');
    }
}
