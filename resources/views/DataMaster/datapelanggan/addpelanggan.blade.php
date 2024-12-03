@extends('layout.master')
@section('title', 'Add Pelanggan')
@section('content')
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between allign-items-center">
                        <h5 class="card-title">Add Data Pelanggan</h5>
                    </div>
                    <form class="needs-validation" action="{{ url('/storepelanggan') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="nama" required>
                            {{-- <div class="invalid-feedback">Silakan masukkan Nama!</div> --}}
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">No.Hp</label>
                            <input type="number" class="form-control" id="exampleInputPassword1" name="no_telepon"
                                required>
                            {{-- <div class="invalid-feedback">Silakan masukkan No.Telepon!</div> --}}
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Email</label>
                            <input type="email" class="form-control" id="exampleInputPassword1" name="email">
                            {{-- <div class="invalid-feedback">Silakan masukkan Email!</div> --}}
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Alamat</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" name="alamat">
                            {{-- <div class="invalid-feedback">Silakan masukkan Alamat!</div> --}}
                        </div>
                        <div class="d-flex justify-content-between">
                            <a href="{{ url('/datapelanggan') }}" class="btn btn-danger"><i class="ri-arrow-left-line"></i>
                                Back</a>
                            <button type="submit" class="btn btn-primary"><i class="ri-save-line"></i> Submit</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
