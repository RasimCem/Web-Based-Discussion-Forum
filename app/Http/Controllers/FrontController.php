<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Entry;
class FrontController extends Controller
{
    public function home(){
        $entries=Entry::all();
        return view('home',compact('entries'));
    }
    public function showEntry(){
        $category = Category::all();
         return view('newEntry')->with('category',$category);
    }
    public function addEntry(Request $request){
        $request->validate(
                [
                    'title' => 'required|min:5',
                    'entry' => ' required|min:10',
                    'category' => 'required'
                ]
            );
            $product = Entry::insert(
                [
                    "title"=> $request->title,
                    "entry"=>$request->entry,
                    "category_id"=>$request->category,
                    "user_id"=> auth()->user()->id
                ]
            );
            if($product){
                return back()->with('success','Entry Added Successfully!');
            }
                return back()->with('error'.'Error When Adding Entry!');
    }

}
