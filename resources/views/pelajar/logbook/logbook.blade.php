@extends('pelajar.base_theme.master')

@section('content')
    <h6 class="mb-0 text-uppercase">Log Book Penelitian / Magang</h6>
    <hr />
    <div class="row no-gutters">
        <div class="col-md-3">
            <a href="{{ Route('logbook.create')}}" class="btn btn-secondary mb-2"><i class='bx bx-message-add mr-1'></i>Tambah Log Book</a>
        </div>
        <div class="col-md-3">
            <a href="{{ Route('logbook.show', Auth::user()->id)}}" class="btn btn-warning mb-2"><i class='bx bx-comment-edit mr-1'></i>Edit Log Book</a>
        </div>
    </div>
    @if (session()->has('success'))
    <div class="alert alert-text alert-danger border-0 bg-success alert-dismissible fade show py-2 mb-2">
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
                <table id="example2" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Jam Masuk</th>
                            <th>Jam Keluar</th>
                            <th>Aktivitas</th>
                            <th>Paraf</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1 ?>
                        @foreach ($log as $data)
                            <tr>
                                <td>{{ $no ++}}</td>
                                <td>{{ date('j F Y', strtotime($data->tanggal)) }}</td>
                                <td>{{ $data->jam_masuk }}</td>
                                <td>{{ $data->jam_pulang }}</td>
                                <td>{{ $data->aktivitas }}</td>
                                <td></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
