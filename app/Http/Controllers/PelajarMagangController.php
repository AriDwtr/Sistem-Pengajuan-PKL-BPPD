<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PelajarMagangController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;
        $siswa = User::join('instansi','instansi.id_instansi','users.id_instansi')
        ->join('detail_user','detail_user.id','users.id')
        ->where('users.id', $id)
        ->get();

        return view('pelajar.magang.infomagang', compact('siswa'));
    }
}
