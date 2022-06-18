@extends('admin.base_theme.master')

@section('content')
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Calon Peserta</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ Route('admin.dashboard') }}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Calon Peserta</li>
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
                                    <img src="{{ asset('storage/' . $data->foto) }}" alt="pelajar"
                                        class="rounded-circle p-1 bg-primary" width="110">
                                    <div class="mt-3">
                                        <h4>{{ Str::upper($data->nama_depan . ' ' . $data->nama_belakang) }}</h4>
                                        <p class="text-secondary mb-1">{{ $data->asal_sekolah }}</p>
                                        <p class="text-muted font-size-sm">( {{ $data->nis }} )</p>
                                        <a href="https://wa.me/62{{ substr($data->hp, 1) }}" target="_blank"
                                            class="btn btn-info"><i class='bx bx-chat mr-1'></i>Hubungi Via Whatsapp</a>
                                    </div>
                                </div>
                                <hr class="my-4" />
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0">Lahir :</h6>
                                        <span
                                            class="text-secondary">{{ $data->tmpt_lahir . ', ' . date('j F Y', strtotime($data->tgl_lahir)) }}</span>
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
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="accordion accordion-flush" id="accordionFlushExample">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="flush-headingOne">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#flush-collapseOne"
                                                aria-expanded="false" aria-controls="flush-collapseOne">
                                                Berkas Persyaratan Magang / Penelitian
                                            </button>
                                        </h2>
                                        <div id="flush-collapseOne" class="accordion-collapse collapse"
                                            aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                            <div class="accordion-body">
                                                <table class="table table-bordered mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">No</th>
                                                            <th scope="col">Jenis Berkas</th>
                                                            <th scope="col">Lihat</th>
                                                            <th scope="col">Tolak</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <th scope="row">1</th>
                                                            <td>Surat rekomendasi dari Kantor Kesbangpolinmas Kab. Pemalang</td>
                                                            <td><a href="{{ Route('admin.berkas.rekomendasi.download', $data->id)}}" class="btn btn-info" ><i class='bx bx-download me-0'></i> </a></td>
                                                            <td>
                                                                <form action="{{ Route('admin.berkas.rekomendasi.delete', $data->id)}}" method="post" style="display: inline">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <button type="submit" class="btn btn-danger"><i class='bx bx-trash-alt me-0'></i> </button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">2</th>
                                                            <td>Surat Pengantar dari Kampus / Lembaga / Sekolah</td>
                                                            <td><a href="{{ Route('admin.berkas.pengantar.download', $data->id)}}" class="btn btn-info" ><i class='bx bx-download me-0'></i> </a></td>
                                                            <td>
                                                                <form action="{{ Route('admin.berkas.pengantar.delete', $data->id)}}" method="post" style="display: inline">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <button type="submit" class="btn btn-danger"><i class='bx bx-trash-alt me-0'></i> </button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">3</th>
                                                            <td>Proposal Penelitian / Proposal Kegiatan</td>
                                                            <td><a href="{{ Route('admin.berkas.proposal.download', $data->id)}}" class="btn btn-info" ><i class='bx bx-download me-0'></i> </a></td>
                                                            <td>
                                                                <form action="{{ Route('admin.berkas.proposal.delete', $data->id)}}" method="post" style="display: inline">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <button type="submit" class="btn btn-danger"><i class='bx bx-trash-alt me-0'></i> </button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="form-body">
                                    <form class="row g-3" action="{{ route('calonpeserta.update', $data->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="col-12">
                                            <label for="@error('penempatan') validationCustom03 @enderror"
                                                class="form-label">Pilih Penempatan</label>
                                            <select class="form-select mb-3  @error('penempatan') is-invalid @enderror"
                                                name="penempatan" aria-label="Default select example">
                                                @foreach ($instansi as $instansi)
                                                    <option value="{{ $instansi->id_instansi }}">
                                                        {{ $instansi->nama_instansi }}</option>
                                                @endforeach
                                            </select>
                                            @error('penempatan')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-12">
                                            <label for="@error('tgl_mulai') validationCustom03 @enderror"
                                                class="form-label">Tanggal Mulai Kegiatan</label>
                                            <input type="date" name="tgl_mulai" value="{{ old('tgl_mulai') }}"
                                                class="form-control @error('tgl_mulai') is-invalid @enderror"
                                                id="validationCustom03" placeholder="Tanggal Mulai Kegiatan">
                                            @error('tgl_mulai')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-12">
                                            <label for="@error('tgl_selesai') validationCustom03 @enderror"
                                                class="form-label">Tanggal Selesai Kegiatan</label>
                                            <input type="date" name="tgl_selesai" value="{{ old('tgl_selesai') }}"
                                                class="form-control @error('tgl_selesai') is-invalid @enderror"
                                                id="validationCustom03" placeholder="Tanggal Mulai Kegiatan">
                                            @error('tgl_selesai')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-12">
                                            <div class="d-grid">
                                                <button type="submit" class="btn btn-success"><i
                                                        class='bx bx-user-plus'></i>Terima Peserta</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
