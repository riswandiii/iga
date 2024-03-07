<?php
$banners = \App\Models\Banner::all();
?>

<section class="slider">
    <div class="hero-slider">
        @if($banners->count() > 0)
            @foreach ($banners as $row)
                 <!-- Start Single Slider -->
                <div class="single-slider" style="background-image:url('{{ asset('storage/' . $row->banner) }}');">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-7">
                                
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Slider -->
            @endforeach
        @endif
    </div>
</section>

{{-- <section class="slider">
    <div class="hero-slider">
        <!-- Start Single Slider -->
        <div class="single-slider" style="background-image:url('/home/img/banner-baru.png');">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- End Single Slider -->
        <!-- Start Single Slider -->
        <div class="single-slider" style="background-image:url('/home/img/ban2.jpg')">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- Start End Slider -->
        <!-- Start Single Slider -->
        <div class="single-slider" style="background-image:url('/home/img/ban3.jpg')">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- End Single Slider -->
    </div>
</section> --}}