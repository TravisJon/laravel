@extends('layout.master')
@section('title', 'Add Barang Dan Jasa')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <br>
                        <tr>
                            <th>ID SERVIS</th>
                            <th>{{ $dataservisID->id }}</th>
                        </tr>
                        <tr>
                            <th>Nama Pelanggan</th>
                            <td>{{ $dataservisID->datapelanggan->nama }}</td>
                            <th>Kelengkapan</th>
                            <td>{{ $dataservisID->kelengkapan }}</td>
                        </tr>
                        <tr>
                            <th>Jenis Barang</th>
                            <td>{{ $dataservisID->jenisbarang->nama }}</td>
                            <th>Serial Number</th>
                            <td>{{ $dataservisID->serial_number }}</td>
                        </tr>
                        <tr>
                            <th>Kerusakan</th>
                            <td>{{ $dataservisID->kerusakan }}</td>
                            <th>Catatan</th>
                            <td>{{ $dataservisID->catatan }}</td>
                        </tr>
                    </table>

                    <div class="col-md-12">
                        <form action="{{ route('add-barang-jasa', $dataservisID->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="col-12 p-2">
                                <label for="inputNama4" class="form-label fw-bold">Item Barang dan Jasa</label>
                                <select name="barang_jasa_id" id="inputNama4" class="form-select">
                                    <option selected>Pilih Barang / Jasa</option>
                                    @foreach ($barangjasa as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                    @endforeach
                                </select>
                                <div class="d-flex justify-content-center mt-3">
                                    <button type="submit" class="btn btn-primary col-md-6">
                                        <i class="bi bi-plus-square"></i> Tambah Item
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="col-md-12">
                        <table class="table table-responsive table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Barang/Jasa</th>
                                    <th>Harga</th>
                                    <th>Qty</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $total = 0;
                                @endphp
                                @foreach ($addBarangJasa as $item)
                                    @php
                                        $total += $item->barangJasa->harga_jual * $item->qty; // Hitung total dengan qty
                                    @endphp
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->barangJasa->nama }}</td>
                                        <td>Rp. {{ number_format($item->barangJasa->harga_jual) }}</td>
                                        <td>{{ $item->qty }}</td>
                                        <td>
                                            <a href="{{ route('delete-barang-jasa', $item->id) }}"
                                                class="btn btn-danger btn-sm rounded">
                                                <i class="bi bi-trash3"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="2">Total Biaya</th>
                                    <th colspan="2">Rp. {{ number_format($total) }}</th>
                                </tr>
                            </tfoot>
                        </table>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('dataservis.baru') }}" class="btn btn-danger"><i
                                    class="ri-arrow-left-line"></i> Back</a>
                            <a href="{{ route('data-servis.servis-selesai', $dataservisID->id) }}"
                                class="btn btn-primary"><i class="ri-save-line"></i> Submit</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
