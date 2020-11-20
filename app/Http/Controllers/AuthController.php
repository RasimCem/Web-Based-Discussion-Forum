<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
    public function login(Request $request){
        
    }
    public function signUp(Request $request){
       $request->validate(
           [
               "name" => "required|min:5",
               "surname" => "required|min:2",
                "mail" => "required|email:rfc,dns|unique:App\Models\User,email",
                "password" => "required|min:5|same:password2",
                "password2" => "required"
           ]
           );
           $user =  User::insert(
               [
                    "email" => $request->mail,
                    "name" => $request->name,
                    "surname" => $request->surname,
                    "password" => Hash::make($request->password)
               ]
               );
               $request->password = Hash::make($request->password);
               $credentials = $request->only('email', 'password');
               if(Auth::attempt($credentials) && $user ){
                    return redirect()->route('home')->with("success","Signed Up Successfully!");
            }
                return redirect()->back()->with('error','Error when Signing Up!');
    }
}
