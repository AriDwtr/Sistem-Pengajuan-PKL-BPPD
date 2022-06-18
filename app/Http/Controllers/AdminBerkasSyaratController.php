<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminBerkasSyaratController extends Controller
{
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
            'surat_rekom'=> NULL,
            'status'=>NULL
        ]);

        return redirect()->route('calonpeserta.index');
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
            'surat_pengantar'=> NULL,
            'status'=>NULL
        ]);

        return redirect()->route('calonpeserta.index');
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
            'proposal'=> NULL,
            'status'=>NULL
        ]);

        return redirect()->route('calonpeserta.index');
    }
}
