<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PelajarFotoController extends Controller
{
    public function index()
    {
        return view('pelajar.profile.fotoprofile');
    }

    public function update(Request $request)
    {
       $request->validate([
           'foto'=>'required|image',
       ]);

       $id = Auth::user()->id;

       $request->file('foto')->store('public/foto-profile');

       User::where('id', $id)

       ->update([
           'foto'=> $request->file('foto')->store('foto-profile')
       ]);

       return redirect()->route('profile.index');
    }
}
