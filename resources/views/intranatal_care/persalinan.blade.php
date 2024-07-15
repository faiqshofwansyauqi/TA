@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <div class="pagetitle">
            <h1 style="margin-bottom: 5px">Masa Persalinan</h1>
            <div class="header-right">
                <button type="button" class="btn btn-success btn-custom1" id="btn-plus">
                    <i class="bi bi-plus-circle"></i> Tambah
                </button>
                <div id="colvis-button">
                </div>
            </div>
        </div>
    </div>

    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <br>
                        <div class="table-responsive">
                            <table class="table table-borderless table-anc" id="persalinan-table" style="width:100%">
                                <thead>
                                    <tr>
                                        <th style="text-align: center">No</th>
                                        <th>Nama Ibu</th>
                                        <th>Kala I Aktif</th>
                                        <th>Kala II</th>
                                        <th>Bayi Lahir</th>
                                        <th>Piasenta Lahir</th>
                                        <th>Pendarahan Kala IV</th>
                                        <th>Usia Kehamilan</th>
                                        <th>Usia HPHT</th>
                                        <th>Keadaan Ibu</th>
                                        <th>Keadaan Bayi</th>
                                        <th>Berat Bayi</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Panjang Bayi</th>
                                        <th>Presentasi</th>
                                        <th>Penolong</th>
                                        <th>Tempat</th>
                                        <th>Cara Persalinan</th>
                                        <th>Menejemen Aktif Kala III</th>
                                        <th>Pelayanan</th>
                                        <th>Integrasi Program</th>
                                        <th>Komplikasi</th>
                                        <th>Keadaan Tiba</th>
                                        <th>Keadaan Pulang</th>
                                        <th>Dirujuk</th>
                                        <th>Alamat Bersalin</th>
                                        <th style="text-align: center">Aksi</th>
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
                    <h3 class="modal-title fs-4 fw-bold" id="ModalInput">Input Masa Persalinan</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('intranatal_care.store_persalinan') }}" method="post" autocomplete="off">
                        @csrf
                        <div class="col-12">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="id_ibu" class="form-label">Ibu</label>
                                        <select class="form-control" id="id_ibu" name="id_ibu" required>
                                            <option value="">Pilih Ibu</option>
                                            @foreach ($ibus as $anc)
                                                <option value="{{ $anc->ibu->id_ibu }}">{{ $anc->ibu->nama_ibu }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="kala1" class="form-label">Kala I Aktif</label>
                                        <input type="datetime-local" class="form-control" id="kala1" name="kala1"
                                            required>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="kala2" class="form-label">Kala II</label>
                                        <input type="datetime-local" class="form-control" id="kala2" name="kala2"
                                            required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="bayi_lahir" class="form-label">Bayi Lahir</label>
                                        <input type="datetime-local" class="form-control" id="bayi_lahir" name="bayi_lahir"
                                            required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="piasenta" class="form-label">Piasenta Lahir</label>
                                        <input type="datetime-local" class="form-control" id="piasenta" name="piasenta"
                                            required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <label for="pendarahan" class="form-label">Pendarahan Kala IV</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="pendarahan" name="pendarahan"
                                                placeholder="Input Pendarahan Kala IV" pattern="[0-9,\,]*" required>
                                            <span class="input-group-text">cc</span>
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="usia_kehamilan" class="form-label">Usia Kehamilan</label>
                                        <div class="input-group">
                                            <input type="number" class="form-control" id="usia_kehamilan"
                                                name="usia_kehamilan" placeholder="input Usia Kehamilan" required>
                                            <span class="input-group-text">mgg</span>
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="usia_hpht" class="form-label">Usia HP HT</label>
                                        <div class="input-group">
                                            <input type="number" class="form-control" id="usia_hpht" name="usia_hpht"
                                                placeholder="input Usia HP HT" required>
                                            <span class="input-group-text">mgg</span>
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="keadaan_ibu" class="form-label">Keadaan Ibu</label>
                                        <select class="form-select" id="keadaan_ibu" name="keadaan_ibu" required>
                                            <option value="">Pilih Keadaan Ibu</option>
                                            <option value="Mati">Mati</option>
                                            <option value="Hidup">Hidup</option>
                                        </select>
                                    </div>
                                </div>
                                <div class='row'>
                                    <div class="col-md-3 mb-3">
                                        <label for="keadaan_bayi" class="form-label">Keadaan Bayi</label>
                                        <select class="form-select" id="keadaan_bayi" name="keadaan_bayi" required>
                                            <option value="">Pilih Keadaan Bayi</option>
                                            <option value="Mati">Mati</option>
                                            <option value="Hidup">Hidup</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="berat_bayi" class="form-label">Berat Bayi</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="berat_bayi" name="berat_bayi"
                                                placeholder="input Berat Bayi" pattern="[0-9,\,]*" required>
                                            <span class="input-group-text">gr</span>
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                        <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" required>
                                            <option value="">Pilih Jenis Kelamin</option>
                                            <option value="Laki-laki">Laki-laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="panjang_bayi" class="form-label">Panjang Bayi</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="panjang_bayi"
                                                name="panjang_bayi" placeholder="input Berat Bayi" pattern="[0-9,\,]*"
                                                required>
                                            <span class="input-group-text">cm</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
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
                                    <div class="col-md-4 mb-3">
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
                                    <div class="col-md-4 mb-3">
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
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="cara_persalinan" class="form-label">Cara Persalinan</label>
                                        <select class="form-select" id="cara_persalinan" name="cara_persalinan" required>
                                            <option value="">Pilih Cara Persalinan</option>
                                            <option value="Normal">Normal</option>
                                            <option value="Vakum">Vakum</option>
                                            <option value="Forseps">Forseps</option>
                                            <option value="Seksio Sesarea">Seksio Sesarea</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-3">
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
                                    <div class="col-md-4 mb-3">
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
                                <div class="row">
                                    <div class="col-md-3 mb-3 pe-0">
                                        <label for="integrasi" class="form-label">Integrasi Program</label>
                                        <select class="form-select" id="integrasi" name="integrasi" required>
                                            <option value="">Pilih Jenis Integrasi Program</option>
                                            <option value="ARV Profilaksis">ARV Profilaksis :</option>
                                            <option value="Obat Anti Malaria">Obat Anti Malaria :</option>
                                            <option value="Obat Anti TB">Obat Anti TB :</option>
                                        </select>
                                    </div>
                                    <div class="col-md-1 mb-3 ps-0">
                                        <label for="detail_integrasi" class="form-label"
                                            style="color: white">Detail</label>
                                        <input type="text" class="form-control" id="detail_integrasi"
                                            name="detail_integrasi">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="komplikasi" class="form-label">Komplikasi</label>
                                        <select class="form-select" id="komplikasi" name="komplikasi" required>
                                            <option value="">Pilih Komplikasi</option>
                                            <option value="HDK">HDK</option>
                                            <option value="PPP">PPP</option>
                                            <option value="Inteksi">Inteksi</option>
                                            <option value="Lainnya">Lainnya</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="keadaan_tiba" class="form-label">Keadaan Tiba</label>
                                        <select class="form-select" id="keadaan_tiba" name="keadaan_tiba" required>
                                            <option value="">Pilih Keadaan Tiba</option>
                                            <option value="Hidup">Hidup</option>
                                            <option value="Mati">Mati</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <label for="keadaan_pulang" class="form-label">Keadaan Pulang</label>
                                        <select class="form-select" id="keadaan_pulang" name="keadaan_pulang" required>
                                            <option value="">Pilih Keadaan Pulang</option>
                                            <option value="Hidup">Hidup</option>
                                            <option value="Mati">Mati</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-3">
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
                                    <div class="col-md-5 mb-3">
                                        <label for="alamat_bersalin" class="form-label">Alamat Bersalin</label>
                                        <textarea class="form-control" id="alamat_bersalin" rows="2" name="alamat_bersalin" required></textarea>
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
                    <h3 class="modal-title fs-4 fw-bold" id="ModalEdit">Edit Masa Persalinan</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                    <form id="editForm" method="post" autocomplete="off">
                        @csrf
                        @method('PUT')
                        <div class="col-12">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 mb-2">
                                        <label for="edit_kala1" class="form-label">Kala I Aktif</label>
                                        <input type="datetime-local" class="form-control" id="edit_kala1"
                                            name="kala1">
                                    </div>
                                    <div class="col-md-6 mb-2">
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
                                    <div class='row'>
                                        <div class="col-md-3 mb-3">
                                            <label for="edit_pendarahan" class="form-label">Pendarahan Kala IV</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="edit_pendarahan"
                                                    name="pendarahan" placeholder="Input Pendarahan Kala IV"
                                                    pattern="[0-9,\,]*">
                                                <span class="input-group-text">cc</span>
                                            </div>
                                        </div>
                                        <div class="col-md-3 mb-2">
                                            <label for="edit_usia_kehamilan" class="form-label">Usia Kehamilan</label>
                                            <div class="input-group mb-2">
                                                <input type="number" class="form-control" id="edit_usia_kehamilan"
                                                    name="usia_kehamilan" placeholder="input Usia Kehamilan">
                                                <span class="input-group-text">minggu</span>
                                            </div>
                                        </div>
                                        <div class="col-md-3 mb-2">
                                            <label for="edit_usia_hpht" class="form-label">Usia HP HT</label>
                                            <div class="input-group mb-2">
                                                <input type="number" class="form-control" id="edit_usia_hpht"
                                                    name="usia_hpht" placeholder="input Usia HP HT">
                                                <span class="input-group-text">minggu</span>
                                            </div>
                                        </div>
                                        <div class="col-md-3 mb-2">
                                            <label for="edit_keadaan_ibu" class="form-label">Keadaan Ibu</label>
                                            <select class="form-select" id="edit_keadaan_ibu" name="keadaan_ibu"
                                                required>
                                                <option value="">Pilih Keadaan Ibu</option>
                                                <option value="Mati">Mati</option>
                                                <option value="Hidup">Hidup</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class='row'>
                                        <div class="col-md-3 mb-2">
                                            <label for="edit_keadaan_bayi" class="form-label">Keadaan Bayi</label>
                                            <select class="form-select" id="edit_keadaan_bayi" name="keadaan_bayi"
                                                required>
                                                <option value="">Pilih Keadaan Bayi</option>
                                                <option value="Mati">Mati</option>
                                                <option value="Hidup">Hidup</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3 mb-2">
                                            <label for="edit_berat_bayi" class="form-label">Berat Bayi</label>
                                            <div class="input-group mb-2">
                                                <input type="text" class="form-control" id="edit_berat_bayi"
                                                    name="berat_bayi" placeholder="input Berat Bayi" pattern="[0-9,\,]*">
                                                <span class="input-group-text">gram</span>
                                            </div>
                                        </div>
                                        <div class="col-md-3 mb-2">
                                            <label for="edit_jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                            <select class="form-select" id="edit_jenis_kelamin" name="jenis_kelamin"
                                                required>
                                                <option value="">Pilih Jenis Kelamin</option>
                                                <option value="Laki-laki">Laki-laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3 mb-2">
                                            <label for="edit_panjang_bayi" class="form-label">Panjang Bayi</label>
                                            <div class="input-group mb-2">
                                                <input type="text" class="form-control" id="edit_panjang_bayi"
                                                    name="panjang_bayi" placeholder="input Berat Bayi"
                                                    pattern="[0-9,\,]*">
                                                <span class="input-group-text">cm</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-2">
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
                                    <div class="col-md-6 mb-2">
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
                                    <div class="col-md-6 mb-2">
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
                                    <div class="col-md-6 mb-2">
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
                                    <div class="col-md-6 mb-2">
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
                                    <div class="col-md-6 mb-2">
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
                                    <div class="col-md-4 mb-2 pe-0">
                                        <label for="edit_integrasi" class="form-label">Integrasi Program</label>
                                        <select class="form-select" id="edit_integrasi" name="integrasi" required>
                                            <option value="">Pilih Jenis Integrasi Program</option>
                                            <option value="ARV Profilaksis">ARV Profilaksis :</option>
                                            <option value="Obat Anti Malaria">Obat Anti Malaria :</option>
                                            <option value="Obat Anti TB">Obat Anti TB :</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2 mb-2 ps-0">
                                        <label for="edit_detail_integrasi" class="form-label"
                                            style="color: white">Detail</label>
                                        <input type="text" class="form-control" id="edit_detail_integrasi"
                                            name="detail_integrasi">
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <label for="edit_komplikasi" class="form-label">Komplikasi</label>
                                        <select class="form-select" id="edit_komplikasi" name="komplikasi" required>
                                            <option value="">Pilih Komplikasi</option>
                                            <option value="HDK">HDK</option>
                                            <option value="PPP">PPP</option>
                                            <option value="Inteksi">Inteksi</option>
                                            <option value="Lainnya">Lainnya</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="edit_keadaan_tiba" class="form-label">Keadaan Tiba</label>
                                        <select class="form-select" id="edit_keadaan_tiba" name="keadaan_tiba" required>
                                            <option value="">Pilih Keadaan Tiba</option>
                                            <option value="Hidup">Hidup</option>
                                            <option value="Mati">Mati</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="edit_keadaan_pulang" class="form-label">Keadaan Pulang</label>
                                        <select class="form-select" id="edit_keadaan_pulang" name="keadaan_pulang"
                                            required>
                                            <option value="">Pilih Keadaan Pulang</option>
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
                                    <div class="col-md-5">
                                        <label for="edit_alamat_bersalin" class="form-label">Alamat Bersalin</label>
                                        <textarea class="form-control" id="edit_alamat_bersalin" rows="2" name="alamat_bersalin"></textarea>
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
                    <h3 class="modal-title fs-4 fw-bold" id="modalViewLabel">Detail Masa Persalinan</h3>
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

            let table = $('#persalinan-table').DataTable({
                processing: true,
                serverSide: false,
                ordering: false,
                ajax: '{{ route('intranatal_care.data_persalinan') }}',
                scrollX: false,
                fixedHeader: true,
                columns: [{
                        data: 'id',
                        name: 'id',
                        render: function(data, type, row, meta) {
                            return '<div style="text-align: center;">' + (meta.row + meta.settings
                                ._iDisplayStart + 1) + '</div>';
                        }
                    },
                    {
                        data: 'nama_ibu',
                        name: 'nama_ibu',
                    },
                    {
                        data: 'kala1',
                        name: 'kala1',
                        render: function(data) {
                            var date = new Date(data);
                            var formattedDate = ('0' + date.getDate()).slice(-2) + '/' +
                                ('0' + (date.getMonth() + 1)).slice(-2) + '/' +
                                date.getFullYear();
                            var formattedTime = ('0' + date.getHours()).slice(-2) + ':' +
                                ('0' + date.getMinutes()).slice(-2);
                            var dateTimeString = formattedDate + ' ' + formattedTime;
                            return dateTimeString;
                        }
                    },
                    {
                        data: 'kala2',
                        name: 'kala2',
                        render: function(data) {
                            var date = new Date(data);
                            var formattedDate = ('0' + date.getDate()).slice(-2) + '/' +
                                ('0' + (date.getMonth() + 1)).slice(-2) + '/' +
                                date.getFullYear();
                            var formattedTime = ('0' + date.getHours()).slice(-2) + ':' +
                                ('0' + date.getMinutes()).slice(-2);
                            var dateTimeString = formattedDate + ' ' + formattedTime;
                            return dateTimeString;
                        }
                    },
                    {
                        data: 'bayi_lahir',
                        name: 'bayi_lahir',
                        render: function(data) {
                            var date = new Date(data);
                            var formattedDate = ('0' + date.getDate()).slice(-2) + '/' +
                                ('0' + (date.getMonth() + 1)).slice(-2) + '/' +
                                date.getFullYear();
                            var formattedTime = ('0' + date.getHours()).slice(-2) + ':' +
                                ('0' + date.getMinutes()).slice(-2);
                            var dateTimeString = formattedDate + ' ' + formattedTime;
                            return dateTimeString;
                        }
                    },
                    {
                        data: 'piasenta',
                        name: 'piasenta',
                        render: function(data) {
                            var date = new Date(data);
                            var formattedDate = ('0' + date.getDate()).slice(-2) + '/' +
                                ('0' + (date.getMonth() + 1)).slice(-2) + '/' +
                                date.getFullYear();
                            var formattedTime = ('0' + date.getHours()).slice(-2) + ':' +
                                ('0' + date.getMinutes()).slice(-2);
                            var dateTimeString = formattedDate + ' ' + formattedTime;
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
                        data: 'usia_kehamilan',
                        name: 'usia_kehamilan',
                        render: function(data, type, row) {
                            return data + ' Minggu';
                        }
                    },
                    {
                        data: 'usia_hpht',
                        name: 'usia_hpht',
                        render: function(data, type, row) {
                            return data + ' Menggu';
                        }
                    },
                    {
                        data: 'keadaan_ibu',
                        name: 'keadaan_ibu'
                    },
                    {
                        data: 'keadaan_bayi',
                        name: 'keadaan_bayi'
                    },
                    {
                        data: 'berat_bayi',
                        name: 'berat_bayi',
                        render: function(data, type, row) {
                            return data + ' Gram';
                        }
                    },
                    {
                        data: 'jenis_kelamin',
                        name: 'jenis_kelamin'
                    },
                    {
                        data: 'panjang_bayi',
                        name: 'panjang_bayi',
                        render: function(data, type, row) {
                            return data + ' Gram';
                        }
                    },
                    {
                        data: 'pesentasi',
                        name: 'pesentasi'
                    },
                    {
                        data: 'tempat',
                        name: 'tempat'
                    },
                    {
                        data: 'penolong',
                        name: 'penolong'
                    },
                    {
                        data: 'cara_persalinan',
                        name: 'cara_persalinan'
                    },
                    {
                        data: 'menejemen',
                        name: 'menejemen'
                    },
                    {
                        data: 'pelayanan',
                        name: 'pelayanan'
                    },
                    {
                        data: null,
                        name: 'integrasi_detail_integrasi',
                        render: function(data) {
                            return data.integrasi + ' : ' + data.detail_integrasi;
                        }
                    },
                    {
                        data: 'komplikasi',
                        name: 'komplikasi'
                    },
                    {
                        data: 'keadaan_tiba',
                        name: 'keadaan_tiba'
                    },
                    {
                        data: 'keadaan_pulang',
                        name: 'keadaan_pulang'
                    },
                    {
                        data: 'rujuk',
                        name: 'rujuk'
                    },
                    {
                        data: 'alamat_bersalin',
                        name: 'alamat_bersalin'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        render: function(data, type, row) {
                            let viewUrl = '{{ route('intranatal_care.show_persalinan', ':id') }}'
                                .replace(':id', row.id);
                            let editUrl = '{{ route('intranatal_care.edit_persalinan', ':id') }}'
                                .replace(':id', row.id);
                            return `
                            <div style="display: flex; justify-content: center;">
                                <button class="btn btn-sm btn-dark view-btn" data-id="${row.id}" data-bs-toggle="modal" data-bs-target="#modalView" style="margin-right: 5px;">
                                    <i class="bi bi-eye-fill"></i>
                                </button>
                                    <button class="btn btn-sm btn-primary edit-btn" data-id="${row.id}" data-bs-toggle="modal" data-bs-target="#modalEdit">
                                        <i class="ri-edit-2-fill"></i>
                                    </button>
                            </div>`;
                        }
                    }
                ],
                dom: '<"d-flex justify-content-between align-items-center"<"#dt-buttons"B>f>rtip',
                buttons: [{
                    extend: 'colvis',
                    className: 'btn btn-secondary btn-custom2',
                }],
                columnDefs: [{
                    targets: [4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22],
                    visible: false
                }]
            });
            table.buttons().container().appendTo(
                '#colvis-button');
        });

        document.addEventListener('DOMContentLoaded', function() {
            function restrictInputToNumbers(input, maxLength) {
                input.addEventListener('input', function() {
                    var value = input.value;
                    value = value.replace(/[^0-9/,]/g, '');
                    if (value.length > maxLength) {
                        value = value.substring(0, maxLength);
                    }
                    input.value = value;
                });
            }

            var berat_bayiInput = document.getElementById('berat_bayi');
            var berat_bayiEdit = document.getElementById('edit_berat_bayi');
            var panjang_bayiInput = document.getElementById('panjang_bayi');
            var panjang_bayiEdit = document.getElementById('edit_panjang_bayi');
            var pendarahanInput = document.getElementById('pendarahan');
            var pendarahanEdit = document.getElementById('edit_pendarahan');

            restrictInputToNumbers(berat_bayiEdit, 5);
            restrictInputToNumbers(panjang_bayiEdit, 10);
            restrictInputToNumbers(pendarahanEdit, 10);
            restrictInputToNumbers(berat_bayiInput, 5);
            restrictInputToNumbers(panjang_bayiInput, 10);
            restrictInputToNumbers(pendarahanInput, 10);
        });

        // $('#persalinan-table').on('click', '.btn-delete', function() {
        //     const id = $(this).data('id');
        //     const url = $(this).data('url');

        //     Swal.fire({
        //         title: 'Apakah Anda yakin?',
        //         text: "Anda tidak akan bisa mengembalikan ini!",
        //         icon: 'warning',
        //         showCancelButton: true,
        //         confirmButtonColor: '#3085d6',
        //         cancelButtonColor: '#d33',
        //         confirmButtonText: 'Ya, hapus!',
        //         cancelButtonText: 'Batal',
        //         showLoaderOnConfirm: true,
        //         preConfirm: () => {
        //             return $.ajax({
        //                 url: url,
        //                 type: 'POST',
        //                 data: {
        //                     _method: 'DELETE',
        //                     _token: '{{ csrf_token() }}'
        //                 },
        //                 error: function(xhr) {
        //                     Swal.fire(
        //                         'Gagal!',
        //                         'Data gagal dihapus.',
        //                         'error'
        //                     );
        //                 }
        //             }).then(response => {
        //                 if (response.success) {
        //                     Swal.fire(
        //                         'Terhapus!',
        //                         'Data telah berhasil dihapus.',
        //                         'success'
        //                     );
        //                     $('.swal2-confirm').remove();
        //                     setTimeout(function() {
        //                         location.reload();
        //                     }, 1000);
        //                 } else {
        //                     Swal.fire(
        //                         'Gagal!',
        //                         'Data gagal dihapus.',
        //                         'error'
        //                     );
        //                 }
        //             });
        //         }
        //     });
        // });

        $('#persalinan-table').on('click', '.view-btn', function() {
            let id = $(this).data('id');
            $.ajax({
                url: '{{ route('intranatal_care.show_persalinan', ':id') }}'.replace(':id', id),
                method: 'GET',
                success: function(data) {
                    let namaIbu = data.nama_ibu;

                    function formatDateOnly(dateString) {
                        if (!dateString) return '';
                        const date = new Date(dateString);
                        const formattedDay = ('0' + date.getDate()).slice(-2);
                        const formattedMonth = ('0' + (date.getMonth() + 1)).slice(-2);
                        const formattedYear = date.getFullYear();
                        return `${formattedDay}/${formattedMonth}/${formattedYear}`;
                    }

                    function formatTimeOnly(dateString) {
                        if (!dateString) return '';
                        const date = new Date(dateString);
                        const formattedHours = ('0' + date.getHours()).slice(-2);
                        const formattedMinutes = ('0' + date.getMinutes()).slice(-2);
                        return `${formattedHours}:${formattedMinutes}`;
                    }
                    let fasePersalinanTableHtml = `
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Fase Persalinan</th>
                                <th class="text-center">Tanggal</th>
                                <th class="text-center">Jam</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Kala I Aktif</td>
                                <td class="text-center">${formatDateOnly(data.kala1)}</td>
                                <td class="text-center">${formatTimeOnly(data.kala1)}</td>
                            </tr>
                            <tr>
                                <td>Kala II</td>
                                <td class="text-center">${formatDateOnly(data.kala2)}</td>
                                <td class="text-center">${formatTimeOnly(data.kala2)}</td>
                            </tr>
                            <tr>
                                <td>Bayi Lahir</td>
                                <td class="text-center">${formatDateOnly(data.bayi_lahir)}</td>
                                <td class="text-center">${formatTimeOnly(data.bayi_lahir)}</td>
                            </tr>
                            <tr>
                                <td>Piasenta Lahir</td>
                                <td class="text-center">${formatDateOnly(data.piasenta)}</td>
                                <td class="text-center">${formatTimeOnly(data.piasenta)}</td>
                            </tr>
                            <tr>
                                <td>Pendarahan Kala IV</td>
                                <td class="text-center" colspan="2">${data.pendarahan} cc</td>
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
                            <tr>
                                <td>Jenis Kelamin</td>
                                <td>${data.jenis_kelamin}</td>
                            </tr>
                            <tr>
                                <td>Panjang Bayi</td>
                                <td>${data.panjang_bayi} Cm</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            `;
                    let newInfoTableHtml = `
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        </thead>
                        <tbody>
                            <tr>
                                <td width="270">Pesentasi</td>
                                <td>${data.pesentasi}</td>
                            </tr>
                            <tr>
                                <td width="270">Tempat</td>
                                <td>${data.tempat}</td>
                            </tr>
                            <tr>
                                <td width="270">Penolong</td>
                                <td>${data.penolong}</td>
                            </tr>
                            <tr>
                                <td width="270">Cara Persalinan</td>
                                <td>${data.cara_persalinan}</td>
                            </tr>
                            <tr>
                                <td width="270">Manajemen Aktif Kala III</td>
                                <td>${data.menejemen}</td>
                            </tr>
                            <tr>
                                <td width="270">Pelayanan</td>
                                <td>${data.pelayanan}</td>
                            </tr>
                            <tr>
                                <td width="270">Integrasi Program</td>
                                <td>${data.integrasi} : ${data.detail_integrasi}</td>
                            </tr>
                            <tr>
                                <td width="270">Komplikasi</td>
                                <td>${data.komplikasi}</td>
                            </tr>
                            <tr>
                                <td width="270">Keadaan Tiba</td>
                                <td>${data.keadaan_tiba}</td>
                            </tr>
                            <tr>
                                <td width="270">Keadaan Pulang</td>
                                <td>${data.keadaan_pulang}</td>
                            </tr>
                            <tr>
                                <td width="270">Dirujuk ke</td>
                                <td>${data.rujuk}</td>
                            </tr>
                            <tr>
                                <td width="270">Alamat Bersalin</td>
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
                    $('#modalView .modal-body').html(tableHtml);
                    $('#modalView').modal('show');
                }
            });
        });

        $('#persalinan-table').on('click', '.edit-btn', function() {
            let id = $(this).data('id');
            $.ajax({
                url: '{{ route('intranatal_care.edit_persalinan', ':id') }}'.replace(':id', id),
                method: 'GET',
                success: function(data) {
                    console.log("Pesan diterima:", data);
                    $('#edit_nama_ibu').val(data.nama_ibu);
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
                    $('#edit_jenis_kelamin').val(data.jenis_kelamin);
                    $('#edit_panjang_bayi').val(data.panjang_bayi);
                    $('#edit_pesentasi').val(data.pesentasi);
                    $('#edit_tempat').val(data.tempat);
                    $('#edit_penolong').val(data.penolong);
                    $('#edit_cara_persalinan').val(data.cara_persalinan);
                    $('#edit_menejemen').val(data.menejemen);
                    $('#edit_pelayanan').val(data.pelayanan);
                    $('#edit_integrasi').val(data.integrasi);
                    $('#edit_detail_integrasi').val(data.detail_integrasi);
                    $('#edit_komplikasi').val(data.komplikasi);
                    $('#edit_keadaan_tiba').val(data.keadaan_tiba);
                    $('#edit_keadaan_pulang').val(data.keadaan_pulang);
                    $('#edit_rujuk').val(data.rujuk);
                    $('#edit_alamat_bersalin').val(data.alamat_bersalin);
                    $('#editForm').attr('action',
                        '{{ route('intranatal_care.update_persalinan', ':id') }}'
                        .replace(
                            ':id', id));
                    $('#modalEdit').modal('show');
                }
            });
        });
    </script>
@endsection
