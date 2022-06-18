@extends('admin.base_theme.master')

@section('content')
    <h6 class="mb-0 text-uppercase">Riwayat Penelitian / Magang</h6>
    <hr />
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example2" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nis / Nim</th>
                            <th>Nama Lengkap</th>
                            <th>Asal Universitas</th>
                            <th>Instansi</th>
                            <th>Status</th>
                            <th>Tanggal Selesai</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1 ?>
                        @foreach ($siswa as $data)
                            <tr>
                                <td>{{ $no ++}}</td>
                                <td>{{ $data->nis }}</td>
                                <td>{{ Str::upper($data->nama_depan.' '.$data->nama_belakang)  }}</td>
                                <td>{{ Str::upper($data->asal_sekola)  }}</td>
                                <td>{{ $data->nama_instansi }}</td>
                                <td><span class="badge bg-danger">{{ $data->status }}</span></td>
                                <td>{{ date('j F Y', strtotime($data->tgl_selesai)) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
