<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entry;
use App\Models\SubEntry;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
class EntryController extends Controller
{
    public function showEntry(){
        $category = Category::all();
         return view('user-panel.newEntry')->with('category',$category);
    }
    public function addEntry(Request $request){
        $request->validate(
                [
                    'title' => 'required|min:5',
                    'entry' => ' required|min:10',
                    'category' => 'required'
                ]
            );
            $product = Entry::create(
                [
                    "title"=> $request->title,
                    "entry"=>$request->entry,
                    "category_id"=>$request->category,
                    "user_id"=> auth()->user()->id
                ]
            );
            if($product){
                return redirect()->route('home')->with('success','Entry Added Successfully!');
            }
                return back()->with('error'.'Error When Adding Entry!');
    }
    public function goToEntry($id){
      $entry=Entry::where('id',$id)->first();
       return view('user-panel.entry')->with('entry',$entry);
    }
    public function newSubEntry(Request $request,$id){
        if(!Auth::check()){
            return back()->with('error','You Have To Login For Enrty');
        }
        $request->validate(
            [
                "entry" => "required|min:10|max:200"
            ]
            );
        $insert=SubEntry::create([
             "user_id"=>Auth::id(),
             "main_entry_id"=>$id,
             "entry"=>$request->entry
        ]);
        if($insert){
            return back()->with('success','Your Entry Added Successfully!');
        }
            return back()->with('error','Entry ERROR!');
    }
}
