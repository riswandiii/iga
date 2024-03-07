<?php
$footer = App\Models\FooterDashboard::all();
?>

<footer class="footer pt-3">
    <div class="container-fluid bg-light">
        <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-12 mt-4">
                @if ($footer->count() > 0)
                    @foreach ($footer as $row)
                        <h6>{{ $row->jenis }}</h6>
            </div>
            <div class="col-lg-12 mb-4">
                <small>
                    {{ $row->isi }}
                </small>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 mb-4">
                <a href="{{ route('dokumen') }}" class="btn btn-primary btn-sm">Petunjuk Teknis</a>
            </div>
            {{-- <div class="col-lg-6 text-end">
                <small><img src="{{ asset('storage/' . $row->image) }}" width=20" alt=""> © {{ $row->copyright }}</small>
            </div> --}}
        </div>
        @endforeach
        @endif
        {{-- <div class="copyright text-center text-sm text-muted text-lg-start">
                ©
                <script>
                    document.write(new Date().getFullYear())
                </script>,
                made with <i class="fa fa-heart"></i> by
                <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Creative Tim</a>
                for a better web.
            </div> --}}
    </div>
</footer>
