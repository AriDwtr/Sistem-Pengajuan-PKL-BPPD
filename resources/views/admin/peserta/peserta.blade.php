@extends('admin.base_theme.master')

@section('content')
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Peserta</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ Route('admin.dashboard') }}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Peserta</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->
    <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-4">
        @foreach ($siswa as $data)
            <div class="col">
                <div class="card radius-15">
                    <div class="card-body text-center">
                        <div class="p-4 border radius-15">
                            <img src="{{ asset('storage/' . $data->foto) }}" width="110" height="110"
                                class="rounded-circle shadow" alt="">
                            <h5 class="mb-0 mt-4">{{ Str::upper($data->nama_depan) }}</h5>
                            <p class="mb-0"><i>{{ $data->asal_sekolah }}</i></p>
                            <p class="mb-3"><span
                                    class="badge bg-info text-dark">{{ Str::upper($data->nama_instansi) }}</span></p>
                            <div class="d-grid"> <a href="{{ route('peserta.edit', $data->id) }}" class="btn btn-outline-primary radius-15">Lihat Detail</a>
                            </div>
                            <hr>
                            <div class="row justify-content-md-center">
                                <div class="col-md-12">
                                    <span class="badge bg-success">Diterima</span>
                                </div>
                                <div class="col-md-12">
                                    @if ($data->sertifikat == NULL OR $data->daftar_nilai == NULL OR $data->surat == NULL)
                                    <span class="badge bg-danger">Berkas Belum Lengkap</span>
                                    @else
                                    <span class="badge bg-success">Berkas Telah Lengkap</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
