@extends('layout.master')
@section('title', 'Jenis Barang')
@section('content')
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between allign-items-center">
                        <h5 class="card-title">Data Jenis Barang</h5>
                        <div class="gap-3 mt-3">
                            <a type="button" class="btn btn-primary" href="{{ url('/addjenisbarang') }}"><i
                                    class="bi bi-person-add"></i>
                                Add Data</a>

                            <a href="/pdfjenisbarang" target="_blank" class="btn btn-dark">PDF</a>
                        </div>
                    </div>

                    <!-- Table with stripped rows -->
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($db as $data)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $data->nama }}</td>
                                    <td>
                                        <a href="{{ url('/editjenisbarang', ['id' => $data->id]) }}"
                                            class="btn btn-sm btn-primary mb-2"><i class="bi bi-pencil-square"></i></a>
                                        <a href="{{ route('delete-jenis-barang', $data->id) }}"
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
