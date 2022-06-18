<?php

namespace App\Http\Controllers;

use App\Models\DaftarNilai;
use App\Models\IzinPenelitian;
use App\Models\Sertifikat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PelajarBerkasMagangController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;
        $sertifikat = Sertifikat::where('id_user', $id)->get();
        $surat = IzinPenelitian::where('id_user', $id)->get();
        $nilai = DaftarNilai::where('id_user', $id)->get();

        return view('pelajar.magang.berkasmagang', compact('sertifikat', 'surat', 'nilai'));
    }

    public function downloadsertifikat($id)
    {
        $name_pelajar = Auth::user()->nama_depan.' '.Auth::user()->nama_belakang;
        $sertifikat = Sertifikat::where('id_user', $id)->firstOrFail();
        return Storage::download($sertifikat->sertifikat, "Sertifikat ".$name_pelajar.".pdf");
    }

    public function downloadsuratizin($id)
    {
        $name_pelajar = Auth::user()->nama_depan.' '.Auth::user()->nama_belakang;
        $surat = IzinPenelitian::where('id_user', $id)->firstOrFail();
        return Storage::download($surat->surat, "Surat Izin ".$name_pelajar.".pdf");
    }

    public function downloadnilai($id)
    {
        $name_pelajar = Auth::user()->nama_depan.' '.Auth::user()->nama_belakang;
        $nilai = DaftarNilai::where('id_user', $id)->firstOrFail();
        return Storage::download($nilai->daftar_nilai, "Daftar Nilai ".$name_pelajar.".pdf");
    }

}
