<!-- Modal -->
@foreach ($datas as $data)
<form action="{{ route('dashboard.indikator.CreateOrUpdate') }}" method="post">
    @csrf

    <input type="hidden" name="indikator_id" value="{{ $data->id }}">
    <input type="hidden" name="inovasi_pemerintah_daerah_id" value="{{ $inovasi->id }}">

    <div class="modal fade" id="exampleModal-{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah data indikator</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
             <h7>{{ $loop->iteration }}. {{ $data->indikator }}</h7>
             <div class="mt-2">
                <small>{{ $data->keterangan }}</small>
             </div>
             <?php
                $parameters = \App\Models\Parameter::where('indikator_id', $data->id)->get();
             ?>
            <div class="py-3">
                <select class="form-select" aria-label="Default select example" name="parameter_id" required>
                    <option value="">Pilih</option>
                    @foreach ($parameters as $row)
                    <option value="{{ $row->id }}">{{ $row->parameter }} - {{ $row->bobot }}</option>
                    @endforeach
                  </select>
            </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-warning btn-sm" data-bs-dismiss="modal">Close</button> 
              <button type="submit" class="btn btn-primary btn-sm">Save changes</button>
            </div>
          </div>
        </div>
      </div>
</form>
@endforeach

