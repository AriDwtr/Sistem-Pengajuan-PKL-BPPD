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
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th width='5%'>No</th>
                                    <th>Nama Pegawai</th>
                                    <th>Email</th>
                                    <th>Penempatan</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no=1; ?>
                                @foreach ($pegawai as $data)
                                    <tr>
                                        <td>{{ $no ++ }}</td>
                                        <td>{{ Str::upper($data->nama_depan . ' ' . $data->nama_belakang) }}</td>
                                        <td>{{ $data->email }}</td>
                                        <td>{{ $data->nama_instansi }}</td>
                                        <td>{{ $data->jenis_kelamin }}</td>
                                        <td>
                                            @if (Auth::user()->id == $data->id)
                                            --
                                            @else
                                            <a href="{{ route('pegawai.edit', $data->id)}}" class="btn btn-info"><i class='bx bx-pencil me-0'></i></a>
                                            <form action="{{ route('pegawai.destroy', $data->id) }}" method="post" style="display: inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"><i
                                                        class='bx bx-trash-alt me-0'></i>
                                            </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>ID Pegawai</th>
                                    <th>Nama Pegawai</th>
                                    <th>Email</th>
                                    <th>Penempatan</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
