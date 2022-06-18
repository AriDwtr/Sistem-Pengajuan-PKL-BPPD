@extends('pelajar.base_theme.master')

@section('content')
<div class="row">
    <div class="col-12 col-lg-3">
        <div class="card">
            <div class="card-body">
                <h5 class="my-3">My Drive</h5>
                <div class="fm-menu">
                    <div class="list-group list-group-flush">
                        <a href="javascript:;" class="list-group-item py-1"><i class='bx bx-folder me-2'></i><span>All Files</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-9">
        <div class="card">
            <div class="card-body">
                <h5>Berkas Saya</h5>
                <div class="row mt-3">
                    <div class="col-12 col-lg-4">
                        <div class="card shadow-none border radius-15">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="font-30 text-primary"><i class='bx bxs-folder'></i>
                                    </div>
                                    <div class="user-groups ms-auto">
                                        <img src="{{asset('storage/'.Auth::user()->foto)}}" width="35" height="35" class="rounded-circle" alt="" />
                                    </div>
                                </div>
                                <h6 class="mb-2 text-primary">Surat Izin</h6>
                                @foreach ($surat as $surat)
                                    @if ($surat->surat == NULL)
                                        <p class="text-danger">Maaf File Belum tersedia</p>
                                    @else
                                        <a href="{{ Route('pelajar.downloadsuratizin', $surat->id_user)}}" class="mt-2"><u>Download File >></u></a></center>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="card shadow-none border radius-15">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="font-30 text-warning"><i class='bx bxs-folder'></i>
                                    </div>
                                    <div class="user-groups ms-auto">
                                        <img src="{{asset('storage/'.Auth::user()->foto)}}" width="35" height="35" class="rounded-circle" alt="" />
                                    </div>
                                </div>
                                <h6 class="mb-2 text-primary">Sertifikat</h6>
                                @foreach ($sertifikat as $sertifikat)
                                @if ($sertifikat->sertifikat == NULL)
                                    <p class="text-danger">Maaf File Belum tersedia</p>
                                @else
                                    <a href="{{ Route('pelajar.downloadsertifikat', $sertifikat->id_user)}}" class="mt-2"><u>Download File >></u></a></center>
                                @endif
                            @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="card shadow-none border radius-15">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="font-30 text-info"><i class='bx bxs-folder'></i>
                                    </div>
                                    <div class="user-groups ms-auto">
                                        <img src="{{asset('storage/'.Auth::user()->foto)}}" width="35" height="35" class="rounded-circle" alt="" />
                                    </div>
                                </div>
                                <h6 class="mb-2 text-primary">Daftar Nilai</h6>
                                @foreach ($nilai as $nilai)
                                @if ($nilai->daftar_nilai == NULL)
                                    <p class="text-danger">Maaf File Belum tersedia</p>
                                @else
                                    <a href="{{ Route('pelajar.downloadnilai', $nilai->id_user) }}" class="mt-2"><u>Download File >></u></a></center>
                                @endif
                            @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <!--end row-->
            </div>
        </div>
    </div>
</div>
@endsection
