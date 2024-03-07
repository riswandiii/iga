@foreach ($datas as $row)
<!-- Modal -->
<div class="modal fade" id="unduhExcel-{{ $row->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
 <div class="modal-dialog">
   <div class="modal-content">
     <div class="modal-header">
       <h7 class="modal-title fs-5" id="exampleModalLabel">Unduh Excel (XLS)</h7>
       <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
     </div>
     <div class="modal-body">
       <p>Unduh Excel (XLS) {{ $row->nama_inovasi }} . Apakah anda yakin?</p>
     </div>
     <div class="modal-footer">
       <button type="button" class="btn btn-sm btn-warning" data-bs-dismiss="modal">Batal</button>
       <a href="{{ route('dashboard.inovasi.daerah.excel', $row->id) }}" class="btn btn-sm btn-primary" target="_BLANK">Ya</a>
     </div>
   </div>
 </div>
</div>
 {{-- End modal --}}
@endforeach