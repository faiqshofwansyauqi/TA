@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <div class="pagetitle">
            <h1 style="margin-bottom: 5px">Detail Masa Nifas</h1>
            <div class="header-right">
                <button type="button" class="btn btn-success btn-sm" id="btn-plus" style="margin-right: 10px">
                    Tambah
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
                            <table class="table table-borderless table-anc" id="nifas-table" style="width:100%">
                                <thead>
                                    <tr>
                                        <th rowspan="2" class="align-middle text-center">No</th>
                                        <th rowspan="2" class="align-middle text-center">Tanggal</th>
                                        <th rowspan="2" class="align-middle text-center">HARI KE/IF
                                        </th>
                                        <th colspan="2" class="align-middle text-center">TANDA VITAL</th>
                                        <th colspan="2" class="align-middle text-center">PELAYANAN</th>
                                        <th colspan="4" class="align-middle text-center">KOMPLIKASI
                                        </th>
                                        <th rowspan="2" class="text-center align-middle">TATA LAKSANA</th>
                                        <th colspan="5" class="align-middle text-center">DIRUJUK KE
                                        <th colspan="2" class="align-middle text-center">KEADAAN</th>
                                    </tr>
                                    <tr>
                                        <th class="text-center vertical-header">TD <small>(mmHg)</small></th>
                                        <th class="text-center vertical-header">Suhu <small>°C</small></th>
                                        <th class="text-center vertical-header">Fe <small>(botol/tab)</small></th>
                                        <th class="text-center vertical-header">Vit. A<small>*</small></th>
                                        <th class="text-center vertical-header">PPP</th>
                                        <th class="text-center vertical-header">Infeksi</th>
                                        <th class="text-center vertical-header">HDK</th>
                                        <th class="text-center vertical-header">Lainnya</th>
                                        <th class="text-center vertical-header">Puskesmas</th>
                                        <th class="text-center vertical-header">Klinik</th>
                                        <th class="text-center vertical-header">RSIA/RSB</th>
                                        <th class="text-center vertical-header">RS</th>
                                        <th class="text-center vertical-header">Lainnnya</th>
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
                    <h3 class="modal-title fs-4 fw-bold" id="ModalInput">Input Detail Masa Nifas</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('postnatal_care.store_shownifas') }}" method="post" autocomplete="off">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="card-body">
                                    <input type="hidden" name="id_ibu" value="{{ $nifas->id_ibu }}">
                                    <h5 class="card-title">Registrasi</h5>
                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <label for="tanggal" class="form-label">Tanggal</label>
                                            <input type="date" class="form-control" id="tanggal" name="tanggal"
                                                required>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="hari" class="form-label">Hari Ke</label>
                                            <input type="number" class="form-control" id="hari" name="hari"
                                                required>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="kf" class="form-label">KF</label>
                                            <select class="form-select" id="kf" name="kf" required>
                                                <option value="">Pilih KF</option>
                                                <option value="1">KF 1</option>
                                                <option value="2">KF 2</option>
                                                <option value="3">KF 3</option>
                                                <option value="4">KF 4</option>
                                            </select>
                                        </div>
                                    </div>
                                    <h5 class="card-title">Tanda Vital</h5>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="td_mmhg" class="form-label">TD <sup>(mmhg)</sup></label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="td_mmhg" name="td_mmhg"
                                                    required>
                                                <span class="input-group-text">mmhg</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="suhu" class="form-label">Suhu</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" id="suhu" name="suhu"
                                                    required>
                                                <span class="input-group-text">°C</span>
                                            </div>
                                        </div>
                                    </div>
                                    <h5 class="card-title">Pelayanan</h5>
                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <label for="fe" class="form-label">Fe <sup>(tab/botol)</sup></label>
                                            <input type="number" class="form-control" id="fe" name="fe"
                                                pattern="[0-9,\.]*">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="vit" class="form-label">Vit.A</label>
                                            <select class="form-select" id="vit" name="vit">
                                                <option value="">Pilih Vit.A</option>
                                                <option value="jika iya">&#10003;</option>
                                                <option value="jika tidak">&#10007;</option>
                                            </select>
                                        </div>
                                    </div>
                                    <h5 class="card-title">Komplikasi</h5>
                                    <div class="row">
                                        <div class="col-md-3 mb-3">
                                            <label for="ppp" class="form-label">ppp</label>
                                            <select class="form-select" id="ppp" name="ppp"
                                                onchange="Komplikasi('ppp')">
                                                <option value="">Pilih ppp</option>
                                                <option value="-" hidden>-</option>
                                                <option value="jika iya">&#10003;</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="infeksi" class="form-label">Infeksi</label>
                                            <select class="form-select" id="infeksi" name="infeksi"
                                                onchange="Komplikasi('infeksi')">
                                                <option value="">Pilih Infeksi</option>
                                                <option value="-" hidden>-</option>
                                                <option value="jika iya">&#10003;</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="hdk" class="form-label">HDK</label>
                                            <select class="form-select" id="hdk" name="hdk"
                                                onchange="Komplikasi('hdk')">
                                                <option value="">Pilih HDK</option>
                                                <option value="-" hidden>-</option>
                                                <option value="jika iya">&#10003;</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="lainnya_komplikasi" class="form-label"
                                                id="lainnya_komplikasi_label">Lain - lain</label>
                                            <input type="text" class="form-control" id="lainnya_komplikasi"
                                                name="lainnya_komplikasi">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h5 class="card-title">Tata Laksana</h5>
                                            <label for="tata_laksana" class="form-label">Tata Laksana</label>
                                            <input type="text" class="form-control" id="tata_laksana"
                                                name="tata_laksana">
                                        </div>
                                    </div>
                                    <h5 class="card-title">Dirujuk Ke</h5>
                                    <div class="row">
                                        <div class="col-md-3 mb-3">
                                            <label for="puskesmas" class="form-label">Puskesmas</label>
                                            <select class="form-select" id="puskesmas" name="puskesmas"
                                                onchange="Dirujuk('puskesmas')">
                                                <option value="">Pilih Puskesmas</option>
                                                <option value="-" hidden>-</option>
                                                <option value="jika iya">&#10003;</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="klinik" class="form-label">Klinik</label>
                                            <select class="form-select" id="klinik" name="klinik"
                                                onchange="Dirujuk('klinik')">
                                                <option value="">Pilih Klinik</option>
                                                <option value="-" hidden>-</option>
                                                <option value="jika iya">&#10003;</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="rsia_rsb" class="form-label">RSIA/RSB</label>
                                            <select class="form-select" id="rsia_rsb" name="rsia_rsb"
                                                onchange="Dirujuk('rsia_rsb')">
                                                <option value="">Pilih RSIA/RSB</option>
                                                <option value="-" hidden>-</option>
                                                <option value="jika iya">&#10003;</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="rs" class="form-label">RS</label>
                                            <select class="form-select" id="rs" name="rs"
                                                onchange="Dirujuk('rs')">
                                                <option value="">Pilih RS</option>
                                                <option value="-" hidden>-</option>
                                                <option value="jika iya">&#10003;</option>
                                            </select>
                                        </div>
                                        <div class="col-md-12 mb-3">
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
                                            <select class="form-select" id="tiba" name="tiba">
                                                <option value="">Pilih Tiba</option>
                                                <option value="H">Hidup</option>
                                                <option value="M">Mati</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="pulang" class="form-label">Pulang</label>
                                            <select class="form-select" id="pulang" name="pulang">
                                                <option value="">Pilih Pulang</option>
                                                <option value="H">Hidup</option>
                                                <option value="M">Mati</option>
                                            </select>
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

    <div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="ModalEdit" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title fs-4 fw-bold" id="ModalEdit">Edit Detail Masa Nifas</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                    <form id="editForm" method="post" autocomplete="off">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-6">
                                <div class="card-body">
                                    <input type="hidden" name="id_ibu" value="{{ $nifas->id_ibu }}">
                                    <h5 class="card-title">Registrasi</h5>
                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <label for="edit_tanggal" class="form-label">Tanggal</label>
                                            <input type="date" class="form-control" id="edit_tanggal" name="tanggal"
                                                required>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="edit_hari" class="form-label">Hari Ke</label>
                                            <input type="number" class="form-control" id="edit_hari" name="hari"
                                                required>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="edit_kf" class="form-label">KF</label>
                                            <select class="form-select" id="edit_kf" name="kf" required>
                                                <option value="">Pilih KF</option>
                                                <option value="1">KF 1</option>
                                                <option value="2">KF 2</option>
                                                <option value="3">KF 3</option>
                                                <option value="4">KF 4</option>
                                            </select>
                                        </div>
                                    </div>
                                    <h5 class="card-title">Tanda Vital</h5>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="edit_td_mmhg" class="form-label">TD <sup>(mmhg)</sup></label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="edit_td_mmhg"
                                                    name="td_mmhg" required>
                                                <span class="input-group-text">mmhg</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="edit_suhu" class="form-label">Suhu</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" id="edit_suhu" name="suhu"
                                                    required>
                                                <span class="input-group-text">°C</span>
                                            </div>
                                        </div>
                                    </div>
                                    <h5 class="card-title">Pelayanan</h5>
                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <label for="edit_fe" class="form-label">Fe <sup>(tab/botol)</sup></label>
                                            <input type="number" class="form-control" id="edit_fe" name="fe"
                                                pattern="[0-9,\.]*">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="edit_vit" class="form-label">Vit.A</label>
                                            <select class="form-select" id="edit_vit" name="vit">
                                                <option value="">Pilih Vit.A</option>
                                                <option value="jika iya">&#10003;</option>
                                                <option value="jika tidak">&#10007;</option>
                                            </select>
                                        </div>
                                    </div>
                                    <h5 class="card-title">Komplikasi</h5>
                                    <div class="row">
                                        <div class="col-md-3 mb-3">
                                            <label for="edit_ppp" class="form-label">ppp</label>
                                            <select class="form-select" id="edit_ppp" name="ppp">
                                                <option value="">Pilih ppp*</option>
                                                <option value="-">-</option>
                                                <option value="jika iya">&#10003;</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="edit_infeksi" class="form-label">Infeksi</label>
                                            <select class="form-select" id="edit_infeksi" name="infeksi">
                                                <option value="">Pilih Infeksi*</option>
                                                <option value="-">-</option>
                                                <option value="jika iya">&#10003;</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="edit_hdk" class="form-label">HDK</label>
                                            <select class="form-select" id="edit_hdk" name="hdk">
                                                <option value="">Pilih HDK</option>
                                                <option value="-">-</option>
                                                <option value="jika iya">&#10003;</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="edit_lainnya_komplikasi" class="form-label">Lain - lain</label>
                                            <input type="text" class="form-control" id="edit_lainnya_komplikasi"
                                                name="lainnya_komplikasi">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h5 class="card-title">Tata Laksana</h5>
                                            <label for="edit_tata_laksana" class="form-label">Tata Laksana</label>
                                            <input type="text" class="form-control" id="edit_tata_laksana" required
                                                name="tata_laksana">
                                        </div>
                                    </div>
                                    <h5 class="card-title">Dirujuk Ke</h5>
                                    <div class="row">
                                        <div class="col-md-3 mb-3">
                                            <label for="edit_puskesmas" class="form-label">Puskesmas</label>
                                            <select class="form-select" id="edit_puskesmas" name="puskesmas">
                                                <option value="">Pilih Puskesmas</option>
                                                <option value="-">-</option>
                                                <option value="jika iya">&#10003;</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="edit_klinik" class="form-label">Klinik</label>
                                            <select class="form-select" id="edit_klinik" name="klinik">
                                                <option value="">Pilih Klinik</option>
                                                <option value="-">-</option>
                                                <option value="jika iya">&#10003;</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="edit_rsia_rsb" class="form-label">RSIA/RSB</label>
                                            <select class="form-select" id="edit_rsia_rsb" name="rsia_rsb">
                                                <option value="">Pilih RSIA/RSB</option>
                                                <option value="-">-</option>
                                                <option value="jika iya">&#10003;</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="edit_rs" class="form-label">RS</label>
                                            <select class="form-select" id="edit_rs" name="rs">
                                                <option value="">Pilih RS</option>
                                                <option value="-">-</option>
                                                <option value="jika iya">&#10003;</option>
                                            </select>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="edit_lain_lain_dirujuk" class="form-label">Lain - lain</label>
                                            <input type="text" class="form-control" id="edit_lain_lain_dirujuk"
                                                name="lain_lain_dirujuk">
                                        </div>
                                    </div>
                                    <h5 class="card-title">Keadaan</h5>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="edit_tiba" class="form-label">Tiba</label>
                                            <select class="form-select" id="edit_tiba" name="tiba">
                                                <option value="">Pilih Tiba</option>
                                                <option value="H">Hidup</option>
                                                <option value="M">Mati</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="edit_pulang" class="form-label">Pulang</label>
                                            <select class="form-select" id="edit_pulang" name="pulang">
                                                <option value="">Pilih Pulang</option>
                                                <option value="H">Hidup</option>
                                                <option value="M">Mati</option>
                                            </select>
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
            $('#nifas-table').DataTable({
                processing: true,
                serverSide: false,
                lengthChange: false,
                searching: false,
                ordering: false,
                paging: false,
                info: false,
                ajax: "{{ route('postnatal_care.data_shownifas', ['id_ibu' => $nifas->id_ibu]) }}",
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
                        data: 'hari',
                        name: 'hari',
                        render: function(data, type, row) {
                            return "H" + data + "/KF" + row.kf;
                        }
                    },
                    {
                        data: 'td_mmhg',
                        name: 'td_mmhg'
                    },
                    {
                        data: 'suhu',
                        name: 'suhu',
                        render: function(data, type, row) {
                            return data + '<sup>°C</sup>';
                        }
                    },
                    {
                        data: 'fe',
                        name: 'fe'
                    },
                    {
                        data: 'vit',
                        name: 'vit',
                        render: function(data, type, row, meta) {
                            return data.toLowerCase() === 'jika iya' ?
                                '<i class="ri-check-line"></i>' : '<i class="ri-close-line"></i>';
                        }
                    },
                    {
                        data: 'ppp',
                        name: 'ppp',
                        render: function(data, type, row, meta) {
                            if (data === null) {
                                return '';
                            } else if (data === '-') {
                                return '-';
                            } else {
                                return data.toLowerCase() === 'jika iya' ?
                                    '<i class="ri-check-line"></i>' :
                                    '<i class="ri-close-line"></i>';
                            }
                        }
                    },
                    {
                        data: 'infeksi',
                        name: 'infeksi',
                        render: function(data, type, row, meta) {
                            if (data === null) {
                                return '';
                            } else if (data === '-') {
                                return '-';
                            } else {
                                return data.toLowerCase() === 'jika iya' ?
                                    '<i class="ri-check-line"></i>' :
                                    '<i class="ri-close-line"></i>';
                            }
                        }
                    },
                    {
                        data: 'hdk',
                        name: 'hdk',
                        render: function(data, type, row, meta) {
                            if (data === null) {
                                return '';
                            } else if (data === '-') {
                                return '-';
                            } else {
                                return data.toLowerCase() === 'jika iya' ?
                                    '<i class="ri-check-line"></i>' :
                                    '<i class="ri-close-line"></i>';
                            }
                        }
                    },
                    {
                        data: 'lainnya_komplikasi',
                        name: 'lainnya_komplikasi'
                    },
                    {
                        data: 'tata_laksana',
                        name: 'tata_laksana'
                    },
                    {
                        data: 'puskesmas',
                        name: 'puskesmas',
                        render: function(data, type, row, meta) {
                            if (data === null) {
                                return '';
                            } else if (data === '-') {
                                return '-';
                            } else {
                                return data.toLowerCase() === 'jika iya' ?
                                    '<i class="ri-check-line"></i>' :
                                    '<i class="ri-close-line"></i>';
                            }
                        }
                    },
                    {
                        data: 'klinik',
                        name: 'klinik',
                        render: function(data, type, row, meta) {
                            if (data === null) {
                                return '';
                            } else if (data === '-') {
                                return '-';
                            } else {
                                return data.toLowerCase() === 'jika iya' ?
                                    '<i class="ri-check-line"></i>' :
                                    '<i class="ri-close-line"></i>';
                            }
                        }
                    },
                    {
                        data: 'rsia_rsb',
                        name: 'rsia_rsb',
                        render: function(data, type, row, meta) {
                            if (data === null) {
                                return '';
                            } else if (data === '-') {
                                return '-';
                            } else {
                                return data.toLowerCase() === 'jika iya' ?
                                    '<i class="ri-check-line"></i>' :
                                    '<i class="ri-close-line"></i>';
                            }
                        }
                    },
                    {
                        data: 'rs',
                        name: 'rs',
                        render: function(data, type, row, meta) {
                            if (data === null) {
                                return '';
                            } else if (data === '-') {
                                return '-';
                            } else {
                                return data.toLowerCase() === 'jika iya' ?
                                    '<i class="ri-check-line"></i>' :
                                    '<i class="ri-close-line"></i>';
                            }
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
                ],
                createdRow: function(row, data, dataIndex) {
                    $(row).addClass('text-center');
                },
                fixedColumns: false,
                responsive: false,
                language: {
                    emptyTable: "Data masa nifas ibu {{ $nifas->ibu->nama_ibu }} tidak ada"
                }
            });
        });

        $('#nifas-table').on('click', '.trigger-modal', function() {
            let id = $(this).data('id');
            $.ajax({
                url: '{{ route('postnatal_care.edit_shownifas', ':id') }}'.replace(':id', id),
                method: 'GET',
                success: function(data) {
                    $('#edit_tanggal').val(data.tanggal);
                    $('#edit_hari').val(data.hari);
                    $('#edit_kf').val(data.kf);
                    $('#edit_td_mmhg').val(data.td_mmhg);
                    $('#edit_suhu').val(data.suhu);
                    $('#edit_fe').val(data.fe);
                    $('#edit_vit').val(data.vit);
                    $('#edit_ppp').val(data.ppp);
                    $('#edit_infeksi').val(data.infeksi);
                    $('#edit_hdk').val(data.hdk);
                    $('#edit_lainnya_komplikasi').val(data.lainnya_komplikasi);
                    $('#edit_tata_laksana').val(data.tata_laksana);
                    $('#edit_puskesmas').val(data.puskesmas);
                    $('#edit_klinik').val(data.klinik);
                    $('#edit_rsia_rsb').val(data.rsia_rsb);
                    $('#edit_rs').val(data.rs);
                    $('#edit_lain_lain_dirujuk').val(data.lain_lain_dirujuk);
                    $('#edit_tiba').val(data.tiba);
                    $('#edit_pulang').val(data.pulang);
                    $('#editForm').attr('action',
                        '{{ route('postnatal_care.update_shownifas', ':id') }}'
                        .replace(
                            ':id', id));
                    $('#modalEdit').modal('show');
                }
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            function inputKF() {
                const hariInput = document.getElementById('hari');
                const kfSelect = document.getElementById('kf');


                hariInput.addEventListener('input', function() {
                    const hariValue = parseInt(hariInput.value, 10);
                    if (isNaN(hariValue)) {
                        kfSelect.value = '';
                    } else if (hariValue < 3) {
                        kfSelect.value = '1';
                    } else if (hariValue >= 3 && hariValue <= 7) {
                        kfSelect.value = '2';
                    } else if (hariValue >= 7 && hariValue <= 28) {
                        kfSelect.value = '3';
                    } else if (hariValue > 28 && hariValue <= 42) {
                        kfSelect.value = '4';
                    } else {
                        kfSelect.value = '';
                    }
                });
            }
            inputKF();

            function editInputKF() {
                const editHariInput = document.getElementById('edit_hari');
                const editKfSelect = document.getElementById('edit_kf');
                editHariInput.addEventListener('input', function() {
                    const editHariValue = parseInt(editHariInput.value, 10);
                    if (isNaN(editHariValue)) {
                        editKfSelect.value = '';
                    } else if (editHariValue < 3) {
                        editKfSelect.value = '1';
                    } else if (editHariValue >= 3 && editHariValue <= 7) {
                        editKfSelect.value = '2';
                    } else if (editHariValue >= 7 && editHariValue <= 28) {
                        editKfSelect.value = '3';
                    } else if (editHariValue > 28 && editHariValue <= 42) {
                        editKfSelect.value = '4';
                    } else {
                        editKfSelect.value = '';
                    }
                });
            }
            editInputKF();
        });

        document.addEventListener('DOMContentLoaded', function() {
            function restrictInputToNumbers(input, maxLength) {
                input.addEventListener('input', function() {
                    var value = input.value;
                    value = value.replace(/\D/g, '');
                    if (value.length > maxLength) {
                        value = value.substring(0, maxLength);
                    }
                    input.value = value;
                });
            }

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
            var td_mmhgInput = document.getElementById('td_mmhg');
            var td_mmhgEdit = document.getElementById('edit_td_mmhg');
            restrictInputToNumbersAndSlash(td_mmhgInput, 7);
            restrictInputToNumbersAndSlash(td_mmhgEdit, 7);
        });

        function Komplikasi(changedId) {
            const selectIds = ['ppp', 'infeksi', 'hdk'];
            const selectedValue = document.getElementById(changedId).value;
            if (selectedValue === '') {
                selectIds.forEach(id => {
                    if (id !== changedId) {
                        document.getElementById(id).value = '';
                    }
                });
                document.getElementById('lainnya_komplikasi').value = '';
                document.getElementById('lainnya_komplikasi').style.display = 'block';
                document.getElementById('lainnya_komplikasi_label').style.display = 'block';
            } else {
                selectIds.forEach(id => {
                    if (id !== changedId) {
                        document.getElementById(id).value = '-';
                    }
                });
                document.getElementById('lainnya_komplikasi').value = '-';
                document.getElementById('lainnya_komplikasi').style.display = 'none';
                document.getElementById('lainnya_komplikasi_label').style.display = 'none';
            }
            document.getElementById('lainnya_komplikasi').addEventListener('input', function() {
                const value = this.value;
                const selectIds = ['ppp', 'infeksi', 'hdk'];
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
