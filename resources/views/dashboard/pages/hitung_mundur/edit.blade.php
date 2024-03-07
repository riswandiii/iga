@extends('dashboard.layouts.index')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card p-3">
                    <div class="card-body">
                        {{-- Form --}}
                        <form action="{{ route('dashboard.hitung.update', $data->id) }}" method="POST">
                            @csrf
                            @method('put')
                            <div class="mb-3">
                                {{-- <label for="" class="form-label">Pilih Akun</label>
                                <select class="form-select @error('user_id') is-invalid @enderror" name="user_id">
                                    @if (!empty($data))
                                        <option value="{{ $data->user_id }}">{{ $data->user->username }}</option>
                                    @else
                                        <option value="">Pilih Akun</option>
                                    @endif
                                    @foreach ($users as $row)
                                        <option value="{{ $row->id }}">{{ $row->username }}</option>
                                    @endforeach
                                </select>
                                @error('user_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror --}}
                                <input type="text" value="{{ $data->user->username }}" class="form-control" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="datepicker" class="form-label">Edit Batas Akhir Penginputan Inovasi</label>
                                <input id="datepicker" type="date" name="tanggal" value="{{ old('tanggal', $data->tanggal) }}" class="form-control @error('tanggal') is-invalid @enderror datepicker">
                                @error('tanggal')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            @include('dashboard.component.footer_card')
                            <div class="mt-5 mb-3">
                                <a href="{{ route('dashboard.hitung') }}" class="btn btn-danger btn-sm">Batal</a>
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
