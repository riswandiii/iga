@extends('dashboard.layouts.index')

@section('content')
    <div class="contaiener">
        {{-- Table --}}
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <div class="row mb-3">
                            <div class="col-lg-12">
                                <h3>Provinsi Sulawesi Selatan</h3>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <h3>{{ $page }}</h3>
                        </div>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                       
                    </div>
                </div>
            </div>
        </div>
        {{-- End table --}}
    </div>
@endsection
