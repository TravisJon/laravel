@extends('layout.master')
@section('title', 'Edit User')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between allign-items-center">
                        <h5 class="card-title mb-0">Edit Data User</h5>
                    </div>
                    @foreach ($db as $data)
                        <form class="needs-validation" novalidate action="{{ url('/update', ['id' => $data->id]) }}"
                            method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $data->id }}"> <br />
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="nama"
                                    value="{{ $data->nama }}" required>
                                <div class="invalid-feedback">Silakan masukkan nama Anda!</div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Email</label>
                                <input type="email" class="form-control" id="exampleInputPassword1" name="email"
                                    value="{{ $data->email }}" required>
                                <div class="invalid-feedback">Silakan masukkan email Anda!</div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">No.Hp</label>
                                <input type="number" class="form-control" id="exampleInputPassword1" name="no_telepon"
                                    value="{{ $data->no_telepon }}">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Alamat</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" name="alamat"
                                    value="{{ $data->alamat }}">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Role</label>
                                <select class="form-select" aria-label="Default select example" name="role_id"
                                    value="">
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}"
                                            {{ $role->id == $data->role_id ? 'selected' : '' }}>
                                            {{ $role->nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Foto</label>
                                <input type="file" class="form-control" id="exampleInputPassword1" name="foto">
                                @if ($data->foto)
                                    <img src="{{ asset('storage/users/' . $data->foto) }}" alt="Current Picture"
                                        style="width: 150px; height: auto; margin-top: 10px;">
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                <input type="password" name="password" value="" class="form-control"
                                    id="exampleInputPassword1">
                                <small class="form-text text-muted">Kosongkan jika tidak ingin mengubah password</small>
                            </div>
                            <div class="d-flex justify-content-between">
                                <a href="{{ url('/datauser') }}" class="btn btn-danger"><i class="ri-arrow-left-line"></i>
                                    Back</a>
                                <button type="submit" class="btn btn-primary"><i class="ri-save-line"></i> Submit</button>
                            </div>
                        </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
