@extends('layouts.index')

@section('content')
    <div class="py-5">
        <h1 style="text-align: center; font-weight: 700; padding-top: 20px; padding-bottom: 20px;">Petunjuk Teknis</h1>
        <div class="container mt-3">
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Dokumen</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($petunjukTeknis->count() > 0)
                                    @foreach ($petunjukTeknis as $row)
                                    <tr>
                                        <td>{{ ($petunjukTeknis->currentPage() - 1) * $petunjukTeknis->perPage() + $loop->iteration }}</td>
                                        <td>{{ $row->judul }}</td>
                                        <td><a href="{{ asset('storage/' . $row->file_petunjuk) }}" target="_blank" title="Download"><i class="bi bi-cloud-download text-dark"></i></a></td>
                                    </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                        <div class="">
                            {{ $petunjukTeknis->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@yield('content')

@endsection

