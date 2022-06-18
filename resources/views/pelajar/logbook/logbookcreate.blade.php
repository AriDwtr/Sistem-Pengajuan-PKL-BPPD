@extends('pelajar.base_theme.master')

@section('content')
    <div class="card">
        <div class="card-body p-4">
            <h5 class="card-title">Tambah Log Book</h5>
            <hr />
            <div class="form-body mt-4">
                <form action="{{ route('logbook.store')}}" method="post">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <div class="border border-3 p-4 rounded">
                            <div class="mb-3">
                                <label for="@error('tanggal') validationCustom01 @enderror" class="form-label">Tanggal Kegiatan</label>
                                <input type="date" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror" id="inputProductTitle">
                                @error('tanggal')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="@error('jam_masuk') validationCustom01 @enderror" class="form-label">Jam Masuk</label>
                                <input type="time" name="jam_masuk" class="form-control @error('jam_masuk') is-invalid @enderror" id="inputProductTitle">
                                @error('jam_masuk')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="@error('jam_pulang') validationCustom01 @enderror" class="form-label">Jam Pulang</label>
                                <input type="time" name="jam_pulang" class="form-control @error('jam_pulang') is-invalid @enderror" id="inputProductTitle">
                                @error('jam_pulang')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="@error('aktivitas') validationCustom01 @enderror" class="form-label">Description</label>
                                <textarea class="form-control @error('aktivitas') is-invalid @enderror" name="aktivitas" id="inputProductDescription" rows="3"></textarea>
                                @error('aktivitas')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary w-100"><i class="bx bx-comment-add"></i> Tambah Log Book</button>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
                <!--end row-->
            </div>
        </div>
    </div>
@endsection
