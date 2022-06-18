<?php

namespace App\Http\Controllers;

use App\Models\DetailUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PelajarProfileController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->id;
        $detail = User::join('detail_user','detail_user.id','users.id')
        ->where('users.id', $id)
        ->get();
        return view('pelajar.profile.profile', compact('detail'));
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
        //
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
            'nis'=>'required',
            'tmpt'=>'required',
            'tgl'=>'date',
            'asalsekolah'=>'required',
            'hp'=>'required'
        ]);

        DetailUser::where('id', $id)
        ->update([
            'nis'=>$request->nis,
            'tmpt_lahir'=>$request->tmpt,
            'tgl_lahir'=>$request->tgl_lahir,
            'jenis_kelamin'=>$request->jk,
            'asal_sekolah'=>$request->asalsekolah,
            'hp'=>$request->hp,
            'alamat'=>$request->alamat,
        ]);

        User::where('id', $id)
        ->update([
            'nama_depan'=>$request->nama_depan,
            'nama_belakang'=>$request->nama_belakang,
            'email'=>$request->email,
        ]);

        session()->flash('success','Berhasil Memperbaharui Data');
        return redirect()->route('profile.index');

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
