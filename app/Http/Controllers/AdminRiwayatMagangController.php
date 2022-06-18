<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminRiwayatMagangController extends Controller
{
    public function index()
    {
        $siswa = User::join('detail_user','detail_user.id','users.id')
        ->join('instansi','instansi.id_instansi','users.id_instansi')
        ->where('users.status','Selesai')
        ->orderBy('detail_user.tgl_selesai','DESC')->get();
        return view('admin.riwayat.riwayat', compact('siswa'));
    }
}
