@extends('layout.master')
@section('title', 'Barang dan Jasa')
@section('content')
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between allign-items-center">
                        <h5 class="card-title">Data Barang dan Jasa</h5>
                        <div class="gap-3 mt-3">
                            <a type="button" class="btn btn-primary" href="{{ url('/addbarangjasa') }}"><i
                                    class="bi bi-person-add"></i>
                                Add Data</a>

                            <a href="/pdfbarangjasa" target="_blank" class="btn btn-dark">PDF</a>
                        </div>
                    </div>

                    <!-- Table with stripped rows -->
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Tipe</th>
                                <th scope="col">Harga Jual</th>
                                <th scope="col">Gambar</th>
                                <th scope="col">Stok</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($db as $data)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $data->nama }}</td>
                                    <td>{{ $data->tipe }}</td>
                                    <td>Rp.{{ number_format($data->harga_jual) }}</td>
                                    <td>
                                        @if ($data->gambar == null)
                                            <img src="{{ asset('Template/assets/img/barangjasa.png') }}" alt="gambar"
                                                style="width: 40px;">
                                        @else
                                            <img src="{{ asset('storage/barangdanjasa/' . $data->gambar) }}" alt="gambar"
                                                style="width: 40px;">
                                        @endif
                                    </td>
                                    <td>{{ number_format($data->stok) }}</td>
                                    <td>
                                        <a href="{{ url('/editbarangjasa', ['id' => $data->id]) }}"
                                            class="btn btn-sm btn-primary mb-2"><i class="bi bi-pencil-square"></i></a>
                                        <a href="{{ route('delete-barang-jasa', $data->id) }}"
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
