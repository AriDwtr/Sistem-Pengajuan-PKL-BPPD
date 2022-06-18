<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PelajarPembimbingController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id_instansi;
        $guru = User::join('instansi','instansi.id_instansi','users.id_instansi')
        ->join('detail_user','detail_user.id','users.id')
        ->where('users.id_instansi', $id)
        ->where('users.role', 'Admin')->get();

        return view('pelajar.pembimbing.pembimbing', compact('guru'));
    }
}
