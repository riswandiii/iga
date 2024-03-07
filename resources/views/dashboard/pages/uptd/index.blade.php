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
                            <div class="col-lg-5">
                                @include('dashboard.component.hasil_search')
                            </div>
                            <div class="col-lg-3 text-end mt-1">
                                <a href="{{ route('dashboard.uptd.create') }}" class="btn btn-primary btn-sm d-inline">Tambah
                                    {{ $page }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            No</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Daerah</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            OPD</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Nama UPT</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($datas->count() > 0)
                                        @foreach ($datas as $row)
                                            <tr>
                                                <td>
                                                    <div class="d-flex px-3 py-1">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">{{ ($datas->currentPage() - 1) * $datas->perPage() + $loop->iteration }}</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex px-3 py-1">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">{{ $row->opd->daerah }}</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex px-3 py-1">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">{{ $row->opd->nama_opd }}</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex px-3 py-1">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">{{ $row->nama_upt }}</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <a href="{{ route('dashboard.uptd.edit', $row->id) }}"
                                                        class="badge bg-primary"><i class="bi bi-pencil-fill"></i></a>
                                                    {{-- <form action="{{ route('dashboard.uptd.destroy', $row->id) }}"
                                                        method="post" class="d-inline">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="border-0 bg-white" type="submit"><span
                                                                class="badge badge-sm bg-gradient-warning"><i
                                                                    class="bi bi-trash3-fill"></i></span></button>
                                                    </form> --}}
                                                    <a href="#" onclick="deleteUptd('{{ route('dashboard.uptd.destroy', $row->id) }}')"><span
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
                    @if($datas->count() < 7)
                    <br> <br> <br> <br><br> <br> <br><br>
                    @endif
                </div>
            </div>
        </div>
        {{-- End table --}}
    </div>
@endsection
