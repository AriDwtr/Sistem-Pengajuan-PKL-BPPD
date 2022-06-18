@extends('pelajar.base_theme.master')

@section('content')
    <h6 class="mb-0 text-uppercase">Log Book Penelitian / Magang</h6>
    <hr />
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Jam Masuk</th>
                            <th>Jam Keluar</th>
                            <th>Aktivitas</th>
                            <th width="5%">Hapus</th>
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
                                <td>
                                    <form action="{{ route('logbook.destroy', $data->id_log) }}" method="post" style="display: inline">
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
@endsection
