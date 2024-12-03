@extends('layout.master')
@section('title', 'Laporan Per Teknisi')
@section('content')
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="card-title">Laporan Per Teknisi</h5>
                    </div>

                    <!-- Form Input Tanggal Mulai dan Tanggal Akhir -->
                    <form method="GET" action="{{ route('laporan_perteknisi') }}">
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="dari"><strong>Dari</strong></label>
                                <input type="date" id="dari" name="dari" class="form-control" required
                                    value="{{ request('dari') }}">
                            </div>
                            <div class="col-md-4">
                                <label for="sampai"><strong>Sampai</strong></label>
                                <input type="date" id="sampai" name="sampai" class="form-control" required
                                    value="{{ request('sampai') }}">
                            </div>
                            <div class="col-md-4 align-self-end">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>

                    <!-- Pesan jika data tidak tersedia -->
                    @if (isset($noDataMessage))
                        @if ($noDataMessage === 'Tidak ada data teknisi yang tersedia untuk rentang tanggal yang dipilih.')
                            <div class="alert alert-danger mt-4 text-center">
                                {{ $noDataMessage }}
                            </div>
                        @elseif ($noDataMessage === 'Silakan pilih rentang tanggal untuk menampilkan laporan.')
                            <div class="alert alert-info mt-4 text-center">
                                {{ $noDataMessage }}
                            </div>
                        @endif
                    @endif

                    <!-- Tabel Laporan Per Teknisi -->
                    @if ($data->isNotEmpty())
                        <div class="mb-2">
                            <a href="{{ route('pdf_laporan_perteknisi', ['dari' => $dari, 'sampai' => $sampai]) }}"
                                target="_blank" class="btn btn-dark">PDF</a>
                        </div>

                        <div class="table-responsive">
                            <table class="table datatable table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Teknisi</th>
                                        <th>Jumlah Servis</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $index => $item)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $item->user->nama }}</td>
                                            <td>{{ $item->datapelanggan }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
