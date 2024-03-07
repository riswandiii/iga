@extends('layouts.index')

@section('content')
<h1 style="text-align: center; font-weight: 700; padding-top: 20px; padding-bottom: 20px;">Data Indeks Inovasi Daerah Tahun 2023</h1>
<div id="fun-facts" class="fun-facts section overlay">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-12">
                <!-- Start Single Fun -->
                <div class="single-fun">
                    <i class="icofont icofont-home"></i>
                    <div class="content">
                        <span class="counter">{{ $totalInovasi }}</span>
                        <p>Total Inovasi</p>
                    </div>
                </div>
                <!-- End Single Fun -->
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <!-- Start Single Fun -->
                <div class="single-fun">
                    <i class="icofont icofont-user-alt-3"></i>
                    <div class="content">
                        <span class="counter">{{ $inisiatif }}</span>
                        <p>Inovasi Inisiatif</p>
                    </div>
                </div>
                <!-- End Single Fun -->
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <!-- Start Single Fun -->
                <div class="single-fun">
                    <i class="icofont-simple-smile"></i>
                    <div class="content">
                        <span class="counter">{{ $ujiCoba }}</span>
                        <p>Inovasi Uji Coba</p>
                    </div>
                </div>
                <!-- End Single Fun -->
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <!-- Start Single Fun -->
                <div class="single-fun">
                    <i class="icofont icofont-table"></i>
                    <div class="content">
                        <span class="counter">{{ $penerapan }}</span>
                        <p>Inovasi Penerapan</p>
                    </div>
                </div>
                <!-- End Single Fun -->
            </div>
        </div>
    </div>
    
</div>
@yield('content')

@endsection

