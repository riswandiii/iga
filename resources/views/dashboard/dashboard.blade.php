@extends('dashboard.layouts.index')

<style>
    #orange {
        background-color: orange;
        color: white;
    }

    .radiogma:hover{
        background-color: gainsboro;
    }
</style>

@section('content')
    <div class="row mb-2">
        <div class="col-lg-12">
            <h3 class="text-white">Dashboard Indeks Inovasi Daerah</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="card p-3">
                <div class="text-center">
                    <h5>Pengumuman</h5>
                </div>
                <div>
                    <a href="" class="radiogma" data-bs-toggle="modal" data-bs-target="#exampleModal"><p class="text-bold">Radiogma Perpanjangan Batas Akhir Pengisian Index Inovasi Daerah Tahun 2023</p></a>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card p-3">
                <div class="text-center">
                    {{-- <h5>Hitung Mundur Pengisian Indeks Inovasi Daerah</h5> --}}
                    <h5>Batas Waktu Penginputan Index Inovasi</h5>
                </div>
                <div class="text-center">
                   @if($tanggal == 'noTanggal')
                   <p><strong>Batas Penginputan Inovasi Belum Ditambahkan</strong></p>
                   @else 
                    @if($tanggal == 'noTanggall')

                    @else    
                    <p><strong>{{ $tanggal }}</strong></p>
                    @endif
                   @endif
                </div>
            </div>
        </div>
    </div>

    <div class="container text-center mt-5">
            @if($tanggal == 'noTanggal')
            <h4>Batas Penginputan Inovasi Belum Ditambahkan</h4>
            @else
                @if($tanggal == 'Batas Penginputan Inovasi Sudah Lewat')
                    <h5 class="mb-3 ">{{ $tanggal }}</h5>
                @else 
                <div class="row justify-content-center">
                    <div class="col-lg-4">
                        <h5>Sisa Waktu Penginputan Inovasi Daerah</h5>
                    </div>
                </div>
                <div class="row justify-content-center mb-5">
                    <div class="col-lg-4">
                        <div id="DateCountdown" data-date="{{ $tanggal }}"></div>
                    </div>
                </div>
                @endif
            @endif
    </div>

    @include('dashboard.component.card_dashboard')

    {{-- <div class="row mt-5">
        <div class="col-lg-12">
            <a href="" class="btn btn-warning btn-sm">NilaiAkhir</a>
        </div>
    </div> --}}

    {{-- <div class="row mb-2">
        <div class="col-lg-12">
            <h5>Peta Inovasi</h3>
        </div>
    </div> --}}

    {{-- <div class="row mb-4">
        <div class="col-lg-12">
            <div class="card">
                <div id="map" style="height: 400px;"></div>
            </div>
        </div>
    </div> --}}

    {{-- <div class="row">
        <div class="col-lg-12">
            <button class="btn btn-danger btn-sm">Belum Ada Data</button>
            <button class="btn btn-sm" id="orange">Kurang Inovatif</button>
            <button class="btn btn-primary btn-sm">Inovatif</button>
            <button class="btn btn-success btn-sm">Sangat Inovatif</button>
        </div>
    </div> --}}
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <p class="modal-title fs-5" id="exampleModalLabel">Pengumuman</p>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <h5>Radiogram Perpanjangan Batas Akhir Pengisian Indeks Inovasi Daerah Tahun 2023</h5>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-warning btn-sm" data-bs-dismiss="modal">Batal</button>
          <a href="/radiogram/radiogram.pdf" target="_blank" class="btn btn-primary btn-sm">Unduh</a>
        </div>
      </div>
    </div>
  </div>

  <script>
     $("#DateCountdown").TimeCircles();
  </script>

  
        
    @endsection
