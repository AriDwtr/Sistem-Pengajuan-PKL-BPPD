<?php
use App\Http\Controllers\AdminBerkasSyaratController;
use App\Http\Controllers\AdminBerkasController;
use App\Http\Controllers\AdminCalonPesertaController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminDetailController;
use App\Http\Controllers\AdminFotoController;
use App\Http\Controllers\AdminInstansiController;
use App\Http\Controllers\AdminPegawaiController;
use App\Http\Controllers\AdminPesertaController;
use App\Http\Controllers\AdminRiwayatMagangController;
use App\Http\Controllers\LoginRegistController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PelajarBerkasSyaratMagangController;
use App\Http\Controllers\PelajarBerkasMagangController;
use App\Http\Controllers\PelajarDashboardController;
use App\Http\Controllers\PelajarFotoController;
use App\Http\Controllers\PelajarLogBookController;
use App\Http\Controllers\PelajarMagangController;
use App\Http\Controllers\PelajarPembimbingController;
use App\Http\Controllers\PelajarProfileController;

use Illuminate\Support\Facades\Route;


Route::group(['middleware' => 'prevent-back-history'], function () {
    Route::middleware('guest')->group(function () {
        Route::controller(LoginRegistController::class)->group(function (){
            Route::get('/', 'index')->name('login');
            Route::post('/', 'login_proses')->name('proses');

            Route::get('/daftar', 'form_daftar')->name('form_daftar');
            Route::post('/daftar', 'store')->name('daftar');
        });
    });
});

Route::group(['middleware' => 'prevent-back-history'], function () {
    Route::middleware('cek_login:Admin')->group(function () {
        // Home Page
        Route::get('/admin/home',[AdminDashboardController::class,'index'])->name('admin.dashboard');
        // ---------
        //profile page
        Route::resource('/admin/detail', AdminDetailController::class);
        // ----------
        //instansi page
        Route::resource('/admin/instansi', AdminInstansiController::class);
        // ----------
        //pegawai
        Route::resource('/admin/pegawai', AdminPegawaiController::class);
        //--------
        //fotoprofile
        Route::get('/admin/fotoprofil', [AdminFotoController::class, 'index'])->name('admin.foto');
        Route::post('/admin/fotoprofil', [AdminFotoController::class, 'update'])->name('admin.foto');
        //---------
        //calonpeserta
        Route::resource('/admin/calonpeserta', AdminCalonPesertaController::class);
        //----------
        //peserta
        Route::resource('/admin/peserta', AdminPesertaController::class);
        //------
          //Selesai Magang
        Route::get('/pelajar/riwayat', [AdminRiwayatMagangController::class, 'index'])->name('admin.riwayat');
        Route::get('/pelajar/selesai_magang/{id}', [AdminBerkasController::class, 'selesaimagang'])->name('admin.selesai.magang');
          //----
        //berkas
        Route::put('/admin/surat_izin/{id}', [AdminBerkasController::class, 'suratizin'])->name('admin.suratizin');
        Route::put('/admin/surat_izin/{id}/hapus', [AdminBerkasController::class, 'suratizinhapus'])->name('admin.suratizinhapus');
        route::get('/admin/surat_izin/{id}/download', [AdminBerkasController::class, 'downloadsuratizin'])->name('admin.downloadsuratizin');

        Route::put('/admin/sertifikat/{id}', [AdminBerkasController::class, 'sertifikat'])->name('admin.sertifikat');
        Route::put('/admin/sertifikat/{id}/hapus', [AdminBerkasController::class, 'sertifikathapus'])->name('admin.sertifikathapus');
        route::get('/admin/sertifikat/{id}/download', [AdminBerkasController::class, 'downloadsertifikat'])->name('admin.downloadsertifikat');

        Route::put('/admin/daftar_nilai/{id}', [AdminBerkasController::class, 'daftarnilai'])->name('admin.daftarnilai');
        Route::put('/admin/daftar_nilai/{id}/hapus', [AdminBerkasController::class, 'daftarnilaihapus'])->name('admin.daftarnilaihapus');
        route::get('/admin/daftar_nilai/{id}/download', [AdminBerkasController::class, 'downloaddaftarnilai'])->name('admin.downloaddaftarnilai');
        //----
        // Syarat Berkas
        Route::get('/admin/berkas/{id}/rekomendasi/download', [AdminBerkasSyaratController::class, 'download_rekomendasi'])->name('admin.berkas.rekomendasi.download');
        Route::put('/admin/berkas/{id}/rekomendasi/delete', [AdminBerkasSyaratController::class, 'delete_rekomendasi'])->name('admin.berkas.rekomendasi.delete');

        Route::get('/admin/berkas/{id}/pengantar/download', [AdminBerkasSyaratController::class, 'download_pengantar'])->name('admin.berkas.pengantar.download');
        Route::put('/admin/berkas/{id}/pengantar/delete', [AdminBerkasSyaratController::class, 'delete_pengantar'])->name('admin.berkas.pengantar.delete');

        Route::get('/admin/berkas/{id}/proposal/download', [AdminBerkasSyaratController::class, 'download_proposal'])->name('admin.berkas.proposal.download');
        Route::put('/admin/berkas/{id}/proposal/delete', [AdminBerkasSyaratController::class, 'delete_proposal'])->name('admin.berkas.proposal.delete');
        //-----
        Route::get('/admin/logout', LogoutController::class)->name('admin.logout');
    });
});

