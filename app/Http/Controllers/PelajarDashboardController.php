<?php

namespace App\Http\Controllers;

use App\Models\DetailUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PelajarDashboardController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;
        $detail= DetailUser::where('id','=',$id)->get();
        return view('pelajar.dashboard', compact('detail'));
    }

    public function pengajuan(Request $request)
    {
        $id = Auth::user()->id;

        User::where('id', $id)
        ->update([
            'status'=>'Pengajuan'
        ]);

        return redirect()->back();
    }
}
