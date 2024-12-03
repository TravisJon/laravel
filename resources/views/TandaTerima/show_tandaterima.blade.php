@extends('layout.master')
@section('title', 'Cetak Tanda Terima Servis')
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
                                                <h3><strong>The Computer Store (TCS) Servis</strong></h3>
                                            </th>
                                        </tr>
                                    </table>
                                    <div class="contact-info text-center">
                                        <div>JL. Tuanku Tambusai No. 12B, Kecamatan Payung Sekaki, Kota Pekanbaru, Riau
                                            28292.</div>
                                        <div>No. Telepon: 081319248598</div>
                                        <div>Email: tcsservis@gmail.com</div>
                                    </div>

                                    <!-- Tanda Terima -->
                                    <table class="table table-bordered mt-4">
                                        <tr>
                                            <th class="text-center">
                                                <h5><strong>TANDA TERIMA SERVIS</strong></h5>
                                            </th>
                                        </tr>
                                    </table>

                                    <!-- Detail Pelanggan -->
                                    <table class="table table-bordered">
                                        <tr>
                                            <td>
                                                <p><strong>Pelanggan : {{ $db->datapelanggan->nama }}</strong></p>
                                                <p>Alamat : {{ $db->datapelanggan->alamat }}</p>
                                                <p>No.Hp : {{ $db->datapelanggan->no_telepon }}</p>
                                                <p>Email : {{ $db->datapelanggan->email }}</p>
                                            </td>
                                            <td>
                                                <p><strong>No.Servis : {{ $db->id }}</strong></p>
                                                <p>Kasir : {{ $db->kasir }}</p>
                                                <p>Teknisi Perbaikan : {{ $db->user->nama }}</p>
                                                <p>Tgl Terima :
                                                    {{ \Carbon\Carbon::parse($db->datapelanggan->created_at)->format('d-m-Y - H:i') }}
                                                </p>
                                            </td>
                                        </tr>
                                    </table>

                                    <!-- Rincian Barang -->
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr class="text-center">
                                                <th>No</th>
                                                <th>Jenis Barang</th>
                                                <th>Tipe</th>
                                                <th>Serial Number</th>
                                                <th>Kelengkapan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1.</td>
                                                <td>{{ $db->jenisbarang->nama }}</td>
                                                <td>{{ $db->tipe }}</td>
                                                <td>{{ $db->serial_number }}</td>
                                                <td>{{ $db->kelengkapan }}</td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <!-- Keterangan -->
                                    <table class="table table-bordered">
                                        <tr>
                                            <td><strong>Kerusakan:</strong> {{ $db->kerusakan }}</td>
                                        </tr>
                                    </table>
                                    <table class="table table-bordered">
                                        <tr>
                                            <td><strong>Catatan:</strong> {{ $db->catatan }}</td>
                                        </tr>
                                    </table>

                                    <!-- Tanda Tangan -->
                                    <table class="table table-bordered text-center">
                                        <tr>
                                            <td>
                                                <p><strong>Kasir Penerima,</strong></p>
                                                <br><br>
                                                <p>{{ $db->kasir }}</p>
                                            </td>
                                            {{-- <td>
                                                <h5><strong>Teknisi,</strong></h5>
                                                <br><br>
                                                <p>{{ $db->user->nama }}</p>
                                            </td> --}}
                                            <td>
                                                <p><strong>Pelanggan,</strong></p>
                                                <br><br>
                                                <p>{{ $db->datapelanggan->nama }}</p>
                                            </td>
                                        </tr>
                                    </table>

                                    <!-- Tombol Navigasi -->
                                    <div class="d-flex justify-content-between mt-2">
                                        <a href="{{ route('tandaterima') }}" class="btn btn-danger">
                                            <i class="ri-arrow-left-line"></i> Back</a>
                                        <a href="{{ route('cetak.tandaterima', ['id' => $db->id]) }}" target="_blank"
                                            class="btn btn-primary">
                                            <i class="ri-printer-line"></i> Cetak</a>
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
