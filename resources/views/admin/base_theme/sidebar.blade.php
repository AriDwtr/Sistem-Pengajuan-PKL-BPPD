<ul class="metismenu" id="menu">
    <li>
        <a href="{{ Route('admin.dashboard') }}">
            <div class="parent-icon"><i class='bx bx-home-circle'></i>
            </div>
            <div class="menu-title">Dashboard</div>
        </a>
    </li>
    <li class="{{ Request::is('admin/fotoprofil') ? 'mm-active' : ''}}">
        <a href="{{ Route('detail.index') }}">
            <div class="parent-icon"><i class='bx bx-user-circle'></i>
            </div>
            <div class="menu-title">Profile</div>
        </a>
    </li>
    <li class="menu-label">Instansi</li>
    <li class="{{ Request::is('admin/instansi/*') ? 'mm-active' : ''}}">
        <a href="{{ Route('instansi.index') }}">
            <div class="parent-icon"><i class='bx bx-buildings'></i>
            </div>
            <div class="menu-title">Instansi</div>
        </a>
    </li>
    <li class="menu-label">Peserta Magang / Penelitian</li>
    <li class="{{ Request::is('admin/calonpeserta/*') ? 'mm-active' : ''}}">
        <a href="{{ route('calonpeserta.index') }}">
            <div class="parent-icon"><i class='bx bx-body'></i>
            </div>
            <div class="menu-title">Calon Peserta</div>
        </a>
    </li>
    <li class="{{ Request::is('admin/peserta/*') ? 'mm-active' : ''}}">
        <a href="{{ route('peserta.index') }}">
            <div class="parent-icon"><i class='bx bx-book-reader'></i>
            </div>
            <div class="menu-title">Peserta Magang</div>
        </a>
    </li>
    <li>
        <a href="{{ Route('admin.riwayat') }}">
            <div class="parent-icon"><i class='bx bx-history'></i>
            </div>
            <div class="menu-title">Riwayat Magang</div>
        </a>
    </li>
    <li class="menu-label">Pegawai</li>
    <li>
        <a href="{{ Route('pegawai.create') }}">
            <div class="parent-icon"><i class='bx bx-user'></i>
            </div>
            <div class="menu-title">Pegawai</div>
        </a>
    </li>
    <li class="{{ Request::is('admin/pegawai/*') ? 'mm-active' : ''}}">
        <a href="{{ Route('pegawai.index') }}">
            <div class="parent-icon"><i class='bx bx-user-pin'></i>
            </div>
            <div class="menu-title">Data Pegawai</div>
        </a>
    </li>
</ul>
