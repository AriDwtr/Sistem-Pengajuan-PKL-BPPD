<?php

namespace App\Http\Controllers;

use App\Models\Instansi;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AdminInstansiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $instansi = Instansi::get();
        return view('admin.instansi.instansi', compact('instansi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $date_time = Carbon::now()->toDateTimeString();
       $request->validate([
           'instansi'=>'required|unique:instansi,nama_instansi',
       ]);

       Instansi::insert([
           'nama_instansi'=>$request->instansi,
           'created_at'=>$date_time
       ]);

       session()->flash('success','Berhasil Menambahkan Instansi Baru');
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
            $edit = Instansi::where('id_instansi', $id)->get();
            $instansi = Instansi::get();

        return view('admin.instansi.edit_instansi', compact('edit', 'instansi'));

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
       $date_time = Carbon::now()->toDateTimeString();
       $request->validate([
           'instansi'=>'required',
       ]);

       Instansi::where('id_instansi',$id)
       ->update([
           'nama_instansi'=>$request->instansi,
           'updated_at'=>$date_time
       ]);

       session()->flash('success','Berhasil Memperbaharui Instansi');
       return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $instansi = Instansi::find($id);

        $instansi->delete();

        session()->flash('success','Berhasil Menghapus Instansi');
        return back();
    }
}
