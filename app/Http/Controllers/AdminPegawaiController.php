<?php

namespace App\Http\Controllers;

use App\Models\DaftarNilai;
use App\Models\IzinPenelitian;
use App\Models\Sertifikat;
use App\Models\DetailUser;
use App\Models\Instansi;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminPegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pegawai = User::join('detail_user','detail_user.id', '=', 'users.id')
        ->join('instansi','instansi.id_instansi','=','users.id_instansi')
        ->where('users.role', 'Admin')->get();

        return view('admin.pegawai.data_pegawai', compact('pegawai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $instansi = Instansi::get();
        return view('admin.pegawai.pegawai', compact('instansi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
                'role'=>'Admin',
                'id_instansi'=>$request->penempatan,
                'created_at'=>$date_time
            ]
        );
        DetailUser::insert([
            'nis'=>null,
            'jenis_kelamin'=>$request->jk,
            'created_at'=>$date_time
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

        session()->flash('success','Berhasil Menambahkan Pegawai');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pegawai = User::join('detail_user','detail_user.id', '=', 'users.id')
        ->where('users.id', $id)->get();

        $instansi = Instansi::get();

        return view('admin.pegawai.edit_pegawai', compact('pegawai','instansi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'email'=>'required',
            'nama_depan'=>'required',
            'pass'=>'required|min:5',
            'repass'=>'required|same:pass|min:5'
        ]);

        User::where('id', $id)
        ->update([
            'nama_depan'=>$request->nama_depan,
            'nama_belakang'=>$request->nama_belakang,
            'email'=>$request->email,
            'password'=>Hash::make($request->repass),
            'id_instansi'=>$request->penempatan
        ]);

        DetailUser::where('id', $id)
        ->update([
            'jenis_kelamin'=>$request->jk,
        ]);

        session()->flash('success','Berhasil Ubah Data Pegawai');
        return redirect()->route('pegawai.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pegawai = User::find($id);
        $detailuser = DetailUser::find($id);

        $pegawai->delete();
        $detailuser->delete();

        session()->flash('success','Berhasil Menghapus Pegawai');
        return back();
    }
}
