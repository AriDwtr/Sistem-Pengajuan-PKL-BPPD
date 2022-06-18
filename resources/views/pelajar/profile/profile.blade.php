@extends('pelajar.base_theme.master')

@section('content')
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">User Profile</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ Route('pelajar_home') }}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">User Profile</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->
    @foreach ($detail as $data)
    <div class="container">
        <div class="main-body">
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
            <div class="row">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="{{ Auth::user()->foto == NULL ? '/assets/images/profile_default.png' :  asset('storage/'.Auth::user()->foto) }}" alt="pelajar"
                                    class="rounded-circle p-1 bg-primary" width="110">
                                <div class="mt-3">
                                    <h4>{{ Str::upper(Auth::user()->nama_depan . ' ' . Auth::user()->nama_belakang) }}</h4>
                                    <a href="{{ Route('foto.profile') }}" class="btn btn-primary px-4"><i
                                    class='bx bx-cloud-upload mr-1'></i> Ubah Foto</a>
                                </div>
                            </div>
                            <hr class="my-4" />
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                    <h6 class="mb-0">Status Magang :</h6>
                                    @if (Auth::user()->status == null)
                                        <span class="badge bg-danger">Menunggu Konfirmasi </span>
                                    @elseif (Auth::user()->status == 'Pengajuan')
                                        <span class="badge bg-warning">Sedang Di Tinjau </span>
                                    @elseif (Auth::user()->status == 'Diterima')
                                    <span class="badge bg-success">Diterima </span>
                                    @elseif (Auth::user()->status == 'Selesai')
                                    <span class="badge bg-info">Selesai </span>
                                    @endif
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-body">
                                <form class="row g-3" action="{{ Route('profile.update', Auth::user()->id) }}"
                                    method="POST">
                                    @csrf
                                    @method('PUT')
                                        <div class="col-sm-6">
                                            <label for="@error('nama_depan') validationCustom01 @enderror"
                                                class="form-label">Nama Depan</label>
                                            <input type="text" name="nama_depan" value="{{ Auth::user()->nama_depan }}"
                                                class="form-control @error('nama_depan') is-invalid @enderror"
                                                id="validationCustom01" placeholder="Nama Depan">
                                            @error('nama_depan')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="inputLastName" class="form-label">Nama Belakang</label>
                                            <input type="text" name="nama_belakang"
                                                value="{{ Auth::user()->nama_belakang }}" class="form-control"
                                                id="inputLastName" placeholder="Nama Belakang"
                                                value="{{ old('nama_belakang') }}">
                                        </div>
                                        <div class="col-12">
                                            <label for="@error('email') validationCustom03 @enderror"
                                                class="form-label">Alamat Email</label>
                                            <input type="email" name="email" value="{{ Auth::user()->email }}"
                                                class="form-control @error('email') is-invalid @enderror"
                                                id="validationCustom03" placeholder="Alamat Email">
                                            @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-12">
                                            <label for="@error('nis') validationCustom03 @enderror"
                                                class="form-label">Nomor Induk Siswa / Mahasiswa</label>
                                            <input type="number" name="nis" value="{{ $data->nis }}"
                                                class="form-control @error('nis') is-invalid @enderror"
                                                id="validationCustom03" placeholder="Nomor Induk Siswa / Mahasiswa">
                                            @error('nis')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-12">
                                            <label for="@error('tmpt') validationCustom03 @enderror"
                                                class="form-label">Tempat Lahir</label>
                                            <input type="text" name="tmpt" value="{{ $data->tmpt_lahir }}"
                                                class="form-control @error('tmpt') is-invalid @enderror"
                                                id="validationCustom03" placeholder="Tempat Lahir">
                                            @error('tmpt')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-12">
                                            <label for="@error('tgl_lahir') validationCustom03 @enderror"
                                                class="form-label">Tanggal Lahir</label>
                                            <input type="date" name="tgl_lahir" value="{{ $data->tgl_lahir }}"
                                                class="form-control @error('tgl_lahir') is-invalid @enderror"
                                                id="validationCustom03" placeholder="Tanggal Lahir">
                                            @error('tgl_lahir')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label">Jenis Kelamin</label>
                                            <select class="form-select mb-3" name="jk" aria-label="Default select example">
                                                <option value="Laki - Laki"
                                                    {{ $data->jenis_kelamin == 'Laki - Laki' ? 'selected' : '' }}>Laki -
                                                    Laki</option>
                                                <option value="Perempuan"
                                                    {{ $data->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan
                                                </option>
                                            </select>
                                        </div>
                                        <div class="col-12">
                                            <label for="@error('asalsekolah') validationCustom03 @enderror"
                                                class="form-label">Asal Sekolah / Universitas</label>
                                            <input type="text" name="asalsekolah" value="{{ $data->asal_sekolah }}"
                                                class="form-control @error('asalsekolah') is-invalid @enderror"
                                                id="validationCustom03" placeholder="Asal Sekolah / Universitas">
                                            @error('asalsekolah')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-12">
                                            <label for="@error('hp') validationCustom03 @enderror"
                                                class="form-label">No. Telpon / Whatsapp</label>
                                            <input type="number" name="hp" value="{{ $data->hp }}"
                                                class="form-control @error('hp') is-invalid @enderror"
                                                id="validationCustom03" placeholder="No. Telpon / Whatsapp">
                                            @error('hp')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label">Alamat Tinggal</label>
                                            <input type="text" name="alamat" value="{{ $data->alamat }}"
                                                class="form-control" placeholder="Alamat Tinggal">
                                        </div>
                                        <div class="col-12">
                                            <div class="d-grid">
                                                <button type="submit" class="btn btn-primary"><i
                                                        class='bx bx-send'></i>Simpan Data</button>
                                            </div>
                                        </div>
                                    @endforeach
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
