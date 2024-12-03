@extends('layout.master')
@section('title', 'Nota Transaksi')
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="card mt-2">
                    <div class="card-body">
                        <div class="x_content">
                            <div class="row">
                                <div class="col-xs-12">
                                    <!-- Header Toko -->
                                    <table class="table table-bordered mt-4">
                                        <tr>
                                            <th class="text-center">
                                                <h3><strong>The Computer Store (TCS)</strong></h3>
                                            </th>
                                        </tr>
                                    </table>
                                    <div class="contact-info text-center">
                                        <div>JL.Tuanku Tambusai No. 12B, Kecamatan Payung Sekaki, Kota Pekanbaru, Riau
                                            28292.</div>
                                        <div>No.Telepon: 081319248598</div>
                                        <div>Gmail: tcsservis@gmail.com</div>
                                    </div>

                                    <!-- Tanda Terima Servis -->
                                    <table class="table table-bordered mt-4">
                                        <tr>
                                            <th class="text-center">
                                                <h5><strong>NOTA TRANSAKSI</strong></h5>
                                            </th>
                                        </tr>
                                    </table>

                                    <!-- Detail Transaksi -->
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>No. Servis</th>
                                            <td>{{ $dataservisID->id }}</td>
                                        </tr>
                                        <tr>
                                            <th>Tgl. Terima</th>
                                            <td>{{ \Carbon\Carbon::parse($dataservisID->datapelanggan->created_at)->format('d-m-Y - H:i') }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Tgl. Diambil</th>
                                            <td>{{ \Carbon\Carbon::parse($dataservisID->updated_at)->format('d-m-Y - H:i') }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Pelanggan</th>
                                            <td>{{ $dataservisID->datapelanggan->nama }}</td>
                                        </tr>
                                        <tr>
                                            <th>Jenis Barang</th>
                                            <td>{{ $dataservisID->jenisbarang->nama }}</td>
                                        </tr>
                                        <tr>
                                            <th>Kerusakan</th>
                                            <td>{{ $dataservisID->kerusakan }}</td>
                                        </tr>
                                        <tr>
                                            <th>Status Servis</th>
                                            <td>{{ $dataservisID->status }}</td>
                                        </tr>
                                        <tr>
                                            <th>Kasir</th>
                                            <td>{{ $dataservisID->kasir }}</td>
                                        </tr>
                                    </table>

                                    <!-- Rincian Biaya -->
                                    <table class="table table-bordered mt-4">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Barang/Jasa</th>
                                                <th>Harga Satuan</th>
                                                <th>Qty</th>
                                                <th>Total Harga</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($transaksi as $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $item->barangJasa->nama }}</td>
                                                    <td>Rp. {{ number_format($item->barangJasa->harga_jual) }}
                                                    </td>
                                                    <td>{{ $item->qty }}</td>
                                                    <td>Rp.
                                                        {{ number_format($item->barangJasa->harga_jual * $item->qty) }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th colspan="4" class="text-right">Total Biaya</th>
                                                <th>Rp. {{ number_format($total) }}</th>
                                            </tr>
                                        </tfoot>
                                    </table>

                                    <!-- Tombol Kembali dan Cetak -->
                                    <div class="d-flex justify-content-between mt-2">
                                        <a href="{{ route('pengambilan') }}" class="btn btn-danger">
                                            <i class="ri-arrow-left-line"></i> Back
                                        </a>
                                        <a href="{{ route('cetak_nota', ['id' => $dataservisID->id]) }}" target="_blank"
                                            class="btn btn-primary">
                                            <i class="ri-printer-line"></i> Cetak
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
