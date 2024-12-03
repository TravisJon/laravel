@extends('layout.master')
@section('title', 'Add Jenis Barang')
@section('content')
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between allign-items-center">
                        <h5 class="card-title">Add Jenis Barang</h5>
                    </div>
                    <form class="needs-validation" action="{{ url('/storejenisbarang') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nama Jenis Barang</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="nama" required>
                            {{-- <div class="invalid-feedback">Silakan masukkan Jenis Barang!</div> --}}
                        </div>
                        <div class="d-flex justify-content-between">
                            <a href="{{ url('/jenisbarang') }}" class="btn btn-danger"><i class="ri-arrow-left-line"></i>
                                Back</a>
                            <button type="submit" class="btn btn-primary"><i class="ri-save-line"></i> Submit</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
