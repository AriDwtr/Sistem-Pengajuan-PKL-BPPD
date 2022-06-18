@extends('pelajar.base_theme.master')

@section('content')
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Berkas Persyaratan</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ Route('pelajar_home') }}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Berkas Persyaratan</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->
    <div class="">
        <div class="">
            <div class="container py-2">
                <div class="row">
                    <!-- timeline item 1 left dot -->
                    <div class="col-auto text-center flex-column d-none d-sm-flex">
                        <div class="row h-50">
                            <div class="col">&nbsp;</div>
                            <div class="col ">&nbsp;</div>
                        </div>
                        <h5 class="m-2">
                            <span class="badge rounded-pill {{ Auth::user()->surat_rekom == NULL ? 'bg-light' : 'bg-success' }} border">&nbsp;</span>
                        </h5>
                        <div class="row h-50">
                            <div class="col border-end">&nbsp;</div>
                            <div class="col">&nbsp;</div>
                        </div>
                    </div>
                    <!-- timeline item 1 event content -->
                    <div class="col py-2">
                        <div class="card radius-15">
                            @if (Auth::user()->surat_rekom == NULL)
                            <div class="card-body">
                                <h4 class="card-title text-muted">Berkas 1 Surat Rekomendasi</h4>
                                <p class="card-text">Surat rekomendasi dari Kantor Kesbangpolinmas Kab. Pemalang</p>
                                <form action="{{ Route('pelajar.syarat.rekomendasi', Auth::user()->id)}}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <input class="form-control  @error('surat_rekomendasi') is-invalid @enderror"
                                        id="validationCustom03" name="surat_rekomendasi" type="file" accept=".pdf">
                                    @error('surat_rekomendasi')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <button type="submit" class="mt-2 btn btn-primary"><i class='bx bx-send'></i>Upload Surat
                                        Rekomendasi</button>
                                </form>
                            </div>
                            @else
                            <div class="card-body">
                                <h4 class="card-title text-success">Berkas 1 Surat Rekomendasi</h4>
                                <p class="card-text">Surat rekomendasi dari Kantor Kesbangpolinmas Kab. Pemalang</p>
                                <button class="btn btn-sm btn-outline-success" type="button" data-bs-target="#t2_details"
                                    data-bs-toggle="collapse">Show Details ▼</button>
                                <div class="collapse border" id="t2_details">
                                    <div class="p-2 text-monospace">
                                        <div>Info File (Surat Rekomendasi)</div>
                                        <div><hr></div>
                                        <div>
                                            <a href="{{ Route('pelajar.syarat.rekomendasi.download', Auth::user()->id)}}" class="btn btn-info" ><i class='bx bx-download me-0'></i> Download</a>&nbsp;
                                            <form action="{{ Route('pelajar.syarat.rekomendasi.delete', Auth::user()->id)}}" method="post" style="display: inline">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="btn btn-danger"><i class='bx bx-trash-alt me-0'></i> Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                <!--/row-->
                <!-- timeline item 2 -->
                <div class="row">
                    <!-- timeline item 1 left dot -->
                    <div class="col-auto text-center flex-column d-none d-sm-flex">
                        <div class="row h-50">
                            <div class="col border-end">&nbsp;</div>
                            <div class="col">&nbsp;</div>
                        </div>
                        <h5 class="m-2">
                            <span class="badge rounded-pill {{ Auth::user()->surat_pengantar == NULL ? 'bg-light' : 'bg-success' }} border">&nbsp;</span>
                        </h5>
                        <div class="row h-50">
                            <div class="col border-end">&nbsp;</div>
                            <div class="col">&nbsp;</div>
                        </div>
                    </div>
                    <!-- timeline item 1 event content -->
                    <div class="col py-2">
                        <div class="card radius-15">
                            @if (Auth::user()->surat_pengantar == NULL)
                            <div class="card-body">
                                <h4 class="card-title text-muted">Berkas 2 Surat Pengantar</h4>
                                <p class="card-text">Surat Pengantar dari Kampus / Lembaga / Sekolah</p>
                                <form action="{{ Route('pelajar.syarat.pengantar', Auth::user()->id)}}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <input class="form-control  @error('surat_pengantar') is-invalid @enderror"
                                        id="validationCustom03" name="surat_pengantar" type="file" accept=".pdf">
                                    @error('surat_pengantar')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <button type="submit" class="mt-2 btn btn-primary"><i class='bx bx-send'></i>Upload Surat
                                        Pengantar</button>
                                </form>
                            </div>
                            @else
                            <div class="card-body">
                                <h4 class="card-title text-success">Berkas 2 Surat Pengantar</h4>
                                <p class="card-text">Surat Pengantar dari Kampus / Lembaga / Sekolah</p>
                                <button class="btn btn-sm btn-outline-success" type="button" data-bs-target="#t3_details"
                                    data-bs-toggle="collapse">Show Details ▼</button>
                                <div class="collapse border" id="t3_details">
                                    <div class="p-2 text-monospace">
                                        <div>Info File (Surat Pengantar)</div>
                                        <div><hr></div>
                                        <div>
                                            <a href="{{ Route('pelajar.syarat.pengantar.download', Auth::user()->id)}}" class="btn btn-info" ><i class='bx bx-download me-0'></i> Download</a>&nbsp;
                                            <form action="{{ Route('pelajar.syarat.pengantar.delete', Auth::user()->id)}}" method="post" style="display: inline">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="btn btn-danger"><i class='bx bx-trash-alt me-0'></i> Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                <!--/row-->
                <!-- timeline item 3 -->
                <div class="row">
                    <!-- timeline item 1 left dot -->
                    <div class="col-auto text-center flex-column d-none d-sm-flex">
                        <div class="row h-50">
                            <div class="col border-end">&nbsp;</div>
                            <div class="col">&nbsp;</div>
                        </div>
                        <h5 class="m-2">
                            <span class="badge rounded-pill {{ Auth::user()->proposal == NULL ? 'bg-light' : 'bg-success' }} border">&nbsp;</span>
                        </h5>
                        <div class="row h-50">
                            <div class="col">&nbsp;</div>
                            <div class="col">&nbsp;</div>
                        </div>
                    </div>
                    <!-- timeline item 1 event content -->
                    <div class="col py-2">
                        <div class="card radius-15">
                            @if (Auth::user()->proposal == NULL)
                            <div class="card-body">
                                <h4 class="card-title text-muted">Berkas 3 Proposal Penelitian</h4>
                                <p class="card-text">Proposal Penelitian / Proposal Kegiatan</p>
                                <form action="{{ Route('pelajar.syarat.proposal', Auth::user()->id)}}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <input class="form-control  @error('surat_proposal') is-invalid @enderror"
                                        id="validationCustom03" name="surat_proposal" type="file" accept=".pdf">
                                    @error('surat_proposal')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <button type="submit" class="mt-2 btn btn-primary"><i class='bx bx-send'></i>Upload Proposal</button>
                                </form>
                            </div>
                            @else
                            <div class="card-body">
                                <h4 class="card-title text-success">Berkas 3 Proposal Penelitian</h4>
                                <p class="card-text">Proposal Penelitian / Proposal Kegiatan</p>
                                <button class="btn btn-sm btn-outline-success" type="button" data-bs-target="#t4_details"
                                    data-bs-toggle="collapse">Show Details ▼</button>
                                <div class="collapse border" id="t4_details">
                                    <div class="p-2 text-monospace">
                                        <div>Info File (Proposal)</div>
                                        <div><hr></div>
                                        <div>
                                            <a href="{{ Route('pelajar.syarat.proposal.download', Auth::user()->id)}}" class="btn btn-info" ><i class='bx bx-download me-0'></i> Download</a>&nbsp;
                                            <form action="{{ Route('pelajar.syarat.proposal.delete', Auth::user()->id)}}" method="post" style="display: inline">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="btn btn-danger"><i class='bx bx-trash-alt me-0'></i> Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                <!--/row-->
            </div>
        </div>
    </div>
@endsection
