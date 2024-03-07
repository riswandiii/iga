@extends('dashboard.layouts.index')

@section('content')
    <div class="contaiener">
        {{-- Table --}}
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <div class="row mb-3 py-2 px-1">
                            <div class="col-lg-12">
                                <h3>{{ $inovasi->nama_inovasi }}</h3>
                                <h5>{{ $indikator->indikator }} - Dokumen Pendukung</h5>
                                <small><p class="text-dark">{{ $indikator->keterangan }}</p></small>
                                <h5>Data Pendukung : </h5>
                                <small><p class="text-dark">{{ $indikator->data_pendukung }}</p></small>
                                <h5>Jenis File : </h5>
                                <small><p class="text-dark">{{ $indikator->jenis_file }}</p></small>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-4 mb-3 pt-0 pb-2">
                        <div class="mb-3">
                            <a href="" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">Upload Dokomen</a>
                        </div>
                        <div class="table-responsive p-0">
                            <table class="align-items-center mb-0 p-3 garis-bawah" id="custumers">
                                <thead>
                                    <tr>
                                        <th class="px-4 py-2">
                                            <small>No.</small></th>
                                        @if($indikator->status == 'surat')
                                        <th class="px-4">
                                            <small>Nomor Surat/Dokumen</small></th>
                                        <th class="px-4">
                                            <small>Tanggal Surat/Dokumen</small></th>
                                        <th class="px-4">
                                            <small>Tentang</small></th>
                                        @elseif($indikator->status == 'pdf_gambar')
                                        <th class="px-4">
                                            <small>Tentang</small></th>
                                        @else
                                        <th class="px-4">
                                            <small>Judul Video</small></th>
                                            <th class="px-4">
                                                <small>Gambar Cover</small></th>
                                        @endif
                                        <th class="px-4">
                                            <small>Aksi</small>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($dokumen->count() > 0)
                                    @foreach ($dokumen as $row)
                                    <tr class="text-bold">
                                        <td>
                                            <div class="d-flex px-3 py-1">
                                                <div class="">
                                                    <small>{{ $loop->iteration }}.</small>
                                                </div>
                                            </div>
                                        </td>
                                        @if($indikator->status == 'surat')
                                        <td>
                                            <div class="d-flex px-3 py-1">
                                                <div class="">
                                                  <small> {{ $row->nomor_surat }}</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-3 py-1">
                                                <div class="">
                                                  <small>{{ $row->tanggal_surat }}</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-3 py-1">
                                                <div class="">
                                                  <small>{{ $row->tentang }}</small>
                                                </div>
                                            </div>
                                        </td>
                                        @elseif($indikator->status == 'pdf_gambar')
                                        <td>
                                            <div class="d-flex px-3 py-1">
                                                <div class="">
                                                  <small>{{ $row->tentang }}</small>
                                                </div>
                                            </div>
                                        </td>
                                        @else
                                        <td>
                                            <div class="d-flex px-3 py-1">
                                                <div class="">
                                                  <small>{{ $row->tentang }}</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-3 py-1">
                                                <div class="">
                                                  <small><img src="{{ asset('storage/' . $row->dokumen) }}" alt="" width="100"></small>
                                                </div>
                                            </div>
                                        </td>
                                        @endif
                                        <td>
                                            <div class="d-flex px-3 py-1">
                                                <div class="">
                                                    @if($indikator->status == 'video')
                                                    <a href="{{ $row->link }}" target="_blank" class="btn btn-primary btn-sm">Download</a>
                                                    @else
                                                    <a href="{{ asset('storage/' . $row->dokumen) }}" target="_blank" class="btn btn-primary btn-sm">Download</a>
                                                    @endif
                                                    {{-- <form action="{{ route('dashboard.dokumen.pendukung.destroy', $row->id) }}" method="post" class="d-inline">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-warning btn-sm" onclick="return confirm('Yakin ingin hapus data?')">Hapus</button>
                                                    </form> --}}
                                                    <a href="#" onclick="deleteDataPendukungInovasiDaerah('{{ route('dashboard.dokumen.pendukung.destroy', $row->id) }}')" class="btn btn-danger btn-sm">Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- End table --}}
    </div>
@include('dashboard.component.modal_dokumen_pendukiung')
@endsection


