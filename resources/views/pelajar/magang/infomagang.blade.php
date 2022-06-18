@extends('pelajar.base_theme.master');

@section('content')
    @foreach ($siswa as $data)
        <div class="card">
            <div class="row g-0">
                <div class="col-md-4 border-end">
                    <center><img src="/assets/images/pemalang-logo.png" class="img-fluid" alt="..."></center>
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h4 class="card-title">Badan Perencanaan Pembangunan Daerah (BPPD) </h4>
                        <p class="card-text fs-6">Badan Perencanaan Pembangunan Daerah, disingkat Bappeda, adalah lembaga
                            teknis daerah dibidang penelitian dan perencanaan pembangunan daerah yang dipimpin oleh seorang
                            kepala badan yang berada dibawah dan bertanggung jawab kepada Gubernur/Bupati/Wali kota melalui
                            Sekretaris Daerah. Badan ini mempunyai tugas pokok membantu Gubernur/Bupati/Wali kota dalam
                            penyelenggaraan Pemerintahan Daerah dibidang penelitian dan perencanaan pembangunan daerah</p>
                        <dl class="row">
                            <dt class="col-sm-3">Status</dt>
                            <dd class="col-sm-9"><span class="badge bg-success">Diterima</span></dd>

                            <dt class="col-sm-3">Penempatan</dt>
                            <dd class="col-sm-9">{{ Str::upper($data->nama_instansi) }}</dd>

                            <dt class="col-sm-3">Tanggal Mulai</dt>
                            <dd class="col-sm-9">{{ date('j F Y', strtotime($data->tgl_mulai)) }}</dd>

                            <dt class="col-sm-3">Tanggal Selesai</dt>
                            <dd class="col-sm-9">{{ date('j F Y', strtotime($data->tgl_selesai)) }}</dd>
                        </dl>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-12 mx-auto">
            <div class="card">
                <div class="card-body" style="height: 200px">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.9786961444756!2d109.4052722147727!3d-6.893151395019049!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6fc533524eb243%3A0xa58f3923277da204!2sRegional%20Planning%20and%20Development%20Agency%20of%20Pemalang!5e0!3m2!1sen!2sid!4v1654883420264!5m2!1sen!2sid" class="responsive-iframe"></iframe>
                </div>
            </div>
        </div>
        <br>
    @endforeach
@endsection
