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
                                            Isi</th>
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
                                                            <h6 class="mb-0 text-sm">#</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex px-3 py-1">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">{{ $row->isi }}</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <a href="{{ route('dashboard.perhatikan.edit', $row->id) }}"
                                                        class="badge bg-primary"><i class="bi bi-pencil-fill"></i></a>
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
                    @if($datas->count() <  6)
                    <br> <br> <br> <br><br> <br> <br><br><br><br><br><br><br><br><br><br>
                    @endif
                </div>
            </div>
        </div>
        {{-- End table --}}
    </div>
@endsection
