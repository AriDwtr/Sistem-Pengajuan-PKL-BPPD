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
    <div class="container">
        <div class="main-body">
            @foreach ($siswa as $data)
            <div class="row">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="{{ asset('storage/' . $data->foto) }}"
                                    alt="pelajar" class="rounded-circle p-1 bg-primary" width="110">
                                <div class="mt-3">
                                    <h4>{{ Str::upper($data->nama_depan . ' ' . $data->nama_belakang) }}</h4>
                                    <p class="text-secondary mb-1">{{ $data->asal_sekolah }}</p>
                                    <p class="text-muted font-size-sm">( {{ $data->nis }} )</p>
                                    <a href="https://wa.me/62{{ substr($data->hp, 1) }}" target="_blank" class="btn btn-info"><i class='bx bx-chat mr-1'></i>Hubungi Via Whatsapp</a>
                                </div>
                            </div>
                            <hr class="my-4" />
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                    <h6 class="mb-0">Lahir :</h6>
                                    <span class="text-secondary">{{ $data->tmpt_lahir.', '. date('j F Y', strtotime($data->tgl_lahir)) }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                    <h6 class="mb-0">Gender :</h6>
                                    <span class="text-secondary">{{ $data->jenis_kelamin }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                    <h6 class="mb-0">Email :</h6>
                                    <span class="text-secondary">{{ $data->email }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                    <h6 class="mb-0">Telp :</h6>
                                    <span class="text-secondary">{{ $data->hp }}</span>
                                </li>
                            </ul>
                            @if ($data->sertifikat == NULL OR $data->daftar_nilai == NULL OR $data->surat == NULL)
                            @else
                            <hr class="my-1" />
                            <a href="{{ Route('admin.selesai.magang', $data->id) }}" class="btn btn-danger w-100"><i class='bx bx-flag mr-1'></i> Selesai Magang</a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    @if (session()->has('success'))
                        <div class="alert alert-text alert-danger border-0 bg-success alert-dismissible fade show py-2">
                            <div class="d-flex align-items-center">
                                <div class="font-35 text-white"><i class='bx bxs-message-square-check'></i>
                                </div>
                                <div class="ms-3">
                                    <h6 class="mb-0 text-white">Berhasil</h6>
                                    <div class="text-white">{{ session()->get('success') }}</div>
                                </div>
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="alert border-0 border-start border-5 border-primary alert-dismissible fade show">
                        <div>Penempatan : <b>{{ Str::upper($data->nama_instansi) }}</b></div>
                        <div>Tanggal Mulai : <b><span class="badge bg-success">{{ date('j F Y', strtotime($data->tgl_mulai)) }}</span></b></div>
                        <div>Tanggal Selesai : <b><span class="badge bg-danger">{{ date('j F Y', strtotime($data->tgl_selesai)) }}</span></b></div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            @if ($data->surat == NULL)
                            <div class="form-body">
                                <form action="{{ Route('admin.suratizin', $data->id)}}" method="post"  enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <label for="@error('surat_izin') validationCustom03 @enderror" class="form-label">Surat Izin Magang / Penelitian / PKL (File PDF)</label>
                                <input class="form-control  @error('surat_izin') is-invalid @enderror" id="validationCustom03" name="surat_izin" type="file" accept=".pdf">
                                @error('surat_izin')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <button type="submit" class="mt-2"><i class='bx bx-send'></i>Upload Surat Izin</button>
                                </form>
                            </div>
                            @else
                            <table class="table table-bordered mb-0">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Keterangan</th>
                                        <th scope="col" width="20%">Download File</th>
                                        <th scope="col" width="5%">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Surat Izin Penelitian {{ $data->nama_depan.' '.$data->nama_belakang }}</td>
                                        <td><center><a href="{{ Route('admin.downloadsuratizin', $data->id) }}" class="btn btn-info" ><i class='bx bx-download me-0'></i></a></center></td>
                                        <td>
                                            <form action="{{ route('admin.suratizinhapus', $data->id) }}" method="post" style="display: inline">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="btn btn-danger"><i class='bx bx-trash-alt me-0'></i>
                                            </form>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            @endif
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            @if ($data->sertifikat == NULL)
                            <div class="form-body">
                                <form action="{{ Route('admin.sertifikat', $data->id)}}" method="post"  enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <label for="@error('sertifikat') validationCustom03 @enderror" class="form-label">Sertifikat Magang / Penelitian (File PDF)</label>
                                <input class="form-control  @error('sertifikat') is-invalid @enderror" id="validationCustom03" name="sertifikat" type="file" accept=".pdf">
                                @error('sertifikat')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <button type="submit" class="mt-2"><i class='bx bx-send'></i>Upload Sertifikat Magang</button>
                                </form>
                            </div>
                            @else
                            <table class="table table-bordered mb-0">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Keterangan</th>
                                        <th scope="col" width="20%">Download File</th>
                                        <th scope="col" width="5%">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Sertifikat {{ $data->nama_depan.' '.$data->nama_belakang }}</td>
                                        <td><center><a href="{{ Route('admin.downloadsertifikat', $data->id) }}" class="btn btn-info" ><i class='bx bx-download me-0'></i><a></center></td>
                                        <td>
                                            <form action="{{ route('admin.sertifikathapus', $data->id) }}" method="post" style="display: inline">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="btn btn-danger"><i class='bx bx-trash-alt me-0'></i>
                                            </form>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            @endif
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            @if ($data->daftar_nilai == NULL)
                            <div class="form-body">
                                <form action="{{ Route('admin.daftarnilai', $data->id)}}" method="post"  enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <label for="@error('daftar_nilai') validationCustom03 @enderror" class="form-label">Daftar Nilai Hasil Magang / Penelitian (File PDF)</label>
                                <input class="form-control  @error('daftar_nilai') is-invalid @enderror" id="validationCustom03" name="daftar_nilai" type="file" accept=".pdf">
                                @error('daftar_nilai')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <button type="submit" class="mt-2"><i class='bx bx-send'></i>Upload Daftar Nilai</button>
                                </form>
                            </div>
                            @else
                            <table class="table table-bordered mb-0">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Keterangan</th>
                                        <th scope="col" width="20%">Download File</th>
                                        <th scope="col" width="5%">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Daftar Nilai {{ $data->nama_depan.' '.$data->nama_belakang }}</td>
                                        <td><center><a href="{{ Route('admin.downloaddaftarnilai', $data->id) }}" class="btn btn-info" ><i class='bx bx-download me-0'></i></a></center></td>
                                        <td>
                                            <form action="{{ route('admin.daftarnilaihapus', $data->id) }}" method="post" style="display: inline">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="btn btn-danger"><i class='bx bx-trash-alt me-0'></i>
                                            </form>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection
