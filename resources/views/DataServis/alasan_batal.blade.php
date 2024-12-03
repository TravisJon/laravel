@extends('layout.master')
@section('title', 'Alasan Pembatalan')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Pembatalan Servis untuk Pelanggan {{ $dataServis->datapelanggan->nama }}
                    </h5>
                    <form action="{{ route('data_servis.storePembatalan', $dataServis->id) }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="alasan_pembatalan" class="form-label"> Berikan Alasan Pembatalan</label>
                            <textarea id="alasan_pembatalan" name="alasan_pembatalan" class="form-control" rows="4" required></textarea>
                        </div>
                        <input type="hidden" name="status" value="Batal">
                        <div class="d-flex justify-content-between">
                            <a href="{{ url('/dataservis/status/diproses') }}" class="btn btn-danger"><i
                                    class="ri-arrow-left-line"></i> Back</a>
                            <button type="submit" class="btn btn-primary"><i class="ri-save-line"></i> Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
