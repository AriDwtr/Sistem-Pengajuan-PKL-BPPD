<ul class="metismenu" id="menu">
    <li>
        <a href="{{ Route('pelajar_home')}}">
            <div class="parent-icon"><i class='bx bx-home-circle'></i>
            </div>
            <div class="menu-title">Dashboard</div>
        </a>
    </li>
    <li class="{{ Request::is('pelajar/foto') ? 'mm-active' : ''}}">
        <a href="{{ Route('profile.index')}}">
            <div class="parent-icon"><i class='bx bx-user-circle'></i>
            </div>
            <div class="menu-title">Profile</div>
        </a>
    </li>
    @if (Auth::user()->foto != null)
    <li class="menu-label">Berkas Syarat Magang</li>
    <li>
        <a href="{{ Route('pelajar.syarat') }}">
            <div class="parent-icon"><i class='bx bx-task'></i>
            </div>
            <div class="menu-title">Berkas Persyaratan</div>
        </a>
    </li>
    @endif
    @if (Auth::user()->status == 'Diterima' OR Auth::user()->status == 'Selesai')
    <li class="menu-label">Log Book</li>
    <li class="{{ Request::is('pelajar/logbook/*') ? 'mm-active' : ''}}">
        <a href="{{ Route('logbook.index') }}">
            <div class="parent-icon"><i class='bx bx-book-bookmark'></i>
            </div>
            <div class="menu-title">Log Book</div>
        </a>
    </li>
    <li class="menu-label">Magang / Penelitian</li>
    <li>
        <a href="{{ Route ('pelajar.magang.info') }}">
            <div class="parent-icon"><i class='bx bx-buildings'></i>
            </div>
            <div class="menu-title">Informasi Magang</div>
        </a>
    </li>
    @if (Auth::user()->status == 'Selesai')

    @else
    <li>
        <a href="{{ Route('pelajar.pembimbing') }}">
            <div class="parent-icon"><i class='bx bx-user-pin'></i>
            </div>
            <div class="menu-title">Pembimbing</div>
        </a>
    </li>
    @endif
    <li>
        <a href="{{ Route('pelajar.berkas.magang') }}">
            <div class="parent-icon"><i class='bx bx-folder-open'></i>
            </div>
            <div class="menu-title">Berkas Magang</div>
        </a>
    </li>
    @endif
</ul>
