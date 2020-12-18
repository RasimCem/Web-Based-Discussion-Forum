<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Entry;
use App\Models\SubEntry;

class AdminController extends Controller
{
    public function displayUsers(){
       $users=User::where('role','user')->get();
        return view('admin-panel.users',compact('users'));
    }
    public function deleteUser($id){
        User::where('id',$id)->delete();
        return back()->with('success','User Deleted!');
    }
    public function userEntries($id){
        $user=User::where('id',$id)->first();
        $entries=Entry::where('user_id',$id)->get();
        $subEntries=SubEntry::where('user_id',$id)->get();
        return view('admin-panel.user-entries',compact(['entries','subEntries','user']));
    }
    public function deleteEntry($id){
        Entry::where('id',$id)->delete();
        SubEntry::where('main_entry_id',$id)->delete();
        return back()->with('success','Title Removed!');
    }
    public function deleteSubEntry($id){    
        $delete=SubEntry::where('id',$id)->delete();
        if($delete){
            return back()->with('success','SubEntry removed!');
        }
        return back()->with('error','SubEntry remove ERROR!');
    }
    public function homePage(){
        $countUser=User::all()->count();
        $countEntry=Entry::all()->count();
        $countSubEntry=SubEntry::all()->count();
        return view('admin-panel.home-page',compact(['countUser','countEntry','countSubEntry']));
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
    public function newCategory(){
        return view('admin-panel.new-category');
    }
    public function addNewCategory(Request $request){
        $category=Category::create([
            "name"=>$request->name,
            "category_icon"=>$request->icon
        ]);
        if($category){
            return redirect()->route('showCategories')->with('success','Category Added Successfully!');
        }
        return back()->with('error','Categor Addition ERROR!');
    }
    public function editCategory($id){
        $category=Category::where('id',$id)->first();
        return view('admin-panel.edit-category',compact('category'));
    }
    public function updateCategory(Request $request,$id){
        $category=Category::where('id',$id)->update([
            "name"=> $request->name,
            "category_icon"=>$request->icon
        ]);
        if($category){
            return redirect()->route('showCategories')->with('category',$category);
        }
            return back()->with('error','Category Update ERROR!');
    }
    public function deleteCategory($id){
        $category=Category::find($id);
        $category->delete();
        return back()->with('success','Category Deleted Successfully');
    }
    public function showEntries(){
        $entries=Entry::all();
        return view('admin-panel.entries')->with('entries',$entries);
    }
    public function goToSubEntry($id){
        $subEntries=SubEntry::where('main_entry_id',$id)->get();
        return view('admin-panel.sub-entries',compact('subEntries'));
    }
}
