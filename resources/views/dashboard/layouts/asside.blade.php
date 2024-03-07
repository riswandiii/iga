
<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 "
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="{{ route('index') }}">
            <img src="/login/images/logo-sulsel.png" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold">DASHBOARD
                {{-- @if(auth()->user()->role == 'Admin')
                ADMIN
                @elseif(auth()->user()->role == "Opd")
                OPD
                @elseif(auth()->user()->role == "Upt")
                UPT
                @elseif(auth()->user()->role == "Anggota DPRD")
                Anggota DPRD
                @elseif(auth()->user()->role == "ASN")
                ASN
                @elseif(auth()->user()->role == "Masyarakat")
                Masyarakat
                @else
                KEPALA DAERAH
                @endif --}}
            </span>
        </a>
    </div>

    <hr class="horizontal dark mt-0">

    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
            @if(auth()->user()->role == 'Admin'  || auth()->user()->role == 'Opd' || auth()->user()->role == 'Upt' || auth()->user()->role == 'Kepala Daerah' || auth()->user()->role == 'Anggota DPRD' || auth()->user()->role == 'ASN' || auth()->user()->role == 'Masyarakat')
                <h6 class="px-5"> <i class="ni ni-tv-2 text-warning text-sm opacity-10"></i> Dashboard</h6>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard') ? 'text-warning' : '' }}"
                        href="{{ route('dashboard.index') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        </div>
                        <span class="nav-link-text ms-1">Dashboard Iga</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard/faq') ? 'text-warning' : '' }}"
                        href="{{ route('dashboard.faq') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        </div>
                        <span class="nav-link-text ms-1">FAQ</span>
                    </a>
                </li>
                <br>
            <h6 class="px-5"> <i class="bi bi-database text-warning"></i>Database Inovasi</h6>
            @endif

            @if(auth()->user()->role == 'Admin')
            {{-- <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/profil-pemda*') ? 'text-warning' : '' }}" href="{{ route('dashboard.profil_pemda') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                    </div>
                    <span class="nav-link-text ms-1">Profil Pemda</span>
                </a>
            </li> --}}
            {{-- <li class="nav-item">
                <a class="nav-link" href="">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                    </div>
                    <span class="nav-link-text ms-1">Inovasi Kabupaten</span>
                </a>
            </li> --}}
            @endif

            @if(auth()->user()->role == 'Admin'  || auth()->user()->role == 'Opd' || auth()->user()->role == 'Upt' || auth()->user()->role == 'Kepala Daerah' || auth()->user()->role == 'Anggota DPRD' || auth()->user()->role == 'ASN' || auth()->user()->role == 'Masyarakat')
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/inovasi-daerah*') ? 'text-warning' : '' }}" href="{{ route('dashboard.inovasi.daerah.db') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                    </div>
                    <span class="nav-link-text ms-1">Inovasi Daerah</span>
                </a>
            </li>
            <br>
            @endif

            <h6 class="px-5"> <i class="ni ni-calendar-grid-58 text-sm opacity-10 text-warning"></i> Input Inovasi
            </h6>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/lomba-inovasi-daerah*') ? 'text-warning' : '' }} || {{ Request::is('dashboard/dokumen-pendukung/lomba-inovasi-daerah') ? 'text-warning' : '' }}"
                    href="{{ route('dashboard.inovasi.daerah') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                    </div>
                        <span class="nav-link-text ms-1">
                        @if(auth()->user()->role == 'Admin' || auth()->user()->role == 'Opd' || auth()->user()->role == 'Upt' || auth()->user()->role == 'Kepala Daerah' || auth()->user()->role == 'Anggota DPRD' || auth()->user()->role == 'ASN' || auth()->user()->role == 'Masyarakat')
                        Inovasi Daerah
                        @endif  
                        {{-- @if(auth()->user()->role == 'Opd')
                        Inovasi Daerah
                        @endif 
                        @if(auth()->user()->role == 'Upt')
                        Inovasi Daerah
                        @endif  --}}
                        </span>
                </a>
            </li>
            @if(auth()->user()->role == 'Admin'  || auth()->user()->role == 'Opd' || auth()->user()->role == 'Upt' || auth()->user()->role == 'Kepala Daerah' || auth()->user()->role == 'Anggota DPRD' || auth()->user()->role == 'ASN' || auth()->user()->role == 'Masyarakat') 
            {{-- <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/lomba-inovasi-masyarakat*') ? 'text-warning' : '' }} || {{ Request::is('dashboard/dokumen-pendukung/lomba-inovasi-masyarakat') ? 'text-warning' : '' }}" href="{{ route('dashboard.inovasi.masyarakat') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                    </div>
                    <span class="nav-link-text ms-1">Inovasi Masyarakat</span>
                </a>
            </li>
            <br> --}}
            <br>
            @endif  

            @if(auth()->user()->role == 'Admin')
            <h6 class="px-5"> <i class="bi bi-gear text-warning"></i> Konfigurasi</h6>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/account*') ? 'text-warning' : '' }}"
                    href="{{ route('dashboard.account') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                    </div>
                    <span class="nav-link-text ms-1">Akun</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/opd*') ? 'text-warning' : '' }}"
                    href="{{ route('dashboard.opd') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                    </div>
                    <span class="nav-link-text ms-1">Daftar OPD</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/uptd*') ? 'text-warning' : '' }}"
                    href="{{ route('dashboard.uptd') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                    </div>
                    <span class="nav-link-text ms-1">Daftar UPTD</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/hitung-mundur*') ? 'text-warning' : '' }}"
                    href="{{ route('dashboard.hitung') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                    </div>
                    <span class="nav-link-text ms-1">Jadwal Input Inovasi</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/tematik*') ? 'text-warning' : '' }}"
                    href="{{ route('dashboard.tematik') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                    </div>
                    <span class="nav-link-text ms-1">Tematik</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/perhatikan*') ? 'text-warning' : '' }}"
                    href="{{ route('dashboard.perhatikan') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                    </div>
                    <span class="nav-link-text ms-1">Harap Perhatikan</span>
                </a>
            </li>

            <h6 class="px-5 mt-3"> <i class="bi bi-border-all text-warning"></i> Menu Index</h6>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/pengumuman*') ? 'text-warning' : '' }}"
                    href="{{ route('dashboard.pengumuman') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                    </div>
                    <span class="nav-link-text ms-1">Pengumuman</span>
                </a>
                <a class="nav-link {{ Request::is('dashboard/manual-book*') ? 'text-warning' : '' }}"
                href="{{ route('dashboard.manual.book') }}">
                <div
                    class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                </div>
                <span class="nav-link-text ms-1">Manual Book</span>
                </a>
                <a class="nav-link {{ Request::is('dashboard/petunjuk-teknis*') ? 'text-warning' : '' }}"
                href="{{ route('dashboard.petunjuk.teknis') }}">
                <div
                    class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                </div>
                <span class="nav-link-text ms-1">Petunjuk Teknis</span>
                </a>
                <a class="nav-link {{ Request::is('dashboard/banner*') ? 'text-warning' : '' }}"
                href="{{ route('dashboard.banner') }}">
                <div
                    class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                </div>
                <span class="nav-link-text ms-1">Banner</span>
                </a>
            </li>
            @endif

        </ul>
    </div>

</aside>
