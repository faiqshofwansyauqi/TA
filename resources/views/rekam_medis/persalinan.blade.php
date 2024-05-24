@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <div class="pagetitle">
            <h1>Persalinan</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">Rekam Medis</li>
                    <li class="breadcrumb-item active">Persalinan</li>
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
                        <h5 class="card-title"></h5>
                        <div class="table-responsive">
                            <table class="table small" id="persalinan-table" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Nama Ibu</th>
                                        <th>Kala I Aktif</th>
                                        <th>Kala II</th>
                                        <th>Bayi Lahir</th>
                                        <th>Piasenta Lahir</th>
                                        <th>Pendarahan Kala IV</th>
                                        <th>Presentasi</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
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
                    <h3 class="modal-title fs-4 fw-bold" id="ModalInput">Input Persalinan</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('rekam_medis.store_persalinan') }}" method="post" autocomplete="off">
                        @csrf
                        <div class="card col-12">
                            <div class="card-body">
                                <h5 class="card-title"></h5>
                                <div class="row">
                                    <div class="col-md-4 mb-2">
                                        <label for="id_ibu" class="form-label">Ibu</label>
                                        <select class="form-control" id="id_ibu" name="id_ibu" required>
                                            <option value="">Pilih Ibu</option>
                                            @foreach ($ibus as $ibu)
                                                <option value="{{ $ibu->nama_ibu }}">{{ $ibu->nama_ibu }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <label for="kala1" class="form-label">Kala I Aktif</label>
                                        <input type="datetime-local" class="form-control" id="kala1" name="kala1">
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <label for="kala2" class="form-label">Kala II</label>
                                        <input type="datetime-local" class="form-control" id="kala2" name="kala2">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-2">
                                        <div class="mb-3">
                                            <label for="bayi_lahir" class="form-label">Bayi Lahir</label>
                                            <input type="datetime-local" class="form-control" id="bayi_lahir"
                                                name="bayi_lahir">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <div class="mb-3">
                                            <label for="piasenta" class="form-label">Piasenta Lahir</label>
                                            <input type="datetime-local" class="form-control" id="piasenta"
                                                name="piasenta">
                                        </div>
                                    </div>
                                    <div class='row'>
                                        <div class="col-md-4 mb-2">
                                            <label for="pendarahan" class="form-label">Pendarahan Kala IV</label>
                                            <div class="input-group mb-2">
                                                <input type="number" class="form-control" id="pendarahan" name="pendarahan"
                                                    placeholder="Input Pendarahan Kala IV">
                                                <span class="input-group-text">cc</span>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-2">
                                            <label for="usia_kehamilan" class="form-label">Usia Kehamilan</label>
                                            <div class="input-group mb-2">
                                                <input type="number" class="form-control" id="usia_kehamilan"
                                                    name="usia_kehamilan" placeholder="input Usia Kehamilan">
                                                <span class="input-group-text">minggu</span>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-2">
                                            <label for="usia_hpht" class="form-label">Usia HP HT</label>
                                            <div class="input-group mb-2">
                                                <input type="number" class="form-control" id="usia_hpht"
                                                    name="usia_hpht" placeholder="input Usia HP HT">
                                                <span class="input-group-text">minggu</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class='row'>
                                        <div class="col-md-4 mb-2">
                                            <div class="mb-2">
                                                <label for="keadaan_ibu" class="form-label">Keadaan Ibu</label>
                                                <select class="form-select" id="keadaan_ibu" name="keadaan_ibu" required>
                                                    <option value="">Pilih Keadaan Ibu</option>
                                                    <option value="Mati">Mati</option>
                                                    <option value="Hidup">Hidup</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-2">
                                            <div class="mb-2">
                                                <label for="keadaan_bayi" class="form-label">Keadaan Bayi</label>
                                                <select class="form-select" id="keadaan_bayi" name="keadaan_bayi"
                                                    required>
                                                    <option value="">Pilih Keadaan Bayi</option>
                                                    <option value="Mati">Mati</option>
                                                    <option value="Hidup">Hidup</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-2">
                                            <label for="berat_bayi" class="form-label">Berat Bayi</label>
                                            <div class="input-group mb-2">
                                                <input type="number" class="form-control" id="berat_bayi"
                                                    name="berat_bayi" placeholder="input Berat Bayi">
                                                <span class="input-group-text">gram</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <div class="mb-3">
                                            <label for="pesentasi" class="form-label">Presentasi</label>
                                            <select class="form-select" id="pesentasi" name="pesentasi" required>
                                                <option value="">Pilih Jenis Presentasi</option>
                                                <option value="Puncak Kepala">Puncak Kepala</option>
                                                <option value="Belakang Kepala">Belakang Kepala</option>
                                                <option value="Lintang/Oblique">Lintang/Oblique</option>
                                                <option value="Menumbung">Menumbung</option>
                                                <option value="Bokong">Bokong</option>
                                                <option value="Dahi">Dahi</option>
                                                <option value="Muka">Muka</option>
                                                <option value="Kaki">Kaki</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="mb-3">
                                            <label for="tempat" class="form-label">Tempat</label>
                                            <select class="form-select" id="tempat" name="tempat" required>
                                                <option value="">Pilih Tempat</option>
                                                <option value="Rumah">Rumah</option>
                                                <option value="Polindes">Polindes</option>
                                                <option value="Pustu">Pustu</option>
                                                <option value="Puskesmas">Puskesmas</option>
                                                <option value="RB">RB</option>
                                                <option value="RSIA">RSIA</option>
                                                <option value="RS">RS</option>
                                                <option value="RS ODHA">RB</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <div class="mb-3">
                                            <label for="penolong" class="form-label">Penolong</label>
                                            <select class="form-select" id="penolong" name="penolong" required>
                                                <option value="">Pilih Penolong</option>
                                                <option value="Keluarga">Keluarga</option>
                                                <option value="Dukun">Dukun</option>
                                                <option value="Bidan">Bidan</option>
                                                <option value="Dr. Spesialis">Dr. Spesialis</option>
                                                <option value="Dokter">Dokter</option>
                                                <option value="Lainnya">Lainnya</option>
                                                <option value="Tidak Ada">Tidak Ada</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="mb-3">
                                            <label for="cara_persalinan" class="form-label">Cara Persalinan</label>
                                            <select class="form-select" id="cara_persalinan" name="cara_persalinan"
                                                required>
                                                <option value="">Pilih Cara Persalinan</option>
                                                <option value="Normal">Normal</option>
                                                <option value="Vakum">Vakum</option>
                                                <option value="Forseps">Forseps</option>
                                                <option value="Seksio Sesarea">Seksio Sesarea</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <div class="mb-3">
                                            <label for="menejemen" class="form-label">Menejemen Aktif Kala III</label>
                                            <select class="form-select" id="menejemen" name="menejemen" required>
                                                <option value="">Pilih Jenis Menejemen Aktif Kala III</option>
                                                <option value="Injeksi Oksitosin">Injeksi Oksitosin</option>
                                                <option value="Penegangan Tali Pusat Terkendali">Penegangan Tali Pusat
                                                    Terkendali
                                                </option>
                                                <option value="Lintang/Oblique">Lintang/Oblique</option>
                                                <option value="Masase Fundus Uteri">Masase Fundus Uteri</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="mb-3">
                                            <label for="pelayanan" class="form-label">Pelayanan</label>
                                            <select class="form-select" id="pelayanan" name="pelayanan" required>
                                                <option value="">Pilih Pelayanan</option>
                                                <option value="IMD: < 1jam/>jam">IMD:
                                                    < 1jam />jam
                                                </option>
                                                <option value="Menggunakan Partograf">Menggunakan Partograf</option>
                                                <option value="Pustu">Pustu</option>
                                                <option value="Catatan di Buku KIA">Catatan di Buku KIA</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <div class="mb-3">
                                            <label for="integrasi" class="form-label">Integrasi Program</label>
                                            <select class="form-select" id="integrasi" name="integrasi" required>
                                                <option value="">Pilih Jenis Integrasi Program</option>
                                                <option value="ARV Profilaksis">ARV Profilaksis</option>
                                                <option value="Obat Anti Malaria">Obat Anti Malaria</option>
                                                <option value="Obat Anti TB">Obat Anti TB</option>
                                                <option value="Masase Fundus Uteri">Masase Fundus Uteri</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="mb-3">
                                            <label for="komplikasi" class="form-label">Komplikasi</label>
                                            <select class="form-select" id="komplikasi" name="komplikasi" required>
                                                <option value="">Pilih Komplikasi</option>
                                                <option value="HDK">HDK</option>
                                                <option value="PPP ">PPP </option>
                                                <option value="Inteksi">Inteksi</option>
                                                <option value="Lainnya">Lainnya</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="keadaan_tiba" class="form-label">Keadaan Tiba</label>
                                            <select class="form-select" id="keadaan_tiba" name="keadaan_tiba" required>
                                                <option value="">Pilih Keadaan Tiba</option>
                                                <option value="Hidup">Hidup</option>
                                                <option value="Mati">Mati</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="rujuk" class="form-label">Dirujuk Ke</label>
                                            <select class="form-select" id="rujuk" name="rujuk" required>
                                                <option value="">Pilih Dirujuk Ke</option>
                                                <option value="Puskesmas">Puskesmas</option>
                                                <option value="RB">RB</option>
                                                <option value="RSIA">RSIA</option>
                                                <option value="RS">RS</option>
                                                <option value="Lainnya">Lainnya</option>
                                                <option value="Tidak Dirujuk">Tidak Dirujuk</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="alamat_bersalin" class="form-label">Alamat Bersalin</label>
                                            <textarea class="form-control" id="alamat_bersalin" rows="3" name="alamat_bersalin"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="ModalEdit" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title fs-4 fw-bold" id="ModalEdit">Edit Persalinan</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                    <form id="editForm" method="post" autocomplete="off">
                        @csrf
                        @method('PUT')
                        <div class="card col-12">
                            <div class="card-body">
                                <h5 class="card-title"></h5>
                                <input type="hidden" id="id_persalinan" name="id_persalinan">
                                <div class="row">
                                    <div class="col-md-4 mb-2">
                                        <label for="edit_id_ibu" class="form-label">Ibu</label>
                                        <select class="form-control" id="edit_id_ibu" name="id_ibu" required>
                                            <option value="">Pilih Ibu</option>
                                            @foreach ($ibus as $ibu)
                                                <option value="{{ $ibu->nama_ibu }}">{{ $ibu->nama_ibu }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <label for="edit_kala1" class="form-label">Kala I Aktif</label>
                                        <input type="datetime-local" class="form-control" id="edit_kala1"
                                            name="kala1">
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <label for="edit_kala2" class="form-label">Kala II</label>
                                        <input type="datetime-local" class="form-control" id="edit_kala2"
                                            name="kala2">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-2">
                                        <label for="edit_bayi_lahir" class="form-label">Bayi Lahir</label>
                                        <input type="datetime-local" class="form-control" id="edit_bayi_lahir"
                                            name="bayi_lahir">
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="edit_piasenta" class="form-label">Piasenta Lahir</label>
                                        <input type="datetime-local" class="form-control" id="edit_piasenta"
                                            name="piasenta">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 mb-2">
                                        <label for="edit_pendarahan" class="form-label">Pendarahan Kala IV</label>
                                        <div class="input-group mb-2">
                                            <input type="number" class="form-control" id="edit_pendarahan"
                                                name="pendarahan" placeholder="Input Pendarahan Kala IV">
                                            <span class="input-group-text">cc</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <label for="edit_usia_kehamilan" class="form-label">Usia Kehamilan</label>
                                        <div class="input-group mb-2">
                                            <input type="number" class="form-control" id="edit_usia_kehamilan"
                                                name="usia_kehamilan" placeholder="input Usia Kehamilan">
                                            <span class="input-group-text">minggu</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <label for="edit_usia_hpht" class="form-label">Usia HP HT</label>
                                        <div class="input-group mb-2">
                                            <input type="number" class="form-control" id="edit_usia_hpht"
                                                name="usia_hpht" placeholder="input Usia HP HT">
                                            <span class="input-group-text">minggu</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 mb-2">
                                        <label for="edit_keadaan_ibu" class="form-label">Keadaan Ibu</label>
                                        <select class="form-select" id="edit_keadaan_ibu" name="keadaan_ibu" required>
                                            <option value="">Pilih Keadaan Ibu</option>
                                            <option value="Mati">Mati</option>
                                            <option value="Hidup">Hidup</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <label for="edit_keadaan_bayi" class="form-label">Keadaan Bayi</label>
                                        <select class="form-select" id="edit_keadaan_bayi" name="keadaan_bayi" required>
                                            <option value="">Pilih Keadaan Bayi</option>
                                            <option value="Mati">Mati</option>
                                            <option value="Hidup">Hidup</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <label for="edit_berat_bayi" class="form-label">Berat Bayi</label>
                                        <div class="input-group mb-2">
                                            <input type="number" class="form-control" id="edit_berat_bayi"
                                                name="berat_bayi" placeholder="input Berat Bayi">
                                            <span class="input-group-text">gram</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="edit_pesentasi" class="form-label">Presentasi</label>
                                        <select class="form-select" id="edit_pesentasi" name="pesentasi" required>
                                            <option value="">Pilih Jenis Presentasi</option>
                                            <option value="Puncak Kepala">Puncak Kepala</option>
                                            <option value="Belakang Kepala">Belakang Kepala</option>
                                            <option value="Lintang/Oblique">Lintang/Oblique</option>
                                            <option value="Menumbung">Menumbung</option>
                                            <option value="Bokong">Bokong</option>
                                            <option value="Dahi">Dahi</option>
                                            <option value="Muka">Muka</option>
                                            <option value="Kaki">Kaki</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="edit_tempat" class="form-label">Tempat</label>
                                        <select class="form-select" id="edit_tempat" name="tempat" required>
                                            <option value="">Pilih Tempat</option>
                                            <option value="Rumah">Rumah</option>
                                            <option value="Polindes">Polindes</option>
                                            <option value="Pustu">Pustu</option>
                                            <option value="Puskesmas">Puskesmas</option>
                                            <option value="RB">RB</option>
                                            <option value="RSIA">RSIA</option>
                                            <option value="RS">RS</option>
                                            <option value="RS ODHA">RB</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="edit_penolong" class="form-label">Penolong</label>
                                        <select class="form-select" id="edit_penolong" name="penolong" required>
                                            <option value="">Pilih Penolong</option>
                                            <option value="Keluarga">Keluarga</option>
                                            <option value="Dukun">Dukun</option>
                                            <option value="Bidan">Bidan</option>
                                            <option value="Dr. Spesialis">Dr. Spesialis</option>
                                            <option value="Dokter">Dokter</option>
                                            <option value="Lainnya">Lainnya</option>
                                            <option value="Tidak Ada">Tidak Ada</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="edit_cara_persalinan" class="form-label">Cara Persalinan</label>
                                        <select class="form-select" id="edit_cara_persalinan" name="cara_persalinan"
                                            required>
                                            <option value="">Pilih Cara Persalinan</option>
                                            <option value="Normal">Normal</option>
                                            <option value="Vakum">Vakum</option>
                                            <option value="Forseps">Forseps</option>
                                            <option value="Seksio Sesarea">Seksio Sesarea</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="edit_menejemen" class="form-label">Menejemen Aktif Kala III</label>
                                        <select class="form-select" id="edit_menejemen" name="menejemen" required>
                                            <option value="">Pilih Jenis Menejemen Aktif Kala III</option>
                                            <option value="Injeksi Oksitosin">Injeksi Oksitosin</option>
                                            <option value="Penegangan Tali Pusat Terkendali">Penegangan Tali Pusat
                                                Terkendali
                                            </option>
                                            <option value="Lintang/Oblique">Lintang/Oblique</option>
                                            <option value="Masase Fundus Uteri">Masase Fundus Uteri</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="edit_pelayanan" class="form-label">Pelayanan</label>
                                        <select class="form-select" id="edit_pelayanan" name="pelayanan" required>
                                            <option value="">Pilih Pelayanan</option>
                                            <option value="IMD: < 1jam/>jam">IMD:
                                                < 1jam />jam
                                            </option>
                                            <option value="Menggunakan Partograf">Menggunakan Partograf</option>
                                            <option value="Pustu">Pustu</option>
                                            <option value="Catatan di Buku KIA">Catatan di Buku KIA</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="edit_integrasi" class="form-label">Integrasi Program</label>
                                        <select class="form-select" id="edit_integrasi" name="integrasi" required>
                                            <option value="">Pilih Jenis Integrasi Program</option>
                                            <option value="ARV Profilaksis">ARV Profilaksis</option>
                                            <option value="Obat Anti Malaria">Obat Anti Malaria</option>
                                            <option value="Obat Anti TB">Obat Anti TB</option>
                                            <option value="Masase Fundus Uteri">Masase Fundus Uteri</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="edit_komplikasi" class="form-label">Komplikasi</label>
                                        <select class="form-select" id="edit_komplikasi" name="komplikasi" required>
                                            <option value="">Pilih Komplikasi</option>
                                            <option value="HDK">HDK</option>
                                            <option value="PPP">PPP</option>
                                            <option value="Infeksi">Infeksi</option>
                                            <option value="Lainnya">Lainnya</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="edit_keadaan_tiba" class="form-label">Keadaan Tiba</label>
                                        <select class="form-select" id="edit_keadaan_tiba" name="keadaan_tiba" required>
                                            <option value="">Pilih Keadaan Tiba</option>
                                            <option value="Hidup">Hidup</option>
                                            <option value="Mati">Mati</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="edit_rujuk" class="form-label">Dirujuk Ke</label>
                                        <select class="form-select" id="edit_rujuk" name="rujuk" required>
                                            <option value="">Pilih Dirujuk Ke</option>
                                            <option value="Puskesmas">Puskesmas</option>
                                            <option value="RB">RB</option>
                                            <option value="RSIA">RSIA</option>
                                            <option value="RS">RS</option>
                                            <option value="Lainnya">Lainnya</option>
                                            <option value="Tidak Dirujuk">Tidak Dirujuk</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="edit_alamat_bersalin" class="form-label">Alamat Bersalin</label>
                                        <textarea class="form-control" id="edit_alamat_bersalin" rows="3" name="alamat_bersalin"></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalView" tabindex="-1" aria-labelledby="modalViewLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title fs-4 fw-bold" id="modalViewLabel">Detail Persalinan</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table" id="detailTable">
                        <thead>
                            <tr>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
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
            $('#persalinan-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('rekam_medis.data_persalinan') }}',
                scrollX: true,
                fixedHeader: true,
                columns: [{
                        data: 'id_ibu',
                        name: 'id_ibu'
                    },
                    {
                        data: 'kala1',
                        name: 'kala1',
                        render: function(data) {
                            var date = new Date(data);
                            var formattedDate = ('0' + date.getDate()).slice(-2);
                            var formattedTime = ('0' + date.getHours()).slice(-2) + ':' + ('0' +
                                date.getMinutes()).slice(-2);
                            var dateTimeString = formattedDate + ' - ' + formattedTime;
                            return dateTimeString;
                        }
                    },
                    {
                        data: 'kala2',
                        name: 'kala2',
                        render: function(data) {
                            var date = new Date(data);
                            var formattedDate = ('0' + date.getDate()).slice(-2);
                            var formattedTime = ('0' + date.getHours()).slice(-2) + ':' + ('0' +
                                date.getMinutes()).slice(-2);
                            var dateTimeString = formattedDate + ' - ' + formattedTime;
                            return dateTimeString;
                        }
                    },
                    {
                        data: 'bayi_lahir',
                        name: 'bayi_lahir',
                        render: function(data) {
                            var date = new Date(data);
                            var formattedDate = ('0' + date.getDate()).slice(-2);
                            var formattedTime = ('0' + date.getHours()).slice(-2) + ':' + ('0' +
                                date.getMinutes()).slice(-2);
                            var dateTimeString = formattedDate + ' - ' + formattedTime;
                            return dateTimeString;
                        }
                    },
                    {
                        data: 'piasenta',
                        name: 'piasenta',
                        render: function(data) {
                            var date = new Date(data);
                            var formattedDate = ('0' + date.getDate()).slice(-2);
                            var formattedTime = ('0' + date.getHours()).slice(-2) + ':' + ('0' +
                                date.getMinutes()).slice(-2);
                            var dateTimeString = formattedDate + ' - ' + formattedTime;
                            return dateTimeString;
                        }
                    },
                    {
                        data: 'pendarahan',
                        name: 'pendarahan',
                        render: function(data, type, row) {
                            return data + ' cc';
                        }
                    },

                    {
                        data: 'pesentasi',
                        name: 'pesentasi'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        render: function(data, type, row) {
                            let viewUrl = '{{ route('rekam_medis.show_persalinan', ':id') }}'
                                .replace(':id', row.id_persalinan);
                            let editUrl = '{{ route('rekam_medis.edit_persalinan', ':id') }}'
                                .replace(':id', row.id_persalinan);
                            let deleteUrl = '{{ route('rekam_medis.destroy_persalinan', ':id') }}'
                                .replace(':id', row.id_persalinan);
                            return `
                            <div style="display: flex; align-items: center;">
                            <button class="btn btn-sm btn-primary view-btn" data-id="${row.id_persalinan}" data-bs-toggle="modal" data-bs-target="#modalView">
                                <i class="bi bi-eye-fill"></i>
                            </button>
                            <div style="display: flex; align-items: center;">
                            <button class="btn btn-sm btn-success edit-btn" data-id="${row.id_persalinan}" data-bs-toggle="modal" data-bs-target="#modalEdit">
                                <i class="bi bi-pencil-fill"></i>
                            </button>
                            <form action="${deleteUrl}" method="POST" class="delete-form">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
                                <i class="bi bi-trash3-fill"></i>
                            </button>
                            </form>
                            </div>
                            `;
                        }
                    }
                ],
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print',
                    {
                        extend: 'colvis',
                        text: 'Column visibility'
                    }
                ],
                columnDefs: [{
                    targets: [],
                    visible: false
                }]
            });
        });


        $('#persalinan-table').on('click', '.view-btn', function() {
            let id = $(this).data('id');
            $.ajax({
                url: '{{ route('rekam_medis.show_persalinan', ':id') }}'.replace(':id', id),
                method: 'GET',
                success: function(data) {
                    let namaIbu = data.ibu.nama_ibu;

                    function formatDate(dateString) {
                        if (!dateString) return '';
                        const date = new Date(dateString);
                        const formattedDay = ('0' + date.getDate()).slice(-2);
                        const formattedMonth = ('0' + (date.getMonth() + 1)).slice(-2);
                        const formattedYear = date.getFullYear();
                        const formattedHours = ('0' + date.getHours()).slice(-2);
                        const formattedMinutes = ('0' + date.getMinutes()).slice(-2);
                        return `${formattedDay}-${formattedMonth}-${formattedYear} / ${formattedHours}:${formattedMinutes}`;
                    }

                    let fasePersalinanTableHtml = `
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Fase Persalinan</th>
                                <th class="text-center">Tanggal - Jam</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Kala I Aktif</td>
                                <td class="text-center">${formatDate(data.kala1)}</td>
                            </tr>
                            <tr>
                                <td>Kala II</td>
                                <td class="text-center">${formatDate(data.kala2)}</td>
                            </tr>
                            <tr>
                                <td>Bayi Lahir</td>
                                <td class="text-center">${formatDate(data.bayi_lahir)}</td>
                            </tr>
                            <tr>
                                <td>Piasenta Lahir</td>
                                <td class="text-center">${formatDate(data.piasenta)}</td>
                            </tr>
                            <tr>
                                <td>Pendarahan</td>
                                <td class="text-center">${(data.pendarahan)} cc</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            `;
                    let additionalInfoTableHtml = `
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td>Usia Kehamilan</td>
                                <td>${data.usia_kehamilan} Minggu</td>
                            </tr>
                            <tr>
                                <td>Usia HPHT</td>
                                <td>${data.usia_hpht} Minggu</td>
                            </tr>
                            <tr>
                                <td>Keadaan Ibu</td>
                                <td>${data.keadaan_ibu}</td>
                            </tr>
                            <tr>
                                <td>Keadaan Anak</td>
                                <td>${data.keadaan_bayi}</td>
                            </tr>
                            <tr>
                                <td>Berat Bayi</td>
                                <td>${data.berat_bayi} Gram</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            `;
                    let newInfoTableHtml = `
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Fase Persalinan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Pesentasi</td>
                                <td>${data.pesentasi}</td>
                            </tr>
                            <tr>
                                <td>Tempat</td>
                                <td>${data.tempat}</td>
                            </tr>
                            <tr>
                                <td>Penolong</td>
                                <td>${data.penolong}</td>
                            </tr>
                            <tr>
                                <td>Cara Persalinan</td>
                                <td>${data.cara_persalinan}</td>
                            </tr>
                            <tr>
                                <td>Manajemen</td>
                                <td>${data.menejemen}</td>
                            </tr>
                            <tr>
                                <td>Pelayanan</td>
                                <td>${data.pelayanan}</td>
                            </tr>
                            <tr>
                                <td>Integrasi</td>
                                <td>${data.integrasi}</td>
                            </tr>
                            <tr>
                                <td>Komplikasi</td>
                                <td>${data.komplikasi}</td>
                            </tr>
                            <tr>
                                <td>Keadaan Tiba</td>
                                <td>${data.keadaan_tiba}</td>
                            </tr>
                            <tr>
                                <td>Rujuk</td>
                                <td>${data.rujuk}</td>
                            </tr>
                            <tr>
                                <td>Alamat Bersalin</td>
                                <td>${data.alamat_bersalin}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            `;
                    let tableHtml = `
                <div class="row">
                    <div class="col-md-6">
                        ${fasePersalinanTableHtml}
                    </div>
                    <div class="col-md-6">
                        ${additionalInfoTableHtml}
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12">
                        ${newInfoTableHtml}
                    </div>
                </div>
            `;
                    $('#modalViewLabel').html(`Detail Persalinan Ibu ${namaIbu}`);
                    $('#modalView .modal-body').html(tableHtml);
                    $('#modalView').modal('show');
                }
            });
        });


        $('#persalinan-table').on('click', '.edit-btn', function() {
            let id = $(this).data('id');
            $.ajax({
                url: '{{ route('rekam_medis.edit_persalinan', ':id') }}'.replace(':id', id),
                method: 'GET',
                success: function(data) {
                    $('#edit_id_ibu').val(data.id_ibu);
                    $('#edit_kala1').val(data.kala1);
                    $('#edit_kala2').val(data.kala2);
                    $('#edit_bayi_lahir').val(data.bayi_lahir);
                    $('#edit_piasenta').val(data.piasenta);
                    $('#edit_pendarahan').val(data.pendarahan);
                    $('#edit_usia_kehamilan').val(data.usia_kehamilan);
                    $('#edit_usia_hpht').val(data.usia_hpht);
                    $('#edit_keadaan_ibu').val(data.keadaan_ibu);
                    $('#edit_keadaan_bayi').val(data.keadaan_bayi);
                    $('#edit_berat_bayi').val(data.berat_bayi);
                    $('#edit_pesentasi').val(data.pesentasi);
                    $('#edit_tempat').val(data.tempat);
                    $('#edit_penolong').val(data.penolong);
                    $('#edit_cara_persalinan').val(data.cara_persalinan);
                    $('#edit_menejemen').val(data.menejemen);
                    $('#edit_pelayanan').val(data.pelayanan);
                    $('#edit_integrasi').val(data.integrasi);
                    $('#edit_komplikasi').val(data.komplikasi);
                    $('#edit_keadaan_tiba').val(data.keadaan_tiba);
                    $('#edit_rujuk').val(data.rujuk);
                    $('#edit_alamat_bersalin').val(data.alamat_bersalin);
                    $('#editForm').attr('action', '{{ route('rekam_medis.update_persalinan', ':id') }}'
                        .replace(
                            ':id', id));
                    $('#modalEdit').modal('show');
                }
            });
        });
    </script>
@endsection
