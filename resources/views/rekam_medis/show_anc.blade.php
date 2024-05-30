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
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button type="button" class="btn btn-primary" id="btn-edit">
                <i class="bi bi-pencil"></i> Update
            </button>
            </button>
            <button type="button" class="btn btn-success" id="btn-plus">
                <i class="bi bi-plus-circle"></i> Tambah
            </button>
        </div>
    </div>

    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Detail ANC</h5>
                        <div class="table-responsive">
                            <table class="table table-bordered table-anc" id="anc-table" style="width:100%">
                                <thead>
                                    <tr>
                                        <th rowspan="3" class="align-middle text-center">No.</th>
                                        <th colspan="3" rowspan="2" class="align-middle text-center">REGISTER</th>
                                        <th colspan="12" class="text-center">PEMERIKSAAN</th>
                                        <th colspan="5" rowspan="2" class="text-center align-middle">PELAYANAN</th>
                                        <th rowspan="3" class="text-center align-middle">KONSELING</th>
                                    </tr>
                                    <tr>
                                        <th colspan="7" class="text-center">IBU</th>
                                        <th colspan="5" class="text-center">BAYI</th>
                                    </tr>
                                    <tr>
                                        <th class="align-middle text-center normal-header">Tanggal</th>
                                        <th class="align-middle text-center normal-header">Usia Kehamilan</th>
                                        <th class="align-middle text-center normal-header">Trimester ke</th>
                                        <th class="align-middle text-center normal-header">Keluhan</th>
                                        <th class="align-middle text-center normal-header">BB (kg)</th>
                                        <th class="align-middle text-center normal-header">TD (mmHg)</th>
                                        <th class="align-middle text-center normal-header">LILA (cm)</th>
                                        <th class="align-middle text-center normal-header">Status Gizi</th>
                                        <th class="align-middle text-center normal-header">TFU (cm)</th>
                                        <th class="align-middle text-center normal-header">Status Imunisasi Td</th>
                                        <th class="align-middle text-center normal-header">DJJ (x/menit)</th>
                                        <th class="align-middle text-center normal-header">Kepala thd PAP</th>
                                        <th class="align-middle text-center normal-header">TBJ (gram)</th>
                                        <th class="align-middle text-center normal-header">Presentasi</th>
                                        <th class="align-middle text-center normal-header">Jumlah Janin</th>
                                        <th class="align-middle text-center normal-header">Injeksi Td *</th>
                                        <th class="align-middle text-center normal-header">Catat di Buku KIA *</th>
                                        <th class="align-middle text-center normal-header">Fe (tab/botol)</th>
                                        <th class="align-middle text-center normal-header">PMT Bumil KEK</th>
                                        <th class="align-middle text-center normal-header">Ikut Kelas Ibu</th>
                                    </tr>
                                    <tr>
                                        <td class="text-center">1</td>
                                        <td class="text-center">2</td>
                                        <td class="text-center">3</td>
                                        <td class="text-center">4</td>
                                        <td class="text-center">5</td>
                                        <td class="text-center">6</td>
                                        <td class="text-center">7</td>
                                        <td class="text-center">8</td>
                                        <td class="text-center">9</td>
                                        <td class="text-center">10</td>
                                        <td class="text-center">11</td>
                                        <td class="text-center">12</td>
                                        <td class="text-center">13</td>
                                        <td class="text-center">14</td>
                                        <td class="text-center">15</td>
                                        <td class="text-center">16</td>
                                        <td class="text-center">17</td>
                                        <td class="text-center">18</td>
                                        <td class="text-center">19</td>
                                        <td class="text-center">20</td>
                                        <td class="text-center">21</td>
                                        <td class="text-center">22</td>
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
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title fs-4 fw-bold" id="ModalInput">Input ANC</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('rekam_medis.store_showanc') }}" method="post" autocomplete="off">
                        @csrf
                        <div class="card">
                            <div class="card-body">
                                <!-- REGISTER section -->
                                <h5 class="card-title">Register</h5>
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

                                <!-- PEMERIKSAAN IBU section -->
                                <h5 class="card-title">Pemeriksaan Ibu</h5>
                                <div class="col-md-12 mb-3">
                                    <label for="keluhan" class="form-label">Keluhan</label>
                                    <input type="text" class="form-control" id="keluhan" name="keluhan" required>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-3">
                                        <label for="berat_badan" class="form-label">Berat Badan <sup>(kg)</sup></label>
                                        <div class="input-group mb-2">
                                            <input type="number" class="form-control" id="berat_badan"
                                                name="berat_badan" required>
                                            <span class="input-group-text">kg</span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="td_mmhg" class="form-label">TD <sup>(mmhg)</sup></label>
                                        <div class="input-group mb-2">
                                            <input type="number" class="form-control" id="td_mmhg" name="td_mmhg"
                                                required>
                                            <span class="input-group-text">mmhg</span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="lila" class="form-label">LILA <sup>(cm)</sup></label>
                                        <div class="input-group mb-2">
                                            <input type="number" class="form-control" id="lila" name="lila"
                                                required>
                                            <span class="input-group-text">cm</span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="sts_gizi" class="form-label">Status Gizi <sup>2)</sup></label>
                                        <input type="text" class="form-control" id="sts_gizi" name="sts_gizi"
                                            required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="tfu" class="form-label">TFU <sup>(cm)</sup></label>
                                        <div class="input-group mb-2">
                                            <input type="text" class="form-control" id="tfu" name="tfu"
                                                required>
                                            <span class="input-group-text">cm</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="sts_imunisasi" class="form-label">Status Imunisasi Td
                                            <sup>6)</sup></label>
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

                                <!-- PEMERIKSAAN BAYI section -->
                                <h5 class="card-title">Pemeriksaan Bayi</h5>
                                <div class="row mb-3">
                                    <div class="col-md-3">
                                        <label for="djj" class="form-label">DJJ <sup>((x/menit))</sup></label>
                                        <div class="input-group mb-2">
                                            <input type="number" class="form-control" id="djj" name="djj"
                                                required>
                                            <span class="input-group-text">menit</span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="kpl_thd" class="form-label">Kepala thd PAP<sup>3)</sup></label>
                                        <select class="form-select" id="kpl_thd" name="kpl_thd" required>
                                            <option value="">Pilih Kepala thd PAP</option>
                                            <option value="M">M</option>
                                            <option value="MB">MB</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="tbj" class="form-label">TBJ <sup>(gram)</sup></label>
                                        <div class="input-group mb-2">
                                            <input type="number" class="form-control" id="tbj" name="tbj"
                                                required>
                                            <span class="input-group-text">gram</span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
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

                                <!-- PELAYANAN section -->
                                <h5 class="card-title">Pelayanan</h5>
                                <div class="row mb-3">
                                    <div class="col-md-3">
                                        <label for="injeksi" class="form-label">Injeksi Td*</label>
                                        <select class="form-select" id="injeksi" name="injeksi" required>
                                            <option value="">Pilih Injeksi Td*</option>
                                            <option value="jika iya">&#10003; <!-- Ceklis --></option>
                                            <option value="jika tidak">&#10007; <!-- Uncek --></option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="buku_kia" class="form-label">Catatan dibuku KIA*</label>
                                        <select class="form-select" id="buku_kia" name="buku_kia" required>
                                            <option value="">Pilih Catatan dibuku KIA*</option>
                                            <option value="jika iya">&#10003; <!-- Ceklis --></option>
                                            <option value="jika tidak">&#10007; <!-- Uncek --></option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
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
                                    <div class="col-md-3">
                                        <label for="kelas_ibu" class="form-label">Ikut Kelas Ibu*</label>
                                        <select class="form-select" id="kelas_ibu" name="kelas_ibu" required>
                                            <option value="">Pilih Ikut Kelas Ibu</option>
                                            <option value="jika iya">&#10003; <!-- Ceklis --></option>
                                            <option value="jika tidak">&#10007; <!-- Uncek --></option>
                                        </select>
                                    </div>
                                </div>

                                <!-- KONSELING section -->
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
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="ModalEdit" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title fs-4 fw-bold" id="ModalEdit">Update ANC</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                    <form id="editForm" method="post" autocomplete="off">
                        @csrf
                        @method('PUT')
                        <div class="card">
                            <div class="card-body">
                                <!-- REGISTER section -->
                                <h5 class="card-title">Register</h5>
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

                                <!-- PEMERIKSAAN IBU section -->
                                <h5 class="card-title">Pemeriksaan Ibu</h5>
                                <div class="col-md-12 mb-3">
                                    <label for="edit_keluhan" class="form-label">Keluhan</label>
                                    <input type="text" class="form-control" id="edit_keluhan" name="keluhan" required>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-3">
                                        <label for="edit_berat_badan" class="form-label">Berat Badan <sup>(kg)</sup></label>
                                        <div class="input-group mb-2">
                                            <input type="number" class="form-control" id="edit_berat_badan"
                                                name="berat_badan" required>
                                            <span class="input-group-text">kg</span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="edit_td_mmhg" class="form-label">TD <sup>(mmhg)</sup></label>
                                        <div class="input-group mb-2">
                                            <input type="number" class="form-control" id="edit_td_mmhg" name="td_mmhg"
                                                required>
                                            <span class="input-group-text">mmhg</span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="edit_lila" class="form-label">LILA <sup>(cm)</sup></label>
                                        <div class="input-group mb-2">
                                            <input type="number" class="form-control" id="edit_lila" name="lila"
                                                required>
                                            <span class="input-group-text">cm</span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="edit_sts_gizi" class="form-label">Status Gizi <sup>2)</sup></label>
                                        <input type="text" class="form-control" id="edit_sts_gizi" name="sts_gizi"
                                            required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="edit_tfu" class="form-label">TFU <sup>(cm)</sup></label>
                                        <div class="input-group mb-2">
                                            <input type="text" class="form-control" id="edit_tfu" name="tfu"
                                                required>
                                            <span class="input-group-text">cm</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="edit_sts_imunisasi" class="form-label">Status Imunisasi Td
                                            <sup>6)</sup></label>
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

                                <!-- PEMERIKSAAN BAYI section -->
                                <h5 class="card-title">Pemeriksaan Bayi</h5>
                                <div class="row mb-3">
                                    <div class="col-md-3">
                                        <label for="edit)djj" class="form-label">DJJ <sup>((x/menit))</sup></label>
                                        <div class="input-group mb-2">
                                            <input type="number" class="form-control" id="edit)djj" name="djj"
                                                required>
                                            <span class="input-group-text">menit</span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="edit_kpl_thd" class="form-label">Kepala thd PAP<sup>3)</sup></label>
                                        <select class="form-select" id="edit_kpl_thd" name="kpl_thd" required>
                                            <option value="">Pilih Kepala thd PAP</option>
                                            <option value="M">M</option>
                                            <option value="MB">MB</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="edit_tbj" class="form-label">TBJ <sup>(gram)</sup></label>
                                        <div class="input-group mb-2">
                                            <input type="number" class="form-control" id="edit_tbj" name="tbj"
                                                required>
                                            <span class="input-group-text">gram</span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
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

                                <!-- PELAYANAN section -->
                                <h5 class="card-title">Pelayanan</h5>
                                <div class="row mb-3">
                                    <div class="col-md-3">
                                        <label for="edit_injeksi" class="form-label">Injeksi Td*</label>
                                        <select class="form-select" id="edit_injeksi" name="injeksi" required>
                                            <option value="">Pilih Injeksi Td*</option>
                                            <option value="jika iya">&#10003; <!-- Ceklis --></option>
                                            <option value="jika tidak">&#10007; <!-- Uncek --></option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="edit_buku_kia" class="form-label">Catatan dibuku KIA*</label>
                                        <select class="form-select" id="edit_buku_kia" name="buku_kia" required>
                                            <option value="">Pilih Catatan dibuku KIA*</option>
                                            <option value="jika iya">&#10003; <!-- Ceklis --></option>
                                            <option value="jika tidak">&#10007; <!-- Uncek --></option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
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
                                    <div class="col-md-3">
                                        <label for="edit_kelas_ibu" class="form-label">Ikut Kelas Ibu*</label>
                                        <select class="form-select" id="edit_kelas_ibu" name="kelas_ibu" required>
                                            <option value="">Pilih Ikut Kelas Ibu</option>
                                            <option value="jika iya">&#10003; <!-- Ceklis --></option>
                                            <option value="jika tidak">&#10007; <!-- Uncek --></option>
                                        </select>
                                    </div>
                                </div>

                                <!-- KONSELING section -->
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
            let modalEdit = $('#modalEdit');
            $('#btn-edit').click(function() {
                modalEdit.modal('show');
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
                responsive: true,
                info: false,
                ajax: "{{ route('rekam_medis.data_showanc') }}",
                columns: [{
                        data: 'id',
                        name: 'id',
                        className: 'text-center'
                    },
                    {
                        data: 'tanggal',
                        name: 'tanggal',
                        className: 'text-center'
                    },
                    {
                        data: 'usia_kehamilan',
                        name: 'usia_kehamilan',
                        className: 'text-center'
                    },
                    {
                        data: 'trimester',
                        name: 'trimester',
                        className: 'text-center'
                    },
                    {
                        data: 'keluhan',
                        name: 'keluhan',
                        className: 'text-center'
                    },
                    {
                        data: 'berat_badan',
                        name: 'berat_badan',
                        className: 'text-center'
                    },
                    {
                        data: 'td_mmhg',
                        name: 'td_mmhg',
                        className: 'text-center'
                    },
                    {
                        data: 'lila',
                        name: 'lila',
                        className: 'text-center'
                    },
                    {
                        data: 'sts_gizi',
                        name: 'sts_gizi',
                        className: 'text-center'
                    },
                    {
                        data: 'tfu',
                        name: 'tfu',
                        className: 'text-center'
                    },
                    {
                        data: 'sts_imunisasi',
                        name: 'sts_imunisasi',
                        className: 'text-center'
                    },
                    {
                        data: 'djj',
                        name: 'djj',
                        className: 'text-center'
                    },
                    {
                        data: 'kpl_thd',
                        name: 'kpl_thd',
                        className: 'text-center'
                    },
                    {
                        data: 'tbj',
                        name: 'tbj',
                        className: 'text-center'
                    },
                    {
                        data: 'presentasi',
                        name: 'presentasi',
                        className: 'text-center'
                    },
                    {
                        data: 'jmlh_janin',
                        name: 'jmlh_janin',
                        className: 'text-center'
                    },
                    {
                        data: 'injeksi',
                        name: 'injeksi',
                        className: 'text-center',
                        render: function(data, type, row, meta) {
                            if (data.toLowerCase() === 'jika iya') {
                                return '&#10003;';
                            } else if (data.toLowerCase() === 'jika tidak') {
                                return '&#10007;';
                                s
                            }
                            return data;
                        }
                    },
                    {
                        data: 'buku_kia',
                        name: 'buku_kia',
                        className: 'text-center',
                        render: function(data, type, row, meta) {
                            if (data.toLowerCase() === 'jika iya') {
                                return '&#10003;';
                            } else if (data.toLowerCase() === 'jika tidak') {
                                return '&#10007;';
                                s
                            }
                            return data;
                        }
                    },
                    {
                        data: 'fe',
                        name: 'fe',
                        className: 'text-center'
                    },
                    {
                        data: 'pmt_bumil',
                        name: 'pmt_bumil',
                        className: 'text-center',
                        render: function(data, type, row, meta) {
                            if (data.toLowerCase() === 'jika iya') {
                                return '&#10003;';
                            } else if (data.toLowerCase() === 'jika tidak') {
                                return '&#10007;';
                                s
                            }
                            return data;
                        }
                    },
                    {
                        data: 'kelas_ibu',
                        name: 'kelas_ibu',
                        className: 'text-center',
                        render: function(data, type, row, meta) {
                            if (data.toLowerCase() === 'jika iya') {
                                return '&#10003;';
                            } else if (data.toLowerCase() === 'jika tidak') {
                                return '&#10007;';
                                s
                            }
                            return data;
                        }
                    },
                    {
                        data: 'konseling',
                        name: 'konseling',
                        className: 'text-center'
                    },
                ],
                fixedColumns: true,
                scrollX: true
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
