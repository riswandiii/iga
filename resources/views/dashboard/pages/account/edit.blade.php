@extends('dashboard.layouts.index')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card p-3">
                    <div class="card-body">
                        {{-- Form --}}
                        <form action="{{ route('dashboard.account.update', $user->id) }}" method="POST">
                            @csrf
                            @method('put')
                            <div class="mb-3">
                                <label for="" class="form-label">Role</label>
                                <select class="form-select @error('role') is-invalid @enderror" name="role" id="role">
                                    @if ($user->role)
                                        <option value="{{ $user->role }}">{{ $user->role }}</option>
                                        <option value="Opd">Opd</option>
                                        <option value="Upt">Upt</option>
                                        <option value="Kepala Daerah">Kepala Daerah</option>
                                        <option value="Anggota DPRD">Anggota DPRD</option>
                                        <option value="ASN">ASN</option>
                                        <option value="Masyarakat">Masyarakat</option>
                                    @endif
                                </select>
                                @error('role')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                           
                            <div class="form-group" id="userForm" style="display: none;">
                                <label for="select2Dropdown" class="form-label">Pilih OPD</label>
                                <select id="select2Dropdown" name="opd_id" class="form-control select2">
                                    @if(!empty($user->opd_id))
                                    <option value="{{ $user->opd_id }}">{{ $user->opd->nama_opd }}</option>
                                    @else
                                    <option value="">Pilih</option>
                                    @endif
                                    <option value="">Pilih</option>
                                    @foreach ($opds as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_opd }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="" id="adminForm" style="display:none;">
                                <label for="" class="form-label">Nama Inisiator</label>
                                <input type="text" name="nama_inisiator"
                                    class="form-control @error('nama_inisiator') is-invalid @enderror"
                                    value="{{ old('nama_inisiator', $user->nama_inisiator) }}">
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
                                    value="{{ old('nama_lengkap', $user->nama_lengkap) }}"
                                    value="{{ old('nama_lengkap') }}">
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
                                    value="{{ old('nama_panggilan', $user->nama_panggilan) }}">
                                @error('nama_panggilan')
                                    <div class="invalid-feddback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">No. Hp/Wa</label>
                                <input type="number" name="no_hp"
                                    class="form-control @error('no_hp') is-invalid @enderror"
                                    value="{{ old('no_hp', $user->no_hp) }}">
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
                                    value="{{ old('username', $user->username) }}">
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
@endsection
