@extends('layout.master')
@section('title', 'Edit Barang/Jasa')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="card-title">Edit Barang/Jasa</h5>
                    </div>

                    <form class="needs-validation" action="{{ url('/updatebarangjasa', ['id' => $data->id]) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $data->id }}">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama"
                                value="{{ $data->nama }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="tipe" class="form-label">Tipe</label>
                            <select class="form-select" name="tipe" required>
                                <option value="Barang" {{ $data->tipe == 'Barang' ? 'selected' : '' }}>Barang</option>
                                <option value="Jasa" {{ $data->tipe == 'Jasa' ? 'selected' : '' }}>Jasa</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="harga_jual" class="form-label">Harga Jual</label>
                            <input type="number" class="form-control" id="harga_jual" name="harga_jual"
                                value="{{ $data->harga_jual }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="gambar" class="form-label">Gambar</label>
                            <input type="file" class="form-control" id="gambar" name="gambar">
                            @if ($data->gambar)
                                <img src="{{ asset('storage/barangdanjasa/' . $data->gambar) }}" alt="Current Picture"
                                    style="width: 150px; height: auto; margin-top: 10px;">
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="stok" class="form-label">Stok (Hanya untuk Barang)</label>
                            <input type="number" class="form-control" id="stok" name="stok"
                                value="{{ $data->tipe == 'Barang' ? $data->stok : '' }}">
                            @if ($data->tipe == 'Jasa')
                                <small class="form-text text-muted">Stok tidak berlaku untuk jasa.</small>
                            @endif
                        </div>
                        <div class="d-flex justify-content-between">
                            <a href="{{ url('/barangjasa') }}" class="btn btn-danger"><i class="ri-arrow-left-line"></i>
                                Back</a>
                            <button type="submit" class="btn btn-primary"><i class="ri-save-line"></i> Submit</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
