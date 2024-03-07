@extends('dashboard.layouts.index')

@section('content')
    <div class="contaiener">

        @include('dashboard.pages.inovasi_daerah_db.card_header')

        {{-- Table --}}
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <div class="row mb-3">
                            <div class="col-lg-4">
                                <h6>Provinsi Sulawesi Selatan <br>
                                    Bentuk Inovasi
                                </h6>
                               @if(auth()->user()->role === 'Admin')
                                    <a href="{{ route('dashboard.semua.inovasi.daerah.excel') }}" class="btn btn-sm btn-primary mt-3">Unduh Data (Xls)</a>
                                    <a href="{{ route('dashboard.semua.inovasi.daerah.pdf') }}" class="btn btn-primary btn btn-sm mt-3">Unduh Data (Pdf)</a>
                               @endif
                            </div>
                            <div class="col-lg-4 text-center">
                                @include('dashboard.component.hasil_search')
                            </div>
                            <div class="col-lg-4 text-end">
                                {{-- Tahapan inovasis --}}
                                <div class="dropdown mt-3">
                                    <button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                      @if(!request('tahapan'))
                                      Semua
                                      @else
                                      {{ request('tahapan') }}
                                      @endif
                                    </button>
                                    <ul class="dropdown-menu">
                                      @if($tahapanInovasis->count() > 0)
                                      @if(request('tahapan'))
                                      <li><a class="dropdown-item" href="inovasi-daerah">sSemua</a></li>
                                      @endif
                                      @foreach ($tahapanInovasis as $tahapan)
                                      <li><a class="dropdown-item" href="inovasi-daerah?tahapan={{ $tahapan->tahapan }}">{{ $tahapan->tahapan }}</a></li>
                                      @endforeach
                                      @endif
                                    </ul>
                                  </div>
                                {{-- End --}}
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0 px-4">
                            <table class="align-items-center mb-0 garis-bawah" id="custumers">
                                <thead>
                                    <tr>
                                        <th class="px-3 py-2">
                                            <small>No</small></th>
                                        <th class="px-3">
                                            <small>Nama Pemda</small></th>
                                        <th class="px-3">
                                            <small>Nama Inovasi</small></th>
                                        <th class="px-3">
                                            <small>Tahapan Inovasi</small></th>
                                        <th class="px-3">
                                            <small>Urusan pemerintahan utama</small></th>
                                        <th class="px-3">
                                            <small>Waktu Uji Coba Inovasi Daerah</small></th>
                                        <th class="px-3">
                                            <small>Waktu Penerapan Inovasi Daerah</small>
                                        </th>
                                        <th class="px-3">
                                            <small>Estimasi Skor Kematangan</small>
                                        </th>
                                        <th
                                            class="px-3">
                                            <small>Aksi</small></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($datas->count() > 0)
                                        @foreach ($datas as $row)
                                            <tr class="text-bold">
                                                <td>
                                                    <div class="d-flex px-3 py-1">
                                                        <div class="">
                                                            <small>{{ ($datas->currentPage() - 1) * $datas->perPage() + $loop->iteration }}</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex px-3 py-1">
                                                        <div class="">
                                                            <small>Provinsi Sulawesi Selatan</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex px-3 py-1">
                                                        <div class="">
                                                            <small>{{ $row->nama_inovasi }}</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex px-3 py-1">
                                                        <div class="">
                                                           <small>{{ $row->tahapan_inovasi->tahapan }}</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex px-3 py-1">
                                                        <div class="">
                                                           <small>{{ $row->urusan_utama->urusan }}</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex px-3 py-1">
                                                        <div class="">
                                                            <small>{{ $row->waktu_uji_coba }}</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex px-3 py-1">
                                                        <div class="">
                                                           <small>{{ $row->waktu_penerapan }}</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex px-3 py-1">
                                                        <div class="">
                                                            <?php 
                                                                $total = App\Models\TotalKematangan::where('inovasi_pemerintah_daerah_id',$row->id)->first();
                                                            ?>
                                                            @if(!empty($total))
                                                                <small>{{ $total->total }}.00</small>
                                                            @else 
                                                                <small>0</small>
                                                            @endif  
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="">
                                                    <a  href=""
                                                        class="" title="Unduh Dukumen (PDF)" data-bs-toggle="modal" data-bs-target="#exampleModal-{{ $row->id }}"><i class="bi bi-file-earmark-pdf"></i></a>
                                                        <a  href=""
                                                        class="" title="Unduh Excel / (XLS)" data-bs-toggle="modal" data-bs-target="#unduhExcel-{{ $row->id }}"><i class="bi bi-filetype-xls"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            {{-- <td colspan="3" class="text-danger text-center">Belum ada data OPD</td> --}}
                                        </tr>
                                    @endif

                                </tbody>
                            </table>
                        </div>
                    </div>
                    @if($datas->count() <  5)
                    <br> <br> <br> <br><br> <br> <br>
                    @endif
                </div>
            </div>
        </div>
        {{-- End table --}}
    </div>
  
 @include('dashboard.component.modal_inovasi_pdf')
 @include('dashboard.component.modal_inovasi_excel')
  
@endsection
