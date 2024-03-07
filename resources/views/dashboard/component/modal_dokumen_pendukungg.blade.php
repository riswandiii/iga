  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Upload Dokumen Pendukung</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{ route('dashboard.dokumen.pendukung.storee') }}" method="Post" enctype="multipart/form-data">
            @csrf 
            <input type="hidden" name="inovasi_masyarakat_id" value="{{ $inovasi->id }}">
            <input type="hidden" name="indikator_id" value="{{ $indikator->id }}">
            @if($indikator->status == 'surat')
            <div class="mb-3">
                <label for="" class="form-label">Nomor Surat / Dokumen</label>
                <input type="text" class="form-control" name="nomor_surat" required>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Tanggal Surat / Dokumen</label>
                <input type="date" class="form-control" name="tanggal_surat" required>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Tentang</label>
                <input type="text" class="form-control" name="tentang" required>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Pilih Dokumen</label>
                <input type="file" class="form-control" name="dokumen" required>
            </div>
            @elseif($indikator->status == 'pdf_gambar')
            <div class="mb-3">
              <label for="" class="form-label">Tentang</label>
              <input type="text" class="form-control" name="tentang" required>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Pilih Dokumen</label>
                <input type="file" class="form-control" name="dokumen" required>
            </div>
            @else  
            <div class="mb-3">
              <label for="" class="form-label">Judul Video</label>
              <input type="text" class="form-control" name="tentang" required>
            </div>
            <div class="mb-3">
              <label for="" class="form-label">URL Youtube / Google Drive*</label>
              <input type="text" class="form-control" name="link" required>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Gambar Cover Video</label>
                <input type="file" class="form-control" name="dokumen" required>
            </div>
            @endif
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-warning btn-sm" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary btn-sm">Save changes</button>
        </div>
      </div>
    </div>
  </div>
</form>