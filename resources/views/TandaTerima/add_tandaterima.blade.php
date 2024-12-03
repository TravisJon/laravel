@extends('layout.master')
@section('title', 'Tanda Terima Servis')
@section('content')
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between allign-items-center">
                        <h5 class="card-title">Tanda Terima Servis</h5>
                    </div>
                    <form class="needs-validation" action="{{ url('/storetandaterima') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="pelanggan_id" class="form-label">Pelanggan</label>
                            <select class="form-select" aria-label="Default select example" name="pelanggan_id" required>
                                <option value="" disabled selected>Pilih Pelanggan</option>
                                @foreach ($datapelanggan as $p)
                                    <option value="{{ $p->id }}">{{ $p->nama }}</option>
                                @endforeach
                            </select>
                            {{-- <div class="invalid-feedback">Silakan pilih pelanggan.</div> --}}
                        </div>
                        <div class="mb-3">
                            <label for="teknisi_id" class="form-label">Teknisi</label>
                            <select class="form-select" aria-label="Default select example" name="teknisi_id" required>
                                <option value="" disabled selected>Pilih Teknisi</option>
                                @foreach ($user as $r)
                                    <option value="{{ $r->id }}">{{ $r->nama }}</option>
                                @endforeach
                            </select>
                            {{-- <div class="invalid-feedback">Silakan pilih teknisi.</div> --}}
                        </div>
                        <div class="mb-3">
                            <label for="jenis_barang_id" class="form-label">Jenis Barang</label>
                            <select class="form-select" aria-label="Default select example" name="jenis_barang_id" required>
                                <option value="" disabled selected>Pilih Jenis Barang</option>
                                @foreach ($jenisbarang as $jb)
                                    <option value="{{ $jb->id }}">{{ $jb->nama }}</option>
                                @endforeach
                            </select>
                            {{-- <div class="invalid-feedback">Silakan pilih jenis barang.</div> --}}
                        </div>
                        <div class="mb-3">
                            <label for="tipe" class="form-label">Tipe</label>
                            <input type="text" class="form-control" id="tipe" name="tipe" required>
                            {{-- <div class="invalid-feedback">Silakan masukkan tipe.</div> --}}
                        </div>
                        <div class="mb-3">
                            <label for="kelengkapan" class="form-label">Kelengkapan</label>
                            <input type="text" class="form-control" id="kelengkapan" name="kelengkapan">
                        </div>
                        <div class="mb-3">
                            <label for="serial_number" class="form-label">Serial Number</label>
                            <input type="text" class="form-control" id="serial_number" name="serial_number">
                        </div>
                        <div class="mb-3">
                            <label for="kerusakan" class="form-label">Kerusakan</label>
                            <textarea type="text" class="form-control" id="kerusakan" name="kerusakan" rows="3" required></textarea>
                            {{-- <div class="invalid-feedback">Silakan masukkan kerusakan.</div> --}}
                        </div>
                        <div class="mb-3">
                            <label for="catatan" class="form-label">Catatan</label>
                            <textarea class="form-control" id="catatan" name="catatan" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary"><i class="ri-save-line"></i> Submit</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
