@extends('pelajar.base_theme.master');

@section('content')
    <h6 class="mb-0 text-uppercase">Daftar Pembimbing / Kordinator Magang</h6>
    <hr />
        <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-4">
            @foreach ($guru as $data)
            <div class="col">
                <div class="card radius-15">
                    <div class="card-body text-center">
                        <div class="p-4 border radius-15">
                            <img src="{{ $data->foto == NULL ? '/assets/images/profile_default.png' : asset('storage/' . $data->foto) }}" width="110" height="110"
                                class="rounded-circle shadow" alt="">
                            <h5 class="mb-2 mt-4">{{ Str::upper($data->nama_depan) }}</h5>
                            <p class="mb-3"><span class="badge bg-warning text-dark">Kordinator {{ Str::upper($data->nama_instansi) }}</span></p>
                            <div class="d-grid"><a href="https://wa.me/62{{ substr($data->hp, 1) }}" target="_blank" class="btn btn-outline-primary text-small"><i class='bx bx-chat mr-1'></i><small>Whatsapp</small></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
@endsection
