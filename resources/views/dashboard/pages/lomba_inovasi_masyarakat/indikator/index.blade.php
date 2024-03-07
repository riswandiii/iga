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
                                <h5>Tahapan: Implementasi / Penerapan</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-4 mb-3 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="align-items-center mb-0 p-3 garis-bawah" id="custumers">
                                <thead>
                                    <tr>
                                        <th class="px-4 py-2">
                                            <small>No</small></th>
                                        <th class="px-4">
                                            <small>Indikator</small></th>
                                        <th class="px-4">
                                            <small>Keterangan</small></th>
                                        <th class="px-4">
                                            <small>Informasi</small></th>
                                        <th class="px-4">
                                           <small>Bobot</small></th>
                                        <th class="px-4">
                                            <small>Pilih parameter</small></th>
                                        <th class="px-4">
                                            <small>Data pendukung</small>
                                        </th>
                                        <th class="px-4">
                                            <small>Jenis filee</small>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($datas->count() > 0)
                                        @foreach ($datas as $row)
                                            <tr class="text-bold">
                                                <td>
                                                    <div class="d-flex px-3 py-1">
                                                        <div class="">
                                                            <small>{{ $loop->iteration }}</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex px-3 py-1">
                                                        <div class="">
                                                          <small> {{ $row->indikator }}</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex px-3 py-1">
                                                        <div class="">
                                                          <small>{{ $row->keterangan }}</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <?php 
                                                    $kematangans = App\Models\Kematangan::where('inovasi_masyarakat_id', $inovasi->id)->where('indikator_id',$row->id)->get();
                                                    $dataPendukungs = App\Models\Data_Pendukung::where('indikator_id',$row->id)->get();
                                                ?>
                                                <td>
                                                    <div class="d-flex px-3 py-1">
                                                        <div class="">
                                                            @foreach ($kematangans as $data)
                                                                <small>{{ $data->parameter->parameter }}</small>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="d-flex px-3 py-1">
                                                        <div class="">
                                                            @foreach ($kematangans as $data)
                                                            <small>{{ $data->parameter->bobot }}
                                                                @if($data->parameter->bobot == 0)
                                                                @else
                                                                .00
                                                                @endif
                                                            </small>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex px-3 py-1">
                                                        <div class="">
                                                                <small><a href="" class="" data-bs-toggle="modal" title="Pilih parameter" data-bs-target="#exampleModal-{{ $row->id }}"><i class="bi bi-pencil-fill"></i></a></small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex px-3 py-1">
                                                        <div class="">
                                                            <small>{{ $row->data_pendukung }}</small><br>
                                                            <div class="mt-1 text-center">
                                                                <form action="{{ route('dashboard.dokumen.pendukungg') }}" method="POST" class="text-decoration-none text-dark mt-2" title="Upload dokumen pendukung">
                                                                    @csrf
                                                                    @method('get')
                                                                    <input type="hidden" name="inovasi_masyarakat_id" value="{{ $inovasi->id }}">
                                                                    <input type="hidden" name="indikator_id" value="{{ $row->id }}">
                                                                    <button type="submit" class="bg-white border-0"><i class="bi bi-folder-fill"></i> Upload</a></button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex px-3 py-1">
                                                        <div class="">
                                                          <small>{{ $row->jenis_file }}</small>
                                                        </div>
                                                    </div>
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
                </div>
            </div>
        </div>
        {{-- End table --}}
    </div>

    {{-- Modal --}}
    @include('dashboard.component.modal_indikatorr')

@endsection


