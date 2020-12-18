<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
class AdminController extends Controller
{
    public function displayUsers(){
       $users=User::where('role','user')->get();
        return view('admin-panel.users',compact('users'));
    }
    public function homePage(){
        return view('admin-panel.home-page');
    }
    public function displayAdmins(){
        $users=User::where('role','admin')->get();
        return view('admin-panel.admins',compact('users'));
    }
    public function newAdmin(){
        return view('admin-panel.new-admin');
    }
    public function addNewAdmin(Request $request){
        $request->validate(
            [
                "name" => "required|min:3|max:15",
                "surname" => "required|min:3|max:15",
                 "mail" => "required|email:rfc,dns|unique:App\Models\User,email",
                 "pass" => "required|min:5|same:pass2",
                 "pass2" => "required"
            ]
            );
            $hashedPassword = Hash::make($request->pass);
            $admin =  User::create(
                [
                     "email" => $request->mail,
                     "name" => $request->name,
                     "surname" => $request->surname,
                     "password" => $hashedPassword,
                     "role"=>"admin"
                ]
                );
                //dd($credentials);
                if($admin ){
                     return redirect()->route('adminHomePage')->with("success","Admin Account Created!");
                 }
                     return redirect()->back()->with('error','Error when Creating Admin Account');
    }
    public function showCategories(){
        $categories=Category::all();
        return view('admin-panel.categories',compact('categories'));
    }
}
