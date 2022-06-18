<?php

namespace App\Http\Controllers;

use App\Models\DetailUser;
use App\Models\Instansi;
use App\Models\User;
use Illuminate\Http\Request;

class AdminCalonPesertaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswa = User::join('detail_user','detail_user.id','=','users.id')
        ->where('users.status', 'Pengajuan')->get();

        return view('admin.calonpeserta.calonpeserta', compact('siswa'));
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
        ->where('users.id', $id)->get();

        $instansi = Instansi::where('id_instansi', '>', 1)->get();

        return view('admin.calonpeserta.detailcalonpeserta', compact('siswa','instansi'));
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
            'penempatan'=>'required',
            'tgl_mulai'=>'required',
            'tgl_selesai'=>'required',
        ]);

        User::where('id', $id)
        ->update([
            'status'=>'Diterima',
            'id_instansi'=>$request->penempatan
        ]);

        DetailUser::where('id', $id)
        ->update([
            'tgl_mulai'=>$request->tgl_mulai,
            'tgl_selesai'=>$request->tgl_selesai
        ]);

        return redirect()->route('calonpeserta.index');
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
