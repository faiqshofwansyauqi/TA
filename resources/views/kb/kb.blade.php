@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <div class="pagetitle">
            <h1 style="margin-bottom: 5px">Keluarga Berencana</h1>
            <button type="button" class="btn btn-success btn-sm" id="btn-plus" style="margin-right: 10px">
                Tambah
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
                            <table class="table" id="kb-table" style="width:100%">
                                <thead>
                                    <tr>
                                        <th style="text-align: center">No</th>
                                        <th>Nama Ibu</th>
                                        <th>Jumlah Anak Hidup</th>
                                        <th>Umur Anak Terkecil</th>
                                        <th>Status Peserta KB</th>
                                        <th>Cara KB Terakhir</th>
                                        <th>Tanggal Haid Terakhir</th>
                                        <th>Status Hamil</th>
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
        <div class="modal-dialog modal-dialog-scrollable modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title fs-4 fw-bold" id="ModalInput">Input Keluarga Berencana</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('kb.store_kb') }}" method="post" autocomplete="off">
                        @csrf
                        <div class="row">
                            <div class=" col-6">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <label for="id_ibu" class="form-label">Nama Ibu</label>
                                            <select class="form-control" id="id_ibu" name="id_ibu" required>
                                                <option value="">Pilih Ibu</option>
                                                @foreach ($ibus as $ibu)
                                                    <option value="{{ $ibu->id_ibu }}">{{ $ibu->nama_ibu }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="jml_anak" class="form-label">Jumlah Anak Hidup</label>
                                            <div class="d-flex">
                                                <div class="me-2">
                                                    <input type="number" class="form-control" id="anak_laki"
                                                        name="anak_laki" min="0" required style="width: 70px;">
                                                    <small class="form-text text-muted">Laki - Laki</small>
                                                </div>
                                                <div>
                                                    <input type="number" class="form-control" id="anak_perempuan"
                                                        name="anak_perempuan" min="0" required style="width: 70px;">
                                                    <small class="form-text text-muted">Perempuan</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="status_peserta" class="form-label">Status Peserta</label>
                                            <select class="form-select" id="status_peserta" name="status_peserta" required>
                                                <option value="">Pilih Status Perserta</option>
                                                <option value="Pertama">Pertama</option>
                                                <option value="Pernah">Pernah</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <label for="umr_anak_terkecil" class="form-label">Umur Anak Terkecil</label>
                                            <div class="d-flex">
                                                <div class="me-2">
                                                    <input type="number" class="form-control" id="tahun_anak_kecil"
                                                        name="tahun_anak_kecil" min="0" required
                                                        style="width: 70px;">
                                                    <small class="form-text text-muted">Tahun</small>
                                                </div>
                                                <div>
                                                    <input type="number" class="form-control" id="bulan_anak_kecil"
                                                        name="bulan_anak_kecil" min="0" max="11" required
                                                        style="width: 70px;">
                                                    <small class="form-text text-muted">Bulan</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="kb_akhir" class="col-md-4 mb-3">
                                            <label for="kb_terakhir" class="form-label">KB Terakhir</label>
                                            <select class="form-select" id="kb_terakhir" name="kb_terakhir" required>
                                                <option value="">Pilih KB Terakhir</option>
                                                <option value="IUD">IUD</option>
                                                <option value="Implant">Implant</option>
                                                <option value="Suntikan">Suntikan</option>
                                                <option value="Pil">Pil</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="haid_terahkhir" class="form-label">Haid Terakhir</label>
                                            <input type="date" class="form-control" id="haid_terahkhir"
                                                name="haid_terahkhir" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="d-flex">
                                            <div class="col-md-4 mb-3 me-3">
                                                <label for="status_hamil" class="form-label">Status Hamil</label>
                                                <select class="form-select" id="status_hamil" name="status_hamil"
                                                    required>
                                                    <option value="">Pilih Status Hamil</option>
                                                    <option value="Ya">Ya</option>
                                                    <option value="Tidak">Tidak</option>
                                                </select>
                                            </div>
                                            <div class="col-md-1 mb-3 me-1">
                                                <label for="gravida" class="form-label">G</label>
                                                <input type="text" class="form-control" id="gravida"
                                                    pattern="[0-9,\,]*" name="gravida" required>
                                            </div>
                                            <div class="col-md-1 mb-3 me-1">
                                                <label for="partus" class="form-label">P</label>
                                                <input type="text" class="form-control" id="partus"
                                                    pattern="[0-9,\,]*" name="partus" required>
                                            </div>
                                            <div class="col-md-1 mb-3 me-3">
                                                <label for="abortus" class="form-label">A</label>
                                                <input type="text" class="form-control" id="abortus"
                                                    pattern="[0-9,\,]*" name="abortus" required>
                                            </div>
                                            <div id="riwayat_penyakit" class="col-md-4 mb-3">
                                                <label for="rwyt_pengakit" class="form-label">Riwayat Penyakit</label>
                                                <select class="form-select" id="rwyt_pengakit" name="rwyt_pengakit">
                                                    <option value="">Pilih Riwayat Penyakit</option>
                                                    <option value="Sakit Kuning">Sakit Kuning</option>
                                                    <option value="Pendarahan Pervaginam">Pendarahan Pervaginam</option>
                                                    <option value="Keputihan">Keputihan</option>
                                                    <option value="Tumor">Tumor</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="keadaan_umum" class="form-label">Keadaan Umum</label>
                                            <select class="form-select" id="keadaan_umum" name="keadaan_umum" required>
                                                <option value="">Pilih Keadaan Umum</option>
                                                <option value="Baik">Baik</option>
                                                <option value="Sedang">Sedang</option>
                                                <option value="Kurang">Kurang</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="menyusui" class="form-label">Menyusui</label>
                                            <select class="form-select" id="menyusui" name="menyusui" required>
                                                <option value="">Pilih Menyusui</option>
                                                <option value="Ya">Ya</option>
                                                <option value="Tidak">Tidak</option>
                                            </select>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="berat_badan" class="form-label">Berat Badan</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="berat_badan"
                                                    name="berat_badan" pattern="[0-9,\,]*">
                                                <span class="input-group-text">Kg</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="tkn_darah" class="form-label">TD <sup>(mmhg)</sup></label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="tkn_darah"
                                                    name="tkn_darah">
                                                <span class="input-group-text">mmhg</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <label for="psng_iud" class="form-label">Pemeriksaan Dalam Sebelum Pasang IUD
                                                /
                                                MOW</label>
                                            <select class="form-select" id="psng_iud" name="psng_iud">
                                                <option value="">Pilih Pemeriksaan Dalam Sebelum Pasang IUD / MOW
                                                </option>
                                                <option value="Tanda - Tanda Radang">Tanda - Tanda Radang</option>
                                                <option value="Tumor / Keganasan Ginekologi">Tumor / Keganasan Ginekologi
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="alat_knstps" class="form-label">Alat Kontrasepsi Boleh
                                                Dipakai</label>
                                            <select class="form-select" id="alat_knstps" name="alat_knstps" required>
                                                <option value="">Pilih Alat Kontrasepsi Boleh Dipakai
                                                </option>
                                                <option value="IUD">IUD</option>
                                                <option value="Implant">Implant</option>
                                                <option value="Pil">Pil</option>
                                                <option value="Suntik">Suntik</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="alat_knstps_dipilih" class="form-label">Alat
                                                Kontrasepsi Dipilih</label>
                                            <select class="form-select" id="alat_knstps_dipilih"
                                                name="alat_knstps_dipilih" required>
                                                <option value="">Pilih Alat Kontrasepsi Dipilih</option>
                                                <option value="IUD">IUD</option>
                                                <option value="Implant">Implant</option>
                                                <option value="Pil">Pil</option>
                                                <option value="Suntik">Suntik</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <label for="posisi_rahim" class="form-label">Posisi Rahim</label>
                                            <select class="form-select" id="posisi_rahim" name="posisi_rahim" required>
                                                <option value="">Pilih Posisi Rahim</option>
                                                <option value="Retrofleksi">Retrofleksi</option>
                                                <option value="Antefleksi">Antefleksi</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="tgl_dilayani" class="form-label">Tanggal Dilayani</label>
                                            <input type="date" class="form-control" id="tgl_dilayani"
                                                name="tgl_dilayani" required>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="tgl_kembali" class="form-label">Tanggal Kembali</label>
                                            <input type="date" class="form-control" id="tgl_kembali"
                                                name="tgl_kembali" required>
                                        </div>
                                        <div class="col-md-4 mb-3" id="tgl_dicabutContainer" style="display: none;">
                                            <label for="tgl_dicabut" class="form-label">Tanggal Dicabut</label>
                                            <input type="date" class="form-control" id="tgl_dicabut"
                                                name="tgl_dicabut">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="ModalEdit" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title fs-4 fw-bold" id="ModalEdit">Edit Keluarga Berencana</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                    <form id="editForm" method="post" autocomplete="off">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class=" col-6">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <label for="jml_anak" class="form-label">Jumlah Anak Hidup</label>
                                            <div class="d-flex">
                                                <div class="me-2">
                                                    <input type="number" class="form-control" id="edit_anak_laki"
                                                        name="anak_laki" min="0" required style="width: 70px;">
                                                    <small class="form-text text-muted">Laki - Laki</small>
                                                </div>
                                                <div>
                                                    <input type="number" class="form-control" id="edit_anak_perempuan"
                                                        name="anak_perempuan" min="0" required
                                                        style="width: 70px;">
                                                    <small class="form-text text-muted">Perempuan</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="edit_status_peserta" class="form-label">Status Peserta</label>
                                            <select class="form-select" id="edit_status_peserta" name="status_peserta"
                                                required>
                                                <option value="">Pilih Status Perserta</option>
                                                <option value="Pertama">Pertama</option>
                                                <option value="Pernah">Pernah</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <label for="umr_anak_terkecil" class="form-label">Umur Anak Terkecil</label>
                                            <div class="d-flex">
                                                <div class="me-2">
                                                    <input type="number" class="form-control" id="edit_tahun_anak_kecil"
                                                        name="tahun_anak_kecil" min="0" required
                                                        style="width: 70px;">
                                                    <small class="form-text text-muted">Tahun</small>
                                                </div>
                                                <div>
                                                    <input type="number" class="form-control" id="edit_bulan_anak_kecil"
                                                        name="bulan_anak_kecil" min="0" max="11" required
                                                        style="width: 70px;">
                                                    <small class="form-text text-muted">Bulan</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="kb_akhir" class="col-md-4 mb-3">
                                            <label for="edit_kb_terakhir" class="form-label">KB Terakhir</label>
                                            <select class="form-select" id="edit_kb_terakhir" name="kb_terakhir"
                                                required>
                                                <option value="">Pilih KB Terakhir</option>
                                                <option value="IUD">IUD</option>
                                                <option value="Implant">Implant</option>
                                                <option value="Suntikan">Suntikan</option>
                                                <option value="Pil">Pil</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="edit_haid_terahkhir" class="form-label">Haid Terakhir</label>
                                            <input type="date" class="form-control" id="edit_haid_terahkhir"
                                                name="haid_terahkhir" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="d-flex">
                                            <div class="col-md-4 mb-3 me-3">
                                                <label for="edit_status_hamil" class="form-label">Status Hamil</label>
                                                <select class="form-select" id="edit_status_hamil" name="status_hamil"
                                                    required>
                                                    <option value="">Pilih Status Hamil</option>
                                                    <option value="Ya">Ya</option>
                                                    <option value="Tidak">Tidak</option>
                                                </select>
                                            </div>
                                            <div class="col-md-1 mb-3 me-1">
                                                <label for="edit_gravida" class="form-label">G</label>
                                                <input type="text" class="form-control" id="edit_gravida"
                                                    pattern="[0-9,\,]*" name="gravida" required>
                                            </div>
                                            <div class="col-md-1 mb-3 me-1">
                                                <label for="edit_partus" class="form-label">P</label>
                                                <input type="text" class="form-control" id="edit_partus"
                                                    pattern="[0-9,\,]*" name="partus" required>
                                            </div>
                                            <div class="col-md-1 mb-3 me-3">
                                                <label for="edit_abortus" class="form-label">A</label>
                                                <input type="text" class="form-control" id="edit_abortus"
                                                    pattern="[0-9,\,]*" name="abortus" required>
                                            </div>
                                            <div id="edit_riwayat_penyakit" class="col-md-4 mb-3">
                                                <label for="edit_rwyt_pengakit" class="form-label">Riwayat
                                                    Penyakit</label>
                                                <select class="form-select" id="edit_rwyt_pengakit" name="rwyt_pengakit">
                                                    <option value="">Pilih Riwayat Penyakit</option>
                                                    <option value="Sakit Kuning">Sakit Kuning</option>
                                                    <option value="Pendarahan Pervaginam">Pendarahan Pervaginam</option>
                                                    <option value="Keputihan">Keputihan</option>
                                                    <option value="Tumor">Tumor</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="edit_keadaan_umum" class="form-label">Keadaan Umum</label>
                                            <select class="form-select" id="edit_keadaan_umum" name="keadaan_umum"
                                                required>
                                                <option value="">Pilih Keadaan Umum</option>
                                                <option value="Baik">Baik</option>
                                                <option value="Sedang">Sedang</option>
                                                <option value="Kurang">Kurang</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="edit_menyusui" class="form-label">Menyusui</label>
                                            <select class="form-select" id="edit_menyusui" name="menyusui" required>
                                                <option value="">Pilih Menyusui</option>
                                                <option value="Ya">Ya</option>
                                                <option value="Tidak">Tidak</option>
                                            </select>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="edit_berat_badan" class="form-label">Berat Badan</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="edit_berat_badan"
                                                    name="berat_badan" pattern="[0-9,\,]*">
                                                <span class="input-group-text">Kg</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="edit_tkn_darah" class="form-label">TD <sup>(mmhg)</sup></label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="edit_tkn_darah"
                                                    name="tkn_darah">
                                                <span class="input-group-text">mmhg</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <label for="edit_psng_iud" class="form-label">Pemeriksaan Dalam Sebelum Pasang
                                                IUD
                                                /
                                                MOW</label>
                                            <select class="form-select" id="edit_psng_iud" name="psng_iud">
                                                <option value="">Pilih Pemeriksaan Dalam Sebelum Pasang IUD / MOW
                                                </option>
                                                <option value="Tanda - Tanda Radang">Tanda - Tanda Radang</option>
                                                <option value="Tumor / Keganasan Ginekologi">Tumor / Keganasan Ginekologi
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="edit_alat_knstps" class="form-label">Alat Kontrasepsi Boleh
                                                Dipakai</label>
                                            <select class="form-select" id="edit_alat_knstps" name="alat_knstps"
                                                required>
                                                <option value="">Pilih Alat Kontrasepsi Boleh Dipakai
                                                </option>
                                                <option value="IUD">IUD</option>
                                                <option value="Implant">Implant</option>
                                                <option value="Pil">Pil</option>
                                                <option value="Suntik">Suntik</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="edit_alat_knstps_dipilih" class="form-label">Alat
                                                Kontrasepsi Dipilih</label>
                                            <select class="form-select" id="edit_alat_knstps_dipilih"
                                                name="alat_knstps_dipilih" required>
                                                <option value="">Pilih Alat Kontrasepsi Dipilih</option>
                                                <option value="IUD">IUD</option>
                                                <option value="Implant">Implant</option>
                                                <option value="Pil">Pil</option>
                                                <option value="Suntik">Suntik</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <label for="edit_posisi_rahim" class="form-label">Posisi Rahim</label>
                                            <select class="form-select" id="edit_posisi_rahim" name="posisi_rahim"
                                                required>
                                                <option value="">Pilih Posisi Rahim</option>
                                                <option value="Retrofleksi">Retrofleksi</option>
                                                <option value="Antefleksi">Antefleksi</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="edit_tgl_dilayani" class="form-label">Tanggal Dilayani</label>
                                            <input type="date" class="form-control" id="edit_tgl_dilayani"
                                                name="tgl_dilayani" required>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="edit_tgl_kembali" class="form-label">Tanggal Kembali</label>
                                            <input type="date" class="form-control" id="edit_tgl_kembali"
                                                name="tgl_kembali" required>
                                        </div>
                                        <div class="col-md-4 mb-3" id="edit_tgl_dicabutContainer" style="display: none;">
                                            <label for="edit_tgl_dicabut" class="form-label">Tanggal Dicabut</label>
                                            <input type="date" class="form-control" id="edit_tgl_dicabut"
                                                name="tgl_dicabut">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalPeringatan1" tabindex="-1" aria-labelledby="ModalPeringatanLabel1"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalPeringatanLabel1">Peringatan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Bila semua jawaban <strong>TIDAK DIPILIH</strong>, pemasangan IUD atau tindakan MOW dapat dilakukan.
                    Bila salah
                    satu jawaban <strong>DIPILIH</strong>, rujuk ke dokter.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="suntikModal" tabindex="-1" aria-labelledby="suntikModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="suntikModalLabel">Pilih Interval Suntikan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Pilih jangka waktu suntikan:
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="confirm30Hari">30 Hari</button>
                    <button type="button" class="btn btn-secondary" id="confirm90Hari">90 Hari</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalView" tabindex="-1" aria-labelledby="modalViewLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-4 fw-bold" id="modalViewLabel">Detail Keluarga Berencana</h1>
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

            let table = $('#kb-table').DataTable({
                processing: true,
                serverSide: false,
                ordering: false,
                ajax: '{{ route('kb.data_kb') }}',
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
                        name: 'nama_ibu'
                    },
                    {
                        data: 'anak_laki',
                        name: 'anak_laki',
                        render: function(data, type, row) {
                            return "Laki-Laki: " + data + "\nPerempuan: " + row.anak_perempuan;
                        }
                    },
                    {
                        data: 'tahun_anak_kecil',
                        name: 'tahun_anak_kecil',
                        render: function(data, type, row) {
                            return data + " Tahun" + "<br>" + row.bulan_anak_kecil + " Bulan";
                        }
                    },
                    {
                        data: 'status_peserta',
                        name: 'status_peserta'
                    },
                    {
                        data: 'kb_terakhir',
                        name: 'kb_terakhir',
                        render: function(data, type, row) {
                            return data ? data : "-";
                        }
                    },
                    {
                        data: 'haid_terahkhir',
                        name: 'haid_terahkhir',
                        render: function(data, type, row, meta) {
                            var date = new Date(data);
                            var day = date.getDate();
                            var month = date.getMonth() + 1;
                            var year = date.getFullYear().toString().slice();
                            day = day < 10 ? '0' + day : day;
                            month = month < 10 ? '0' + month : month;
                            return day + '/' + month + '/' + year;
                        }
                    },
                    {
                        data: 'status_hamil',
                        name: 'status_hamil'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        render: function(data, type, row) {
                            let editUrl =
                                '{{ route('kb.edit_kb', ':id') }}'
                                .replace(
                                    ':id', row.id);
                            let viewUrl = '{{ route('kb.kunjungan_ulang', ':id') }}'.replace(
                                ':id', row.id);
                            let detailUrl = '{{ route('kb.show_kb', ':id') }}'.replace(
                                ':id', row.id);
                            return `
                            <div style="display: flex; justify-content: center;">       
                                <a href="${viewUrl}" class="btn btn-table btn-sm btn-dark" style="margin-right: 5px;">
                                Kunjungan </a>
                                <button class="btn btn-table btn-sm btn-dark view-btn" data-id="${row.id}" data-bs-toggle="modal" data-bs-target="#modalView" style="margin-right: 5px;">
                                    Detail
                                </button>
                                <button class="btn btn-table btn-sm btn-primary edit-btn" data-id="${row.id}" data-bs-toggle="modal" data-bs-target="#modalEdit">
                                Edit
                                </button>
                            </div>`;
                        }
                    }
                ],
                // dom: '<"d-flex justify-content-between align-items-center"<"#dt-buttons"B>f>rtip',
                // buttons: [{
                //     extend: 'colvis',
                //     className: 'btn btn-secondary btn-sm',
                // }],
                columnDefs: [{
                    targets: [],
                    visible: false
                }]
            });
            table.buttons().container().appendTo(
                '#colvis-button');
        });

        $('#kb-table').on('click', '.view-btn', function() {
            let id = $(this).data('id');
            $.ajax({
                url: '{{ route('kb.show_kb', ':id') }}'.replace(':id', id),
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
                        </thead>
                        <tbody>
                            <tr>
                                <td>Jumlah Anak hiudp</td>
                                <td class="text-center">Laki - Laki : ${data.anak_laki}</td>
                                <td class="text-center">Perempuan : ${data.anak_perempuan}</td>
                            </tr>
                            <tr>
                                <td>Umur Anak Terkecil</td>
                                <td class="text-center">Tahun : ${data.tahun_anak_kecil}</td>
                                <td class="text-center">Bulan : ${data.bulan_anak_kecil}</td>
                            </tr>
                            <tr>
                                <td>Status Peserta KB</td>
                                <td class="text-center" colspan="2">${data.status_peserta}</td>
                            </tr>
                            <tr>
                                <td>Cara KB Terakhir</td>
                                <td class="text-center" colspan="2">{{ $data->kb_terakhir ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td>Tanggal Haid Terakhir</td>
                                <td class="text-center" colspan="2">${formatDateOnly(data.haid_terahkhir)}</td>
                            </tr>
                            <tr>
                                <td>Hamil / Diduga Hamil</td>
                                <td class="text-center" colspan="2">${data.status_hamil}</td>
                            </tr>
                            <tr>
                                <td>G P A</td>
                                <td class="text-center" colspan="2">G${data.gravida}P${data.partus}A${data.abortus}</td>
                            </tr>
                            <tr>
                                <td>Menyusui</td>
                                <td class="text-center" colspan="2">${data.menyusui}</td>
                            </tr>
                            <tr>
                                <td>Riwayat Penyakit Sebelumnya</td>
                                <td class="text-center" colspan="2">{{ $data->rwyt_pengakit ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td>Keadaan Umum</td>
                                <td class="text-center" colspan="2">${data.keadaan_umum}</td>
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
                                <td>Berat Badan</td>
                                <td class="text-center">${data.berat_badan} Kg</td>
                            </tr>
                            <tr>
                                <td>Tekanan Darah</td>
                                <td class="text-center">${data.tkn_darah} mmhg</td>
                            </tr>
                            <tr>
                                <td>Pemasangan IUD / MOW</td>
                                <td class="text-center">{{ $data->pasang_iud ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td>Posisi Rahim</td>
                                <td class="text-center">${data.posisi_rahim}</td>
                            </tr>
                            <tr>
                                <td>Alat Kontrasepsi Boleh Dipakai</td>
                                <td class="text-center">${data.alat_knstps}</td>
                            </tr>
                            <tr>
                                <td>Alat Kontrasepesi Dipilih</td>
                                <td class="text-center">${data.alat_knstps_dipilih}</td>
                            </tr>
                            <tr>
                                <td>Tanggal Dilayani</td>
                                <td class="text-center" colspan="2">${formatDateOnly(data.tgl_dilayani)}</td>
                            </tr>
                            <tr>
                                <td>Tanggal Kembali</td>
                                <td class="text-center" colspan="2">${formatDateOnly(data.tgl_kembali)}</td>
                            </tr>
                            <tr>
                                <td>Tanggal Dicabut</td>
                                <td class="text-center" colspan="2">${data.tgl_dicabut ? formatDateOnly(data.tgl_dicabut) : '-'}</td>
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
            `;
                    $('#modalView .modal-body').html(tableHtml);
                    $('#modalView').modal('show');
                }
            });
        });

        $('#kb-table').on('click', '.edit-btn', function() {
            let id = $(this).data('id');
            $.ajax({
                url: '{{ route('kb.edit_kb', ':id') }}'.replace(':id', id),
                method: 'GET',
                success: function(data) {
                    $('#edit_bulan_anak_kecil').val(data.bulan_anak_kecil);
                    $('#edit_tahun_anak_kecil').val(data.tahun_anak_kecil);
                    $('#edit_anak_laki').val(data.anak_laki);
                    $('#edit_anak_perempuan').val(data.anak_perempuan);
                    $('#edit_status_peserta').val(data.status_peserta);
                    $('#edit_kb_terakhir').val(data.kb_terakhir);
                    $('#edit_haid_terahkhir').val(data.haid_terahkhir);
                    $('#edit_status_hamil').val(data.status_hamil);
                    $('#edit_gravida').val(data.gravida);
                    $('#edit_partus').val(data.partus);
                    $('#edit_abortus').val(data.abortus);
                    $('#edit_menyusui').val(data.menyusui);
                    $('#edit_rwyt_pengakit').val(data.rwyt_pengakit);
                    $('#edit_keadaan_umum').val(data.keadaan_umum);
                    $('#edit_berat_badan').val(data.berat_badan);
                    $('#edit_tkn_darah').val(data.tkn_darah);
                    $('#edit_psng_iud').val(data.psng_iud);
                    $('#edit_posisi_rahim').val(data.posisi_rahim);
                    $('#edit_pmrksn_tambahan').val(data.pmrksn_tambahan);
                    $('#edit_alat_knstps').val(data.alat_knstps);
                    $('#edit_alat_knstps_dipilih').val(data.alat_knstps_dipilih);
                    $('#edit_tgl_dilayani').val(data.tgl_dilayani);
                    $('#edit_tgl_kembali').val(data.tgl_kembali);
                    $('#edit_tgl_dicabut').val(data.tgl_dicabut);
                    $('#editForm').attr('action',
                        '{{ route('kb.update_kb', ':id') }}'
                        .replace(
                            ':id', id));
                    $('#modalEdit').modal('show');
                }
            });
        });
        document.addEventListener('DOMContentLoaded', function() {
            function restrictInputToNumbers(input, maxLength) {
                if (input) {
                    input.addEventListener('input', function() {
                        var value = input.value;
                        value = value.replace(/[^0-9/,]/g, '');
                        if (value.length > maxLength) {
                            value = value.substring(0, maxLength);
                        }
                        input.value = value;
                    });
                }
            }
            var inputs = [{
                    id: 'berat_badan',
                    maxLength: 5
                },
                {
                    id: 'edit_berat_badan',
                    maxLength: 5
                },
                {
                    id: 'tkn_darah',
                    maxLength: 8
                },
                {
                    id: 'edit_tkn_darah',
                    maxLength: 8
                }
            ];
            inputs.forEach(function(input) {
                var element = document.getElementById(input.id);
                restrictInputToNumbers(element, input.maxLength);
            });
        });
        document.addEventListener('DOMContentLoaded', function() {
            function handlePemeriksaanClick(iudSelector, modalId) {
                let modalPeringatan1Shown = false;
                const pemeriksaanIUDSelect = document.getElementById(iudSelector);
                pemeriksaanIUDSelect.addEventListener('click', function() {
                    if (!modalPeringatan1Shown) {
                        const modalPeringatan1 = new bootstrap.Modal(document.getElementById(modalId));
                        modalPeringatan1.show();
                        document.getElementById(modalId).addEventListener('hidden.bs.modal', function() {
                            modalPeringatan1Shown = true;
                        });
                    }
                });
            }
            handlePemeriksaanClick('psng_iud', 'modalPeringatan1');
            handlePemeriksaanClick('edit_psng_iud', 'modalPeringatan1');
        });
        $(document).ready(function() {
            $('#id_ibu').change(function() {
                var id_ibu = $(this).val();
                $('#id_ibu').val('');
                $('#gravida').val('');
                $('#partus').val('');
                $('#abortus').val('');
                $('#anak_laki').val('');
                $('#anak_perempuan').val('');
                $('#tahun_anak_kecil').val('');
                $('#bulan_anak_kecil').val('');
                if (id_ibu) {
                    $.ajax({
                        url: '{{ route('kb.getInfo_kb', ':id_ibu') }}'
                            .replace(':id_ibu',
                                id_ibu),
                        type: 'GET',
                        dataType: 'json',
                        success: function(response) {
                            if (response.ibu) {
                                $('#id_ibu').val(response.ibu.id_ibu);
                            }
                            if (response.ropb) {
                                $('#gravida').val(response.ropb.gravida);
                                $('#partus').val(response.ropb.partus);
                                $('#abortus').val(response.ropb.abortus);
                            }
                            if (response.anak && response.anak.length > 0) {
                                var jumlah_laki = 0;
                                var jumlah_perempuan = 0;
                                response.anak.forEach(function(anak) {
                                    if (anak.jenis_kelamin === 'Laki-laki') {
                                        jumlah_laki++;
                                    } else if (anak.jenis_kelamin === 'Perempuan') {
                                        jumlah_perempuan++;
                                    }
                                });
                                $('#anak_laki').val(jumlah_laki);
                                $('#anak_perempuan').val(jumlah_perempuan);
                            }
                            if (response.kms.length > 0) {
                                var dataCount = response.kms.length;
                                var tahun = Math.floor(dataCount / 12);
                                var bulan = dataCount % 12;
                                $('#tahun_anak_kecil').val(tahun);
                                $('#bulan_anak_kecil').val(bulan);
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error('Error: ', error);
                        }
                    });
                }
            });
        });
        document.addEventListener('DOMContentLoaded', function() {
            function restrictInputToNumbers(input, maxLength) {
                if (input) {
                    input.addEventListener('input', function() {
                        var value = input.value;
                        value = value.replace(/[^0-9/,]/g, '');
                        if (value.length > maxLength) {
                            value = value.substring(0, maxLength);
                        }
                        input.value = value;
                    });
                }
            }
            var inputs = [{
                    id: 'gravida',
                    maxLength: 10
                },
                {
                    id: 'edit_gravida',
                    maxLength: 10
                },
                {
                    id: 'partus',
                    maxLength: 10
                },
                {
                    id: 'edit_partus',
                    maxLength: 10
                },
                {
                    id: 'abortus',
                    maxLength: 10
                },
                {
                    id: 'edit_abortus',
                    maxLength: 10
                },
            ];
            inputs.forEach(function(input) {
                var element = document.getElementById(input.id);
                restrictInputToNumbers(element, input.maxLength);
            });
        });
        $(document).ready(function() {
            function toggleFields(statusSelector, kbSelector, rwytSelector) {
                var isPertama = $(statusSelector).val() === 'Pertama';
                $(kbSelector).prop('disabled', isPertama);
                $(rwytSelector).prop('disabled', isPertama);
            }
            $('#status_peserta').on('change', function() {
                toggleFields('#status_peserta', '#kb_terakhir', '#rwyt_pengakit');
            });
            $('#edit_status_peserta').on('change', function() {
                toggleFields('#edit_status_peserta', '#edit_kb_terakhir', '#edit_rwyt_pengakit');
            });
            var initialStatus = "Pertama";
            $('#edit_status_peserta').val(initialStatus).trigger('change');
        });
        document.addEventListener('DOMContentLoaded', function() {
            function setupToggle(selector, containerId) {
                const alatKontrasepsiDipilih = document.getElementById(selector);
                const tglDicabutContainer = document.getElementById(containerId);

                function toggleTanggalKembali() {
                    const selectedValue = alatKontrasepsiDipilih.value;
                    tglDicabutContainer.style.display = (selectedValue === 'Implant' || selectedValue === 'IUD') ?
                        'block' : 'none';
                }

                toggleTanggalKembali();
                alatKontrasepsiDipilih.addEventListener('change', toggleTanggalKembali);
            }

            setupToggle('alat_knstps_dipilih', 'tgl_dicabutContainer');
            setupToggle('edit_alat_knstps_dipilih', 'edit_tgl_dicabutContainer');
        });
        document.addEventListener('DOMContentLoaded', function() {
            const alatKontrasepsiDipilih = document.getElementById('edit_alat_knstps_dipilih');
            const tglDilayani = document.getElementById('edit_tgl_dilayani');
            const tglKembali = document.getElementById('edit_tgl_kembali');
            const tglDicabut = document.getElementById('edit_tgl_dicabut');
            const tglDicabutContainer = document.getElementById('edit_tgl_dicabutContainer');
            const suntikModal = new bootstrap.Modal(document.getElementById('suntikModal'));
            const confirm30HariBtn = document.getElementById('confirm30Hari');
            const confirm90HariBtn = document.getElementById('confirm90Hari');

            function addDaysToDate(date, days) {
                const result = new Date(date);
                result.setDate(result.getDate() + days);
                return result;
            }

            function addYearsToDate(date, years) {
                const result = new Date(date);
                result.setFullYear(result.getFullYear() + years);
                return result;
            }

            function updateTanggalKembaliDanDicabut() {
                if (tglDilayani.value) {
                    const tanggalDilayani = new Date(tglDilayani.value);
                    let tanggalKembali;
                    if (alatKontrasepsiDipilih.value === 'Suntik') {
                        suntikModal.show();
                        confirm30HariBtn.onclick = function() {
                            suntikModal.hide();
                            tanggalKembali = addDaysToDate(tanggalDilayani, 30);
                            setTanggalKembali(tanggalDilayani, tanggalKembali);
                        };
                        confirm90HariBtn.onclick = function() {
                            suntikModal.hide();
                            tanggalKembali = addDaysToDate(tanggalDilayani, 90);
                            setTanggalKembali(tanggalDilayani, tanggalKembali);
                        };
                    } else if (alatKontrasepsiDipilih.value === 'Pil') {
                        tanggalKembali = addDaysToDate(tanggalDilayani, 30);
                        setTanggalKembali(tanggalDilayani, tanggalKembali);
                        tglDicabutContainer.style.display = 'none';
                    } else if (alatKontrasepsiDipilih.value === 'Implant') {
                        tanggalKembali = addYearsToDate(tanggalDilayani, 4);
                        setTanggalKembali(tanggalDilayani, tanggalKembali);
                        tglDicabutContainer.style.display = 'block';
                        tglDicabut.value = tanggalKembali.toISOString().split('T')[0];
                    } else if (alatKontrasepsiDipilih.value === 'IUD') {
                        tanggalKembali = addYearsToDate(tanggalDilayani, 5);
                        setTanggalKembali(tanggalDilayani, tanggalKembali);
                        tglDicabutContainer.style.display = 'block';
                        tglDicabut.value = tanggalKembali.toISOString().split('T')[0];
                    } else {
                        tglKembali.value = '';
                        tglDicabutContainer.style.display = 'none';
                    }
                }
            }

            function setTanggalKembali(tanggalDilayani, tanggalKembali) {
                const formattedTanggalKembali = tanggalKembali.toISOString().split('T')[0];
                tglKembali.value = formattedTanggalKembali;
                tglDilayani.value = tanggalDilayani.toISOString().split('T')[0];
            }
            alatKontrasepsiDipilih.addEventListener('change', updateTanggalKembaliDanDicabut);
            tglDilayani.addEventListener('change', updateTanggalKembaliDanDicabut);
        });
        document.addEventListener('DOMContentLoaded', function() {
            const alatKontrasepsiDipilih = document.getElementById('alat_knstps_dipilih');
            const tglDilayani = document.getElementById('tgl_dilayani');
            const tglKembali = document.getElementById('tgl_kembali');
            const tglDicabut = document.getElementById('tgl_dicabut');
            const tglDicabutContainer = document.getElementById('tgl_dicabutContainer');
            const suntikModal = new bootstrap.Modal(document.getElementById('suntikModal'));
            const confirm30HariBtn = document.getElementById('confirm30Hari');
            const confirm90HariBtn = document.getElementById('confirm90Hari');

            function addDaysToDate(date, days) {
                const result = new Date(date);
                result.setDate(result.getDate() + days);
                return result;
            }

            function addYearsToDate(date, years) {
                const result = new Date(date);
                result.setFullYear(result.getFullYear() + years);
                return result;
            }

            function updateTanggalKembaliDanDicabut() {
                if (tglDilayani.value) {
                    const tanggalDilayani = new Date(tglDilayani.value);
                    let tanggalKembali;
                    if (alatKontrasepsiDipilih.value === 'Suntik') {
                        suntikModal.show();
                        confirm30HariBtn.onclick = function() {
                            suntikModal.hide();
                            tanggalKembali = addDaysToDate(tanggalDilayani, 30);
                            setTanggalKembali(tanggalDilayani, tanggalKembali);
                        };
                        confirm90HariBtn.onclick = function() {
                            suntikModal.hide();
                            tanggalKembali = addDaysToDate(tanggalDilayani, 90);
                            setTanggalKembali(tanggalDilayani, tanggalKembali);
                        };
                    } else if (alatKontrasepsiDipilih.value === 'Pil') {
                        tanggalKembali = addDaysToDate(tanggalDilayani, 30);
                        setTanggalKembali(tanggalDilayani, tanggalKembali);
                        tglDicabutContainer.style.display = 'none';
                    } else if (alatKontrasepsiDipilih.value === 'Implant') {
                        tanggalKembali = addYearsToDate(tanggalDilayani, 4);
                        setTanggalKembali(tanggalDilayani, tanggalKembali);
                        tglDicabutContainer.style.display = 'block';
                        tglDicabut.value = tanggalKembali.toISOString().split('T')[0];
                    } else if (alatKontrasepsiDipilih.value === 'IUD') {
                        tanggalKembali = addYearsToDate(tanggalDilayani, 5);
                        setTanggalKembali(tanggalDilayani, tanggalKembali);
                        tglDicabutContainer.style.display = 'block';
                        tglDicabut.value = tanggalKembali.toISOString().split('T')[0];
                    } else {
                        tglKembali.value = '';
                        tglDicabutContainer.style.display = 'none';
                    }
                }
            }

            function setTanggalKembali(tanggalDilayani, tanggalKembali) {
                const formattedTanggalKembali = tanggalKembali.toISOString().split('T')[0];
                tglKembali.value = formattedTanggalKembali;
                tglDilayani.value = tanggalDilayani.toISOString().split('T')[0];
            }
            alatKontrasepsiDipilih.addEventListener('change', updateTanggalKembaliDanDicabut);
            tglDilayani.addEventListener('change', updateTanggalKembaliDanDicabut);
        });
    </script>
@endsection
