@extends('dashboard.layouts.index')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card p-3">
                    <div class="card-body">
                        {{-- Form --}}
                        <form action="{{ route('dashboard.perhatikan.update', $perhatikan->id) }}" method="POST">
                            @csrf
                            @method('put')
                            <div class="mb-3">
                                <label for="" class="form-label">Isi</label>
                                <input type="text" name="isi"
                                    class="form-control @error('isi') is-invalid @enderror"
                                    value="{{ old('isi', $perhatikan->isi) }}">
                                @error('isi')
                                    <div class="invalid-feddback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            @include('dashboard.component.footer_card')
                            <div class="mt-5 mb-3">
                                <a href="{{ route('dashboard.perhatikan') }}" class="btn btn-danger btn-sm">Batal</a>
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
