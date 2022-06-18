<?php

namespace App\Http\Controllers;

use App\Models\DaftarNilai;
use App\Models\IzinPenelitian;
use App\Models\Sertifikat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminBerkasController extends Controller
{
    public function suratizin(Request $request, $id)
    {
        $request->validate([
            'surat_izin'=>'required',
        ]);

        $request->file('surat_izin')->store('public/surat-izin');

        IzinPenelitian::where('id_user', $id)
        ->update([
            'surat'=> $request->file('surat_izin')->store('surat-izin')
        ]);

        session()->flash('success','Berhasil Mengupload Surat Izin');
        return back();
    }

    public function suratizinhapus($id)
    {
        IzinPenelitian::where('id_user', $id)
        ->update([
            'surat'=> NULL
        ]);

        session()->flash('success','Berhasil Menghapus Surat Izin');
        return back();
    }

    public function downloadsuratizin($id)
    {
        $pelajar = User::where('id', $id)->firstOrFail();
        $name_pelajar = $pelajar->nama_depan.' '.$pelajar->nama_belakang;
        $surat = IzinPenelitian::where('id_user', $id)->firstOrFail();
        return Storage::download($surat->surat, "Surat Izin Magang Penelitian ".$name_pelajar.".pdf");
    }

    public function sertifikat(Request $request, $id)
    {
        $request->validate([
            'sertifikat'=>'required',
        ]);

        $request->file('sertifikat')->store('public/sertifikat');

        Sertifikat::where('id_user', $id)
        ->update([
            'sertifikat'=> $request->file('sertifikat')->store('sertifikat')
        ]);

        session()->flash('success','Berhasil Mengupload Sertifikat');
        return back();
    }

    public function sertifikathapus($id)
    {
        Sertifikat::where('id_user', $id)
        ->update([
            'sertifikat'=> NULL
        ]);

        session()->flash('success','Berhasil Menghapus Sertifikat');
        return back();
    }

    public function downloadsertifikat($id)
    {
        $pelajar = User::where('id', $id)->firstOrFail();
        $name_pelajar = $pelajar->nama_depan.' '.$pelajar->nama_belakang;
        $sertifikat = Sertifikat::where('id_user', $id)->firstOrFail();
        return Storage::download($sertifikat->sertifikat, "Sertifikat ".$name_pelajar.".pdf");
    }

    public function daftarnilai(Request $request, $id)
    {
        $request->validate([
            'daftar_nilai'=>'required',
        ]);

        $request->file('daftar_nilai')->store('public/daftar_nilai');

        DaftarNilai::where('id_user', $id)
        ->update([
            'daftar_nilai'=> $request->file('daftar_nilai')->store('daftar_nilai')
        ]);

        session()->flash('success','Berhasil Mengupload Daftar Nilai');
        return back();
    }

    public function daftarnilaihapus($id)
    {
        DaftarNilai::where('id_user', $id)
        ->update([
            'daftar_nilai'=> NULL
        ]);

        session()->flash('success','Berhasil Menghapus Daftar Nilai');
        return back();
    }

    public function downloaddaftarnilai($id)
    {
        $pelajar = User::where('id', $id)->firstOrFail();
        $name_pelajar = $pelajar->nama_depan.' '.$pelajar->nama_belakang;
        $nilai = DaftarNilai::where('id_user', $id)->firstOrFail();
        return Storage::download($nilai->daftar_nilai, "Daftar Nilai ".$name_pelajar.".pdf");
    }

    public function selesaimagang($id)
    {
        User::where('id', $id)
        ->update([
            'status'=>'Selesai'
        ]);
        return redirect()->route('peserta.index');
    }
}
