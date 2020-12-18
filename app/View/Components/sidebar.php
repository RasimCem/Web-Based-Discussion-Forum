<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Entry;
use App\Models\SubEntry;
use Illuminate\Support\Facades\DB;
class sidebar extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {

        // $entry=DB::table('subentries')->join('entries','entries.id','subentries.main_entry_id')->get();
        // $entry=$entry->groupBy('main_entry_id')->count();
        // dd($entry);

        // $e=SubEntry::all()->groupBy('main_entry_id')->max();
        // dd($e);
        
       // $count=SubEntry::where('main_entry_id',$entry);

       $entry=Entry::all();

        return view('components.sidebar')->with('entry',$entry);
    }
}
