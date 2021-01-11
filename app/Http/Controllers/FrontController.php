<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Entry;
use App\Models\SubEntry;
use Illuminate\Support\Facades\Auth;

class FrontController extends Controller
{
    public function home()
    {
        $entries = Entry::all();
        return view('user-panel.home', compact('entries'));
    }

    public function goToCategory($category_id)
    {
        $catName = Category::where('id', $category_id)->get('name');
        $entries = Entry::where('category_id', $category_id)->get();
        return view('user-panel.category')->with('catName', $catName)->with('entries', $entries);
    }
}
