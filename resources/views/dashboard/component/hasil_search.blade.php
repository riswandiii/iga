{{-- @if (request('search'))
    @if ($datas->count() > 0)
        <p><small>Search: <strong style="font-style: italic">"{{ request('search') }}"
                </strong>ditemukan</small>
        </p>
    @else
        <p><small>Search: <strong style="font-style: italic">"{{ request('search') }}"
                </strong>tidak
                ditemukan</small></p>
    @endif
@endif --}}


@if (request('tahapan'))
@if (request('search'))
        <strong></strong><small style="font-style: italic"> "{{ request('tahapan') }}"</small> <strong></strong><small style="font-style: italic"> "{{ request('search') }}"
        </small>
@else
    <strong></strong><small style="font-style: italic">"{{ request('tahapan') }}"
    </small>
@endif
@elseif(request('search'))
    <strong></strong><small style="font-style: italic">"{{ request('search') }}"
    </small>
@else
{{-- <h1 class="fashion_taital">Data Product Yang Tersedia</h1> --}}
@endif
