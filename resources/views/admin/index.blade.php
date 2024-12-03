@extends('layout.master')
@section('title', 'Dashboard')
@section('header', 'Selamat Datang, Admin')
@section('content')

    <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
            <div class="row">

                <!-- Customers Card -->
                <div class="col-xxl-4 col-xl-12">
                    <div class="card info-card customers-card bg-light mb-4 shadow-lg border-0">
                        <div class="card-body">
                            <h5 class="card-title">Pelanggan</h5>
                            <div class="d-flex align-items-center">
                                <div
                                    class="card-icon bg-primary text-white rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-people"></i>
                                </div>
                                <div class="ps-3">
                                    <h6 class="mb-0">{{ $pelanggan->count() ?? 0 }}</h6>
                                    <a href="{{ route('datapelanggan') }}"
                                        class="text-muted small text-decoration-none">Jumlah Pelanggan</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Customers Card -->

                <!-- Data Service Baru Card -->
                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card sales-card bg-info text-white mb-4 shadow-lg border-0">
                        <div class="card-body">
                            <h5 class="card-title">Data Servis Baru</h5>
                            <div class="d-flex align-items-center">
                                <div
                                    class="card-icon bg-light text-info rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-wrench"></i>
                                </div>
                                <div class="ps-3">
                                    <h6 class="mb-0">{{ $dataservisBaru->count() ?? 0 }}</h6>
                                    <a href="{{ route('dataservis.baru') }}"
                                        class="text-muted small text-decoration-none">Servis Baru
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Data Service Baru Card -->

                <!-- Data Service Diproses Card -->
                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card sales-card bg-warning text-dark mb-4 shadow-lg border-0">
                        <div class="card-body">
                            <h5 class="card-title">Data Servis Diproses</h5>
                            <div class="d-flex align-items-center">
                                <div
                                    class="card-icon text-warning rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-wrench"></i>
                                </div>
                                <div class="ps-3">
                                    <h6 class="mb-0">{{ $dataservisDiproses->count() ?? 0 }}</h6>
                                    <a href="{{ route('dataservis.diproses') }}"
                                        class="text-muted small text-decoration-none">Servis Diproses</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Data Service Diproses Card -->

                <!-- Data Service Selesai Card -->
                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card sales-card bg-success text-white mb-4 shadow-lg border-0">
                        <div class="card-body">
                            <h5 class="card-title">Data Servis Selesai</h5>
                            <div class="d-flex align-items-center">
                                <div
                                    class="card-icon bg-light text-success rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-check-circle"></i>
                                </div>
                                <div class="ps-3">
                                    <h6 class="mb-0">{{ $dataservisSelesai->count() ?? 0 }}</h6>
                                    <a href="{{ route('dataservis.selesai') }}"
                                        class="text-muted small text-decoration-none">Servis Selesai</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Data Service Selesai Card -->

                <!-- Data Service Dibatalkan Card -->
                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card sales-card bg-danger text-white mb-4 shadow-lg border-0">
                        <div class="card-body">
                            <h5 class="card-title">Data Servis Dibatalkan</h5>
                            <div class="d-flex align-items-center">
                                <div
                                    class="card-icon bg-light text-danger rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-x-circle"></i>
                                </div>
                                <div class="ps-3">
                                    <h6 class="mb-0">{{ $dataservisBatal->count() ?? 0 }}</h6>
                                    <a href="{{ route('dataservis.batal') }}"
                                        class="text-muted small text-decoration-none">Servis Dibatalkan</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Data Service Dibatalkan Card -->

                <!-- Data Service Diambil Card -->
                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card sales-card bg-secondary text-white mb-4 shadow-lg border-0">
                        <div class="card-body">
                            <h5 class="card-title">Data Servis Diambil</h5>
                            <div class="d-flex align-items-center">
                                <div
                                    class="card-icon bg-light text-secondary rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-box-arrow-in-up"></i>
                                </div>
                                <div class="ps-3">
                                    <h6 class="mb-0">{{ $dataservisDiambil->count() ?? 0 }}</h6>
                                    <a href="{{ route('dataservis.diambil') }}"
                                        class="text-muted small text-decoration-none">Servis Diambil</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Data Service Diambil Card -->

            </div>
        </div>
        <!-- End Left side columns -->

    </div>
@endsection
