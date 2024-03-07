@extends('layouts.index')
<style>
    #link:hover{
       background-color: black;
       opacity: 0.4;
    }
</style>
@section('content')
    <div class="py-5">
        <h1 style="text-align: center; font-weight: 700; padding-top: 20px; padding-bottom: 20px;">Pengumuman</h1>
        <div class="container mt-3">
            <div class="row">
                <div class="col-lg-12">
                  @if($pengumumans->count() > 0)
                   <div class="card p-3">
                        <div class="card-body">
                            @foreach ($pengumumans as $row)
                            <div class="mb-4">
                            <small>{{ \Carbon\Carbon::parse($row->tanggal)->format('d/m/Y') }}</small>
                            <a href="" id="link" class="text-decoration-none text-dark" data-bs-toggle="modal" data-bs-target="#pengumuman-pdf/{{ $row->id }}"><h5>{{ $row->judul }}</h5></a>
                            </div>
                            @endforeach
                        </div>
                   </div>
                   <div class="py-3">
                      {{ $pengumumans->links() }}
                   </div>
                   @endif
                </div>
            </div>
        </div>
    </div>

   <!-- Modal Pengukuran -->
   @foreach ($pengumumans as $row)
    <div class="modal fade" id="pengumuman-pdf/{{ $row->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <p class="modal-title fs-5" id="exampleModalLabel">Pengumuman</p>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <h5>{{ $row->judul }}</h5>
              <small>{{ $row->judul }}</small>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Batal</button>
            <a href="{{ asset('storage/' . $row->pdf_file) }}" target="_blank" class="btn btn-primary btn-sm text-white">Unduh</a>
          </div>
        </div>
      </div>
    </div>
   @endforeach

@endsection

