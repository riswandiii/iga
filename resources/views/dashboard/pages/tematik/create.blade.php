@extends('dashboard.layouts.index')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card p-3">
                    <div class="card-body">
                        {{-- Form --}}
                        <form action="{{ route('dashboard.tematik.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="">Daerah</label>
                                <p><small>Provinsi Sulawesi Selatan</small></p>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Tematik</label>
                                <input type="text" name="tematik"
                                    class="form-control @error('tematik') is-invalid @enderror"
                                    value="{{ old('tematik') }}">
                                @error('tematik')
                                    <div class="invalid-feddback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            @include('dashboard.component.footer_card')
                            <div class="mt-5 mb-3">
                                <a href="{{ route('dashboard.tematik') }}" class="btn btn-danger btn-sm">Batal</a>
                                <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                            </div>
                        </form>
                        {{-- End Form --}}
                    </div>
                    <br><br><br><br>
                </div>
            </div>
        </div>
    </div>
@endsection
