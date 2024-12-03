{{-- @extends('layout.master')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <a href="{{ route('addtandaterima') }}" class="btn btn-danger">
                        <i class="fa fa-arrow-left"></i> Kembali
                    </a>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-xs-12">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>VC Service</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Bandung 081319248598 vcservice@gmail.com</td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-bordered">
                                <tr>
                                    <th class="text-center">
                                        <h1>TANDA TERIMA SERVICE</h1>
                                    </th>
                                </tr>
                            </table>
                            <table class="table table-bordered">
                                @foreach ($db as $data)
                                    <tr>
                                        <td>
                                            <p>Pelanggan : {{ $data->datapelanggan->nama }}</p>
                                            <p>Alamat : {{ $data->datapelanggan->alamat }}</p>
                                            <p>No Telepon : {{ $data->datapelanggan->no_telepon }}</p>
                                            <p>Email : {{ $data->datapelanggan->email }}</p>
                                        </td>
                                        <td>
                                            <p>No Service : {{ $data->id }}</p>
                                            <p>Tanggal : {{ $data->datapelanggan->created_at }}</p>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Jenis Barang</th>
                                        <th>Serial Number</th>
                                        <th>Kelengkapan</th>
                                        <th>Kerusakan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($db as $data)
                                        <tr>
                                            <td>1</td>
                                            <td>{{ $data->jenisbarang->nama }}</td>
                                            <td>{{ $data->serial_number }}</td>
                                            <td>{{ $data->kelengkapan }}</td>
                                            <td>{{ $data->kerusakan }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <table class="table table-bordered">
                                @foreach ($db as $data)
                                    <tr>
                                        <td colspan="5">Keterangan : {{ $data->catatan }}</td>
                                    </tr>
                                @endforeach
                            </table>
                            <table class="table table-bordered text-center">
                                @foreach ($db as $data)
                                    <tr>
                                        <td colspan="1">
                                            <h3>Teknisi Penerima,</h3>
                                            <br><br>
                                            <p>{{ $data->user->name }}</p>
                                        </td>
                                        <td colspan="1">
                                            <h3>Pelanggan,</h3>
                                            <br><br>
                                            <p>{{ $data->datapelanggan->nama }}</p>
                                        </td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="4">Barang yang telah diservice dan tidak diambil dalam waktu 30 hari
                                        setelah konfirmasi, kehilangan dan lain-lain yang terjadi pada barang tersebut bukan
                                        tanggung jawab kami.</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection --}}
