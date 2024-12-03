@extends('layout.master')
@section('title', 'Add Barang/Jasa')
@section('content')
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between allign-items-center">
                        <h5 class="card-title">Add Barang/Jasa</h5>
                    </div>
                    <form class="needs-validation" action="{{ url('/storebarangjasa') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="nama"
                                value="{{ old('nama') }}" required>
                            {{-- <div class="invalid-feedback">Silakan masukkan nama barang!</div> --}}
                        </div>
                        <div class="mb-3">
                            <label for="tipe" class="form-label">Tipe</label>
                            <select class="form-select" aria-label="Default select example" name="tipe" required>
                                <option value="" disabled {{ old('tipe') ? '' : 'selected' }}>Pilih Tipe</option>
                                <option value="Barang" {{ old('tipe') == 'Barang' ? 'selected' : '' }}>Barang</option>
                                <option value="Jasa" {{ old('tipe') == 'Jasa' ? 'selected' : '' }}>Jasa</option>
                            </select>
                            {{-- <div class="invalid-feedback">Silakan pilih tipe.</div> --}}
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Harga Jual</label>
                            <input type="number" class="form-control" id="exampleInputPassword1" name="harga_jual"
                                value="{{ old('harga_jual') }}" required>
                            {{-- <div class="invalid-feedback">Silakan masukkan harga jual!</div> --}}
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Gambar</label>
                            <input type="file" class="form-control" id="exampleInputPassword1" name="gambar">
                        </div>
                        <div class="mb-3">
                            <label for="stok" class="form-label">Stok (Hanya untuk Barang)</label>
                            <input type="number" class="form-control" id="stok" name="stok"
                                value="{{ old('stok') }}">
                            @error('stok')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
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
