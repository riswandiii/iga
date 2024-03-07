@extends('dashboard.layouts.index')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card p-3">
                    <div class="card-body">
                        {{-- Form --}}
                        <form action="{{ route('dashboard.manual.book.update', $manualBook->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="mb-3">
                                <label for="" class="form-label">Judul</label>
                                <input type="text" name="judul"
                                    class="form-control @error('judul') is-invalid @enderror"
                                    value="{{ old('judul', $manualBook->judul) }}">
                                @error('judul')
                                    <div class="invalid-feddback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">File (Pdf, Maksimal 2mb)</label>
                                <input type="file" name="file_book"
                                    class="form-control @error('file_book') is-invalid @enderror"
                                    value="{{ old('file_book') }}">
                                @error('file_book')
                                    <div class="invalid-feddback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            @include('dashboard.component.footer_card')
                            <div class="mt-5 mb-3">
                                <a href="{{ route('dashboard.manual.book') }}" class="btn btn-danger btn-sm">Batal</a>
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
