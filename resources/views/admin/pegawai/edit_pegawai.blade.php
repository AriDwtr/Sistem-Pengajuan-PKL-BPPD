@extends('admin.base_theme.master')

@section('content')
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Pegawai</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ Route('admin.dashboard') }}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Pegawai</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->
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
            <div class="card">
                <div class="card-body">
                    <div class="p-4 rounded">
                        @foreach ($pegawai as $data)
                        <div class="form-body">
                            <form class="row g-3" action="{{ route('pegawai.update',  $data->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="col-sm-6">
                                    <label for="@error('nama_depan') validationCustom01 @enderror"
                                        class="form-label">Nama Depan</label>
                                    <input type="text" name="nama_depan" value="{{ $data->nama_depan }}"
                                        class="form-control @error('nama_depan') is-invalid @enderror"
                                        id="validationCustom01" placeholder="Nama Depan">
                                    @error('nama_depan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-sm-6">
                                    <label for="inputLastName" class="form-label">Nama Belakang</label>
                                    <input type="text" name="nama_belakang" class="form-control" id="inputLastName"
                                        placeholder="Nama Belakang" value="{{ $data->nama_belakang }}">
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
                                    <label for="@error('email') validationCustom03 @enderror" class="form-label">Alamat
                                        Email</label>
                                    <input type="email" name="email" value="{{ $data->email }}"
                                        class="form-control @error('email') is-invalid @enderror" id="validationCustom03"
                                        placeholder="Alamat Email">
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Penugasan</label>
                                    <select class="form-select mb-3" name="penempatan" aria-label="Default select example">
                                        @foreach ($instansi as $instansi)
                                        <option value="{{ $instansi->id_instansi }}" {{ $instansi->id_instansi == $data->id_instansi ? 'selected' : '' }}>{{ $instansi->nama_instansi }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label for="@error('pass') validationCustom03 @enderror"
                                        class="form-label">Password Baru</label>
                                    <div class="input-group" id="show_hide_password">
                                        <input type="password" name="pass"
                                            class="form-control border-end-0 @error('pass') is-invalid @enderror"
                                            id="inputChoosePassword validationCustom03" placeholder="Masukan Password"> <a
                                            href="javascript:;" class="input-group-text bg-transparent"><i
                                                class='bx bx-hide'></i></a>
                                        @error('pass')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label for="@error('repasspass') validationCustom03 @enderror"
                                        class="form-label">Re-Type Password Baru</label>
                                    <div class="input-group" id="show_hide_password2">
                                        <input type="password" name="repass"
                                            class="form-control border-end-0 @error('repass') is-invalid @enderror"
                                            id="inputChoosePassword2 validationCustom03" placeholder="Re-type Password"> <a
                                            href="javascript:;" class="input-group-text bg-transparent"><i
                                                class='bx bx-hide'></i></a>
                                        @error('repass')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary"><i
                                                class='bx bx-user-plus'></i>Perbaharui Data Pegawai</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
