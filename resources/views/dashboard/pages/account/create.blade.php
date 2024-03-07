@extends('dashboard.layouts.index')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card p-3">
                    <div class="card-body">
                        {{-- Form --}}
                        <form action="{{ route('dashboard.account.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="" class="form-label">Role</label>
                                <select class="form-select @error('role') is-invalid @enderror" name="role" id="role">
                                    <option value="">Silahkan Pilih</option>
                                        <option value="Opd">Opd</option>
                                        <option value="Upt">Upt</option>
                                        <option value="Kepala Daerah">Kepala Daerah</option>
                                        <option value="Anggota DPRD">Anggota DPRD</option>
                                        <option value="ASN">ASN</option>
                                        <option value="Masyarakat">Masyarakat</option>
                                </select>
                                @error('role')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            {{-- <div class="mb-3" id="userForm"  style="display: none;">
                                <label for="" class="form-label">Nama OPD</label>
                                <small>
                                    <p>Kosongkan jika bukan akun OPD</p>
                                </small>
                                <select class="form-select @error('opd_id') is-invalid @enderror" name="opd_id">
                                    <option value="">Silahkan Pilih</option>
                                    @foreach ($opds as $row)
                                        <option value="{{ $row->id }}">{{ $row->nama_opd }}</option>
                                    @endforeach
                                </select>
                                @error('opd_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div> --}}

                            <div class="form-group" id="userForm" style="display: none;">
                                <label for="select2Dropdown" class="form-label">Pilih OPD</label>
                                <select id="select2Dropdown" name="opd_id" class="form-control select2">
                                    @foreach ($opds as $item)
                                        <option value="">Pilih</option>
                                        <option value="{{ $item->id }}">{{ $item->nama_opd }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3" id="adminForm" style="display:none;">
                                <label for="" class="form-label">Nama Inisiator</label>
                                <input type="text" name="nama_inisiator"
                                    class="form-control @error('nama_inisiator') is-invalid @enderror"
                                    value="{{ old('nama_inisiator') }}" value="{{ old('nama_inisiator') }}">
                                @error('nama_inisiator')
                                    <div class="invalid-feddback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- <div class="mb-3">
                                <label for="" class="form-label">Nama Lengkap</label>
                                <input type="text" name="nama_lengkap"
                                    class="form-control @error('nama_lengkap') is-invalid @enderror"
                                    value="{{ old('nama_lengkap') }}" value="{{ old('nama_lengkap') }}">
                                @error('nama_lengkap')
                                    <div class="invalid-feddback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div> --}}
                            <div class="mb-3">
                                <label for="" class="form-label">Nama Penanggung Jawab</label>
                                <input type="text" name="nama_panggilan"
                                    class="form-control @error('nama_panggilan') is-invalid @enderror"
                                    value="{{ old('nama_panggilan') }}" value="{{ old('nama_panggilan') }}">
                                @error('nama_panggilan')
                                    <div class="invalid-feddback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">No. Hp/Wa</label>
                                <input type="number" name="no_hp"
                                    class="form-control @error('no_hp') is-invalid @enderror" value="{{ old('no_hp') }}"
                                    value="{{ old('no_hp') }}">
                                @error('no_hp')
                                    <div class="invalid-feddback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Username</label>
                                <input type="text" name="username"
                                    class="form-control @error('username') is-invalid @enderror"
                                    value="{{ old('username') }}" value="{{ old('username') }}">
                                @error('username')
                                    <div class="invalid-feddback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Password</label>
                                <input type="password" name="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    value="{{ old('password') }}" value="{{ old('password') }}">
                                @error('password')
                                    <div class="invalid-feddback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            {{-- @include('dashboard.component.footer_card') --}}
                            <div class="mt-5 mb-3">
                                <a href="{{ route('dashboard.account') }}" class="btn btn-danger btn-sm">Batal</a>
                                <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                            </div>

                        </form>
                        {{-- End Form --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- resources/views/form.blade.php -->
<!-- resources/views/layouts/app.blade.php atau file layout lainnya -->


@endsection
