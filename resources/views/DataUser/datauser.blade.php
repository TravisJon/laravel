@extends('layout.master')
@section('title', 'Data User')
@section('content')
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between allign-items-center">
                        <h5 class="card-title">Data User</h5>
                        <div class="gap-3 mt-3">
                            <a type="button" class="btn btn-primary" href="{{ url('/add') }}"><i
                                    class="bi bi-person-add"></i>
                                Add Data</a>

                            <a href="/pdf" target="_blank" class="btn btn-dark">PDF</a>
                        </div>
                    </div>

                    <!-- Table with stripped rows -->
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Email</th>
                                <th scope="col">No.Hp</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Role</th>
                                <th scope="col">Foto</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($db as $data)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $data->nama }}</td>
                                    <td>{{ $data->email }}</td>
                                    <td>{{ $data->no_telepon }}</td>
                                    <td>{{ $data->alamat }}</td>
                                    <td>{{ $data->role->nama }}</td>
                                    <td>
                                        @if ($data->foto == null)
                                            <img src="{{ asset('Template/assets/img/iconprofil.png') }}" alt="Picture"
                                                style="width: 40px;">
                                        @else
                                            <img src="{{ asset('storage/users/' . $data->foto) }}" alt="Picture"
                                                style="width: 40px;">
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ url('/edit', ['id' => $data->id]) }}"
                                            class="btn btn-sm btn-primary mb-2"><i class="bi bi-pencil-square"></i></a>
                                        <a href="{{ route('delete', $data->id) }}" class="btn btn-sm btn-danger mb-2"
                                            data-confirm-delete="true"><i class="bi bi-trash3"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- End Table with stripped rows -->
                </div>
            </div>

        </div>
    </div>
@endsection
