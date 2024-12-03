@extends('layout.master')
@section('title', 'Data Servis')
@section('content')
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="card-title">Data Servis</h5>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex flex-wrap gap-2 mb-3">
                            <a href="{{ route('dataservis.baru') }}" class="btn btn-info">Baru</a>
                            <a href="{{ route('dataservis.diproses') }}" class="btn btn-warning">Diproses</a>
                            <a href="{{ route('dataservis.selesai') }}" class="btn btn-success">Selesai</a>
                            <a href="{{ route('dataservis.batal') }}" class="btn btn-danger">Batal</a>
                            @if (Auth::user()->role_id === 1)
                                <a href="{{ route('dataservis.diambil') }}" class="btn btn-secondary">Diambil</a>
                            @endif
                        </div>
                        <div>
                            <a href="/pdf_data_servis?status[]=Selesai" target="_blank" class="btn btn-dark">PDF</a>
                        </div>
                    </div>

                    <!-- Table with stripped rows -->
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Pelanggan</th>
                                <th scope="col">Kasir</th>
                                <th scope="col">Teknisi</th>
                                <th scope="col">Barang</th>
                                <th scope="col">Status</th>
                                <th scope="col">Pesan</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($db as $data)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ \Carbon\Carbon::parse($data->updated_at)->format('d-m-Y') }}</td>
                                    <td>{{ $data->datapelanggan->nama }}</td>
                                    <td>{{ $data->kasir }}</td>
                                    <td>{{ $data->user->nama }}</td>
                                    <td>{{ $data->jenisbarang->nama }}</td>
                                    <td>
                                        @if ($data->status == 'Baru')
                                            <span class="badge bg-info">{{ $data->status }}</span>
                                        @elseif ($data->status == 'Diproses')
                                            <span class="badge bg-warning">{{ $data->status }}</span>
                                        @elseif ($data->status == 'Selesai')
                                            <span class="badge bg-success">{{ $data->status }}</span>
                                        @elseif ($data->status == 'Batal')
                                            <span class="badge bg-danger">{{ $data->status }}</span>
                                        @elseif ($data->status == 'Diambil')
                                            <span class="badge bg-secondary">{{ $data->status }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="https://wa.me/+62{{ $data->datapelanggan->no_telepon }}?text={{ urlencode("Halo, {$data->datapelanggan->nama}!\n\nServis perangkat Anda dengan nomor servis {$data->id} telah selesai. Silakan datang ke toko kami untuk mengambil perangkat Anda.\n\nTerima kasih,\nThe Computer Store") }}"
                                            class="badge bg-success" target="_blank">
                                            <i class="bi bi-whatsapp me-1"></i> Whatsapp
                                        </a>

                                        @if (Auth::user()->role_id === 1)
                                            <!-- Button Kirim Email -->
                                            <form action="{{ route('kirimEmailServis', $data->id) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="badge bg-primary"
                                                    style="outline: none; border: none;"><i
                                                        class="bi bi-arrow-up-right-circle me-1"></i>Kirim
                                                    Email</button>
                                            </form>
                                        @endif
                                    </td>

                                    <td>
                                        @if (Auth::user()->role_id === 1)
                                            <a href="{{ url('/edit_dataservis', ['id' => $data->id]) }}"
                                                class="btn btn-sm btn-primary mb-2"><i class="bi bi-pencil-square"></i></a>
                                        @endif
                                        <a href="{{ route('cetak.tandaterima', ['id' => $data->id]) }}" target="_blank"
                                            class="btn btn-sm btn-info mb-2"><i class="bi bi-info-circle"></i></a>
                                        @if (Auth::user()->role_id === 1)
                                            <a href="{{ route('delete-data-servis', $data->id) }}"
                                                class="btn btn-sm btn-danger mb-2" data-confirm-delete="true"><i
                                                    class="bi bi-exclamation-triangle"></i></a>
                                        @endif
                                        <div class="btn-group">
                                            <a class="btn btn-sm btn-dark mb-2 dropdown-toggle" href="#"
                                                role="button" id="statusDropdown" data-bs-toggle="dropdown"
                                                aria-expanded="false">Status</a>
                                            <form action="{{ route('data-servis.update-status', $data->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('PUT')
                                                <ul class="dropdown-menu" aria-labelledby="statusDropdown">
                                                    <li><button class="dropdown-item" type="submit" name="status"
                                                            value="Batal">Batal</button></li>
                                                </ul>
                                            </form>
                                        </div>
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
