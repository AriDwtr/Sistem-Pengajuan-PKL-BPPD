@extends('admin.base_theme.master')

@section('content')
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Instansi</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ Route('admin.dashboard') }}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Instansi</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->
    <div class="container">
        <div class="main-body">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('instansi.store') }}" class="row g-3" method="post">
                        @csrf
                        <div class="col-sm-9">
                            <input type="text" name="instansi" value="{{ old('instansi') }}"
                                class="form-control @error('instansi') is-invalid @enderror" id="validationCustom01"
                                placeholder="Instansi Baru">
                            @error('instansi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-sm-3">
                            <button type="submit" class="btn btn-primary mb-3"><i class='bx bx-location-plus mr-1'></i>
                                Tambah Instansi Baru</button>
                        </div>
                    </form>
                </div>
            </div>
            <br>
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
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th width='5%'>No</th>
                                    <th>Nama Instansi</th>
                                    <th>Tanggal Dibuat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                @foreach ($instansi as $data)
                                    <tr>
                                        <td>{{ $no ++ }}</td>
                                        <td><b>{{ Str::upper($data->nama_instansi) }}</b></td>
                                        <td>{{ $data->created_at}}</td>
                                        <td>
                                             <a href="{{ route('instansi.edit', $data->id_instansi)}}" class="btn btn-info"><i class='bx bx-pencil me-0'></i></a>
                                            <form action="{{ route('instansi.destroy', $data->id_instansi) }}" method="post" style="display: inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"><i
                                                        class='bx bx-trash-alt me-0'></i>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
