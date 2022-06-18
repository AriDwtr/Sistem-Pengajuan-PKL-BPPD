<?php

namespace App\Http\Controllers;

use App\Models\DaftarNilai;
use App\Models\DetailUser;
use App\Models\IzinPenelitian;
use App\Models\Sertifikat;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginRegistController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index()
    {
        return view('loginregister.login');
    }

    public function login_proses(Request $request)
    {
        $request->validate([
            'email'=>'email|required|exists:users,email',
            'pass'=>'required|min:5'
        ]);

        if (Auth::attempt(['email'=>$request->email, 'password'=>$request->pass])) {
            $request->session()->regenerate();
            $user = Auth::user();
            if ($user->role == 'Admin') {
                return redirect()->intended('/admin/home');
            } elseif ($user->role == 'Pelajar') {
                return redirect()->intended('/pelajar/home');
            }
        }

        session()->flash('fail','Mohon Cek Ulang Password');
        return redirect()->route('login');

    }

    public function form_daftar()
    {
        return view('loginregister.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email'=>'required|unique:users,email|email',
            'nama_depan'=>'required',
            'pass'=>'required|min:5',
            'repass'=>'required|same:pass|min:5'
        ]);

        $date_time = Carbon::now()->toDateTimeString();
        User::insert(
            [
                'nama_depan'=>$request->nama_depan,
                'nama_belakang'=>$request->nama_belakang,
                'email'=>$request->email,
                'password'=>Hash::make($request->repass),
                'role'=>'Pelajar',
                'created_at'=>$date_time
            ]
        );
        DetailUser::insert([
            'nis'=>NULL,
            'jenis_kelamin'=>$request->jk,
        ]);
        Sertifikat::insert([
            'sertifikat'=>NULL
        ]);
        DaftarNilai::insert([
            'daftar_nilai'=>NULL
        ]);
        IzinPenelitian::insert([
            'surat'=>NULL
        ]);

        return view('loginregister.success');

    }


}
