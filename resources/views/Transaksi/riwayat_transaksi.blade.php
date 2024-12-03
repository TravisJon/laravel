@extends('layout.master')
@section('title', 'Riwayat Transaksi')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between allign-items-center">
                        <h5 class="card-title">Riwayat Transaksi</h5>
                        <div class="gap-3 mt-3">
                            <a href="/pdf_transaksi" target="_blank" class="btn btn-dark">PDF</a>
                        </div>
                    </div>

                    <!-- Table with stripped rows -->
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Tgl Diambil</th>
                                <th scope="col">Pelanggan</th>
                                <th scope="col">Kasir</th>
                                <th scope="col">Teknisi</th>
                                <th scope="col">Barang</th>
                                <th scope="col">Total</th>
                                <th scope="col">Status</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($db as $data)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ \Carbon\Carbon::parse($data->updated_at)->format('d-m-Y') }}</td>
                                    <td>{{ $data->datapelanggan->nama }}</td>
                                    <td>{{ $data->kasir }}</td>
                                    <td>{{ $data->user->nama }}</td>
                                    <td>{{ $data->jenisbarang->nama }}</td>
                                    <td>
                                        @php
                                            $total = 0;
                                        @endphp
                                        @foreach ($data->transaksi as $item)
                                            @php
                                                $total += $item->barangJasa->harga_jual * $item->qty;
                                            @endphp
                                        @endforeach
                                        {{ 'Rp. ' . number_format($total) }}
                                    </td>
                                    <td>
                                        @if ($data->status == 'Diambil')
                                            <span class="badge bg-secondary">{{ $data->status }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('cetak_nota', ['id' => $data->id]) }}" target="_blank"
                                            class="btn btn-sm btn-info mb-2"><i class="bi bi-info-circle"></i></a>
                                        {{-- <a href="{{ route('delete-riwayat-transaksi', $data->id) }}"
                                            class="btn btn-sm btn-danger mb-2" data-confirm-delete="true"><i
                                                class="bi bi-exclamation-triangle"></i></a> --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- End Table with stripped rows -->
                </div>
            </div>
        </div>
    </div>
@endsection
