<?php

namespace App\Http\Controllers;

use App\Models\LogBook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PelajarLogBookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->id;
        $log = LogBook::where('id_user', $id)->OrderBy('tanggal', 'ASC')->get();
        return view('pelajar.logbook.logbook', compact('log'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pelajar.logbook.logbookcreate');
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
            'tanggal'=>'required|date',
            'jam_masuk'=>'required',
            'jam_pulang'=>'required',
            'aktivitas'=>'required',
        ]);
        $id = Auth::user()->id;
        LogBook::insert([
            'id_user'=>$id,
            'tanggal'=>$request->tanggal,
            'jam_masuk'=>$request->jam_masuk,
            'jam_pulang'=>$request->jam_pulang,
            'aktivitas'=>$request->aktivitas,
        ]);

        session()->flash('success','Berhasil Menambah LogBook');
        return redirect()->route('logbook.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $log = LogBook::where('id_user', $id)->OrderBy('tanggal', 'ASC')->get();
        return view('pelajar.logbook.logbookedit', compact('log'));
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
        $log = LogBook::find($id);

        $log->delete();

        session()->flash('success','Berhasil Menghapus Log Book');
        return redirect()->route('logbook.index');
    }
}
