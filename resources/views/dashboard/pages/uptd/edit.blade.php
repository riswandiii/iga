@extends('dashboard.layouts.index')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card p-3">
                    <div class="card-body">
                        {{-- Form --}}
                        <form action="{{ route('dashboard.uptd.update', $uptd->id) }}" method="POST">
                            @csrf
                            @method('put')
                            <div class="mb-3">
                                <label for="">Daerah</label>
                                <p><small>Provinsi Sulawesi Selatan</small></p>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">OPD</label>
                                <select class="form-select @error('opd_id') is-invalid @enderror" name="opd_id">
                                    @if (!empty($uptd))
                                        <option value="{{ $uptd->opd->id }}">{{ $uptd->opd->nama_opd }}</option>
                                    @else
                                        <option value="">Silahkan Pilih</option>
                                    @endif
                                    @foreach ($opds as $row)
                                        <option value="{{ $row->id }}">{{ $row->nama_opd }}</option>
                                    @endforeach
                                </select>
                                @error('opd_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Nama UPT</label>
                                <input type="text" name="nama_upt"
                                    class="form-control @error('nama_upt') is-invalid @enderror"
                                    value="{{ old('nama_upt', $uptd->nama_upt) }}">
                                @error('nama_upt')
                                    <div class="invalid-feddback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            @include('dashboard.component.footer_card')
                            <div class="mt-5 mb-3">
                                <a href="{{ route('dashboard.uptd') }}" class="btn btn-danger btn-sm">Batal</a>
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
