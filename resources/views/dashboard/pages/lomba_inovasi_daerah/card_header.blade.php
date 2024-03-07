<div class="card p-3">
    <h5>Harap diperhatikan!</h5>
    @if($perhatikans->count() > 0)
        @foreach ($perhatikans as $row)
        <small>{{ $row->isi }}</small>
        @endforeach
    @endif
</div>