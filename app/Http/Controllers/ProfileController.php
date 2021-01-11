<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use App\Models\Entry;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function showProfile()
    {
        $id = Auth::id();
        $user = User::find($id);
        $entries = Entry::where('user_id', $id)->get();
        return view('user-panel.profile', compact('user', 'entries'));
    }
    public function passUpdate(Request $request)
    {
        $request->validate([
            "oldpass" => 'required',
            'newpass' => 'required|min:6|max:15',
            'newpass2' => 'required|same:newpass'
        ]);
        $oldpassFromDB = auth()->user()->password;
        if (Hash::check($request->oldpass, $oldpassFromDB)) {
            $user = User::where('id', auth()->user()->id)->update(
                [
                    "password" => Hash::make($request->newpass),
                ]
            );
            if ($user) {
                return back()->with('success', 'Password Updated!');
            }
            return back()->with('error', 'Password Update ERROR!');
        }
        return back()->with('error', 'The Current Password Is Not Correct!');
    }
    public function update(Request $request)
    {
        if ($request->hasFile('pic')) {
            $request->validate([
                "name" => 'required|min:3|max:15',
                "surname" => 'required|max:15|min:3',
                "mail" => 'required|email:rfc,dns',
                "pic" => "image|mimes:jpeg,png,jpg|max:2048"
            ]);
            $extension = $request->pic->extension();
            $fileName = uniqid() . "." . $extension;
            $filePath = $request->pic->storeAs('public/images', $fileName);
            $user = User::where('id', $request->id)->update(
                [
                    "email" => $request->mail,
                    "name" => $request->name,
                    "surname" => $request->surname,
                    "image" => $fileName
                ]
            );
        } else {
            $request->validate([
                "name" => 'required|min:3|max:15',
                "surname" => 'required|max:15|min:3',
                "mail" => 'required|email:rfc,dns'
            ]);
            $user = User::where('id', $request->id)
                ->update(
                    [
                        "email" => $request->mail,
                        "name" => $request->name,
                        "surname" => $request->surname
                    ]
                );
        }
        if ($user) {
            return redirect()->route('showProfile')->with('success', 'Profile Updated Successfully!');
        }
        return redirect()->route('showProfile')->with('error', 'Profile Update ERROR!');
    }
}
