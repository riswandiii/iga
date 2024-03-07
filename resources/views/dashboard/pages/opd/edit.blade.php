@extends('dashboard.layouts.index')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card p-3">
                    <div class="card-body">
                        {{-- Form --}}
                        <form action="{{ route('dashboard.opd.update', $opd->id) }}" method="POST">
                            @csrf
                            @method('put')
                            <div class="mb-3">
                                <label for="">Daerah</label>
                                <p><small>Provinsi Sulawesi Selatan</small></p>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Nama OPD</label>
                                <input type="text" name="nama_opd"
                                    class="form-control @error('nama_opd') is-invalid @enderror"
                                    value="{{ old('nama_opd', $opd->nama_opd) }}">
                                @error('nama_opd')
                                    <div class="invalid-feddback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            @include('dashboard.component.footer_card')
                            <div class="mt-5 mb-3">
                                <a href="{{ route('dashboard.opd') }}" class="btn btn-danger btn-sm">Batal</a>
                                <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                            </div>
                        </form>
                        {{-- End Form --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
