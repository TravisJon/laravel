@extends('layout.master')
@section('title', 'Edit Data Servis')
@section('content')
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">Edit Data Servis</h5>
                    </div>

                    @foreach ($db as $data)
                        <form class="needs-validation" novalidate
                            action="{{ url('/update_dataservis', ['id' => $data->id]) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $data->id }}"> <br />
                            <div class="mb-3">
                                <label for="pelanggan_id" class="form-label">Pelanggan</label>
                                <select class="form-select" aria-label="Default select example" name="pelanggan_id"
                                    required>
                                    <option value="" disabled selected>Pilih Pelanggan</option>
                                    @foreach ($datapelanggan as $p)
                                        <option value="{{ $p->id }}"
                                            {{ $p->id == $data->pelanggan_id ? 'selected' : '' }}>{{ $p->nama }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">Silakan pilih pelanggan.</div>
                            </div>
                            <div class="mb-3">
                                <label for="teknisi_id" class="form-label">Teknisi</label>
                                <select class="form-select" aria-label="Default select example" name="teknisi_id" required>
                                    <option value="" disabled selected>Pilih Teknisi</option>
                                    @foreach ($user as $r)
                                        <option value="{{ $r->id }}"
                                            {{ $r->id == $data->teknisi_id ? 'selected' : '' }}>{{ $r->nama }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">Silakan pilih teknisi.</div>
                            </div>
                            <div class="mb-3">
                                <label for="jenis_barang_id" class="form-label">Jenis Barang</label>
                                <select class="form-select" aria-label="Default select example" name="jenis_barang_id"
                                    required>
                                    <option value="" disabled selected>Pilih Jenis Barang</option>
                                    @foreach ($jenisbarang as $jb)
                                        <option value="{{ $jb->id }}"
                                            {{ $jb->id == $data->jenis_barang_id ? 'selected' : '' }}>{{ $jb->nama }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">Silakan pilih jenis barang.</div>
                            </div>
                            <div class="mb-3">
                                <label for="kerusakan" class="form-label">Kerusakan</label>
                                <input type="text" class="form-control" id="kerusakan" name="kerusakan"
                                    value="{{ $data->kerusakan }}" required>
                                <div class="invalid-feedback">Silakan masukkan kerusakan.</div>
                            </div>
                            <div class="mb-3">
                                <label for="tipe" class="form-label">Tipe</label>
                                <input type="text" class="form-control" id="tipe" name="tipe"
                                    value="{{ $data->tipe }}" required>
                                <div class="invalid-feedback">Silakan masukkan tipe.</div>
                            </div>
                            <div class="mb-3">
                                <label for="kelengkapan" class="form-label">Kelengkapan</label>
                                <input type="text" class="form-control" id="kelengkapan" name="kelengkapan"
                                    value="{{ $data->kelengkapan }}">
                            </div>
                            <div class="mb-3">
                                <label for="serial_number" class="form-label">Serial Number</label>
                                <input type="text" class="form-control" id="serial_number" name="serial_number"
                                    value="{{ $data->serial_number }}">
                            </div>
                            @if ($data->status == 'Batal')
                                <div class="mb-3">
                                    <label for="alasan_pembatalan" class="form-label">Alasan Pembatalan</label>
                                    <textarea class="form-control" id="alasan_pembatalan" name="alasan_pembatalan" rows="3" required>{{ $data->alasan_pembatalan }}</textarea>
                                    <div class="invalid-feedback">Silakan masukkan alasan pembatalan.</div>
                                </div>
                            @else
                                <div class="mb-3">
                                    <label for="catatan" class="form-label">Catatan</label>
                                    <textarea class="form-control" id="catatan" name="catatan" rows="3">{{ $data->catatan }}</textarea>
                                </div>
                            @endif
                            <div class="d-flex justify-content-between">
                                <a href="{{ url('/dataservis/status/baru') }}" class="btn btn-danger"><i
                                        class="ri-arrow-left-line"></i> Back</a>
                                <button type="submit" class="btn btn-primary"><i class="ri-save-line"></i> Submit</button>
                            </div>
                        </form>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
@endsection
