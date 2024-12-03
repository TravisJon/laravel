@extends('layout.master')
@section('title', 'Add User')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between allign-items-center">
                        <h5 class="card-title">Add Data User</h5>
                    </div>
                    <form class="needs-validation" novalidate action="{{ url('/store') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="nama" required>
                            <div class="invalid-feedback">Silakan masukkan nama Anda!</div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Email</label>
                            <input type="email" class="form-control" id="exampleInputPassword1" name="email" required>
                            <div class="invalid-feedback">Silakan masukkan email Anda!</div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">No.Hp</label>
                            <input type="number" class="form-control" id="exampleInputPassword1" name="no_telepon">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Alamat</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" name="alamat">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Role</label>
                            <select class="form-select" aria-label="Default select example" name="role_id">
                                @foreach ($roles as $r)
                                    <option value="{{ $r->id }}">{{ $r->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Foto</label>
                            <input type="file" class="form-control" id="exampleInputPassword1" name="foto">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" name="password" required>
                            <div class="invalid-feedback">Silakan masukkan kata sandi Anda!</div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <a href="{{ url('/datauser') }}" class="btn btn-danger"><i class="ri-arrow-left-line"></i>
                                Back</a>
                            <button type="submit" class="btn btn-primary"><i class="ri-save-line"></i> Submit</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
