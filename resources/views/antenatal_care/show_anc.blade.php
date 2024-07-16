@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <div class="pagetitle">
            <h1 style="margin-bottom: 5px">Detail Perawatan Selama Hamil</h1>
            <button type="button" class="btn btn-success btn-custom1" id="btn-plus">
                <i class="bi bi-plus-circle"></i> Tambah
            </button>
        </div>
    </div>

    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <br>
                        <div class="table-responsive">
                            <table class="table table-borderless table-anc" id="anc-table">
                                <thead>
                                    <tr>
                                        <th rowspan="3" class="align-middle text-center">No</th>
                                        <th colspan="3" rowspan="2" class="align-middle text-center">REGISTER</th>
                                        <th colspan="12" class="text-center">PEMERIKSAAN</th>
                                        <th colspan="5" rowspan="2" class="text-center align-middle">PELAYANAN</th>
                                        <th rowspan="3" class="text-center align-middle">KONSELING</th>
                                        <th colspan="2" rowspan="2" class="align-middle text-center">LABORA-<br>TORIUM
                                        </th>
                                        <th colspan="15" class="text-center">Inetegrasi Program</th>
                                        <th colspan="6" rowspan="2" class="align-middle text-center">KOMPLIKASI</th>
                                        <th colspan="5" rowspan="2" class="align-middle text-center">DIRUJUK KE</th>
                                        <th colspan="2" rowspan="2" class="align-middle text-center">KEADAAN</th>
                                        <th rowspan="3" class="text-center align-middle">KETERANGAN</th>
                                    </tr>
                                    <tr>
                                        <th colspan="7" class="align-middle text-center">IBU</th>
                                        <th colspan="5" class="align-middle text-center">BAYI</th>
                                        <th colspan="4" class="align-middle text-center">PMTCT</th>
                                        <th colspan="3" class="align-middle text-center">MALARIA</th>
                                        <th colspan="4" class="align-middle text-center">TB</th>
                                        <th colspan="4" class="align-middle text-center">SKRINING COVID-19</th>
                                    </tr>
                                    <tr>
                                        <th class="text-center normal-header">Tanggal</th>
                                        <th class="text-center vertical-header">Usia Kehamilan
                                        </th>
                                        <th class="text-center vertical-header">Trimester ke</th>
                                        <th class="text-center normal-header">Keluhan</th>
                                        <th class="text-center vertical-header">BB <small>(kg)</small></th>
                                        <th class="text-center vertical-header">TD <small>(mmHg)</small></th>
                                        <th class="text-center vertical-header">LILA <small>(cm)</small></th>
                                        <th class="text-center vertical-header">Status Gizi <sub>2)</sub></th>
                                        <th class="text-center vertical-header">TFU <small>(cm)</small></th>
                                        <th class="text-center vertical-header">Status Imunisasi Td <sub>6)</sub>
                                        </th>
                                        <th class="text-center vertical-header">DJJ <small>(x/menit)</small></th>
                                        <th class="text-center vertical-header">Kepala thd PAP <sub>3)</sub></th>
                                        <th class="text-center vertical-header">TBJ <small>(gram)</small></th>
                                        <th class="text-center vertical-header">Presentasi <sub>4)</sub></th>
                                        <th class="text-center vertical-header">Jumlah Janin <sub>5)</sub></th>
                                        <th class="text-center vertical-header">Injeksi Td <sub>*</sub></th>
                                        <th class="text-center vertical-header">Catat di Buku KIA <sub>*</sub>
                                        </th>
                                        <th class="text-center vertical-header">Fe <small>(tab/botol)</small></th>
                                        <th class="text-center vertical-header">PMT Bumil KEK</th>
                                        <th class="text-center vertical-header">Ikut Kelas Ibu</th>
                                        <th class="text-center vertical-header">Hemoglobin <small>(gr/dl)</small>
                                        </th>
                                        <th class="text-center vertical-header">Glucosa urine <samll>(+/-)</samll>
                                        </th>
                                        <th class="text-center vertical-header">Sifilis <small>(+/-)</small></th>
                                        <th class="text-center vertical-header">HBsAG<sub>*</sub></th>
                                        <th class="text-center vertical-header">HIV<small>(+/-)</small></th>
                                        <th class="text-center vertical-header">ARV Profilaksis<sub>***</sub>
                                        </th>
                                        <th class="text-center vertical-header">Malaria <small>(+/-)</small></th>
                                        <th class="text-center vertical-header">Obat <sub>***</sub></th>
                                        <th class="text-center vertical-header">Kelambu
                                            berinsektisida<sub>*</sub></th>
                                        <th class="text-center vertical-header">Skrining anamnesis<sub>*</sub>
                                        </th>
                                        <th class="text-center vertical-header">Periksa dahak<sub>*</sub></th>
                                        <th class="text-center vertical-header">TBC <small>(+/-)</small></th>
                                        <th class="text-center vertical-header">Obat<sub>***</sub></th>
                                        <th class="text-center vertical-header">Sehat</th>
                                        <th class="text-center vertical-header">Kontak Erat</th>
                                        <th class="text-center vertical-header">Suspek</th>
                                        <th class="text-center vertical-header">Terkonfirmasi</th>
                                        <th class="text-center vertical-header">HDK</th>
                                        <th class="text-center vertical-header">Abortus</th>
                                        <th class="text-center vertical-header">Pendarahan</th>
                                        <th class="text-center vertical-header">Infeksi</th>
                                        <th class="text-center vertical-header">KPD</th>
                                        <th class="text-center vertical-header">Lain-lain</th>
                                        <th class="text-center vertical-header">Puskesmas</th>
                                        <th class="text-center vertical-header">Klinik</th>
                                        <th class="text-center vertical-header">RSIA/RSB</th>
                                        <th class="text-center vertical-header">RS</th>
                                        <th class="text-center vertical-header">Lain-lain</th>
                                        <th class="text-center vertical-header">Tiba <small>(H/M)</small></th>
                                        <th class="text-center vertical-header">Pulang <small>(H/M)</small></th>
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
                    <h3 class="modal-title fs-4 fw-bold" id="ModalInput">Input Detail Perawatan Selama Hamil</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('antenatal_care.store_showanc') }}" method="post" autocomplete="off">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="card-body">
                                    <h5 class="card-title">Register</h5>
                                    <input type="hidden" name="id_ibu" value="{{ $anc->id_ibu }}">
                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <label for="tanggal" class="form-label">Tanggal</label>
                                            <input type="date" class="form-control" id="tanggal" name="tanggal"
                                                required>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="usia_kehamilan" class="form-label">Usia Kehamilan</label>
                                            <input type="number" class="form-control" id="usia_kehamilan"
                                                name="usia_kehamilan" required>
                                        </div>
                                        <div class="col-md-4 mb-3">
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
                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <label for="berat_badan" class="form-label">Berat Badan
                                                <sup>(kg)</sup></label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" id="berat_badan"
                                                    name="berat_badan" required>
                                                <span class="input-group-text">kg</span>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="td_mmhg" class="form-label">TD <sup>(mmhg)</sup></label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="td_mmhg" name="td_mmhg"
                                                    required>
                                                <span class="input-group-text">mmhg</span>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="lila" class="form-label">LILA <sup>(cm)</sup></label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="lila" name="lila"
                                                    pattern="[0-9,\,]*" required>
                                                <span class="input-group-text">cm</span>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="sts_gizi" class="form-label">Status Gizi
                                                <sup>2)</sup></label>
                                            <select class="form-select" id="sts_gizi" name="sts_gizi"
                                                onchange="this.value = this.dataset.defaultValue"
                                                data-default-value="Pilih Status Gizi">
                                                <option value="">Pilih Status Gizi</option>
                                                <option value="K">KEK</option>
                                                <option value="N">Normal</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="tfu" class="form-label">TFU <sup>(cm)</sup></label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="tfu" name="tfu"
                                                    pattern="[0-9,\,]*" required>
                                                <span class="input-group-text">cm</span>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="sts_imunisasi" class="form-label">Status Imunisasi Td</label>
                                            <select class="form-select" id="sts_imunisasi" name="sts_imunisasi" required>
                                                <option value="">Pilih Status Imunisasi</option>
                                                <option value="Td1">Td1</option>
                                                <option value="Td2">Td2</option>
                                                <option value="Td3">Td3</option>
                                                <option value="Td4">Td4</option>
                                                <option value="Td5">Td5</option>
                                                <option value="Td6">Td6</option>
                                            </select>
                                        </div>
                                    </div>
                                    <h5 class="card-title">Pemeriksaan Bayi</h5>
                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <label for="djj" class="form-label">DJJ <sup>(x/menit)</sup></label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="djj" name="djj"
                                                    pattern="[0-9,-]*">
                                                <span class="input-group-text">/menit</span>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="kpl_thd" class="form-label">Kepala thd
                                                PAP<sup>3)</sup></label>
                                            <select class="form-select" id="kpl_thd" name="kpl_thd" required>
                                                <option value="">Pilih Kepala thd PAP</option>
                                                <option value="M">Masuk</option>
                                                <option value="MB">Belum Masuk</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="tbj" class="form-label">TBJ <sup>(gram)</sup></label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="tbj" name="tbj"
                                                    pattern="[0-9,-]*">
                                                <span class="input-group-text">gram</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="presentasi" class="form-label">Presentasi<sup>4)</sup></label>
                                            <select class="form-select" id="presentasi" name="presentasi" required>
                                                <option value="">Pilih Presentasi</option>
                                                <option value="KP">Kepala</option>
                                                <option value="BS">Bokong/Sungsang</option>
                                                <option value="LLO">Letak Lintang/Obligue</option>
                                                <option value="-">Belum</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="jmlh_janin" class="form-label">Jumlah
                                                Janin<sup>5)</sup></label>
                                            <select class="form-select" id="jmlh_janin" name="jmlh_janin" required>
                                                <option value="">Pilih Jumlah Janin</option>
                                                <option value="Tunggal">Tunggal</option>
                                                <option value="Ganda">Ganda</option>
                                                <option value="-">Belum</option>
                                            </select>
                                        </div>
                                    </div>
                                    <h5 class="card-title">Pelayanan</h5>
                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <label for="buku_kia" class="form-label">Catatan dibuku KIA*</label>
                                            <select class="form-select" id="buku_kia" name="buku_kia" required>
                                                <option value="">Pilih Catatan dibuku KIA*</option>
                                                <option value="jika iya">&#10003;</option>
                                                <option value="jika tidak">&#10007;</option>
                                            </select>
                                        </div>
                                        <div class="col-md-5 mb-3">
                                            <br>
                                            <label for="injeksi" class="form-label">Injeksi Td*</label>
                                            <select class="form-select" id="injeksi" name="injeksi" required>
                                                <option value="">Pilih Injeksi Td*</option>
                                                <option value="jika iya">&#10003;</option>
                                                <option value="jika tidak">&#10007;</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <br>
                                            <label for="fe" class="form-label">Fe <sup>(tab/botol)</sup></label>
                                            <input type="number" class="form-control" id="fe" name="fe"
                                                pattern="[0-9,\,]*" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="pmt_bumil" class="form-label">PMT Bumil KEK</label>
                                            <select class="form-select" id="pmt_bumil" name="pmt_bumil" required>
                                                <option value="">Pilih PMT Bumil KEK*</option>
                                                <option value="jika iya">&#10003;</option>
                                                <option value="jika tidak">&#10007;</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="kelas_ibu" class="form-label">Ikut Kelas Ibu*</label>
                                            <select class="form-select" id="kelas_ibu" name="kelas_ibu" required>
                                                <option value="">Pilih Ikut Kelas Ibu</option>
                                                <option value="jika iya">&#10003;</option>
                                                <option value="jika tidak">&#10007;</option>
                                            </select>
                                        </div>
                                    </div>
                                    <h5 class="card-title">Konseling</h5>
                                    <div class="col-md-12 mb-3">
                                        <label for="konseling" class="form-label">
                                            Konseling</label>
                                        <input type="text" class="form-control" id="konseling" name="konseling"
                                            required>
                                    </div>
                                    <h5 class="card-title">Laboratorium</h5>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="hemoglobin"
                                                class="form-label">Hemoglobin<sup>(gr/dl)</sup></label>
                                            <input type="text" class="form-control" id="hemoglobin" name="hemoglobin"
                                                pattern="[0-9,\,]*" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="glcs_urine" class="form-label">Protein
                                                Urine<sup>(-/+)</sup></label>
                                            <select class="form-select" id="glcs_urine" name="glcs_urine" required>
                                                <option value="">Pilih Protein Urine</option>
                                                <option value="P">Positif</option>
                                                <option value="N">Negatif</option>
                                            </select>
                                        </div>
                                    </div>
                                    <h5 class="card-title">PMTCT</h5>
                                    <div class="row">
                                        <div class="col-md-3 mb-3">
                                            <label for="sifilis" class="form-label">Sifilis<sup>(-/+)</sup></label>
                                            <select class="form-select" id="sifilis" name="sifilis" required>
                                                <option value="">Pilih Sifilis</option>
                                                <option value="P">Positif</option>
                                                <option value="N">Negatif</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="hbsag" class="form-label">HBsAg<sup>(-/+)</sup></label>
                                            <select class="form-select" id="hbsag" name="hbsag" required>
                                                <option value="">Pilih HBsAg</option>
                                                <option value="jika iya">&#10003;</option>
                                                <option value="jika tidak">&#10007;</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="hiv" class="form-label">HIV<sup>(-/+)</sup></label>
                                            <select class="form-select" id="hiv" name="hiv" required>
                                                <option value="">Pilih HIV</option>
                                                <option value="P">Positif</option>
                                                <option value="N">Negatif</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="arv" class="form-label">Arv Profilaksis</label>
                                            <input type="text" class="form-control" id="arv" name="arv"
                                                required>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="card-body">
                                    <h5 class="card-title">Malaria</h5>
                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <label for="malaria" class="form-label">Malaria<sup>(-/+)</sup></label>
                                            <select class="form-select" id="malaria" name="malaria" required>
                                                <option value="">Pilih Malaria</option>
                                                <option value="P">Positif</option>
                                                <option value="N">Negatif</option>
                                            </select>
                                        </div>
                                        <div class="col-md-5 mb-3">
                                            <label for="kelambu" class="form-label">Kelambu
                                                berinsektisida<sup>*</sup></label>
                                            <select class="form-select" id="kelambu" name="kelambu" required>
                                                <option value="">Pilih Skrining anamnesis*</option>
                                                <option value="jika iya">&#10003;</option>
                                                <option value="jika tidak">&#10007;</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="obat_malaria" class="form-label">Obat<sup>***</sup></label>
                                            <select class="form-select" id="obat_malaria" name="obat_malaria" required>
                                                <option value="">Pilih Malaria</option>
                                                <option value="-" hidden>-</option>
                                                <option value="ART">Artesunat</option>
                                                <option value="AMO">Amodiakuin</option>
                                                <option value="KIN">Kina</option>
                                            </select>
                                        </div>
                                    </div>
                                    <h5 class="card-title">TB</h5>
                                    <div class="row">
                                        <div class="col-md-3 mb-3">
                                            <label for="skrining_anam" class="form-label">Skrining
                                                anamnesis<sup>*</sup></label>
                                            <select class="form-select" id="skrining_anam" name="skrining_anam" required>
                                                <option value="">Pilih Skrining anamnesis*</option>
                                                <option value="jika iya">&#10003;</option>
                                                <option value="jika tidak">&#10007;</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="dahak" class="form-label">Periksa Dahak<sup>*</sup></label>
                                            <select class="form-select" id="dahak" name="dahak" required>
                                                <option value="">Pilih Periksa Dahak*</option>
                                                <option value="jika iya">&#10003;</option>
                                                <option value="jika tidak">&#10007;</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <br>
                                            <label for="tbc" class="form-label">TBC<sup>(-/+)</sup></label>
                                            <select class="form-select" id="tbc" name="tbc" required>
                                                <option value="">Pilih Tbc</option>
                                                <option value="P">Positif</option>
                                                <option value="N">Negatif</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <br>
                                            <label for="obat_TB" class="form-label">Obat<sup>***</sup></label>
                                            <select class="form-select" id="obat_TB" name="obat_TB" required>
                                                <option value="">Pilih Tbc</option>
                                                <option value="-" hidden>-</option>
                                                <option value="R">Rifampisin</option>
                                                <option value="H">INH</option>
                                                <option value="Z">Pyrazinamid</option>
                                                <option value="E">Etahmbutol</option>
                                            </select>
                                        </div>
                                    </div>
                                    <h5 class="card-title">Skrining Covid-19</h5>
                                    <div class="row">
                                        <div class="col-md-3 mb-3">
                                            <label for="sehat" class="form-label">Sehat</label>
                                            <select class="form-select" id="sehat" name="sehat">
                                                <option value="">Pilih Skrining Covid-19*</option>
                                                <option value="jika iya">&#10003;</option>
                                                <option value="jika tidak">&#10007;</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="kontak_erat" class="form-label">Kontak Erat</label>
                                            <select class="form-select" id="kontak_erat" name="kontak_erat" required>
                                                <option value="">Pilih Kontak Erat*</option>
                                                <option value="jika iya">&#10003;</option>
                                                <option value="jika tidak">&#10007;</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="suspek" class="form-label">Suspek</label>
                                            <select class="form-select" id="suspek" name="suspek" required>
                                                <option value="">Pilih Suspek*</option>
                                                <option value="jika iya">&#10003;</option>
                                                <option value="jika tidak">&#10007;</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="konfimasi" class="form-label">Terkonfirmasi</label>
                                            <select class="form-select" id="konfimasi" name="konfimasi" required>
                                                <option value="">Pilih Terkonfirmasi*</option>
                                                <option value="jika iya">&#10003;</option>
                                                <option value="jika tidak">&#10007;</option>
                                            </select>
                                        </div>
                                    </div>
                                    <h5 class="card-title">Komplikasi</h5>
                                    <div class="row">
                                        <div class="col-md-3 mb-3">
                                            <label for="hdk" class="form-label">HDK</label>
                                            <select class="form-select" id="hdk" name="hdk"
                                                onchange="Komplikasi('hdk')">
                                                <option value="">Pilih HDK</option>
                                                <option value="-" hidden>-</option>
                                                <option value="jika iya">&#10003;</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="abortus" class="form-label">Abortus</label>
                                            <select class="form-select" id="abortus" name="abortus"
                                                onchange="Komplikasi('abortus')">
                                                <option value="">Pilih Abortus</option>
                                                <option value="-" hidden>-</option>
                                                <option value="jika iya">&#10003;</option>
                                            </select>
                                        </div>
                                        <div class="col-md-5 mb-3">
                                            <label for="pendarahan" class="form-label">Pendarahan</label>
                                            <select class="form-select" id="pendarahan" name="pendarahan"
                                                onchange="Komplikasi('pendarahan')">
                                                <option value="">Pilih Pendarahan</option>
                                                <option value="-" hidden>-</option>
                                                <option value="jika iya">&#10003;</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="infeksi" class="form-label">Infeksi</label>
                                            <select class="form-select" id="infeksi" name="infeksi"
                                                onchange="Komplikasi('infeksi')">
                                                <option value="">Pilih Infeksi</option>
                                                <option value="-" hidden>-</option>
                                                <option value="jika iya">&#10003;</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="kpd" class="form-label">KPD</label>
                                            <select class="form-select" id="kpd" name="kpd"
                                                onchange="Komplikasi('kpd')">
                                                <option value="">Pilih KPD</option>
                                                <option value="-" hidden>-</option>
                                                <option value="jika iya">&#10003;</option>
                                            </select>
                                        </div>
                                        <div class="col-md-5 mb-3">
                                            <label for="lain_lain_komplikasi" class="form-label"
                                                id="lain_lain_komplikasi_label">Lain - lain</label>
                                            <input type="text" class="form-control" id="lain_lain_komplikasi"
                                                name="lain_lain_komplikasi">
                                        </div>
                                    </div>
                                    <h5 class="card-title">Dirujuk Ke</h5>
                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <label for="puskesmas" class="form-label">Puskesmas</label>
                                            <select class="form-select" id="puskesmas" name="puskesmas"
                                                onchange="Dirujuk('puskesmas')">
                                                <option value="">Pilih Puskesmas</option>
                                                <option value="-" hidden>-</option>
                                                <option value="jika iya">&#10003;</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="klinik" class="form-label">Klinik</label>
                                            <select class="form-select" id="klinik" name="klinik"
                                                onchange="Dirujuk('klinik')">
                                                <option value="">Pilih Klinik</option>
                                                <option value="-" hidden>-</option>
                                                <option value="jika iya">&#10003;</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="rsia_rsb" class="form-label">RSIA/RSB</label>
                                            <select class="form-select" id="rsia_rsb" name="rsia_rsb"
                                                onchange="Dirujuk('rsia_rsb')">
                                                <option value="">Pilih RSIA/RSB</option>
                                                <option value="-" hidden>-</option>
                                                <option value="jika iya">&#10003;</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="rs" class="form-label">RS</label>
                                            <select class="form-select" id="rs" name="rs"
                                                onchange="Dirujuk('rs')">
                                                <option value="">Pilih RS</option>
                                                <option value="-" hidden>-</option>
                                                <option value="jika iya">&#10003;</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="lain_lain_dirujuk" class="form-label"
                                                id="lain_lain_dirujuk_label">Lain - lain</label>
                                            <input type="text" class="form-control" id="lain_lain_dirujuk"
                                                name="lain_lain_dirujuk">
                                        </div>
                                    </div>
                                    <h5 class="card-title">Keadaan</h5>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="tiba" class="form-label">Tiba</label>
                                            <select class="form-select" id="tiba" name="tiba" required>
                                                <option value="">Pilih Tiba</option>
                                                <option value="H">Hidup</option>
                                                <option value="M">Mati</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="pulang" class="form-label">Pulang</label>
                                            <select class="form-select" id="pulang" name="pulang" required>
                                                <option value="">Pilih Pulang</option>
                                                <option value="H">Hidup</option>
                                                <option value="M">Mati</option>
                                            </select>
                                        </div>
                                    </div>
                                    <h5 class="card-title">Keteranagan</h5>
                                    <div class="col-md-12 mb-3">
                                        <label for="keterangan" class="form-label">
                                            Keterangan</label>
                                        <input type="text" class="form-control" id="keterangan" name="keterangan"
                                            required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="ModalEdit" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title fs-4 fw-bold" id="ModalEdit">Edit Detail Perawatan Selama Hamil</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                    <form id="editForm" method="post" autocomplete="off">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-6">
                                <div class="card-body">
                                    <h5 class="card-title">Register</h5>
                                    <input type="hidden" name="id_ibu" value="{{ $anc->id_ibu }}">
                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <label for="edit_tanggal" class="form-label">Tanggal</label>
                                            <input type="date" class="form-control" id="edit_tanggal" name="tanggal"
                                                required>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="edit_usia_kehamilan" class="form-label">Usia Kehamilan</label>
                                            <input type="number" class="form-control" id="edit_usia_kehamilan"
                                                name="usia_kehamilan" required>
                                        </div>
                                        <div class="col-md-4 mb-3">
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
                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <label for="edit_berat_badan" class="form-label">Berat Badan
                                                <sup>(kg)</sup></label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" id="edit_berat_badan"
                                                    name="berat_badan" required>
                                                <span class="input-group-text">kg</span>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="edit_td_mmhg" class="form-label">TD <sup>(mmhg)</sup></label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="edit_td_mmhg"
                                                    name="td_mmhg" required>
                                                <span class="input-group-text">mmhg</span>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="edit_lila" class="form-label">LILA <sup>(cm)</sup></label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="edit_lila" name="lila"
                                                    pattern="[0-9,\,]*" required>
                                                <span class="input-group-text">cm</span>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="edit_sts_gizi" class="form-label">Status Gizi
                                                <sup>2)</sup></label>
                                            <select class="form-select" id="edit_sts_gizi" name="sts_gizi"
                                                onchange="this.value = this.dataset.defaultValue"
                                                data-default-value="Pilih Status Gizi">
                                                <option value="">Pilih Status Gizi</option>
                                                <option value="K">KEK</option>
                                                <option value="N">Normal</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="edit_tfu" class="form-label">TFU <sup>(cm)</sup></label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="edit_tfu" name="tfu"
                                                    pattern="[0-9,\,]*" required>
                                                <span class="input-group-text">cm</span>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="edit_sts_imunisasi" class="form-label">Status Imunisasi Td</label>
                                            <select class="form-select" id="edit_sts_imunisasi" name="sts_imunisasi"
                                                required>
                                                <option value="">Pilih Status Imunisasi</option>
                                                <option value="Td1">Td1</option>
                                                <option value="Td2">Td2</option>
                                                <option value="Td3">Td3</option>
                                                <option value="Td4">Td4</option>
                                                <option value="Td5">Td5</option>
                                                <option value="Td6">Td6</option>
                                            </select>
                                        </div>
                                    </div>
                                    <h5 class="card-title">Pemeriksaan Bayi</h5>
                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <label for="edit_djj" class="form-label">DJJ <sup>(x/menit)</sup></label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="edit_djj" name="djj"
                                                    pattern="[0-9,-]*">
                                                <span class="input-group-text">/menit</span>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="edit_kpl_thd" class="form-label">Kepala thd
                                                PAP<sup>3)</sup></label>
                                            <select class="form-select" id="edit_kpl_thd" name="kpl_thd" required>
                                                <option value="">Pilih Kepala thd PAP</option>
                                                <option value="M">Masuk</option>
                                                <option value="MB">Belum Masuk</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="edit_tbj" class="form-label">TBJ <sup>(gram)</sup></label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="edit_tbj" name="tbj"
                                                    pattern="[0-9,-]*">
                                                <span class="input-group-text">gram</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="edit_presentasi"
                                                class="form-label">Presentasi<sup>4)</sup></label>
                                            <select class="form-select" id="edit_presentasi" name="presentasi" required>
                                                <option value="">Pilih Presentasi</option>
                                                <option value="KP">Kepala</option>
                                                <option value="BS">Bokong/Sungsang</option>
                                                <option value="LLO">Letak Lintang/Obligue</option>
                                                <option value="-">Belum</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="edit_jmlh_janin" class="form-label">Jumlah
                                                Janin<sup>5)</sup></label>
                                            <select class="form-select" id="edit_jmlh_janin" name="jmlh_janin" required>
                                                <option value="">Pilih Jumlah Janin</option>
                                                <option value="Tunggal">Tunggal</option>
                                                <option value="Ganda">Ganda</option>
                                                <option value="-">Belum</option>
                                            </select>
                                        </div>
                                    </div>
                                    <h5 class="card-title">Pelayanan</h5>
                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <label for="edit_buku_kia" class="form-label">Catatan dibuku KIA*</label>
                                            <select class="form-select" id="edit_buku_kia" name="buku_kia" required>
                                                <option value="">Pilih Catatan dibuku KIA*</option>
                                                <option value="jika iya">&#10003;</option>
                                                <option value="jika tidak">&#10007;</option>
                                            </select>
                                        </div>
                                        <div class="col-md-5 mb-3">
                                            <br>
                                            <label for="edit_injeksi" class="form-label">Injeksi Td*</label>
                                            <select class="form-select" id="edit_injeksi" name="injeksi" required>
                                                <option value="">Pilih Injeksi Td*</option>
                                                <option value="jika iya">&#10003;</option>
                                                <option value="jika tidak">&#10007;</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <br>
                                            <label for="edit_fe" class="form-label">Fe <sup>(tab/botol)</sup></label>
                                            <input type="number" class="form-control" id="edit_fe" name="fe"
                                                pattern="[0-9,\,]*" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="edit_pmt_bumil" class="form-label">PMT Bumil KEK</label>
                                            <select class="form-select" id="edit_pmt_bumil" name="pmt_bumil" required>
                                                <option value="">Pilih PMT Bumil KEK*</option>
                                                <option value="jika iya">&#10003;</option>
                                                <option value="jika tidak">&#10007;</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="edit_kelas_ibu" class="form-label">Ikut Kelas Ibu*</label>
                                            <select class="form-select" id="edit_kelas_ibu" name="kelas_ibu" required>
                                                <option value="">Pilih Ikut Kelas Ibu</option>
                                                <option value="jika iya">&#10003;</option>
                                                <option value="jika tidak">&#10007;</option>
                                            </select>
                                        </div>
                                    </div>
                                    <h5 class="card-title">Konseling</h5>
                                    <div class="col-md-12 mb-3">
                                        <label for="edit_konseling" class="form-label">
                                            Konseling</label>
                                        <input type="text" class="form-control" id="edit_konseling" name="konseling"
                                            required>
                                    </div>
                                    <h5 class="card-title">Laboratorium</h5>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="edit_hemoglobin"
                                                class="form-label">Hemoglobin<sup>(gr/dl)</sup></label>
                                            <input type="text" class="form-control" id="edit_hemoglobin"
                                                name="hemoglobin" pattern="[0-9,\,]*" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="edit_glcs_urine" class="form-label">Protein
                                                Urine<sup>(-/+)</sup></label>
                                            <select class="form-select" id="edit_glcs_urine" name="glcs_urine" required>
                                                <option value="">Pilih Protein Urine</option>
                                                <option value="P">Positif</option>
                                                <option value="N">Negatif</option>
                                            </select>
                                        </div>
                                    </div>
                                    <h5 class="card-title">PMTCT</h5>
                                    <div class="row">
                                        <div class="col-md-3 mb-3">
                                            <label for="edit_sifilis" class="form-label">Sifilis<sup>(-/+)</sup></label>
                                            <select class="form-select" id="edit_sifilis" name="sifilis" required>
                                                <option value="">Pilih Sifilis</option>
                                                <option value="P">Positif</option>
                                                <option value="N">Negatif</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="edit_hbsag" class="form-label">HBsAg<sup>(-/+)</sup></label>
                                            <select class="form-select" id="edit_hbsag" name="hbsag" required>
                                                <option value="">Pilih HBsAg</option>
                                                <option value="jika iya">&#10003;</option>
                                                <option value="jika tidak">&#10007;</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="edit_hiv" class="form-label">HIV<sup>(-/+)</sup></label>
                                            <select class="form-select" id="edit_hiv" name="hiv" required>
                                                <option value="">Pilih HIV</option>
                                                <option value="P">Positif</option>
                                                <option value="N">Negatif</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="edit_arv" class="form-label">Arv Profilaksis</label>
                                            <input type="text" class="form-control" id="edit_arv" name="arv"
                                                required>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="card-body">
                                    <h5 class="card-title">Malaria</h5>
                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <label for="edit_malaria" class="form-label">Malaria<sup>(-/+)</sup></label>
                                            <select class="form-select" id="edit_malaria" name="malaria" required>
                                                <option value="">Pilih Malaria</option>
                                                <option value="P">Positif</option>
                                                <option value="N">Negatif</option>
                                            </select>
                                        </div>
                                        <div class="col-md-5 mb-3">
                                            <label for="edit_kelambu" class="form-label">Kelambu
                                                berinsektisida<sup>*</sup></label>
                                            <select class="form-select" id="edit_kelambu" name="kelambu" required>
                                                <option value="">Pilih Skrining anamnesis*</option>
                                                <option value="jika iya">&#10003;</option>
                                                <option value="jika tidak">&#10007;</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="edit_obat_malaria" class="form-label">Obat<sup>***</sup></label>
                                            <select class="form-select" id="edit_obat_malaria" name="obat_malaria"
                                                required>
                                                <option value="">Pilih Malaria</option>
                                                <option value="-" hidden>-</option>
                                                <option value="ART">Artesunat</option>
                                                <option value="AMO">Amodiakuin</option>
                                                <option value="KIN">Kina</option>
                                            </select>
                                        </div>
                                    </div>
                                    <h5 class="card-title">TB</h5>
                                    <div class="row">
                                        <div class="col-md-3 mb-3">
                                            <label for="edit_skrining_anam" class="form-label">Skrining
                                                anamnesis<sup>*</sup></label>
                                            <select class="form-select" id="edit_skrining_anam" name="skrining_anam"
                                                required>
                                                <option value="">Pilih Skrining anamnesis*</option>
                                                <option value="jika iya">&#10003;</option>
                                                <option value="jika tidak">&#10007;</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="edit_dahak" class="form-label">Periksa Dahak<sup>*</sup></label>
                                            <select class="form-select" id="edit_dahak" name="dahak" required>
                                                <option value="">Pilih Periksa Dahak*</option>
                                                <option value="jika iya">&#10003;</option>
                                                <option value="jika tidak">&#10007;</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <br>
                                            <label for="edit_tbc" class="form-label">TBC<sup>(-/+)</sup></label>
                                            <select class="form-select" id="edit_tbc" name="tbc" required>
                                                <option value="">Pilih Tbc</option>
                                                <option value="P">Positif</option>
                                                <option value="N">Negatif</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <br>
                                            <label for="edit_obat_TB" class="form-label">Obat<sup>***</sup></label>
                                            <select class="form-select" id="edit_obat_TB" name="obat_TB" required>
                                                <option value="">Pilih Tbc</option>
                                                <option value="-" hidden>-</option>
                                                <option value="R">Rifampisin</option>
                                                <option value="H">INH</option>
                                                <option value="Z">Pyrazinamid</option>
                                                <option value="E">Etahmbutol</option>
                                            </select>
                                        </div>
                                    </div>
                                    <h5 class="card-title">Skrining Covid-19</h5>
                                    <div class="row">
                                        <div class="col-md-3 mb-3">
                                            <label for="edit_sehat" class="form-label">Sehat</label>
                                            <select class="form-select" id="edit_sehat" name="sehat">
                                                <option value="-">Pilih Skrining Covid-19*</option>
                                                <option value="jika iya">&#10003;</option>
                                                <option value="jika tidak">&#10007;</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="edit_kontak_erat" class="form-label">Kontak Erat</label>
                                            <select class="form-select" id="edit_kontak_erat" name="kontak_erat"
                                                required>
                                                <option value="">Pilih Kontak Erat*</option>
                                                <option value="jika iya">&#10003;</option>
                                                <option value="jika tidak">&#10007;</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="edit_suspek" class="form-label">Suspek</label>
                                            <select class="form-select" id="edit_suspek" name="suspek" required>
                                                <option value="">Pilih Suspek*</option>
                                                <option value="jika iya">&#10003;</option>
                                                <option value="jika tidak">&#10007;</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="edit_konfimasi" class="form-label">Terkonfirmasi</label>
                                            <select class="form-select" id="edit_konfimasi" name="konfimasi" required>
                                                <option value="">Pilih Terkonfirmasi*</option>
                                                <option value="jika iya">&#10003;</option>
                                                <option value="jika tidak">&#10007;</option>
                                            </select>
                                        </div>
                                    </div>
                                    <h5 class="card-title">Komplikasi</h5>
                                    <div class="row">
                                        <div class="col-md-3 mb-3">
                                            <label for="edit_hdk" class="form-label">HDK</label>
                                            <select class="form-select" id="edit_hdk" name="hdk">
                                                <option value="">Pilih HDK</option>
                                                <option value="-">-</option>
                                                <option value="jika iya">&#10003;</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="edit_abortus" class="form-label">Abortus</label>
                                            <select class="form-select" id="edit_abortus" name="abortus">
                                                <option value="">Pilih Abortus</option>
                                                <option value="-">-</option>
                                                <option value="jika iya">&#10003;</option>
                                            </select>
                                        </div>
                                        <div class="col-md-5 mb-3">
                                            <label for="edit_pendarahan" class="form-label">Pendarahan</label>
                                            <select class="form-select" id="edit_pendarahan" name="pendarahan">
                                                <option value="">Pilih Pendarahan</option>
                                                <option value="-">-</option>
                                                <option value="jika iya">&#10003;</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="edit_infeksi" class="form-label">Infeksi</label>
                                            <select class="form-select" id="edit_infeksi" name="infeksi">
                                                <option value="">Pilih Infeksi</option>
                                                <option value="-">-</option>
                                                <option value="jika iya">&#10003;</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="edit_kpd" class="form-label">KPD</label>
                                            <select class="form-select" id="edit_kpd" name="kpd">
                                                <option value="">Pilih KPD</option>
                                                <option value="-">-</option>
                                                <option value="jika iya">&#10003;</option>
                                            </select>
                                        </div>
                                        <div class="col-md-5 mb-3">
                                            <label for="edit_lain_lain_komplikasi" class="form-label"
                                                id="edit_lain_lain_komplikasi_label">Lain - lain</label>
                                            <input type="text" class="form-control" id="edit_lain_lain_komplikasi"
                                                name="lain_lain_komplikasi">
                                        </div>
                                    </div>
                                    <h5 class="card-title">Dirujuk Ke</h5>
                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <label for="edit_puskesmas" class="form-label">Puskesmas</label>
                                            <select class="form-select" id="edit_puskesmas" name="puskesmas">
                                                <option value="">Pilih Puskesmas</option>
                                                <option value="-">-</option>
                                                <option value="jika iya">&#10003;</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="edit_klinik" class="form-label">Klinik</label>
                                            <select class="form-select" id="edit_klinik" name="klinik">
                                                <option value="">Pilih Klinik</option>
                                                <option value="-">-</option>
                                                <option value="jika iya">&#10003;</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="edit_rsia_rsb" class="form-label">RSIA/RSB</label>
                                            <select class="form-select" id="edit_rsia_rsb" name="rsia_rsb">
                                                <option value="">Pilih RSIA/RSB</option>
                                                <option value="-">-</option>
                                                <option value="jika iya">&#10003;</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="edit_rs" class="form-label">RS</label>
                                            <select class="form-select" id="edit_rs" name="rs">
                                                <option value="">Pilih RS</option>
                                                <option value="-">-</option>
                                                <option value="jika iya">&#10003;</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="edit_lain_lain_dirujuk" class="form-label"
                                                id="edit_lain_lain_dirujuk_label">Lain - lain</label>
                                            <input type="text" class="form-control" id="edit_lain_lain_dirujuk"
                                                name="lain_lain_dirujuk">
                                        </div>
                                    </div>
                                    <h5 class="card-title">Keadaan</h5>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="edit_tiba" class="form-label">Tiba</label>
                                            <select class="form-select" id="edit_tiba" name="tiba" required>
                                                <option value="">Pilih Tiba</option>
                                                <option value="H">Hidup</option>
                                                <option value="M">Mati</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="edit_pulang" class="form-label">Pulang</label>
                                            <select class="form-select" id="edit_pulang" name="pulang" required>
                                                <option value="">Pilih Pulang</option>
                                                <option value="H">Hidup</option>
                                                <option value="M">Mati</option>
                                            </select>
                                        </div>
                                    </div>
                                    <h5 class="card-title">Keteranagan</h5>
                                    <div class="col-md-12 mb-3">
                                        <label for="edit_keterangan" class="form-label">
                                            Keterangan</label>
                                        <input type="text" class="form-control" id="edit_keterangan"
                                            name="keterangan" required>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                serverSide: false,
                lengthChange: false,
                searching: false,
                ordering: false,
                paging: false,
                info: false,
                ajax: "{{ route('antenatal_care.data_showanc', ['id_ibu' => $anc->id_ibu]) }}",
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
                        name: 'jmlh_janin',
                        render: function(data, type, row) {
                            if (data === 'Tunggal') {
                                return 'T';
                            } else if (data === 'Ganda') {
                                return 'G';
                            } else {
                                return data;
                            }
                        }
                    },
                    {
                        data: 'injeksi',
                        name: 'injeksi',
                        render: function(data, type, row, meta) {
                            return data.toLowerCase() === 'jika iya' ?
                                '<i class="ri-check-line"></i>' : '<i class="ri-close-line"></i>';
                        }
                    },
                    {
                        data: 'buku_kia',
                        name: 'buku_kia',
                        render: function(data, type, row, meta) {
                            return data.toLowerCase() === 'jika iya' ?
                                '<i class="ri-check-line"></i>' : '<i class="ri-close-line"></i>';
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
                            return data.toLowerCase() === 'jika iya' ?
                                '<i class="ri-check-line"></i>' : '<i class="ri-close-line"></i>';
                        }
                    },
                    {
                        data: 'kelas_ibu',
                        name: 'kelas_ibu',
                        render: function(data, type, row, meta) {
                            return data.toLowerCase() === 'jika iya' ?
                                '<i class="ri-check-line"></i>' : '<i class="ri-close-line"></i>';
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
                        name: 'hbsag',
                        render: function(data, type, row, meta) {
                            return data.toLowerCase() === 'jika iya' ?
                                '<i class="ri-check-line"></i>' : '<i class="ri-close-line"></i>';
                        }
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
                        name: 'kelambu',
                        render: function(data, type, row, meta) {
                            return data.toLowerCase() === 'jika iya' ?
                                '<i class="ri-check-line"></i>' : '<i class="ri-close-line"></i>';
                        }
                    },
                    {
                        data: 'skrining_anam',
                        name: 'skrining_anam',
                        render: function(data, type, row, meta) {
                            return data.toLowerCase() === 'jika iya' ?
                                '<i class="ri-check-line"></i>' : '<i class="ri-close-line"></i>';
                        }
                    },
                    {
                        data: 'dahak',
                        name: 'dahak',
                        render: function(data, type, row, meta) {
                            return data.toLowerCase() === 'jika iya' ?
                                '<i class="ri-check-line"></i>' : '<i class="ri-close-line"></i>';
                        }
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
                        name: 'sehat',
                        render: function(data, type, row, meta) {
                            return data.toLowerCase() === 'jika iya' ?
                                '<i class="ri-check-line"></i>' : '<i class="ri-close-line"></i>';
                        }
                    },
                    {
                        data: 'kontak_erat',
                        name: 'kontak_erat',
                        render: function(data, type, row, meta) {
                            return data.toLowerCase() === 'jika iya' ?
                                '<i class="ri-check-line"></i>' : '<i class="ri-close-line"></i>';
                        }
                    },
                    {
                        data: 'suspek',
                        name: 'suspek',
                        render: function(data, type, row, meta) {
                            return data.toLowerCase() === 'jika iya' ?
                                '<i class="ri-check-line"></i>' : '<i class="ri-close-line"></i>';
                        }
                    },
                    {
                        data: 'konfimasi',
                        name: 'konfimasi',
                        render: function(data, type, row, meta) {
                            return data.toLowerCase() === 'jika iya' ?
                                '<i class="ri-check-line"></i>' : '<i class="ri-close-line"></i>';
                        }
                    },
                    {
                        data: 'hdk',
                        name: 'hdk',
                        render: function(data, type, row, meta) {
                            return data === '-' ? '-' : (data.toLowerCase() === 'jika iya' ?
                                '<i class="ri-check-line"></i>' :
                                '<i class="ri-close-line"></i>');
                        }
                    },
                    {
                        data: 'abortus',
                        name: 'abortus',
                        render: function(data, type, row, meta) {
                            return data === '-' ? '-' : (data.toLowerCase() === 'jika iya' ?
                                '<i class="ri-check-line"></i>' :
                                '<i class="ri-close-line"></i>');
                        }
                    },
                    {
                        data: 'pendarahan',
                        name: 'pendarahan',
                        render: function(data, type, row, meta) {
                            return data === '-' ? '-' : (data.toLowerCase() === 'jika iya' ?
                                '<i class="ri-check-line"></i>' :
                                '<i class="ri-close-line"></i>');
                        }
                    },
                    {
                        data: 'infeksi',
                        name: 'infeksi',
                        render: function(data, type, row, meta) {
                            return data === '-' ? '-' : (data.toLowerCase() === 'jika iya' ?
                                '<i class="ri-check-line"></i>' :
                                '<i class="ri-close-line"></i>');
                        }
                    },
                    {
                        data: 'kpd',
                        name: 'kpd',
                        render: function(data, type, row, meta) {
                            return data === '-' ? '-' : (data.toLowerCase() === 'jika iya' ?
                                '<i class="ri-check-line"></i>' :
                                '<i class="ri-close-line"></i>');
                        }
                    },
                    {
                        data: 'lain_lain_komplikasi',
                        name: 'lain_lain_komplikasi'
                    },
                    {
                        data: 'puskesmas',
                        name: 'puskesmas',
                        render: function(data, type, row, meta) {
                            return data === '-' ? '-' : (data.toLowerCase() === 'jika iya' ?
                                '<i class="ri-check-line"></i>' :
                                '<i class="ri-close-line"></i>');
                        }
                    },
                    {
                        data: 'klinik',
                        name: 'klinik',
                        render: function(data, type, row, meta) {
                            return data === '-' ? '-' : (data.toLowerCase() === 'jika iya' ?
                                '<i class="ri-check-line"></i>' :
                                '<i class="ri-close-line"></i>');
                        }
                    },
                    {
                        data: 'rsia_rsb',
                        name: 'rsia_rsb',
                        render: function(data, type, row, meta) {
                            return data === '-' ? '-' : (data.toLowerCase() === 'jika iya' ?
                                '<i class="ri-check-line"></i>' :
                                '<i class="ri-close-line"></i>');
                        }
                    },
                    {
                        data: 'rs',
                        name: 'rs',
                        render: function(data, type, row, meta) {
                            return data === '-' ? '-' : (data.toLowerCase() === 'jika iya' ?
                                '<i class="ri-check-line"></i>' :
                                '<i class="ri-close-line"></i>');
                        }
                    },
                    {
                        data: 'lain_lain_dirujuk',
                        name: 'lain_lain_dirujuk'
                    },
                    {
                        data: 'tiba',
                        name: 'tiba'
                    },
                    {
                        data: 'pulang',
                        name: 'pulang'
                    },
                    {
                        data: 'keterangan',
                        name: 'keterangan'
                    },
                ],
                createdRow: function(row, data, dataIndex) {
                    $(row).addClass('text-center');
                },
                fixedColumns: false,
                responsive: false,
                scrollX: false,
                language: {
                    emptyTable: "Data anc ibu {{ $anc->ibu->nama_ibu }} tidak ada"
                }
            });
        });

        $('#anc-table').on('click', '.trigger-modal', function() {
            let id = $(this).data('id');
            $.ajax({
                url: '{{ route('antenatal_care.edit_showanc', ':id') }}'.replace(':id', id),
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
                    $('#edit_kpd').val(data.kpd);
                    $('#edit_lain_lain_komplikasi').val(data.lain_lain_komplikasi);
                    $('#edit_puskesmas').val(data.puskesmas);
                    $('#edit_klinik').val(data.klinik);
                    $('#edit_rsia_rsb').val(data.rsia_rsb);
                    $('#edit_rs').val(data.rs);
                    $('#edit_lain_lain_dirujuk').val(data.lain_lain_dirujuk);
                    $('#edit_tiba').val(data.tiba);
                    $('#edit_pulang').val(data.pulang);
                    $('#edit_keterangan').val(data.keterangan);
                    $('#editForm').attr('action',
                        '{{ route('antenatal_care.update_showanc', ':id') }}'
                        .replace(
                            ':id', id));
                    $('#modalEdit').modal('show');
                }
            });
        });

        document.getElementById('sts_gizi').dataset.defaultValue = document.getElementById('sts_gizi').value;

        document.addEventListener('DOMContentLoaded', function() {
            if (window.location.pathname.includes('/antenatal_care/anc/show_anc')) {
                var body = document.querySelector('body');
                if (window.innerWidth >= 768) {
                    body.classList.add('toggle-sidebar');
                } else {
                    body.classList.remove('toggle-sidebar');
                }
            }
        });

        document.getElementById('lila').addEventListener('input', function() {
            var lilaValue = parseFloat(this.value.replace(',', '.'));
            var stsGiziSelect = document.getElementById('sts_gizi');
            if (!isNaN(lilaValue)) {
                if (lilaValue < 23.5) {
                    stsGiziSelect.value = 'K';
                } else {
                    stsGiziSelect.value = 'N';
                }
            } else {
                stsGiziSelect.value = '-';
            }
        });

        document.addEventListener('DOMContentLoaded', function() {
            function restrictInputToNumbersAndSlash(input, maxLength) {
                input.addEventListener('input', function() {
                    var value = input.value;
                    value = value.replace(/[^0-9/]/g, '');
                    if (value.length > maxLength) {
                        value = value.substring(0, maxLength);
                    }
                    input.value = value;
                });
            }

            function restrictInputToNumbersAndDash(input, maxLength) {
                input.addEventListener('input', function() {
                    var value = input.value;
                    value = value.replace(/[^0-9-]/g, '');
                    if (value.length > maxLength) {
                        value = value.substring(0, maxLength);
                    }
                    input.value = value;
                });
            }

            var td_mmhgInput = document.getElementById('td_mmhg');
            var td_mmhgEdit = document.getElementById('edit_td_mmhg');
            var hemoglobinInput = document.getElementById('hemoglobin');
            var hemoglobinEdit = document.getElementById('edit_hemoglobin');
            var td_djjInput = document.getElementById('djj');
            var td_djjEdit = document.getElementById('edit_djj');
            var td_tbjInput = document.getElementById('tbj');
            var td_tbjEdit = document.getElementById('edit_tbj');

            restrictInputToNumbersAndSlash(td_mmhgInput, 8);
            restrictInputToNumbersAndSlash(td_mmhgEdit, 8);
            restrictInputToNumbersAndSlash(hemoglobinInput, 8);
            restrictInputToNumbersAndSlash(hemoglobinEdit, 8);
            restrictInputToNumbersAndDash(td_djjInput, 5);
            restrictInputToNumbersAndDash(td_djjEdit, 5);
            restrictInputToNumbersAndDash(td_tbjInput, 5);
            restrictInputToNumbersAndDash(td_tbjEdit, 5);
        });

        document.addEventListener('DOMContentLoaded', function() {
            function handleMalariaChange(malariaElementId, obatMalariaElementId, labelObatMalariaSelector) {
                document.getElementById(malariaElementId).addEventListener('change', function() {
                    var malariaValue = this.value;
                    var ObatMalaria = document.getElementById(obatMalariaElementId);
                    var label_ObatMalaria = document.querySelector(labelObatMalariaSelector);
                    if (malariaValue === 'N') {
                        ObatMalaria.style.display = 'none';
                        ObatMalaria.value = '-';
                        label_ObatMalaria.style.display = 'none';
                    } else {
                        ObatMalaria.style.display = 'block';
                        ObatMalaria.value = '';
                        label_ObatMalaria.style.display = 'block';
                    }
                });
            }
            handleMalariaChange('malaria', 'obat_malaria', 'label[for="obat_malaria"]');
            handleMalariaChange('edit_malaria', 'edit_obat_malaria', 'label[for="edit_obat_malaria"]');
        });

        document.addEventListener('DOMContentLoaded', function() {
            function handleTbcChange(tbcElementId, obatTbElementId, labelObatTbSelector) {
                document.getElementById(tbcElementId).addEventListener('change', function() {
                    var tbcValue = this.value;
                    var obatTBSelect = document.getElementById(obatTbElementId);
                    var label_ObatTb = document.querySelector(labelObatTbSelector);

                    if (tbcValue === 'N') {
                        obatTBSelect.style.display = 'none';
                        obatTBSelect.value = '-';
                        label_ObatTb.style.display = 'none';
                    } else {
                        obatTBSelect.style.display = 'block';
                        obatTBSelect.value = '';
                        label_ObatTb.style.display = 'block';
                    }
                });
            }
            handleTbcChange('tbc', 'obat_TB', 'label[for="obat_TB"]');
            handleTbcChange('edit_tbc', 'edit_obat_TB', 'label[for="edit_obat_TB"]');
        });

        function Komplikasi(changedId) {
            const selectIds = ['hdk', 'abortus', 'pendarahan', 'infeksi', 'kpd'];
            const selectedValue = document.getElementById(changedId).value;
            if (selectedValue === '') {
                selectIds.forEach(id => {
                    if (id !== changedId) {
                        document.getElementById(id).value = '';
                    }
                });
                document.getElementById('lain_lain_komplikasi').value = '';
                document.getElementById('lain_lain_komplikasi').style.display = 'block';
                document.getElementById('lain_lain_komplikasi_label').style.display = 'block';
            } else {
                selectIds.forEach(id => {
                    if (id !== changedId) {
                        document.getElementById(id).value = '-';
                    }
                });
                document.getElementById('lain_lain_komplikasi').value = '-';
                document.getElementById('lain_lain_komplikasi').style.display = 'none';
                document.getElementById('lain_lain_komplikasi_label').style.display = 'none';
            }
            document.getElementById('lain_lain_komplikasi').addEventListener('input', function() {
                const value = this.value;
                const selectIds = ['hdk', 'abortus', 'pendarahan', 'infeksi', 'kpd'];
                selectIds.forEach(id => {
                    document.getElementById(id).value = value ? '-' : '';
                });
            });
        }

        function Dirujuk(changedId) {
            const selectIds = ['puskesmas', 'klinik', 'rsia_rsb', 'rs'];
            const selectedValue = document.getElementById(changedId).value;
            if (selectedValue === '') {
                selectIds.forEach(id => {
                    if (id !== changedId) {
                        document.getElementById(id).value = '';
                    }
                });
                const lainLainInput = document.getElementById('lain_lain_dirujuk');
                const lainLainLabel = document.getElementById('lain_lain_dirujuk_label');
                lainLainInput.value = '';
                lainLainInput.style.display = 'block';
                lainLainLabel.style.display = 'block';
            } else {
                selectIds.forEach(id => {
                    if (id !== changedId) {
                        document.getElementById(id).value = '-';
                    }
                });
                const lainLainInput = document.getElementById('lain_lain_dirujuk');
                const lainLainLabel = document.getElementById('lain_lain_dirujuk_label');
                lainLainInput.value = '-';
                lainLainInput.style.display = 'none';
                lainLainLabel.style.display = 'none';
            }
            document.getElementById('lain_lain_dirujuk').addEventListener('input', function() {
                const value = this.value;
                const selectIds = ['puskesmas', 'klinik', 'rsia_rsb', 'rs'];
                selectIds.forEach(id => {
                    document.getElementById(id).value = value ? '-' : '';
                });
            });
        }
    </script>
@endsection
