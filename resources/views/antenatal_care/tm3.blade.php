@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <div class="pagetitle">
            <h1>Pemeriksaan Fisik</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item">Antenatal Care</li>
                    <li class="breadcrumb-item active">Pemeriksaan Dokter TM3</li>
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
                            <table class="table small" id="tm3-table" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Nama Ibu</th>
                                        <th>Konjungtiva</th>
                                        <th>Sklera</th>
                                        <th>Kulit</th>
                                        <th>Leher</th>
                                        <th>Gigi/Mulut</th>
                                        <th>THT</th>
                                        <th>Jantung</th>
                                        <th>Paru</th>
                                        <th>Perut</th>
                                        <th>Tungkai</th>
                                        <th>GS</th>
                                        <th>CRL</th>
                                        <th>DJJ</th>
                                        <th>Sesuai Usia Kehamilan</th>
                                        <th>Taksiran Persalinan</th>
                                        <th>HB</th>
                                        <th>Gula Darah</th>
                                        <th>Gula Darah 2 Jam PP</th>
                                        <th>Rencana Konsultasi Lanjut</th>
                                        <th>Rekomendasi</th>
                                        <th>Rencana Persalinan</th>
                                        <th>Pilihan Rencana Kontrasepsi</th>
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
        <div class="modal-dialog modal-dialog-scrollable modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-4 fw-bold" id="ModalInput">Input Pemeriksaan Fisik</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('antenatal_care.store_tm3') }}" method="post" autocomplete="off">
                        @csrf
                        <div class="card col-12">
                            <div class="card-body">
                                <h5 class="card-title"></h5>
                                <div class="row">
                                    <div class="col-md-3 mb-2">
                                        <label for="NIK" class="form-label">Ibu</label>
                                        <select class="form-control" id="NIK" name="NIK" required>
                                            <option value="">Pilih Ibu</option>
                                            @foreach ($ibus as $ibu)
                                                <option value="{{ $ibu->nama_ibu }}">{{ $ibu->nama_ibu }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <label for="konjungtiva" class="form-label">Konjungtiva</label>
                                        <select class="form-select" id="konjungtiva" name="konjungtiva" required>
                                            <option value="">Pilih Konjungtiva</option>
                                            <option value="Normal">Normal</option>
                                            <option value="Tidak">Tidak</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <label for="sklera" class="form-label">Sklera</label>
                                        <select class="form-select" id="sklera" name="sklera" required>
                                            <option value="">Pilih Sklera</option>
                                            <option value="Normal">Normal</option>
                                            <option value="Tidak">Tidak</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <label for="kulit" class="form-label">Kulit</label>
                                        <select class="form-select" id="kulit" name="kulit" required>
                                            <option value="">Pilih Kulit</option>
                                            <option value="Normal">Normal</option>
                                            <option value="Tidak">Tidak</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 mb-2">
                                        <label for="leher" class="form-label">Leher</label>
                                        <select class="form-select" id="leher" name="leher" required>
                                            <option value="">Pilih Leher</option>
                                            <option value="Normal">Normal</option>
                                            <option value="Tidak">Tidak</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <label for="gigi_mulut" class="form-label">Gigi/Mulut</label>
                                        <select class="form-select" id="gigi_mulut" name="gigi_mulut" required>
                                            <option value="">Pilih Gigi/Mulut</option>
                                            <option value="Normal">Normal</option>
                                            <option value="Tidak">Tidak</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <label for="tht" class="form-label">THT</label>
                                        <select class="form-select" id="tht" name="tht" required>
                                            <option value="">Pilih THT</option>
                                            <option value="Normal">Normal</option>
                                            <option value="Tidak">Tidak</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <label for="jantung" class="form-label">Jantung</label>
                                        <select class="form-select" id="jantung" name="jantung" required>
                                            <option value="">Pilih Jantung</option>
                                            <option value="Normal">Normal</option>
                                            <option value="Tidak">Tidak</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 mb-2">
                                        <label for="paru" class="form-label">Paru</label>
                                        <select class="form-select" id="paru" name="paru" required>
                                            <option value="">Pilih Paru</option>
                                            <option value="Normal">Normal</option>
                                            <option value="Tidak">Tidak</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <label for="perut" class="form-label">Perut</label>
                                        <select class="form-select" id="perut" name="perut" required>
                                            <option value="">Pilih Perut</option>
                                            <option value="Normal">Normal</option>
                                            <option value="Tidak">Tidak</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <label for="tungkai" class="form-label">Tungkai</label>
                                        <select class="form-select" id="tungkai" name="tungkai" required>
                                            <option value="">Pilih Tungkai</option>
                                            <option value="Normal">Normal</option>
                                            <option value="Tidak">Tidak</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <label for="gs" class="form-label">GS</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="gs" name="gs"
                                                pattern="[0-9,\.]*" required>
                                            <span class="input-group-text">Cm</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 mb-2">
                                        <label for="crl" class="form-label">CRL</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="crl" name="crl"
                                                pattern="[0-9,\.]*" required>
                                            <span class="input-group-text">Cm</span>
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <label for="djj" class="form-label">DJJ</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="djj" name="djj"
                                                pattern="[0-9,\.]*" required>
                                            <span class="input-group-text">dpm</span>
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <label for="usia_kehamilan" class="form-label">Usia Kehamilan</label>
                                        <div class="input-group">
                                            <input type="number" class="form-control" id="usia_kehamilan"
                                                name="usia_kehamilan" required>
                                            <span class="input-group-text">mgg</span>
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <label for="tkrsn_persalinan" class="form-label">Taksiran Persalinan</label>
                                        <input type="date" class="form-control" id="tkrsn_persalinan"
                                            name="tkrsn_persalinan" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 mb-2">
                                        <label for="hb" class="form-label">HB</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="hb" name="hb"
                                                pattern="[0-9,\.]*" required>
                                            <span class="input-group-text">gr/dl</span>
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <label for="gula_darah" class="form-label">Gula Darah Puasa</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="gula_darah" name="gula_darah"
                                                pattern="[0-9,\.]*" required>
                                            <span class="input-group-text">mg/dl</span>
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <label for="gula_darah_pp" class="form-label">Gula Darah 2 Jam PP</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="gula_darah_pp"
                                                name="gula_darah_pp" pattern="[0-9,\.]*" required>
                                            <span class="input-group-text">mg/dl</span>
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <label for="konsultasi" class="form-label">Rencana Konsultasi Lanjut</label>
                                        <select class="form-select" id="konsultasi" name="konsultasi" required>
                                            <option value="">Pilih Rencana Konsultasi Lanjut</option>
                                            <option value="Gizi">Gizi</option>
                                            <option value="Kebidanan">Kebidanan</option>
                                            <option value="Anak">Anak</option>
                                            <option value="Penyakit dalam">Penyakit dalam</option>
                                            <option value="Neorologi">Neorologi</option>
                                            <option value="THT">THT</option>
                                            <option value="Psikiatri">Psikiatri</option>
                                            <option value="Lain-lain">Lain-lain</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 mb-2">
                                        <label for="rekomendasi" class="form-label">Rekomendasi</label>
                                        <select class="form-select" id="rekomendasi" name="rekomendasi" required>
                                            <option value="">Pilih Rekomendasi</option>
                                            <option value="ANC di FKTP">ANC di FKTP</option>
                                            <option value="Rujuk FKTRL">Rujuk FKTRL</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="rnca_persalinan" class="form-label">Rencana Persalinan</label>
                                        <select class="form-select" id="rnca_persalinan" name="rnca_persalinan" required>
                                            <option value="">Pilih Rencana Persalinan</option>
                                            <option value="Normal">Normal</option>
                                            <option value="SC">SC</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="rnca_kontrasepsi" class="form-label">Rencaana Kontrasepsi</label>
                                        <select class="form-select" id="rnca_kontrasepsi" name="rnca_kontrasepsi"
                                            required>
                                            <option value="">Pilih Rencana Persalinan</option>
                                            <option value="MAL">MAL</option>
                                            <option value="Pil">Pil</option>
                                            <option value="Suntik">Suntik</option>
                                            <option value="AKDR">AKDR</option>
                                            <option value="Implan">Implan</option>
                                            <option value="Steril">Steril</option>
                                            <option value="Belum memilih">Belum memilih</option>
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary">Submit</button>
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
                    <h3 class="modal-title fs-4 fw-bold" id="ModalEdit">Pemeriksaan Fisik</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                    <form id="editForm" method="post" autocomplete="off">
                        @csrf
                        @method('PUT')
                        <div class="card col-12">
                            <div class="card-body">
                                <h5 class="card-title"></h5>
                                <div class="row">
                                    <div class="col-md-3 mb-2">
                                        <label for="edit_NIK" class="form-label">Ibu</label>
                                        <select class="form-control" id="edit_NIK" name="NIK" disabled>
                                            <option value="">Pilih Ibu</option>
                                            @foreach ($ibus as $ibu)
                                                <option value="{{ $ibu->nama_ibu }}">{{ $ibu->nama_ibu }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <label for="edit_konjungtiva" class="form-label">Konjungtiva</label>
                                        <select class="form-select" id="edit_konjungtiva" name="konjungtiva" required>
                                            <option value="">Pilih Konjungtiva</option>
                                            <option value="Normal">Normal</option>
                                            <option value="Tidak">Tidak</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <label for="edit_sklera" class="form-label">Sklera</label>
                                        <select class="form-select" id="edit_sklera" name="sklera" required>
                                            <option value="">Pilih Sklera</option>
                                            <option value="Normal">Normal</option>
                                            <option value="Tidak">Tidak</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <label for="edit_kulit" class="form-label">Kulit</label>
                                        <select class="form-select" id="edit_kulit" name="kulit" required>
                                            <option value="">Pilih Kulit</option>
                                            <option value="Normal">Normal</option>
                                            <option value="Tidak">Tidak</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 mb-2">
                                        <label for="edit_leher" class="form-label">Leher</label>
                                        <select class="form-select" id="edit_leher" name="leher" required>
                                            <option value="">Pilih Leher</option>
                                            <option value="Normal">Normal</option>
                                            <option value="Tidak">Tidak</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <label for="edit_gigi_mulut" class="form-label">Gigi/Mulut</label>
                                        <select class="form-select" id="edit_gigi_mulut" name="gigi_mulut" required>
                                            <option value="">Pilih Gigi/Mulut</option>
                                            <option value="Normal">Normal</option>
                                            <option value="Tidak">Tidak</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <label for="edit_tht" class="form-label">THT</label>
                                        <select class="form-select" id="edit_tht" name="tht" required>
                                            <option value="">Pilih THT</option>
                                            <option value="Normal">Normal</option>
                                            <option value="Tidak">Tidak</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <label for="edit_jantung" class="form-label">Jantung</label>
                                        <select class="form-select" id="edit_jantung" name="jantung" required>
                                            <option value="">Pilih Jantung</option>
                                            <option value="Normal">Normal</option>
                                            <option value="Tidak">Tidak</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 mb-2">
                                        <label for="edit_paru" class="form-label">Paru</label>
                                        <select class="form-select" id="edit_paru" name="paru" required>
                                            <option value="">Pilih Paru</option>
                                            <option value="Normal">Normal</option>
                                            <option value="Tidak">Tidak</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <label for="edit_perut" class="form-label">Perut</label>
                                        <select class="form-select" id="edit_perut" name="perut" required>
                                            <option value="">Pilih Perut</option>
                                            <option value="Normal">Normal</option>
                                            <option value="Tidak">Tidak</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <label for="edit_tungkai" class="form-label">Tungkai</label>
                                        <select class="form-select" id="edit_tungkai" name="tungkai" required>
                                            <option value="">Pilih Tungkai</option>
                                            <option value="Normal">Normal</option>
                                            <option value="Tidak">Tidak</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <label for="edit_gs" class="form-label">GS</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="edit_gs" name="gs"
                                                pattern="[0-9,\.]*" required>
                                            <span class="input-group-text">Cm</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 mb-2">
                                        <label for="edit_crl" class="form-label">CRL</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="edit_crl" name="crl"
                                                pattern="[0-9,\.]*" required>
                                            <span class="input-group-text">Cm</span>
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <label for="edit_djj" class="form-label">DJJ</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="edit_djj" name="djj"
                                                pattern="[0-9,\.]*" required>
                                            <span class="input-group-text">dpm</span>
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <label for="edit_usia_kehamilan" class="form-label">Usia Kehamilan</label>
                                        <div class="input-group">
                                            <input type="number" class="form-control" id="edit_usia_kehamilan"
                                                name="usia_kehamilan" required>
                                            <span class="input-group-text">mgg</span>
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <label for="edit_tkrsn_persalinan" class="form-label">Taksiran Persalinan</label>
                                        <input type="date" class="form-control" id="edit_tkrsn_persalinan"
                                            name="tkrsn_persalinan" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 mb-2">
                                        <label for="edit_hb" class="form-label">HB</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="edit_hb" name="hb"
                                                pattern="[0-9,\.]*" required>
                                            <span class="input-group-text">gr/dl</span>
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <label for="edit_gula_darah" class="form-label">Gula Darah Puasa</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="edit_gula_darah"
                                                name="gula_darah" pattern="[0-9,\.]*" required>
                                            <span class="input-group-text">mg/dl</span>
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <label for="edit_gula_darah_pp" class="form-label">Gula Darah 2 Jam PP</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="edit_gula_darah_pp"
                                                name="gula_darah_pp" pattern="[0-9,\.]*" required>
                                            <span class="input-group-text">mg/dl</span>
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <label for="edit_konsultasi" class="form-label">Rencana Konsultasi Lanjut</label>
                                        <select class="form-select" id="edit_konsultasi" name="konsultasi" required>
                                            <option value="">Pilih Rencana Konsultasi Lanjut</option>
                                            <option value="Gizi">Gizi</option>
                                            <option value="Kebidanan">Kebidanan</option>
                                            <option value="Anak">Anak</option>
                                            <option value="Penyakit dalam">Penyakit dalam</option>
                                            <option value="Neorologi">Neorologi</option>
                                            <option value="THT">THT</option>
                                            <option value="Psikiatri">Psikiatri</option>
                                            <option value="Lain-lain">Lain-lain</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 mb-2">
                                        <label for="edit_rekomendasi" class="form-label">Rekomendasi</label>
                                        <select class="form-select" id="edit_rekomendasi" name="rekomendasi" required>
                                            <option value="">Pilih Rekomendasi</option>
                                            <option value="ANC di FKTP">ANC di FKTP</option>
                                            <option value="Rujuk FKTRL">Rujuk FKTRL</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="edit_rnca_persalinan" class="form-label">Rencana Persalinan</label>
                                        <select class="form-select" id="edit_rnca_persalinan" name="rnca_persalinan"
                                            required>
                                            <option value="">Pilih Rencana Persalinan</option>
                                            <option value="Normal">Normal</option>
                                            <option value="SC">SC</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="edit_rnca_kontrasepsi" class="form-label">Rencaana Kontrasepsi</label>
                                        <select class="form-select" id="edit_rnca_kontrasepsi" name="rnca_kontrasepsi"
                                            required>
                                            <option value="">Pilih Rencana Persalinan</option>
                                            <option value="MAL">MAL</option>
                                            <option value="Pil">Pil</option>
                                            <option value="Suntik">Suntik</option>
                                            <option value="AKDR">AKDR</option>
                                            <option value="Implan">Implan</option>
                                            <option value="Steril">Steril</option>
                                            <option value="Belum memilih">Belum memilih</option>
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
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
                    <h1 class="modal-title fs-4 fw-bold" id="modalViewLabel"></h1>
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
            $('#tm3-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('antenatal_care.data_tm3') }}',
                scrollX: true,
                fixedHeader: true,
                columns: [{
                        data: 'NIK',
                        name: 'NIK'
                    },
                    {
                        data: 'konjungtiva',
                        name: 'konjungtiva'
                    },
                    {
                        data: 'sklera',
                        name: 'sklera'
                    },
                    {
                        data: 'kulit',
                        name: 'kulit'
                    },
                    {
                        data: 'leher',
                        name: 'leher'
                    },
                    {
                        data: 'gigi_mulut',
                        name: 'gigi_mulut'
                    },
                    {
                        data: 'tht',
                        name: 'tht'
                    },
                    {
                        data: 'jantung',
                        name: 'jantung'
                    },
                    {
                        data: 'paru',
                        name: 'paru'
                    },
                    {
                        data: 'perut',
                        name: 'perut'
                    },
                    {
                        data: 'tungkai',
                        name: 'tungkai'
                    },
                    {
                        data: 'gs',
                        name: 'gs',
                        render: function(data, type, row) {
                            return data + ' Cm';
                        }
                    },
                    {
                        data: 'crl',
                        name: 'crl',
                        render: function(data, type, row) {
                            return data + ' Cm';
                        }
                    },
                    {
                        data: 'djj',
                        name: 'djj',
                        render: function(data, type, row) {
                            return data + ' dpm';
                        }
                    },
                    {
                        data: 'usia_kehamilan',
                        name: 'usia_kehamilan',
                        render: function(data, type, row) {
                            return data + ' mgg';
                        }
                    },
                    {
                        data: 'tkrsn_persalinan',
                        name: 'tkrsn_persalinan',
                        render: function(data) {
                            var date = new Date(data);
                            var day = date.getDate();
                            var month = date.getMonth() + 1;
                            var year = date.getFullYear();
                            if (day < 10) {
                                day = '0' + day;
                            }
                            if (month < 10) {
                                month = '0' + month;
                            }
                            return day + ' - ' + month + ' - ' + year;
                        }
                    },
                    {
                        data: 'hb',
                        name: 'hb',
                        render: function(data, type, row) {
                            return data + ' gr/dl';
                        }
                    },
                    {
                        data: 'gula_darah',
                        name: 'gula_darah',
                        render: function(data, type, row) {
                            return data + ' ml/dl';
                        }
                    },
                    {
                        data: 'gula_darah_pp',
                        name: 'gula_darah_pp',
                        render: function(data, type, row) {
                            return data + ' ml/dl';
                        }

                    },
                    {
                        data: 'konsultasi',
                        name: 'konsultasi'
                    },
                    {
                        data: 'rekomendasi',
                        name: 'rekomendasi'
                    },
                    {
                        data: 'rnca_persalinan',
                        name: 'rnca_persalinan'
                    },
                    {
                        data: 'rnca_kontrasepsi',
                        name: 'rnca_kontrasepsi'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        render: function(data, type, row) {
                            let viewUrl = '{{ route('antenatal_care.show_tm3', ':id') }}'
                                .replace(':id', row.id);
                            let editUrl = '{{ route('antenatal_care.edit_tm3', ':id') }}'
                                .replace(':id', row.id);
                            let deleteUrl = '{{ route('antenatal_care.destroy_tm3', ':id') }}'
                                .replace(':id', row.id);
                            return `
                            <div style="display: flex; align-items: center;">
                            <button class="btn btn-sm btn-primary view-btn" data-id="${row.id}" data-bs-toggle="modal" data-bs-target="#modalView">
                            <i class="bi bi-eye-fill"></i>
                            </button>
                            <div style="display: flex; align-items:w center;">
                            <button class="btn btn-sm btn-success edit-btn" data-id="${row.id}" data-bs-toggle="modal" data-bs-target="#modalEdit">
                            <i class="bi bi-pencil-fill"></i>
                            </button>
                            <form action="${deleteUrl}" method="POST">
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
                buttons: [{
                    extend: 'colvis',
                    text: 'Column visibility'
                }],
                columnDefs: [{
                    targets: [10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21],
                    visible: false
                }]
            });
        });

        $('#tm3-table').on('click', '.edit-btn', function() {
            let id = $(this).data('id');
            $.ajax({
                url: '{{ route('antenatal_care.edit_tm3', ':id') }}'.replace(':id', id),
                method: 'GET',
                success: function(data) {
                    $('#edit_NIK').val(data.NIK);
                    $('#edit_konjungtiva').val(data.konjungtiva);
                    $('#edit_sklera').val(data.sklera);
                    $('#edit_kulit').val(data.kulit);
                    $('#edit_leher').val(data.leher);
                    $('#edit_gigi_mulut').val(data.gigi_mulut);
                    $('#edit_tht').val(data.tht);
                    $('#edit_jantung').val(data.jantung);
                    $('#edit_paru').val(data.paru);
                    $('#edit_perut').val(data.perut);
                    $('#edit_tungkai').val(data.tungkai);
                    $('#edit_gs').val(data.gs);
                    $('#edit_crl').val(data.crl);
                    $('#edit_djj').val(data.djj);
                    $('#edit_usia_kehamilan').val(data.usia_kehamilan);
                    $('#edit_tkrsn_persalinan').val(data.tkrsn_persalinan);
                    $('#edit_hb').val(data.hb);
                    $('#edit_gula_darah').val(data.gula_darah);
                    $('#edit_gula_darah_pp').val(data.gula_darah_pp);
                    $('#edit_konsultasi').val(data.konsultasi);
                    $('#edit_rekomendasi').val(data.rekomendasi);
                    $('#edit_rnca_persalinan').val(data.rnca_persalinan);
                    $('#edit_rnca_kontrasepsi').val(data.rnca_kontrasepsi);
                    $('#editForm').attr('action', '{{ route('antenatal_care.update_tm3', ':id') }}'
                        .replace(
                            ':id', id));
                    $('#modalEdit').modal('show');
                }
            });
        });

        $('#tm3-table').on('click', '.view-btn', function() {
            let id = $(this).data('id');
            $.ajax({
                url: '{{ route('antenatal_care.show_tm3', ':id') }}'.replace(':id', id),
                method: 'GET',
                success: function(data) {
                    let namaIbu = data.ibu.nama_ibu;

                    function formatDate(dateString) {
                        if (!dateString) return '';
                        if (isNaN(new Date(dateString))) return 'Invalid date format';
                        const date = new Date(dateString);
                        const year = date.getFullYear();
                        const month = String(date.getMonth() + 1).padStart(2, '0');
                        const day = String(date.getDate()).padStart(2, '0');
                        return `${day} - ${month} - ${year}`;
                    }
                    let Table1Html = `
                    <div class="table-responsive">
                    <h5><strong>Pemeriksaan Dokter TM3</strong></h5>
                    <table class="table table-outside">
                        <thead>                          
                        </thead>
                        <tbody>
                            <tr>
                                <td width="120">Konjungtiva</td>
                                <td class="text-center" width="30">:</td>
                                <td class="text-center">${(data.konjungtiva)}</td>
                            </tr>
                            <tr>
                                <td width="120">Sklera</td>
                                <td class="text-center" width="30">:</td>
                                <td class="text-center">${(data.sklera)}</td>
                            </tr>
                            <tr>
                                <td width="120">Kulit</td>
                                <td class="text-center" width="30">:</td>
                                <td class="text-center">${(data.kulit)}</td>
                            </tr>
                            <tr>
                                <td width="120">Leher</td>
                                <td class="text-center" width="30">:</td>
                                <td class="text-center">${(data.leher)}</td>
                            </tr>
                            <tr>
                                <td width="120">Gigi/mulut</td>
                                <td class="text-center" width="30">:</td>
                                <td class="text-center">${(data.gigi_mulut)}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            `;
                    let Table2Html = `
                    <div class="table-responsive">
                        <h5><strong>Pemeriksaan Fisik</strong></h5>
                    <table class="table table-outside">
                        <thead>                          
                        </thead>
                        <tbody>
                            <tr>
                                <td width="120">THT</td>
                                <td class="text-center" width="30">:</td>
                                <td class="text-center">${(data.tht)}</td>
                            </tr>
                            <tr>
                                <td width="120">Jantung</td>
                                <td class="text-center" width="30">:</td>
                                <td class="text-center">${(data.jantung)}</td>
                            </tr>
                            <tr>
                                <td width="120">Paru</td>
                                <td class="text-center" width="30">:</td>
                                <td class="text-center">${(data.paru)}</td>
                            </tr>
                            <tr>
                                <td width="120">Perut</td>
                                <td class="text-center" width="30">:</td>
                                <td class="text-center">${(data.perut)}</td>
                            </tr>
                            <tr>
                                <td width="120">Tungkai</td>
                                <td class="text-center" width="30">:</td>
                                <td class="text-center">${(data.tungkai)}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            `;
                    let Table3Html = `
                    <div class="table-responsive">
                    <h5><strong>USG</strong></h5>
                    <table class="table table-outside">
                        <thead>                          
                        </thead>
                        <tbody>
                            <tr>
                                <td width="250">GS (Gestational Sac)</td>
                                <td class="text-center" width="30">:</td>
                                <td class="text-center">${(data.gs)} Cm</td>
                            </tr>
                            <tr>
                                <td width="250">CRL (Crown-rump-lenght)</td>
                                <td class="text-center" width="30">:</td>
                                <td class="text-center">${(data.crl)} Cm</td>
                            </tr>
                            <tr>
                                <td width="250">DJJ (Denyut Jantung Janin)</td>
                                <td class="text-center" width="30">:</td>
                                <td class="text-center">${(data.djj)} dpm</td>
                            </tr>
                            <tr>
                                <td width="250">Sesuai usia kehamilan</td>
                                <td class="text-center" width="30">:</td>
                                <td class="text-center">${(data.usia_kehamilan)} Minggu</td>
                            </tr>
                            <tr>
                                <td width="250">Taksiran persalinan</td>
                                <td class="text-center" width="30">:</td>
                                <td class="text-center">${formatDate(data.tkrsn_persalinan)}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            `;
                    let Table4Html = `
                    <div class="table-responsive">
                    <table class="table table-outside">
                        <thead>                          
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="3" rowspan="3" class="align-middle text-center normal-header table-outside td1" width="160">Pemeriksaan Laboratorium</td>
                                <td class="text-left normal-header">HB</td>
                                <th class="text-center" width="30">:</th>
                                <td>${(data.hb)} gram/dl</td>
                            </tr>
                            <tr>
                                <td class="text-left normal-header" width="160">Gula Darah Puasa</td>
                                <th class="text-center" width="30">:</th>
                                <td>${(data.gula_darah)} mg/dl</td>
                            </tr>
                            <tr>
                                <td class="text-left normal-header" width="160">Gula Darah 2 Jam PP</td>
                                <th class="text-center" width="30">:</th>
                                <td>${(data.gula_darah_pp)} mg/dl</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            `;
                    let Table5Html = `
                    <div class="table-responsive">
                    <table class="table table-borderless">
                        <thead>                          
                        </thead>
                        <tbody>
                            <tr>
                                <td width="230">Rencana Konsultasi Lanjut</td>
                                <td class="text-center" width="30">:</td>
                                <td>${(data.konsultasi)} Cm</td>
                            </tr>
                            <tr>
                                <td width="230">Rekomendasi</td>
                                <td class="text-center" width="30">:</td>
                                <td>${(data.rekomendasi)} Cm</td>
                            </tr>
                            <tr>
                                <td width="230">Rencana Persalinan</td>
                                <td class="text-center" width="30">:</td>
                                <td>${(data.rnca_persalinan)}</td>
                            </tr>
                            <tr>
                                <td width="230">Rencan Kontrasepsi</td>
                                <td class="text-center" width="30">:</td>
                                <td>${(data.rnca_kontrasepsi)}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            `;
                    let tableHtml = `
                    <div class="row">
                        <div class="col-md-4">
                            ${Table1Html}
                        </div>
                        <div class="col-md-3">
                            ${Table2Html}
                        </div>
                        <div class="col-md-5">
                            ${Table3Html}
                        </div>
                    </div>
                    <div class="row mt-3">
                    <div class="col-md-6">
                        ${Table4Html}
                    </div>
                    <div class="col-md-5">
                        ${Table5Html}
                    </div>
                </div>
            `;
                    $('#modalViewLabel').html(`Ibu ${namaIbu}`);
                    $('#modalView .modal-body').html(tableHtml);
                    $('#modalView').modal('show');
                }
            });
        });
    </script>
@endsection
