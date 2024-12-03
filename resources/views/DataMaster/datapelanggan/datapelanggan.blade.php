@extends('layout.master')
@section('title', 'Data Pelanggan')
@section('content')
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between allign-items-center">
                        <h5 class="card-title">Data Pelanggan</h5>
                        <div class="gap-3 mt-3">
                            <a type="button" class="btn btn-primary" href="{{ url('/addpelanggan') }}"><i
                                    class="bi bi-person-add"></i>
                                Add Data</a>

                            <a href="/pdfpelanggan" target="_blank" class="btn btn-dark">PDF</a>
                        </div>
                    </div>

                    <!-- Table with stripped rows -->
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">No.Hp</th>
                                <th scope="col">Email</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($db as $data)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $data->nama }}</td>
                                    <td>{{ $data->no_telepon }}</td>
                                    <td>{{ $data->email }}</td>
                                    <td>{{ $data->alamat }}</td>
                                    <td>{{ \Carbon\Carbon::parse($data->created_at)->format('d-m-Y') }}</td>
                                    <td>
                                        <a href="{{ url('/editpelanggan', ['id' => $data->id]) }}"
                                            class="btn btn-sm btn-primary mb-2"><i class="bi bi-pencil-square"></i></a>
                                        <a href="{{ route('delete-pelanggan', $data->id) }}"
                                            class="btn btn-sm btn-danger mb-2" data-confirm-delete="true"><i
                                                class="bi bi-trash3"></i></a>
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
