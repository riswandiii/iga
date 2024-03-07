@extends('dashboard.layouts.index')

@section('content')
    <div class="contaiener">
        {{-- Table --}}
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <div class="row mb-3">
                            <div class="col-lg-4">
                                <h6>Provinsi Sulawesi Selatan</h6>
                            </div>
                            <div class="col-lg-4">
                                @include('dashboard.component.hasil_search')
                            </div>
                            <div class="col-lg-4 text-end">
                                    <a href="{{ route('dashboard.hitung.create') }}"
                                        class="btn btn-primary btn-sm d-inline">Tambah
                                        {{ $page }}</a>
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
                                            <small>Akun</small></th>
                                        <th class="px-3">
                                            <small>Batas Penginputan Inovasi</small></th>
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
                                                    <div class="d-flex px-2 py-1">
                                                        <div class="">
                                                            <small>{{ ($datas->currentPage() - 1) * $datas->perPage() + $loop->iteration }}</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div class="">
                                                            <small>{{ $row->user->username }}</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div class="">
                                                            <small>{{ $row->tanggal}}</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="px-3">
                                                    <a href="{{ route('dashboard.hitung.edit', $row->id) }}"
                                                        class="badge bg-primary"><i class="bi bi-pencil-fill"></i></a>
                                                    {{-- <form id="deleteForm" action="{{ route('dashboard.opd.destroy', $row->id) }}"
                                                        method="post" class="d-inline">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="border-0 bg-white delete" type="button" onclick="confirmDelete({{ $row->id }})"><span
                                                                class="badge badge-sm bg-gradient-warning"><i
                                                                    class="bi bi-trash3-fill"></i></span></button>
                                                    </form> --}}
                                                    <a href="#" onclick="deleteHitung('{{ route('dashboard.hitung.destroy', $row->id) }}')"><span
                                                        class="badge badge-sm bg-gradient-warning"><i
                                                            class="bi bi-trash3-fill"></i></span></a>
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
                        <div class="px-3 py-3">
                            {{ $datas->links() }}
                        </div>
                    </div>
                    @if($datas->count() <  5)
                    <br> <br> <br> <br><br> <br> <br><br><br><br><br><br><br>
                    @endif
                </div>
            </div>
        </div>
        {{-- End table --}}
    </div>
  
 @include('dashboard.component.modal_inovasi_pdf')
 @include('dashboard.component.modal_inovasi_excel')
  
@endsection


 
