<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminPesertaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswa = User::join('detail_user', 'detail_user.id', 'users.id')
        ->join('instansi','instansi.id_instansi', 'users.id_instansi')
        ->join('surat_izin_penelitian','surat_izin_penelitian.id_user', 'users.id')
        ->join('sertifikat','sertifikat.id_user', 'users.id')
        ->join('daftar_nilai','daftar_nilai.id_user', 'users.id')
        ->where('users.status','Diterima')
        ->get();

        return view('admin.peserta.peserta', compact('siswa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $siswa = User::join('detail_user','detail_user.id','=','users.id')
        ->join('instansi','instansi.id_instansi', 'users.id_instansi')
        ->join('surat_izin_penelitian','surat_izin_penelitian.id_user', 'users.id')
        ->join('sertifikat','sertifikat.id_user', 'users.id')
        ->join('daftar_nilai','daftar_nilai.id_user', 'users.id')
        ->where('users.id', $id)->get();

        return view('admin.peserta.detailpeserta', compact('siswa'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
