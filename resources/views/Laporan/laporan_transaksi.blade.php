@extends('layout.master')
@section('title', 'Laporan Transaksi')
@section('content')
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="card-title">Laporan Transaksi</h5>
                    </div>

                    <!-- Form Input Tanggal Mulai dan Tanggal Akhir -->
                    <form method="GET" action="{{ route('laporan_transaksi') }}">
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
                        @if ($noDataMessage === 'Tidak ada data transaksi yang tersedia untuk rentang tanggal yang dipilih.')
                            <div class="alert alert-danger mt-4 text-center">
                                {{ $noDataMessage }}
                            </div>
                        @elseif ($noDataMessage === 'Silakan pilih rentang tanggal untuk menampilkan laporan.')
                            <div class="alert alert-info mt-4 text-center">
                                {{ $noDataMessage }}
                            </div>
                        @endif
                    @endif

                    <!-- Tabel Laporan Transaksi -->
                    @if ($data->isNotEmpty())
                        <div class="mb-2">
                            <a href="{{ route('pdf_laporan_transaksi', ['dari' => $dari, 'sampai' => $sampai]) }}"
                                target="_blank" class="btn btn-dark">PDF</a>
                        </div>

                        <div class="table-responsive">
                            <table class="table datatable table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Barang/Jasa</th>
                                        <th>Harga Jual</th>
                                        <th>QTY</th>
                                        <th>Sub Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $index => $item)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d-m-Y') }}</td>
                                            <td>{{ $item->barangJasa->nama }}</td>
                                            <td>{{ number_format($item->barangJasa->harga_jual) }}</td>
                                            <td>{{ $item->qty }}</td>
                                            <td>{{ number_format($item->barangJasa->harga_jual * $item->qty) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <tfoot>
                                <tr>
                                    <th><strong>Total Pendapatan</strong></th>
                                    <th><strong>Rp. {{ number_format($total) }}</strong></th>
                                </tr>
                            </tfoot>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
