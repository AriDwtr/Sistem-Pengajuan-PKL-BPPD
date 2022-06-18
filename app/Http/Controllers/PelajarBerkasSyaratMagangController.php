<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PelajarBerkasSyaratMagangController extends Controller
{
    public function index()
    {
        return view('pelajar.berkas.berkas');
    }

    public function surat_rekomendasi(Request $request, $id)
    {
        $request->validate([
            'surat_rekomendasi'=>'required',
        ]);

        $request->file('surat_rekomendasi')->store('public/berkas');

        User::where('id', $id)
        ->update([
            'surat_rekom'=> $request->file('surat_rekomendasi')->store('berkas')
        ]);

        return back();
    }

    public function download_rekomendasi($id)
    {
        $pelajar = User::where('id', $id)->firstOrFail();
        $name_pelajar = $pelajar->nama_depan.' '.$pelajar->nama_belakang;
        $surat = User::where('id', $id)->firstOrFail();
        return Storage::download($surat->surat_rekom, "Surat Rekomendasi ".$name_pelajar.".pdf");
    }

    public function delete_rekomendasi($id)
    {
        User::where('id', $id)
        ->update([
            'surat_rekom'=> NULL
        ]);

        return back();
    }

    public function surat_pengantar(Request $request, $id)
    {
        $request->validate([
            'surat_pengantar'=>'required',
        ]);

        $request->file('surat_pengantar')->store('public/berkas');

        User::where('id', $id)
        ->update([
            'surat_pengantar'=> $request->file('surat_pengantar')->store('berkas')
        ]);

        return back();
    }

    public function download_pengantar($id)
    {
        $pelajar = User::where('id', $id)->firstOrFail();
        $name_pelajar = $pelajar->nama_depan.' '.$pelajar->nama_belakang;
        $surat = User::where('id', $id)->firstOrFail();
        return Storage::download($surat->surat_pengantar, "Surat Pengantar ".$name_pelajar.".pdf");
    }

    public function delete_pengantar($id)
    {
        User::where('id', $id)
        ->update([
            'surat_pengantar'=> NULL
        ]);

        return back();
    }

    public function surat_proposal(Request $request, $id)
    {
        $request->validate([
            'surat_proposal'=>'required',
        ]);

        $request->file('surat_proposal')->store('public/berkas');

        User::where('id', $id)
        ->update([
            'proposal'=> $request->file('surat_proposal')->store('berkas')
        ]);

        return back();
    }
    public function download_proposal($id)
    {
        $pelajar = User::where('id', $id)->firstOrFail();
        $name_pelajar = $pelajar->nama_depan.' '.$pelajar->nama_belakang;
        $surat = User::where('id', $id)->firstOrFail();
        return Storage::download($surat->proposal, "Proposal ".$name_pelajar.".pdf");
    }

    public function delete_proposal($id)
    {
        User::where('id', $id)
        ->update([
            'proposal'=> NULL
        ]);

        return back();
    }
}
