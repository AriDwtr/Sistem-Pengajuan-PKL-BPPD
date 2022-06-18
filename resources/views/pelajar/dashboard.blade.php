@extends('pelajar.base_theme.master')

@section('content')
    @foreach ($detail as $data)
        @if ($data->nis == null or $data->tmpt_lahir == null or $data->tgl_lahir == null or $data->jenis_kelamin == null or $data->asal_sekolah == null or $data->hp == null or Auth::user()->foto == null)
            <div class="alert alert-danger" role="alert">
                Mohon Lengkapi Data Diri Dahulu<a href="{{ route('profile.index') }}" class="alert-link"> di Halaman
                    Profile</a>. Click Menu Profile atau Link di sini.
            </div>
        @elseif (Auth::user()->status == 'Pengajuan')
            <div class="alert alert-success" role="alert">
                <h4 class="alert-heading">Telah Di Ajukan</h4>
                <p>Pengajuan Magang / Penelitian Telah Di Terima Oleh SI INTERN</p>
                <hr>
                <p class="mb-0">Mohon Menunggu, dan Selalu Cek Website SI INTERN untuk hasil Pengumuman</p>
            </div>
        @elseif (Auth::user()->status == 'Diterima')
            <div class="row row-cols-12 row-cols-md-12 row-cols-xl-12">
                <div class="col">
                    <div class="card radius-10">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0 font-24 text-success">Selamat, {{ Str::upper(Auth::user()->nama_depan.' '.Auth::user()->nama_belakang) }} Anda Diterima</p>
                                    <h5 class="my-1">Menjadi Bagian Tim Magang / Penelitian / PKL di BPPB kabupaten Pemalang</h5>
                                </div>
                                <div class="widgets-icons bg-light-success text-success ms-auto"><img src="/assets/images/pemalang-logo.png" class="img-fluid" alt="...">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @elseif (Auth::user()->status == 'Selesai')
            <div class="row row-cols-12 row-cols-md-12 row-cols-xl-12">
                <div class="col">
                    <div class="card radius-10">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0 font-24 text-danger">Kegiatan PKL / Magang Mu Telah Usai, {{ Str::upper(Auth::user()->nama_depan.' '.Auth::user()->nama_belakang) }} <i class="fadeIn animated bx bx-sad"></i> </p>
                                    <h5 class="my-1">Terima Kasih Telah Menjadi Bagian Dari Kami, Terus Berkarya dan Berprestasi</h5>
                                </div>
                                <div class="widgets-icons bg-light-success text-success ms-auto"><img src="/assets/images/pemalang-logo.png" class="img-fluid" alt="...">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @elseif (Auth::user()->surat_rekom == NULL OR Auth::user()->surat_pengantar == NULL OR Auth::user()->proposal == NULL)
            <div class="col py-2">
                <div class="card radius-15">
                    <div class="card-body">
                        <h4 class="card-title text-muted">Pengajuan Magang / Penelitian Di Badan Perencanaan Pembangunan
                            Daerah (BAPPEDA)</h4>
                        <p class="card-text">Selamat Datang, Di SI INTERN BAPPEDA Kabupaten Pemalang</p>
                        <p class="card-text"><b>Persyaratan Permohonan</b></p>
                        <p class="card-text">1. Surat Rekomendasi Dari Kantor Kesbangpolinmas Kab. Pemalang @if(Auth::user()->surat_rekom != NULL) <i class="font-20 bx bx-check-shield text-success"></i>   @else <i class="font-20 bx bx-shield-x text-danger"></i>  @endif</p>
                        <p class="card-text">2. Surat Pengantar Dari Kampus / Lembaga / Institusi Permohon @if(Auth::user()->surat_pengantar != NULL) <i class="font-20 bx bx-check-shield text-success"></i>   @else <i class="font-20 bx bx-shield-x text-danger"></i>  @endif</p>
                        <p class="card-text">3. Fotocopy proposal / proposal pendahuluan @if(Auth::user()->proposal != NULL) <i class="font-20 bx bx-check-shield text-success"></i>   @else <i class="font-20 bx bx-shield-x text-danger"></i>  @endif</p>
                        <a href="{{ Route('pelajar.syarat') }}" class="btn btn-danger px-5"><i class='bx bx-task'></i> Upload Berkas Persyaratan</a>
                    </div>
                </div>
            </div>
        @else
            <div class="col py-2">
                <div class="card radius-15">
                    <div class="card-body">
                        <h4 class="card-title text-muted">Pengajuan Magang / Penelitian Di Badan Perencanaan Pembangunan
                            Daerah (BAPPEDA)</h4>
                        <p class="card-text">Selamat Datang, Di SI INTERN BAPPEDA Kabupaten Pemalang</p>
                        <p class="card-text"><b>Persyaratan Permohonan</b></p>
                        <p class="card-text">1. Melengkapi Data Profil <i class="font-20 bx bx-check-shield text-success"></i></p>
                        <p class="card-text">2. Surat Rekomendasi Dari Kantor Kesbangpolinmas Kab. Pemalang <i class="font-20 bx bx-check-shield text-success"></i></p>
                        <p class="card-text">3. Surat Pengantar Dari Kampus / Lembaga / Institusi Permohon <i class="font-20 bx bx-check-shield text-success"></i></p>
                        <p class="card-text">4. Fotocopy proposal / proposal pendahuluan <i class="font-20 bx bx-check-shield text-success"></i></p>
                        <form action="{{ route('dashboard.pengajuan') }}" method="post">
                            @csrf
                            <button type="submit" href="" class="btn btn-primary px-5">Ajukan Kegiatan Magang /
                                Penelitian</button>
                        </form>
                    </div>
                </div>
            </div>
        @endif
    @endforeach
@endsection
