@extends('dashboard.layouts.index')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card p-3">
                    <div class="card-body">
                        {{-- Form --}}
                        <form action="{{ route('dashboard.inovasi.masyarakat.update', $inovasi->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

                            <div class="mb-3">
                                <label class="form-label">Nama Pemda</label class="form-label">
                                <p><small>Provinsi Sulawesi Selatan</small></p>
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Nama Inovasi</label>
                                <input type="text" name="nama_inovasi"
                                    class="form-control @error('nama_inovasi') is-invalid @enderror"
                                    value="{{ old('nama_inovasi', $inovasi->nama_inovasi) }}" >
                                @error('nama_inovasi')
                                    <div class="invalid-feddback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Tahapan Inovasi</label>
                                <div class="row gx-2">
                                    @foreach ($tahapanInovasis as $row)
                                        <div class="col-lg-4">
                                            <div class="card p-2">
                                                <div class="form-check">
                                                    <input
                                                        class="form-check-input @error('tahapan_inovasi_id') is-invalid 
                                                    @enderror"
                                                        type="radio" value="{{ $row->id }}"
                                                        name="tahapan_inovasi_id">
                                                    <label class="form-check-label">
                                                        {{ $row->tahapan }}
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Jenis Inovasi</label>
                                <div class="row gx-2">
                                    @foreach ($jenisInovasis as $row)
                                        <div class="col-lg-6">
                                            <div class="card p-2">
                                                <div class="form-check">
                                                    <input
                                                        class="form-check-input @error('jenis_inovasi_id') is-invalid 
                                                    @enderror"
                                                        type="radio" value="{{ $row->id }}" name="jenis_inovasi_id">
                                                    <label class="form-check-label">
                                                        {{ $row->jenis }}
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>


                            <div class="mb-3">
                                <label for="" class="form-label">Inisiator Inovasi Masyarakat</label>
                                <div class="row gx-2">
                                    @foreach ($inisiatorInovasiDaerah as $item)
                                        <div class="col-lg-3 mb-2">
                                            <div class="card p-2">
                                                <div class="form-check">
                                                    <input type="radio" class="form-check-input" value="{{ $item->id }}" name="inisiator_inovasi_daerah_id" data-inisiator-id="{{ $item->id }}">
                                                    {{ $item->inisiator }}
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="mb-3" id="inisiatorForm" style="display: none;">
                                <label for="" class="form-label">Nama Inisiator</label>
                                <input type="text" class="form-control" name="nama_inisiator">
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Bentuk Inovasi Masyarakat</label>
                                <select class="form-select @error('bentuk_inovasi_daerah_id') is-invalid @enderror"
                                    name="bentuk_inovasi_daerah_id">
                                    @if($inovasi->bentuk_inovasi_daerah_id)
                                    <option value="{{ $inovasi->bentuk_inovasi_daerah_id }}">{{ $inovasi->bentuk_inovasi_daerah->bentuk }}</option>
                                    @else   
                                    <option value="0">Silahkan Pilih</option>
                                    @endif    
                                    @foreach ($bentukInovasis as $row)
                                        <option value="{{ $row->id }}">{{ $row->bentuk }}</option>
                                    @endforeach
                                </select>
                                @error('bentuk_inovasi_daerah_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Tematik</label>
                                <select class="form-select @error('tematik_id') is-invalid @enderror" name="tematik_id">
                                    @if($inovasi->tematik_id)
                                    <option value="{{ $inovasi->tematik_id }}">{{ $inovasi->tematik->tematik }}</option>
                                    @else 
                                    <option value="0">Silahkan Pilih</option>
                                    @endif
                                    @foreach ($tematiks as $row)
                                        <option value="{{ $row->id }}">{{ $row->tematik }}</option>
                                    @endforeach
                                </select>
                                @error('tematik_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Urusan pemerintahan</label>

                                <div class="row mb-3">
                                    <div class="col-lg-3">
                                        Urusan utama :
                                    </div>
                                    <div class="col-lg-9">
                                            <select class="form-select @error('urusan_utama_id') is-invalid @enderror" name="urusan_utama_id">
                                                @if($inovasi->urusan_utama_id)
                                                <option value="{{ $inovasi->urusan_utama_id }}">{{ $inovasi->urusan_utama->urusan }}</option>
                                                @else      
                                                <option value="0">Pilih</option>
                                                @endif  
                                                @foreach ($urusanUtamas as $row)
                                                    <option value="{{ $row->id }}">{{ $row->urusan }}</option>
                                                @endforeach
                                            </select>
                                            @error('urusan_utama_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3">
                                        Urusan lain yang beririsan :
                                    </div>
                                    <div class="col-lg-9">
                                            <select class="form-select @error('urusan_lain_id') is-invalid @enderror" name="urusan_lain_id">
                                                @if($inovasi->urusan_lain_id)
                                                <option value="{{ $inovasi->urusan_lain_id }}">{{ $inovasi->urusan_lain->urusan }}</option>
                                                @else      
                                                <option value="0">Pilih</option> 
                                                @endif
                                                @foreach ($urusanLains as $row)
                                                    <option value="{{ $row->id }}">{{ $row->urusan }}</option>
                                                @endforeach
                                            </select>
                                            @error('urusan_lain_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                    </div>
                                </div>

                            </div>

                            <div class="mb-3">
                                <label for="datepicker" class="form-label">Waktu uji coba inovasi masyarakat</label>
                                <input id="datepicker" type="date" name="waktu_uji_coba" value="{{ old('waktu_uji_coba', $inovasi->waktu_uji_coba) }}" class="form-control @error('waktu_uji_coba') is-invalid @enderror datepicker">
                                @error('waktu_uji_coba')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="datepicker" class="form-label">Waktu penerapan inovasi masyarakat</label>
                                <input id="datepicker" type="date" name="waktu_penerapan" value="{{ old('waktu_penerapan', $inovasi->waktu_penerapan) }}" class="form-control @error('waktu_penerapan') is-invalid @enderror datepicker">
                                @error('waktu_penerapan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Rancang bangun (Minimal 350 kata)</label>
                                <input id="rancang_bangun" type="hidden" name="rancang_bangun">
                                <trix-editor input="rancang_bangun">{{ strip_tags(old('rancang_bangun', $inovasi->rancang_bangun)) }}</trix-editor>
                                @error('rancang_bangun')
                                <div class="invalid-feedbac text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                                <strong><small id="rancang">0 words</small></strong>
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Tujuan inovasi daerah</label>
                                <input id="tujuan_inovasi" type="hidden" name="tujuan_inovasi">
                                <trix-editor input="tujuan_inovasi">{{ strip_tags(old('tujuan_inovasi', $inovasi->tujuan_inovasi)) }}</trix-editor>
                                @error('tujuan_inovasi')
                                <div class="invalid-feedbac text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                                <strong><small id="tujuan">0 words</small></strong>
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Manfaat yang diperoleh</label>
                                <input id="manfaat_diperoleh" type="hidden" name="manfaat_diperoleh">
                                <trix-editor input="manfaat_diperoleh">{{ strip_tags(old('manfaat_diperoleh', $inovasi->manfaat_diperoleh)) }}</trix-editor>
                                @error('manfaat_diperoleh')
                                <div class="invalid-feedbac text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                                <strong><small id="manfaat">0 words</small></strong>
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Hasil inovasi</label>
                                <input id="hasil_inovasi" type="hidden" name="hasil_inovasi">
                                <trix-editor input="hasil_inovasi">{{ strip_tags(old('hasil_inovasi', $inovasi->hasil_inovasi)) }}</trix-editor>
                                @error('hasil_inovasi')
                                <div class="invalid-feedbac text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                                <strong><small id="hasil">0 words</small></strong>
                            </div>


                            <div class="mb-3">
                               <div class="card p-3">
                                    <label for="" class="form-label">Anggaran (Jika diperlukan)</label>
                                    <input type="file" name="anggaran" class="form-control @error('anggaran') is-invalid @enderror" value="{{ old('anggaran') }}">
                                    <small><p>Dokumen PDF, Maksimal 2MB</p></small>
                                    @error('anggaran')
                                    <div class="invalid-feedback">
                                       {{ $message }}
                                    </div>
                                    @enderror
                               </div>
                            </div>

                            <div class="mb-3">
                                <div class="card p-3">
                                     <label for="" class="form-label">Profil Bisnis (.ppt) (Jika ada)</label>
                                     <input type="file" name="profil_bisnis" class="form-control @error('profil_bisnis') is-invalid @enderror" value="{{ old('profil_bisnis') }}">
                                     <small><p>Dokumen PDF, Maksimal 2MB</p></small>
                                     @error('profil_bisnis')
                                     <div class="invalid-feedback">
                                        {{ $message }}
                                     </div>
                                     @enderror
                                </div>
                             </div>

                            {{-- @include('dashboard.component.footer_card') --}}
                            <div class="mt-5 mb-3">
                                <a href="{{ route('dashboard.inovasi.masyarakat') }}" class="btn btn-danger btn-sm">Batal</a>
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

