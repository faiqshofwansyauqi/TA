@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <div class="pagetitle">
            <h1>Detail Antenatal Care</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('rekam_medis.anc') }}">Antenatal Care</a></li>
                    <li class="breadcrumb-item active">Detail Ibu {{ $anc->NIK }}</li>
                    {{-- <p><strong>Nama Ibu: </strong>{{ $anc->NIK }}</p> --}}
                </ol>
            </nav>
        </div>
        <button type="button" class="btn btn-success" id="btn-plus">
            <i class="bi bi-plus-circle"></i> Tambah
        </button>
    </div>

    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Detail ANC</h5>
                        <div class="table-responsive">
                            <table class="table table-bordered table-anc" id="anc-table">
                                <thead>
                                    <tr>
                                        <th rowspan="3" class="align-middle text-center">No.</th>
                                        <th colspan="3" rowspan="2" class="align-middle text-center">REGISTER</th>
                                        <th colspan="12" class="text-center">PEMERIKSAAN</th>
                                        <th colspan="5" rowspan="2" class="text-center align-middle">PELAYANAN</th>
                                        <th rowspan="3" class="text-center align-middle">KONSELING</th>
                                        <th colspan="2" rowspan="2" class="align-middle text-center">LABORATORIUM</th>
                                        <th colspan="15" class="text-center">Inetgrasi Program</th>
                                        <th colspan="6" rowspan="2" class="align-middle text-center">LABORATORIUM</th>
                                        <th rowspan="3" class="text-center align-middle">TATA LAKSANA AWAL</th>

                                    </tr>
                                    <tr>
                                        <th colspan="7" class="text-center">IBU</th>
                                        <th colspan="5" class="text-center">BAYI</th>
                                        <th colspan="4" class="text-center">PMTCT</th>
                                        <th colspan="3" class="text-center">MALARIA</th>
                                        <th colspan="4" class="text-center">TB</th>
                                        <th colspan="4" class="text-center">SKRINING COVID-19</th>
                                    </tr>
                                    <tr>
                                        <th class="align-middle text-center normal-header">Tanggal</th>
                                        <th class="align-middle text-center normal-header">Usia Kehamilan</th>
                                        <th class="align-middle text-center normal-header">Trimester ke</th>
                                        <th class="align-middle text-center normal-header">Keluhan</th>
                                        <th class="align-middle text-center normal-header">BB <sup>(kg)</sup></th>
                                        <th class="align-middle text-center normal-header">TD <sup>(mmHg)</sup></th>
                                        <th class="align-middle text-center normal-header">LILA <sup>(cm)</sup></th>
                                        <th class="align-middle text-center normal-header">Status Gizi <sup>2)</sup></th>
                                        <th class="align-middle text-center normal-header">TFU <sup>(cm)</sup></th>
                                        <th class="align-middle text-center normal-header">Status Imunisasi Td <sup>6)</sup>
                                        </th>
                                        <th class="align-middle text-center normal-header">DJJ <sup>(x/menit)</sup></th>
                                        <th class="align-middle text-center normal-header">Kepala thd PAP <sup>3)</sup></th>
                                        <th class="align-middle text-center normal-header">TBJ <sup>(gram)</sup></th>
                                        <th class="align-middle text-center normal-header">Presentasi <sup>4)</sup></th>
                                        <th class="align-middle text-center normal-header">Jumlah Janin <sup>5)</sup></th>
                                        <th class="align-middle text-center normal-header">Injeksi Td <sup>*</sup></th>
                                        <th class="align-middle text-center normal-header">Catat di Buku KIA <sup>*</sup>
                                        </th>
                                        <th class="align-middle text-center normal-header">Fe <sup>(tab/botol)</sup></th>
                                        <th class="align-middle text-center normal-header">PMT Bumil KEK</th>
                                        <th class="align-middle text-center normal-header">Ikut Kelas Ibu</th>
                                        <th class="align-middle text-center normal-header">Hemoglobin <sup>(gr/dl)</sup>
                                        </th>
                                        <th class="align-middle text-center normal-header">Glucosa urine<sup>(+/-)</sup>
                                        </th>
                                        <th class="align-middle text-center normal-header">Sifilis<sup>(+/-)</sup></th>
                                        <th class="align-middle text-center normal-header">HBsAG<sup>*</sup></th>
                                        <th class="align-middle text-center normal-header">HIV<sup>(+/-)</sup></th>
                                        <th class="align-middle text-center normal-header">ARV Profilaksis<sup>***</sup>
                                        </th>
                                        <th class="align-middle text-center normal-header">Malaria<sup>(+/-)</sup></th>
                                        <th class="align-middle text-center normal-header">Obat<sup>***</sup></th>
                                        <th class="align-middle text-center normal-header">Kelambu
                                            berinsektisida<sup>*</sup></th>
                                        <th class="align-middle text-center normal-header">Skrining anamnesis<sup>*</sup>
                                        </th>
                                        <th class="align-middle text-center normal-header">Periksa dahak<sup>*</sup></th>
                                        <th class="align-middle text-center normal-header">TBC<sup>(+/-)</sup></th>
                                        <th class="align-middle text-center normal-header">Obat<sup>***</sup></th>
                                        <th class="align-middle text-center normal-header">Sehat</th>
                                        <th class="align-middle text-center normal-header">Kontak Erat</th>
                                        <th class="align-middle text-center normal-header">Suspek</th>
                                        <th class="align-middle text-center normal-header">Terkonfirmasi</th>
                                        <th class="align-middle text-center normal-header">HDK</th>
                                        <th class="align-middle text-center normal-header">Abortus</th>
                                        <th class="align-middle text-center normal-header">Pendarahan</th>
                                        <th class="align-middle text-center normal-header">Infeksi</th>
                                        <th class="align-middle text-center normal-header">KPD</th>
                                        <th class="align-middle text-center normal-header">Lain-lain</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" id="modalInput" tabindex="-1" aria-labelledby="ModalInput" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title fs-4 fw-bold" id="ModalInput">Input ANC</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('rekam_medis.store_showanc') }}" method="post" autocomplete="off">
                        @csrf
                        <div class="row">
                            <div class="col-6 mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">Register</h5>
                                    <input type="hidden" name="NIK" value="{{ $anc->NIK }}">
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <label for="tanggal" class="form-label">Tanggal</label>
                                            <input type="date" class="form-control" id="tanggal" name="tanggal"
                                                required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="usia_kehamilan" class="form-label">Usia Kehamilan</label>
                                            <input type="number" class="form-control" id="usia_kehamilan"
                                                name="usia_kehamilan" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="trimester" class="form-label">Trimester ke</label>
                                            <select class="form-select" id="trimester" name="trimester" required>
                                                <option value="">Pilih Trimester</option>
                                                <option value="I">I</option>
                                                <option value="II">II</option>
                                                <option value="III">III</option>
                                            </select>
                                        </div>
                                    </div>
                                    <h5 class="card-title">Pemeriksaan Ibu</h5>
                                    <div class="col-md-12 mb-3">
                                        <label for="keluhan" class="form-label">Keluhan</label>
                                        <input type="text" class="form-control" id="keluhan" name="keluhan"
                                            required>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <label for="berat_badan" class="form-label">Berat Badan
                                                <sup>(kg)</sup></label>
                                            <div class="input-group mb-2">
                                                <input type="number" class="form-control" id="berat_badan"
                                                    name="berat_badan" required>
                                                <span class="input-group-text">kg</span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="td_mmhg" class="form-label">TD <sup>(mmhg)</sup></label>
                                            <div class="input-group mb-2">
                                                <input type="number" class="form-control" id="td_mmhg" name="td_mmhg"
                                                    required>
                                                <span class="input-group-text">mmhg</span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="lila" class="form-label">LILA <sup>(cm)</sup></label>
                                            <div class="input-group mb-2">
                                                <input type="number" class="form-control" id="lila" name="lila"
                                                    required>
                                                <span class="input-group-text">cm</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="sts_gizi" class="form-label">Status Gizi <sup>2)</sup></label>
                                            <input type="text" class="form-control" id="sts_gizi" name="sts_gizi"
                                                required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="tfu" class="form-label">TFU <sup>(cm)</sup></label>
                                            <div class="input-group mb-2">
                                                <input type="text" class="form-control" id="tfu" name="tfu"
                                                    required>
                                                <span class="input-group-text">cm</span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="sts_imunisasi" class="form-label">Status Imunisasi Td</label>
                                            <select class="form-select" id="sts_imunisasi" name="sts_imunisasi" required>
                                                <option value="">Pilih Status Imunisasi</option>
                                                <option value="Td01">Td01</option>
                                                <option value="Td02">Td02</option>
                                                <option value="Td03">Td03</option>
                                                <option value="Td04">Td04</option>
                                                <option value="Td05">Td05</option>
                                                <option value="Td06">Td06</option>
                                            </select>
                                        </div>
                                    </div>
                                    <h5 class="card-title">Pemeriksaan Bayi</h5>
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <label for="djj" class="form-label">DJJ <sup>((x/menit))</sup></label>
                                            <div class="input-group mb-2">
                                                <input type="number" class="form-control" id="djj" name="djj"
                                                    required>
                                                <span class="input-group-text">menit</span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="kpl_thd" class="form-label">Kepala thd PAP<sup>3)</sup></label>
                                            <select class="form-select" id="kpl_thd" name="kpl_thd" required>
                                                <option value="">Pilih Kepala thd PAP</option>
                                                <option value="M">M</option>
                                                <option value="MB">MB</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="tbj" class="form-label">TBJ <sup>(gram)</sup></label>
                                            <div class="input-group mb-2">
                                                <input type="number" class="form-control" id="tbj" name="tbj"
                                                    required>
                                                <span class="input-group-text">gram</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="presentasi" class="form-label">Presentasi<sup>4)</sup></label>
                                            <select class="form-select" id="presentasi" name="presentasi" required>
                                                <option value="">Pilih Presentasi</option>
                                                <option value="KP">KP</option>
                                                <option value="BS">BS</option>
                                                <option value="LLO">LLO</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="jmlh_janin" class="form-label">Jumlah Janin<sup>5)</sup></label>
                                            <select class="form-select" id="jmlh_janin" name="jmlh_janin" required>
                                                <option value="">Pilih Jumlah Janin</option>
                                                <option value="T">T</option>
                                                <option value="G">G</option>
                                            </select>
                                        </div>
                                    </div>
                                    <h5 class="card-title">Pelayanan</h5>
                                    <div class="row mb-3">
                                        <div class="col-md-3">
                                            <label for="buku_kia" class="form-label">Catatan dibuku KIA*</label>
                                            <select class="form-select" id="buku_kia" name="buku_kia" required>
                                                <option value="">Pilih Catatan dibuku KIA*</option>
                                                <option value="jika iya">&#10003; <!-- Ceklis --></option>
                                                <option value="jika tidak">&#10007; <!-- Uncek --></option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <br>
                                            <label for="injeksi" class="form-label">Injeksi Td*</label>
                                            <select class="form-select" id="injeksi" name="injeksi" required>
                                                <option value="">Pilih Injeksi Td*</option>
                                                <option value="jika iya">&#10003; <!-- Ceklis --></option>
                                                <option value="jika tidak">&#10007; <!-- Uncek --></option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <br>
                                            <label for="fe" class="form-label">Fe <sup>(tab/botol)</sup></label>
                                            <input type="number" class="form-control" id="fe" name="fe"
                                                required>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="pmt_bumil" class="form-label">PMT Bumil KEK</label>
                                            <select class="form-select" id="pmt_bumil" name="pmt_bumil" required>
                                                <option value="">Pilih PMT Bumil KEK*</option>
                                                <option value="jika iya">&#10003; <!-- Ceklis --></option>
                                                <option value="jika tidak">&#10007; <!-- Uncek --></option>
                                            </select>
                                        </div>
                                        <div class="col-md-5">
                                            <label for="kelas_ibu" class="form-label">Ikut Kelas Ibu*</label>
                                            <select class="form-select" id="kelas_ibu" name="kelas_ibu" required>
                                                <option value="">Pilih Ikut Kelas Ibu</option>
                                                <option value="jika iya">&#10003; <!-- Ceklis --></option>
                                                <option value="jika tidak">&#10007; <!-- Uncek --></option>
                                            </select>
                                        </div>
                                    </div>
                                    <h5 class="card-title">Konseling</h5>
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <label for="konseling" class="form-label">Konseling</label>
                                            <input type="text" class="form-control" id="konseling" name="konseling"
                                                required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">Laboratorium</h5>
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <label for="hemoglobin"
                                                class="form-label">Hemoglobin<sup>(gr/dl)</sup></label>
                                            <input type="number" class="form-control" id="hemoglobin" name="hemoglobin"
                                                required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="glcs_urine" class="form-label">Glucosa
                                                Urine<sup>(-/+)</sup></label>
                                            <select class="form-select" id="glcs_urine" name="glcs_urine" required>
                                                <option value="">Pilih Glucosa Urine</option>
                                                <option value="-">-</option>
                                                <option value="+">+</option>
                                            </select>
                                        </div>
                                    </div>
                                    <h5 class="card-title">Integrasi Program - PMTCT</h5>
                                    <div class="row">
                                        <div class="col-md-3 mb-3">
                                            <label for="sifilis" class="form-label">Sifilis<sup>(-/+)</sup></label>
                                            <select class="form-select" id="sifilis" name="sifilis" required>
                                                <option value="">Pilih Sifilis</option>
                                                <option value="-">-</option>
                                                <option value="+">+</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="hbsag" class="form-label">HBsAg<sup>(-/+)</sup></label>
                                            <select class="form-select" id="hbsag" name="hbsag" required>
                                                <option value="">Pilih HBsAg</option>
                                                <option value="-">-</option>
                                                <option value="+">+</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="hiv" class="form-label">HIV<sup>(-/+)</sup></label>
                                            <select class="form-select" id="hiv" name="hiv" required>
                                                <option value="">Pilih HIV</option>
                                                <option value="-">-</option>
                                                <option value="+">+</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="arv" class="form-label">Arv Profilaksis</label>
                                            <input type="number" class="form-control" id="arv" name="arv"
                                                required>
                                        </div>
                                    </div>
                                    <h5 class="card-title">Integrasi Program - Malaria</h5>
                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <label for="malaria" class="form-label">Malaria<sup>(-/+)</sup></label>
                                            <select class="form-select" id="malaria" name="malaria" required>
                                                <option value="">Pilih Sifilis</option>
                                                <option value="-">-</option>
                                                <option value="+">+</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="obat_malaria" class="form-label">Obat<sup>***</sup></label>
                                            <input type="text" class="form-control" id="obat_malaria"
                                                name="obat_malaria" required>
                                        </div>
                                        <div class="col-md-5">
                                            <label for="kelambu" class="form-label">Kelambu
                                                berinsektisida<sup>*</sup></label>
                                            <input type="text" class="form-control" id="kelambu" name="kelambu"
                                                required>
                                        </div>
                                    </div>
                                    <h5 class="card-title">Integrasi Program - TB</h5>
                                    <div class="row">
                                        <div class="col-md-3 mb-3">
                                            <label for="skrining_anam" class="form-label">Skrining
                                                anamnesis<sup>*</sup></label>
                                            <select class="form-select" id="skrining_anam" name="skrining_anam" required>
                                                <option value="">Pilih Skrining anamnesis*</option>
                                                <option value="jika iya">&#10003; <!-- Ceklis --></option>
                                                <option value="jika tidak">&#10007; <!-- Uncek --></option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="dahak" class="form-label">Periksa Dahak<sup>*</sup></label>
                                            <select class="form-select" id="dahak" name="dahak" required>
                                                <option value="">Pilih Periksa Dahak*</option>
                                                <option value="jika iya">&#10003; <!-- Ceklis --></option>
                                                <option value="jika tidak">&#10007; <!-- Uncek --></option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <br>
                                            <label for="tbc" class="form-label">TBC<sup>(-/+)</sup></label>
                                            <select class="form-select" id="tbc" name="tbc" required>
                                                <option value="">Pilih Tbc</option>
                                                <option value="-">-</option>
                                                <option value="+">+</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <br>
                                            <label for="obat_TB" class="form-label">Obat<sup>***</sup></label>
                                            <input type="text" class="form-control" id="obat_TB" name="obat_TB"
                                                required>
                                        </div>
                                    </div>
                                    <h5 class="card-title">Integrasi Program - Skrining Covid-19</h5>
                                    <div class="row mb-3">
                                        <div class="col-md-3">
                                            <label for="sehat" class="form-label">Sehat</label>
                                            <select class="form-select" id="sehat" name="sehat" required>
                                                <option value="">Pilih Skrining Covid-19*</option>
                                                <option value="jika iya">&#10003; <!-- Ceklis --></option>
                                                <option value="jika tidak">&#10007; <!-- Uncek --></option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="kontak_erat" class="form-label">Kontak Erat</label>
                                            <select class="form-select" id="kontak_erat" name="kontak_erat" required>
                                                <option value="">Pilih Kontak Erat*</option>
                                                <option value="jika iya">&#10003; <!-- Ceklis --></option>
                                                <option value="jika tidak">&#10007; <!-- Uncek --></option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="suspek" class="form-label">Suspek</label>
                                            <select class="form-select" id="suspek" name="suspek" required>
                                                <option value="">Pilih Suspek*</option>
                                                <option value="jika iya">&#10003; <!-- Ceklis --></option>
                                                <option value="jika tidak">&#10007; <!-- Uncek --></option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="konfimasi" class="form-label">Terkonfirmasi</label>
                                            <select class="form-select" id="konfimasi" name="konfimasi" required>
                                                <option value="">Pilih Terkonfirmasi*</option>
                                                <option value="jika iya">&#10003; <!-- Ceklis --></option>
                                                <option value="jika tidak">&#10007; <!-- Uncek --></option>
                                            </select>
                                        </div>
                                    </div>
                                    <h5 class="card-title">Komplikasi</h5>
                                    <div class="row mb-3">
                                        <div class="col-md-3">
                                            <label for="hdk" class="form-label">HDK</label>
                                            <select class="form-select" id="hdk" name="hdk" required>
                                                <option value="">Pilih HDK</option>
                                                <option value="jika iya">&#10003; <!-- Ceklis --></option>
                                                <option value="jika tidak">&#10007; <!-- Uncek --></option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="abortus" class="form-label">Abortus</label>
                                            <select class="form-select" id="abortus" name="abortus" required>
                                                <option value="">Pilih Abortus*</option>
                                                <option value="jika iya">&#10003; <!-- Ceklis --></option>
                                                <option value="jika tidak">&#10007; <!-- Uncek --></option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="pendarahan" class="form-label">Pendarahan</label>
                                            <select class="form-select" id="pendarahan" name="pendarahan" required>
                                                <option value="">Pilih Pendarahan*</option>
                                                <option value="jika iya">&#10003; <!-- Ceklis --></option>
                                                <option value="jika tidak">&#10007; <!-- Uncek --></option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="infeksi" class="form-label">Infeksi</label>
                                            <select class="form-select" id="infeksi" name="infeksi" required>
                                                <option value="">Pilih Infeksi*</option>
                                                <option value="jika iya">&#10003; <!-- Ceklis --></option>
                                                <option value="jika tidak">&#10007; <!-- Uncek --></option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="anemia" class="form-label">Anemia</label>
                                            <select class="form-select" id="anemia" name="anemia" required>
                                                <option value="">Pilih Anemia*</option>
                                                <option value="jika iya">&#10003; <!-- Ceklis --></option>
                                                <option value="jika tidak">&#10007; <!-- Uncek --></option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="kpd" class="form-label">KPD</label>
                                            <select class="form-select" id="kpd" name="kpd" required>
                                                <option value="">Pilih Infeksi*</option>
                                                <option value="jika iya">&#10003; <!-- Ceklis --></option>
                                                <option value="jika tidak">&#10007; <!-- Uncek --></option>
                                            </select>
                                        </div>
                                        <div class="col-md-5">
                                            <label for="lain_lain" class="form-label">Lain - lain</label>
                                            <input type="text" class="form-control" id="lain_lain" name="lain_lain"
                                                required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="ModalEdit" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title fs-4 fw-bold" id="ModalEdit">Update ANC</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                    <form id="editForm" method="post" autocomplete="off">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-6 mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">Register</h5>
                                    <input type="hidden" name="NIK" value="{{ $anc->NIK }}">
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <label for="edit_tanggal" class="form-label">Tanggal</label>
                                            <input type="date" class="form-control" id="edit_tanggal" name="tanggal"
                                                required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="edit_usia_kehamilan" class="form-label">Usia Kehamilan</label>
                                            <input type="number" class="form-control" id="edit_usia_kehamilan"
                                                name="usia_kehamilan" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="edit_trimester" class="form-label">Trimester ke</label>
                                            <select class="form-select" id="edit_trimester" name="trimester" required>
                                                <option value="">Pilih Trimester</option>
                                                <option value="I">I</option>
                                                <option value="II">II</option>
                                                <option value="III">III</option>
                                            </select>
                                        </div>
                                    </div>
                                    <h5 class="card-title">Pemeriksaan Ibu</h5>
                                    <div class="col-md-12 mb-3">
                                        <label for="edit_keluhan" class="form-label">Keluhan</label>
                                        <input type="text" class="form-control" id="edit_keluhan" name="keluhan"
                                            required>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <label for="edit_berat_badan" class="form-label">Berat Badan
                                                <sup>(kg)</sup></label>
                                            <div class="input-group mb-2">
                                                <input type="number" class="form-control" id="edit_berat_badan"
                                                    name="berat_badan" required>
                                                <span class="input-group-text">kg</span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="edit_td_mmhg" class="form-label">TD <sup>(mmhg)</sup></label>
                                            <div class="input-group mb-2">
                                                <input type="number" class="form-control" id="edit_td_mmhg" name="td_mmhg"
                                                    required>
                                                <span class="input-group-text">mmhg</span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="edit_lila" class="form-label">LILA <sup>(cm)</sup></label>
                                            <div class="input-group mb-2">
                                                <input type="number" class="form-control" id="edit_lila" name="lila"
                                                    required>
                                                <span class="input-group-text">cm</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="edit_sts_gizi" class="form-label">Status Gizi <sup>2)</sup></label>
                                            <input type="text" class="form-control" id="edit_sts_gizi" name="sts_gizi"
                                                required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="edit_tfu" class="form-label">TFU <sup>(cm)</sup></label>
                                            <div class="input-group mb-2">
                                                <input type="text" class="form-control" id="edit_tfu" name="tfu"
                                                    required>
                                                <span class="input-group-text">cm</span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="edit_sts_imunisasi" class="form-label">Status Imunisasi Td</label>
                                            <select class="form-select" id="edit_sts_imunisasi" name="sts_imunisasi" required>
                                                <option value="">Pilih Status Imunisasi</option>
                                                <option value="Td01">Td01</option>
                                                <option value="Td02">Td02</option>
                                                <option value="Td03">Td03</option>
                                                <option value="Td04">Td04</option>
                                                <option value="Td05">Td05</option>
                                                <option value="Td06">Td06</option>
                                            </select>
                                        </div>
                                    </div>
                                    <h5 class="card-title">Pemeriksaan Bayi</h5>
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <label for="edit_djj" class="form-label">DJJ <sup>((x/menit))</sup></label>
                                            <div class="input-group mb-2">
                                                <input type="number" class="form-control" id="edit_djj" name="djj"
                                                    required>
                                                <span class="input-group-text">menit</span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="edit_kpl_thd" class="form-label">Kepala thd PAP<sup>3)</sup></label>
                                            <select class="form-select" id="edit_kpl_thd" name="kpl_thd" required>
                                                <option value="">Pilih Kepala thd PAP</option>
                                                <option value="M">M</option>
                                                <option value="MB">MB</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="edit_tbj" class="form-label">TBJ <sup>(gram)</sup></label>
                                            <div class="input-group mb-2">
                                                <input type="number" class="form-control" id="edit_tbj" name="tbj"
                                                    required>
                                                <span class="input-group-text">gram</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="edit_presentasi" class="form-label">Presentasi<sup>4)</sup></label>
                                            <select class="form-select" id="edit_presentasi" name="presentasi" required>
                                                <option value="">Pilih Presentasi</option>
                                                <option value="KP">KP</option>
                                                <option value="BS">BS</option>
                                                <option value="LLO">LLO</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="edit_jmlh_janin" class="form-label">Jumlah Janin<sup>5)</sup></label>
                                            <select class="form-select" id="edit_jmlh_janin" name="jmlh_janin" required>
                                                <option value="">Pilih Jumlah Janin</option>
                                                <option value="T">T</option>
                                                <option value="G">G</option>
                                            </select>
                                        </div>
                                    </div>
                                    <h5 class="card-title">Pelayanan</h5>
                                    <div class="row mb-3">
                                        <div class="col-md-3">
                                            <label for="edit_buku_kia" class="form-label">Catatan dibuku KIA*</label>
                                            <select class="form-select" id="edit_buku_kia" name="buku_kia" required>
                                                <option value="">Pilih Catatan dibuku KIA*</option>
                                                <option value="jika iya">&#10003; <!-- Ceklis --></option>
                                                <option value="jika tidak">&#10007; <!-- Uncek --></option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <br>
                                            <label for="edit_injeksi" class="form-label">Injeksi Td*</label>
                                            <select class="form-select" id="edit_injeksi" name="injeksi" required>
                                                <option value="">Pilih Injeksi Td*</option>
                                                <option value="jika iya">&#10003; <!-- Ceklis --></option>
                                                <option value="jika tidak">&#10007; <!-- Uncek --></option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <br>
                                            <label for="edit_fe" class="form-label">Fe <sup>(tab/botol)</sup></label>
                                            <input type="number" class="form-control" id="edit_fe" name="fe"
                                                required>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="edit_pmt_bumil" class="form-label">PMT Bumil KEK</label>
                                            <select class="form-select" id="edit_pmt_bumil" name="pmt_bumil" required>
                                                <option value="">Pilih PMT Bumil KEK*</option>
                                                <option value="jika iya">&#10003; <!-- Ceklis --></option>
                                                <option value="jika tidak">&#10007; <!-- Uncek --></option>
                                            </select>
                                        </div>
                                        <div class="col-md-5">
                                            <label for="edit_kelas_ibu" class="form-label">Ikut Kelas Ibu*</label>
                                            <select class="form-select" id="edit_kelas_ibu" name="kelas_ibu" required>
                                                <option value="">Pilih Ikut Kelas Ibu</option>
                                                <option value="jika iya">&#10003; <!-- Ceklis --></option>
                                                <option value="jika tidak">&#10007; <!-- Uncek --></option>
                                            </select>
                                        </div>
                                    </div>
                                    <h5 class="card-title">Konseling</h5>
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <label for="edit_konseling" class="form-label">Konseling</label>
                                            <input type="text" class="form-control" id="edit_konseling" name="konseling"
                                                required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">Laboratorium</h5>
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <label for="edit_hemoglobin"
                                                class="form-label">Hemoglobin<sup>(gr/dl)</sup></label>
                                            <input type="number" class="form-control" id="edit_hemoglobin" name="hemoglobin"
                                                required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="edit_glcs_urine" class="form-label">Glucosa
                                                Urine<sup>(-/+)</sup></label>
                                            <select class="form-select" id="edit_glcs_urine" name="glcs_urine" required>
                                                <option value="">Pilih Glucosa Urine</option>
                                                <option value="-">-</option>
                                                <option value="+">+</option>
                                            </select>
                                        </div>
                                    </div>
                                    <h5 class="card-title">Integrasi Program - PMTCT</h5>
                                    <div class="row">
                                        <div class="col-md-3 mb-3">
                                            <label for="edit_sifilis" class="form-label">Sifilis<sup>(-/+)</sup></label>
                                            <select class="form-select" id="edit_sifilis" name="sifilis" required>
                                                <option value="">Pilih Sifilis</option>
                                                <option value="-">-</option>
                                                <option value="+">+</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="edit_hbsag" class="form-label">HBsAg<sup>(-/+)</sup></label>
                                            <select class="form-select" id="edit_hbsag" name="hbsag" required>
                                                <option value="">Pilih HBsAg</option>
                                                <option value="-">-</option>
                                                <option value="+">+</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="edit_hiv" class="form-label">HIV<sup>(-/+)</sup></label>
                                            <select class="form-select" id="edit_hiv" name="hiv" required>
                                                <option value="">Pilih HIV</option>
                                                <option value="-">-</option>
                                                <option value="+">+</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="edit_arv" class="form-label">Arv Profilaksis</label>
                                            <input type="number" class="form-control" id="edit_arv" name="arv"
                                                required>
                                        </div>
                                    </div>
                                    <h5 class="card-title">Integrasi Program - Malaria</h5>
                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <label for="edit_malaria" class="form-label">Malaria<sup>(-/+)</sup></label>
                                            <select class="form-select" id="edit_malaria" name="malaria" required>
                                                <option value="">Pilih Sifilis</option>
                                                <option value="-">-</option>
                                                <option value="+">+</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="edit_obat_malaria" class="form-label">Obat<sup>***</sup></label>
                                            <input type="text" class="form-control" id="edit_obat_malaria"
                                                name="obat_malaria" required>
                                        </div>
                                        <div class="col-md-5">
                                            <label for="edit_kelambu" class="form-label">Kelambu
                                                berinsektisida<sup>*</sup></label>
                                            <input type="text" class="form-control" id="edit_kelambu" name="kelambu"
                                                required>
                                        </div>
                                    </div>
                                    <h5 class="card-title">Integrasi Program - TB</h5>
                                    <div class="row">
                                        <div class="col-md-3 mb-3">
                                            <label for="edit_skrining_anam" class="form-label">Skrining
                                                anamnesis<sup>*</sup></label>
                                            <select class="form-select" id="edit_skrining_anam" name="skrining_anam" required>
                                                <option value="">Pilih Skrining anamnesis*</option>
                                                <option value="jika iya">&#10003; <!-- Ceklis --></option>
                                                <option value="jika tidak">&#10007; <!-- Uncek --></option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="edit_dahak" class="form-label">Periksa Dahak<sup>*</sup></label>
                                            <select class="form-select" id="edit_dahak" name="dahak" required>
                                                <option value="">Pilih Periksa Dahak*</option>
                                                <option value="jika iya">&#10003; <!-- Ceklis --></option>
                                                <option value="jika tidak">&#10007; <!-- Uncek --></option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <br>
                                            <label for="edit_tbc" class="form-label">TBC<sup>(-/+)</sup></label>
                                            <select class="form-select" id="edit_tbc" name="tbc" required>
                                                <option value="">Pilih Tbc</option>
                                                <option value="-">-</option>
                                                <option value="+">+</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <br>
                                            <label for="edit_obat_TB" class="form-label">Obat<sup>***</sup></label>
                                            <input type="text" class="form-control" id="edit_obat_TB" name="obat_TB"
                                                required>
                                        </div>
                                    </div>
                                    <h5 class="card-title">Integrasi Program - Skrining Covid-19</h5>
                                    <div class="row mb-3">
                                        <div class="col-md-3">
                                            <label for="edit_sehat" class="form-label">Sehat</label>
                                            <select class="form-select" id="edit_sehat" name="sehat" required>
                                                <option value="">Pilih Skrining Covid-19*</option>
                                                <option value="jika iya">&#10003; <!-- Ceklis --></option>
                                                <option value="jika tidak">&#10007; <!-- Uncek --></option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="edit_kontak_erat" class="form-label">Kontak Erat</label>
                                            <select class="form-select" id="edit_kontak_erat" name="kontak_erat" required>
                                                <option value="">Pilih Kontak Erat*</option>
                                                <option value="jika iya">&#10003; <!-- Ceklis --></option>
                                                <option value="jika tidak">&#10007; <!-- Uncek --></option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="edit_suspek" class="form-label">Suspek</label>
                                            <select class="form-select" id="edit_suspek" name="suspek" required>
                                                <option value="">Pilih Suspek*</option>
                                                <option value="jika iya">&#10003; <!-- Ceklis --></option>
                                                <option value="jika tidak">&#10007; <!-- Uncek --></option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="edit_konfimasi" class="form-label">Terkonfirmasi</label>
                                            <select class="form-select" id="edit_konfimasi" name="konfimasi" required>
                                                <option value="">Pilih Terkonfirmasi*</option>
                                                <option value="jika iya">&#10003; <!-- Ceklis --></option>
                                                <option value="jika tidak">&#10007; <!-- Uncek --></option>
                                            </select>
                                        </div>
                                    </div>
                                    <h5 class="card-title">Komplikasi</h5>
                                    <div class="row mb-3">
                                        <div class="col-md-3">
                                            <label for="edit_hdk" class="form-label">HDK</label>
                                            <select class="form-select" id="edit_hdk" name="hdk" required>
                                                <option value="">Pilih HDK</option>
                                                <option value="jika iya">&#10003; <!-- Ceklis --></option>
                                                <option value="jika tidak">&#10007; <!-- Uncek --></option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="edit_abortus" class="form-label">Abortus</label>
                                            <select class="form-select" id="edit_abortus" name="abortus" required>
                                                <option value="">Pilih Abortus*</option>
                                                <option value="jika iya">&#10003; <!-- Ceklis --></option>
                                                <option value="jika tidak">&#10007; <!-- Uncek --></option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="edit_pendarahan" class="form-label">Pendarahan</label>
                                            <select class="form-select" id="edit_pendarahan" name="pendarahan" required>
                                                <option value="">Pilih Pendarahan*</option>
                                                <option value="jika iya">&#10003; <!-- Ceklis --></option>
                                                <option value="jika tidak">&#10007; <!-- Uncek --></option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="edit_infeksi" class="form-label">Infeksi</label>
                                            <select class="form-select" id="edit_infeksi" name="infeksi" required>
                                                <option value="">Pilih Infeksi*</option>
                                                <option value="jika iya">&#10003; <!-- Ceklis --></option>
                                                <option value="jika tidak">&#10007; <!-- Uncek --></option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="edit_anemia" class="form-label">Anemia</label>
                                            <select class="form-select" id="edit_anemia" name="anemia" required>
                                                <option value="">Pilih Anemia*</option>
                                                <option value="jika iya">&#10003; <!-- Ceklis --></option>
                                                <option value="jika tidak">&#10007; <!-- Uncek --></option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="edit_kpd" class="form-label">KPD</label>
                                            <select class="form-select" id="edit_kpd" name="kpd" required>
                                                <option value="">Pilih KPD*</option>
                                                <option value="jika iya">&#10003; <!-- Ceklis --></option>
                                                <option value="jika tidak">&#10007; <!-- Uncek --></option>
                                            </select>
                                        </div>
                                        <div class="col-md-5">
                                            <label for="edit_lain_lain" class="form-label">Lain - lain</label>
                                            <input type="text" class="form-control" id="edit_lain_lain" name="lain_lain"
                                                required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            let modalInput = $('#modalInput');
            $('#btn-plus').click(function() {
                modalInput.modal('show');
            });
        });
        $(document).ready(function() {
            $('#anc-table').DataTable({
                processing: true,
                serverSide: true,
                lengthChange: false,
                searching: false,
                ordering: false,
                paging: false,
                info: false,
                ajax: "{{ route('rekam_medis.data_showanc', ['NIK' => $anc->NIK]) }}",
                columns: [{
                        data: 'id',
                        name: 'id',
                        render: function(data, type, row, meta) {
                            return '<span class="trigger-modal" data-id="' + row.id + '">' + (meta
                                    .row + 1) +
                                '</span>';
                        }
                    },
                    {
                        data: 'tanggal',
                        name: 'tanggal',
                        render: function(data, type, row, meta) {
                            var date = new Date(data);
                            var day = date.getDate();
                            var month = date.getMonth() + 1;
                            var year = date.getFullYear().toString().slice(-2);
                            day = day < 10 ? '0' + day : day;
                            month = month < 10 ? '0' + month : month;
                            return day + '/' + month + '/' + year;
                        }
                    },
                    {
                        data: 'usia_kehamilan',
                        name: 'usia_kehamilan'
                    },
                    {
                        data: 'trimester',
                        name: 'trimester'
                    },
                    {
                        data: 'keluhan',
                        name: 'keluhan'
                    },
                    {
                        data: 'berat_badan',
                        name: 'berat_badan'
                    },
                    {
                        data: 'td_mmhg',
                        name: 'td_mmhg'
                    },
                    {
                        data: 'lila',
                        name: 'lila'
                    },
                    {
                        data: 'sts_gizi',
                        name: 'sts_gizi'
                    },
                    {
                        data: 'tfu',
                        name: 'tfu'
                    },
                    {
                        data: 'sts_imunisasi',
                        name: 'sts_imunisasi'
                    },
                    {
                        data: 'djj',
                        name: 'djj'
                    },
                    {
                        data: 'kpl_thd',
                        name: 'kpl_thd'
                    },
                    {
                        data: 'tbj',
                        name: 'tbj'
                    },
                    {
                        data: 'presentasi',
                        name: 'presentasi'
                    },
                    {
                        data: 'jmlh_janin',
                        name: 'jmlh_janin'
                    },
                    {
                        data: 'injeksi',
                        name: 'injeksi',
                        render: function(data, type, row, meta) {
                            return data.toLowerCase() === 'jika iya' ? '&#10003;' : '&#10007;';
                        }
                    },
                    {
                        data: 'buku_kia',
                        name: 'buku_kia',
                        render: function(data, type, row, meta) {
                            return data.toLowerCase() === 'jika iya' ? '&#10003;' : '&#10007;';
                        }
                    },
                    {
                        data: 'fe',
                        name: 'fe'
                    },
                    {
                        data: 'pmt_bumil',
                        name: 'pmt_bumil',
                        render: function(data, type, row, meta) {
                            return data.toLowerCase() === 'jika iya' ? '&#10003;' : '&#10007;';
                        }
                    },
                    {
                        data: 'kelas_ibu',
                        name: 'kelas_ibu',
                        render: function(data, type, row, meta) {
                            return data.toLowerCase() === 'jika iya' ? '&#10003;' : '&#10007;';
                        }
                    },
                    {
                        data: 'konseling',
                        name: 'konseling'
                    },
                    {
                        data: 'hemoglobin',
                        name: 'hemoglobin'
                    },
                    {
                        data: 'glcs_urine',
                        name: 'glcs_urine'
                    },
                    {
                        data: 'sifilis',
                        name: 'sifilis'
                    },
                    {
                        data: 'hbsag',
                        name: 'hbsag'
                    },
                    {
                        data: 'hiv',
                        name: 'hiv'
                    },
                    {
                        data: 'arv',
                        name: 'arv'
                    },
                    {
                        data: 'malaria',
                        name: 'malaria'
                    },
                    {
                        data: 'obat_malaria',
                        name: 'obat_malaria'
                    },
                    {
                        data: 'kelambu',
                        name: 'kelambu'
                    },
                    {
                        data: 'skrining_anam',
                        name: 'skrining_anam'
                    },
                    {
                        data: 'dahak',
                        name: 'dahak'
                    },
                    {
                        data: 'tbc',
                        name: 'tbc'
                    },
                    {
                        data: 'obat_TB',
                        name: 'obat_TB'
                    },
                    {
                        data: 'sehat',
                        name: 'sehat'
                    },
                    {
                        data: 'kontak_erat',
                        name: 'kontak_erat'
                    },
                    {
                        data: 'suspek',
                        name: 'suspek'
                    },
                    {
                        data: 'konfimasi',
                        name: 'konfimasi'
                    },
                    {
                        data: 'hdk',
                        name: 'hdk'
                    },
                    {
                        data: 'abortus',
                        name: 'abortus'
                    },
                    {
                        data: 'pendarahan',
                        name: 'pendarahan'
                    },
                    {
                        data: 'anemia',
                        name: 'anemia'
                    },
                    {
                        data: 'infeksi',
                        name: 'infeksi'
                    },
                    {
                        data: 'kpd',
                        name: 'kpd'
                    },
                    {
                        data: 'lain_lain',
                        name: 'lain_lain'
                    },
                ],
                createdRow: function(row, data, dataIndex) {
                    $(row).addClass('text-center');
                },
                fixedColumns: false,
                responsive: false,
                scrollX: true
            });
        });

        $('#anc-table').on('click', '.trigger-modal', function() {
            let id = $(this).data('id');
            $.ajax({
                url: '{{ route('rekam_medis.edit_showanc', ':id') }}'.replace(':id', id),
                method: 'GET',
                success: function(data) {
                    $('#edit_tanggal').val(data.tanggal);
                    $('#edit_usia_kehamilan').val(data.usia_kehamilan);
                    $('#edit_trimester').val(data.trimester);
                    $('#edit_keluhan').val(data.keluhan);
                    $('#edit_berat_badan').val(data.berat_badan);
                    $('#edit_td_mmhg').val(data.td_mmhg);
                    $('#edit_lila').val(data.lila);
                    $('#edit_sts_gizi').val(data.sts_gizi);
                    $('#edit_tfu').val(data.tfu);
                    $('#edit_sts_imunisasi').val(data.sts_imunisasi);
                    $('#edit_djj').val(data.djj);
                    $('#edit_kpl_thd').val(data.kpl_thd);
                    $('#edit_tbj').val(data.tbj);
                    $('#edit_presentasi').val(data.presentasi);
                    $('#edit_jmlh_janin').val(data.jmlh_janin);
                    $('#edit_injeksi').val(data.injeksi);
                    $('#edit_buku_kia').val(data.buku_kia);
                    $('#edit_fe').val(data.fe);
                    $('#edit_pmt_bumil').val(data.pmt_bumil);
                    $('#edit_kelas_ibu').val(data.kelas_ibu);
                    $('#edit_konseling').val(data.konseling);
                    $('#edit_hemoglobin').val(data.hemoglobin);
                    $('#edit_glcs_urine').val(data.glcs_urine);
                    $('#edit_sifilis').val(data.sifilis);
                    $('#edit_hbsag').val(data.hbsag);
                    $('#edit_hiv').val(data.hiv);
                    $('#edit_arv').val(data.arv);
                    $('#edit_malaria').val(data.malaria);
                    $('#edit_obat_malaria').val(data.obat_malaria);
                    $('#edit_kelambu').val(data.kelambu);
                    $('#edit_skrining_anam').val(data.skrining_anam);
                    $('#edit_dahak').val(data.dahak);
                    $('#edit_tbc').val(data.tbc);
                    $('#edit_obat_TB').val(data.obat_TB);
                    $('#edit_sehat').val(data.sehat);
                    $('#edit_kontak_erat').val(data.kontak_erat);
                    $('#edit_suspek').val(data.suspek);
                    $('#edit_konfimasi').val(data.konfimasi);
                    $('#edit_hdk').val(data.hdk);
                    $('#edit_abortus').val(data.abortus);
                    $('#edit_pendarahan').val(data.pendarahan);
                    $('#edit_infeksi').val(data.infeksi);
                    $('#edit_anemia').val(data.anemia);
                    $('#edit_kpd').val(data.kpd);
                    $('#edit_lain_lain').val(data.lain_lain);
                    $('#editForm').attr('action',
                        '{{ route('rekam_medis.update_showanc', ':id') }}'
                        .replace(
                            ':id', id));
                    $('#modalEdit').modal('show');
                }
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            if (window.location.pathname.includes('/rekam_medis/anc/show_anc')) {
                var body = document.querySelector('body');
                body.classList.add('toggle-sidebar');
            }
        });
    </script>
@endsection
