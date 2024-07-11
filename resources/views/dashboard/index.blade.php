@extends('layouts.app')

@section('content')
    <div class="pagetitle">
        <h1>Dashboard</h1>
    </div>

    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="card info-card sales-card">
                    <div class="filter">
                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <li class="dropdown-header text-start"></li>
                            <li><a class="dropdown-item" href="{{ route('pasien.ibu') }}">Data Pasien Ibu</a></li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Pasien Ibu</h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class='bx bx-female'></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ $jumlahIbu }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card info-card customers-card">
                    <div class="filter">
                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <li class="dropdown-header text-start"></li>
                            <li><a class="dropdown-item" href="{{ route('pasien.anak') }}">Data Pasien Anak</a></li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Pasien Anak</h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class='bx bx-child'></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ $jumlahAnak }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card info-card revenue-card">
                    <div class="filter">
                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <li class="dropdown-header text-start"></li>
                            <li><a class="dropdown-item" href="{{ route('kms.kms') }}">Data Kartu Menuju Sehat Anak</a></li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Kartu Menuju Sehat</h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-card-list"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ $jumlahKms }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
