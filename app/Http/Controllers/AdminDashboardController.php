<?php

namespace App\Http\Controllers;

use App\Models\Instansi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $total_peserta = User::where('status', 'Diterima')->count();
        $total_peserta_selesai = User::where('status', 'Selesai')->count();
        $instansi = Instansi::count();

        $total_kordinator = User::where('role', 'Admin')->count();
        $laki = User::join('detail_user','detail_user.id','users.id')
                    ->where('users.role','Pelajar')
                    ->where('detail_user.jenis_kelamin','Laki - Laki')->count();
        $perempuan = User::join('detail_user','detail_user.id','users.id')
                    ->where('users.role','Pelajar')
                    ->where('detail_user.jenis_kelamin','Perempuan')->count();


         $total_instansi=  DB::table('users')
         ->select('*', DB::raw('count(users.id) as total'))
         ->join('instansi','instansi.id_instansi','users.id_instansi')
         ->join('detail_user','detail_user.id','users.id')
         ->groupBy('detail_user.jenis_kelamin')
         ->where('users.role','Pelajar')
         ->get();

        return view('admin.dashboard', compact('total_peserta','total_peserta_selesai','instansi','total_kordinator','laki','perempuan','total_instansi'));

    }
}
