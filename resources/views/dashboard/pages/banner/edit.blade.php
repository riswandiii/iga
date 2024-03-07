@extends('dashboard.layouts.index')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card p-3">
                    <div class="card-body">
                        {{-- Form --}}
                        <form action="{{ route('dashboard.banner.update', $banner->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="mb-3">
                                <label for="" class="form-label">Gambar Banner (Jpg, Jpeg, Png, Maksimal 1mb)</label>
                                <input type="file" name="banner"
                                    class="form-control @error('banner') is-invalid @enderror"
                                    value="{{ old('banner') }}">
                                @error('banner')
                                    <div class="invalid-feddback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            @include('dashboard.component.footer_card')
                            <div class="mt-5 mb-3">
                                <a href="{{ route('dashboard.banner') }}" class="btn btn-danger btn-sm">Batal</a>
                                <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                            </div>
                        </form>
                        {{-- End Form --}}
                    </div>
                    <br><br><br><br><br><br><br>
                </div>
            </div>
        </div>
    </div>
@endsection
