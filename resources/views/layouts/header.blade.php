<header class="header" >
    <!-- Topbar -->
    <div class="topbar">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-5 col-12">
                    <p style="font-weight: 700;">PEMERINTAH PROVINSI SULAWESI SELATAN</p>
                </div>
                <div class="col-lg-6 col-md-7 col-12">
                    <!-- Top Contact -->
                    <ul class="top-contact">
                        <li><i class="fa fa-phone"></i><small>(0411) 453050</small></li>
                        <li><i class="fa fa-envelope"></i><a href="mailto:admin@sulselprov.go.id" class="text-decoration-none text-dark">admin@sulselprov.go.id</a></li>
                        @auth
                        <li><a href="{{ route('logout') }}" class="nav-link px-0" id="logoutBtn">
                            <i class="fa fa-user me-sm-1"></i>
                            <span class="d-sm-inline d-none">Log-out</span>
                        </a></li>
                        @endauth
                    </ul>
                    <!-- End Top Contact -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Topbar -->
    <!-- Header Inner -->
    <div class="header-inner">
        <div class="container">
            <div class="inner">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-12">
                        <!-- Start Logo -->
                        <div class="logo">
                            <a href="index.html"><img src="/home/img/logo-sulsel.png" alt="#" style="height: 70px; margin-bottom: 12px;"></a>
                        </div>
                        <!-- End Logo -->
                        <!-- Mobile Nav -->
                        <div class="mobile-nav"></div>
                        <!-- End Mobile Nav -->
                    </div>
                    <div class="col-lg-7 col-md-9 col-12">
                        <!-- Main Menu -->
                        <div class="main-menu" style="margin-top: 10px;">
                            <nav class="navigation">
                                <ul class="nav menu">
                                    <li class="{{ Request::is('/') ? 'active' : '' }}"><a href="{{ route('index') }}" class="text-decoration-none">Home</a></li>
                                    <li class="{{ Request::is('pengumuman') ? 'active' : '' }}"><a href="{{ route('pengumuman') }}" class="text-decoration-none">Pengumuman </a></li>
                                    <li class="{{ Request::is('panduan') ? 'active' : '' }}"><a href="{{ route('panduan') }}" class="text-decoration-none">Manual Book </a></li>
                                    <li class="{{ Request::is('dokumen') ? 'active' : '' }}""><a href="{{ route('dokumen') }}" class="text-decoration-none">Petunjuk Teknis </a></li>
                                    @auth
                                    <li><a href="{{ route('dashboard.index') }}" class="text-decoration-none">Dashboard</a></li>
                                    @else
                                    <li><a href="{{ route('login') }}" class="text-decoration-none">Login </a></li>
                                    @endauth
                                </ul>
                            </nav>
                        </div>
                        <!--/ End Main Menu -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ End Header Inner -->
</header>