Route::group(['middleware' => 'prevent-back-history'], function () {
    Route::middleware('cek_login:Pelajar')->group(function () {
        // Home Page
        Route::get('/pelajar/home', [PelajarDashboardController::class, 'index'])->name('pelajar_home');
        Route::post('/pelajar/home', [PelajarDashboardController::class, 'pengajuan'])->name('dashboard.pengajuan');
        // --------
        // profile page
        Route::resource('/pelajar/profile', PelajarProfileController::class);
        //------------
         // foto profile page
        Route::get('/pelajar/foto', [PelajarFotoController::class, 'index'])->name('foto.profile');
        Route::post('/pelajar/foto', [PelajarFotoController::class, 'update'])->name('foto.update');
         //------------
         // magang
         Route::get('/pelajar/pembimbing', [PelajarPembimbingController::class, 'index'])->name('pelajar.pembimbing');
         Route::get('/pelajar/info_magang', [PelajarMagangController::class, 'index'])->name('pelajar.magang.info');
         //-----
        //berkas
         Route::get('/pelajar/berkas_magang', [PelajarBerkasMagangController::class, 'index'])->name('pelajar.berkas.magang');
         Route::get('/pelajar/download/{id}/sertifikat', [PelajarBerkasMagangController::class, 'downloadsertifikat'])->name('pelajar.downloadsertifikat');
         Route::get('/pelajar/download/{id}/suratizin', [PelajarBerkasMagangController::class, 'downloadsuratizin'])->name('pelajar.downloadsuratizin');
         Route::get('/pelajar/download/{id}/nilai', [PelajarBerkasMagangController::class, 'downloadnilai'])->name('pelajar.downloadnilai');
         //-----
         //Berkas Syarat Magang
        Route::get('/pelajar/syarat', [PelajarBerkasSyaratMagangController::class, 'index'])->name('pelajar.syarat');
        Route::put('/pelajar/syarat/{id}/rekomendasi', [PelajarBerkasSyaratMagangController::class, 'surat_rekomendasi'])->name('pelajar.syarat.rekomendasi');
        Route::get('/pelajar/syarat/{id}/rekomendasi/download', [PelajarBerkasSyaratMagangController::class, 'download_rekomendasi'])->name('pelajar.syarat.rekomendasi.download');
        Route::put('/pelajar/syarat/{id}/rekomendasi/delete', [PelajarBerkasSyaratMagangController::class, 'delete_rekomendasi'])->name('pelajar.syarat.rekomendasi.delete');

        Route::put('/pelajar/syarat/{id}/pengantar', [PelajarBerkasSyaratMagangController::class, 'surat_pengantar'])->name('pelajar.syarat.pengantar');
        Route::get('/pelajar/syarat/{id}/pengantar/download', [PelajarBerkasSyaratMagangController::class, 'download_pengantar'])->name('pelajar.syarat.pengantar.download');
        Route::put('/pelajar/syarat/{id}/pengantar/delete', [PelajarBerkasSyaratMagangController::class, 'delete_pengantar'])->name('pelajar.syarat.pengantar.delete');

        Route::put('/pelajar/syarat/{id}/proposal', [PelajarBerkasSyaratMagangController::class, 'surat_proposal'])->name('pelajar.syarat.proposal');
        Route::get('/pelajar/syarat/{id}/proposal/download', [PelajarBerkasSyaratMagangController::class, 'download_proposal'])->name('pelajar.syarat.proposal.download');
        Route::put('/pelajar/syarat/{id}/proposal/delete', [PelajarBerkasSyaratMagangController::class, 'delete_proposal'])->name('pelajar.syarat.proposal.delete');
        //----
         //logbook
         Route::resource('/pelajar/logbook', PelajarLogBookController::class);
         //----
        Route::get('/pelajar/logout', LogoutController::class)->name('pelajar.logout');
    });
});
