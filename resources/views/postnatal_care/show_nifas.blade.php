@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <div class="pagetitle">
            <h1>Detail Masa Nifas</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('postnatal_care.nifas') }}">Masa Nifas</a></li>
                    <li class="breadcrumb-item active">Ibu {{ $nifas->NIK }}</li>
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
                        <h5 class="card-title">Detail Masa Nifas</h5>
                        <div class="table-responsive">
                            <table class="table table-bordered table-anc" id="nifas-table">
                                <thead>
                                    <tr>
                                        <th rowspan="2" class="align-middle text-center">No</th>
                                        <th rowspan="2" class="align-middle text-center">Tanggal</th>
                                        <th rowspan="2" class="align-middle text-center" style="width: 100px;">HARI KE/IF
                                        </th>
                                        <th colspan="2" class="align-middle text-center">TANDA VITAL</th>
                                        <th colspan="3" class="align-middle text-center">PELAYANAN</th>
                                        <th colspan="4" class="align-middle text-center">INTEGRASI PROGRAM
                                        </th>
                                        <th colspan="4" class="align-middle text-center">KOMPLIKASI***
                                        </th>
                                        <th rowspan="2" class="text-center align-middle">KLASIFIKASI</th>
                                        <th rowspan="2" class="text-center align-middle">TATA LAKSANA</th>
                                        <th colspan="5" class="align-middle text-center">DIRUJUK KE***
                                        <th colspan="2" class="align-middle text-center">KEADAAN</th>
                                    </tr>
                                    <tr>
                                        <th class="align-middle text-center normal-header">TD <sup>mmHg</sup></th>
                                        <th class="align-middle text-center normal-header" style="width: 50px;">Suhu
                                            <sup>°C</sup></th>
                                        <th class="align-middle text-center normal-header">Catatan di Buku KIA <sup>*</sup>
                                        </th>
                                        <th class="align-middle text-center normal-header">Fe<sup>(botol/tab)</sup></th>
                                        <th class="align-middle text-center normal-header">Vit. A<sup>*</sup></th>
                                        <th class="align-middle text-center normal-header">CD4 <sup>(kopi/ml)</sup></th>
                                        <th class="align-middle text-center normal-header">Anti Malaria <sup>***</sup></th>
                                        <th class="align-middle text-center normal-header">Anti TB <sup>***</sup></th>
                                        <th class="align-middle text-center normal-header">ARV</th>
                                        <th class="align-middle text-center normal-header">PPP</th>
                                        <th class="align-middle text-center normal-header">Infeksi</th>
                                        <th class="align-middle text-center normal-header">HDK</th>
                                        <th class="align-middle text-center normal-header">Lainnya</th>
                                        <th class="align-middle text-center normal-header">Puskesmas</th>
                                        <th class="align-middle text-center normal-header">Klinik</th>
                                        <th class="align-middle text-center normal-header">RSIA/RSB</th>
                                        <th class="align-middle text-center normal-header">RS</th>
                                        <th class="align-middle text-center normal-header">Lainnnya</th>
                                        <th class="align-middle text-center normal-header">Tiba<sup>(H/M)</sup></th>
                                        <th class="align-middle text-center normal-header">Pulang<sup>(H/M)</sup></th>
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
                    <h3 class="modal-title fs-4 fw-bold" id="ModalInput">Input Masa Nifas</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('postnatal_care.store_shownifas') }}" method="post" autocomplete="off">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="card-body">
                                    <input type="hidden" name="NIK" value="{{ $nifas->NIK }}">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <label for="tanggal" class="form-label">Tanggal</label>
                                            <input type="date" class="form-control" id="tanggal" name="tanggal">
                                        </div>
                                        <div class="col-md-7">
                                            <label class="form-label">Hari KE/KF</label>
                                            <div class="input-group">
                                                <span class="input-group-text">Hari ke</span>
                                                <input for="hari"type="number" class="form-control" id="hari"
                                                    name="hari">
                                                <span for="kf" class="input-group-text">KF ke</span>
                                                <input type="number" class="form-control" id="kf"
                                                    name="kf">
                                            </div>
                                        </div>
                                    </div>
                                    <h5 class="card-title">Tanda Vital</h5>
                                    <div class="row mb-2">
                                        <div class="col-md-6">
                                            <label for="td_mmhg" class="form-label">TD <sup>(mmhg)</sup></label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" id="td_mmhg" name="td_mmhg"
                                                    required>
                                                <span class="input-group-text">mmhg</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="suhu" class="form-label">Suhu</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" id="suhu" name="suhu"
                                                    required>
                                                <span class="input-group-text">°C</span>
                                            </div>
                                        </div>
                                    </div>
                                    <h5 class="card-title">Pelayanan</h5>
                                    <div class="row mb-2">
                                        <div class="col-md-4 mb-2">
                                            <label for="buku_kia" class="form-label">Catatan buku KIA*</label>
                                            <select class="form-select" id="buku_kia" name="buku_kia">
                                                <option value="">Pilih Catatan buku KIA*</option>
                                                <option value="jika iya">&#10003; <!-- Ceklis --></option>
                                                <option value="jika tidak">&#10007; <!-- Uncek --></option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="fe" class="form-label">Fe <sup>(tab/botol)</sup></label>
                                            <input type="number" class="form-control" id="fe" name="fe"
                                                required pattern="[0-9,\.]*">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="vit" class="form-label">Vit.A*</label>
                                            <select class="form-select" id="vit" name="vit">
                                                <option value="">Pilih Vit.A*</option>
                                                <option value="jika iya">&#10003; <!-- Ceklis --></option>
                                                <option value="jika tidak">&#10007; <!-- Uncek --></option>
                                            </select>
                                        </div>
                                    </div>
                                    <h5 class="card-title">Integrasi Program</h5>
                                    <div class="row mb-2">
                                        <div class="col-md-4">
                                            <label for="cd_4" class="form-label">CD4 <sup>(tab/botol)</sup></label>
                                            <input type="text" class="form-control" id="cd_4" name="cd_4"
                                                required pattern="[0-9,\.]*">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="anti_malaria" class="form-label">Anti
                                                Malaria<sup>***</sup></label>
                                            <input type="text" class="form-control" id="anti_malaria" required
                                                name="anti_malaria">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="anti_tb" class="form-label">Anti
                                                TB<sup>***</sup></label>
                                            <input type="text" class="form-control" id="anti_tb" name="anti_tb"
                                                required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="arv" class="form-label">Arv</label>
                                            <input type="text" class="form-control" id="arv" name="arv"
                                                required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="card-body">
                                    <h5 class="card-title">Komplikasi</h5>
                                    <div class="row mb-2">
                                        <div class="col-md-3">
                                            <label for="ppp" class="form-label">ppp</label>
                                            <select class="form-select" id="ppp" name="ppp">
                                                <option value="">Pilih ppp*</option>
                                                <option value="-" hidden>-</option>
                                                <option value="jika iya">&#10003; <!-- Ceklis --></option>
                                                <option value="jika tidak">&#10007; <!-- Uncek --></option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="infeksi" class="form-label">Infeksi</label>
                                            <select class="form-select" id="infeksi" name="infeksi">
                                                <option value="">Pilih Infeksi*</option>
                                                <option value="-" hidden>-</option>
                                                <option value="jika iya">&#10003; <!-- Ceklis --></option>
                                                <option value="jika tidak">&#10007; <!-- Uncek --></option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="hdk" class="form-label">HDK</label>
                                            <select class="form-select" id="hdk" name="hdk">
                                                <option value="">Pilih HDK</option>
                                                <option value="-" hidden>-</option>
                                                <option value="jika iya">&#10003; <!-- Ceklis --></option>
                                                <option value="jika tidak">&#10007; <!-- Uncek --></option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="lainnya_komplikasi" class="form-label">Lain - lain</label>
                                            <input type="text" class="form-control" id="lainnya_komplikasi"
                                                name="lainnya_komplikasi">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h5 class="card-title">Klasifikasi</h5>
                                            <label for="klasifikasi" class="form-label">Klasifikasi</label>
                                            <input type="text" class="form-control" id="klasifikasi" required
                                                name="klasifikasi">
                                        </div>
                                        <div class="col-md-6">
                                            <h5 class="card-title">Tata Laksana</h5>
                                            <label for="tata_laksana" class="form-label">Tata Laksana</label>
                                            <input type="text" class="form-control" id="tata_laksana" required
                                                name="tata_laksana">
                                        </div>
                                    </div>
                                    <h5 class="card-title">Dirujuk Ke</h5>
                                    <div class="row mb-2">
                                        <div class="col-md-3">
                                            <label for="puskesmas" class="form-label">Puskesmas</label>
                                            <select class="form-select" id="puskesmas" name="puskesmas">
                                                <option value="">Pilih Puskesmas</option>
                                                <option value="-" hidden>-</option>
                                                <option value="jika iya">&#10003; <!-- Ceklis --></option>
                                                <option value="jika tidak">&#10007; <!-- Uncek --></option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="klinik" class="form-label">Klinik</label>
                                            <select class="form-select" id="klinik" name="klinik">
                                                <option value="">Pilih Klinik</option>
                                                <option value="-" hidden>-</option>
                                                <option value="jika iya">&#10003; <!-- Ceklis --></option>
                                                <option value="jika tidak">&#10007; <!-- Uncek --></option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="rsia_rsb" class="form-label">RSIA/RSB</label>
                                            <select class="form-select" id="rsia_rsb" name="rsia_rsb">
                                                <option value="">Pilih RSIA/RSB</option>
                                                <option value="-" hidden>-</option>
                                                <option value="jika iya">&#10003; <!-- Ceklis --></option>
                                                <option value="jika tidak">&#10007; <!-- Uncek --></option>
                                            </select>
                                        </div>
                                        <div class="col-md-3 mb-2">
                                            <label for="rs" class="form-label">RS</label>
                                            <select class="form-select" id="rs" name="rs">
                                                <option value="">Pilih RS</option>
                                                <option value="-" hidden>-</option>
                                                <option value="jika iya">&#10003; <!-- Ceklis --></option>
                                                <option value="jika tidak">&#10007; <!-- Uncek --></option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="lain_lain_dirujuk" class="form-label">Lain - lain</label>
                                            <input type="text" class="form-control" id="lain_lain_dirujuk"
                                                name="lain_lain_dirujuk">
                                        </div>
                                    </div>
                                    <h5 class="card-title">Keadaan</h5>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="tiba" class="form-label">Tiba</label>
                                            <select class="form-select" id="tiba" name="tiba" required>
                                                <option value="">Pilih Tiba</option>
                                                <option value="H">Hidup</option>
                                                <option value="M">Mati</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="pulang" class="form-label">Pulang</label>
                                            <select class="form-select" id="pulang" name="pulang" required>
                                                <option value="">Pilih Pulang</option>
                                                <option value="H">Hidup</option>
                                                <option value="M">Mati</option>
                                            </select>
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
            $('#nifas-table').DataTable({
                processing: true,
                serverSide: false,
                lengthChange: false,
                searching: false,
                ordering: false,
                paging: false,
                info: false,
                ajax: "{{ route('postnatal_care.data_shownifas', ['NIK' => $nifas->NIK]) }}",
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
                            return "H " + data + " / KF " + row.kf;
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
                            return data + ' °C';
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
                        data: 'vit',
                        name: 'vit',
                        render: function(data, type, row, meta) {
                            return data.toLowerCase() === 'jika iya' ? '&#10003;' : '&#10007;';
                        }
                    },
                    {
                        data: 'cd_4',
                        name: 'cd_4'
                    },
                    {
                        data: 'anti_malaria',
                        name: 'anti_malaria'
                    },
                    {
                        data: 'anti_tb',
                        name: 'anti_tb'
                    },
                    {
                        data: 'arv',
                        name: 'arv'
                    },
                    {
                        data: 'ppp',
                        name: 'ppp',
                        render: function(data, type, row, meta) {
                            return data === '-' ? '-' : (data.toLowerCase() === 'jika iya' ?
                                '&#10003;' : '&#10007;');
                        }
                    },
                    {
                        data: 'infeksi',
                        name: 'infeksi',
                        render: function(data, type, row, meta) {
                            return data === '-' ? '-' : (data.toLowerCase() === 'jika iya' ?
                                '&#10003;' : '&#10007;');
                        }
                    },
                    {
                        data: 'hdk',
                        name: 'hdk',
                        render: function(data, type, row, meta) {
                            return data === '-' ? '-' : (data.toLowerCase() === 'jika iya' ?
                                '&#10003;' : '&#10007;');
                        }
                    },
                    {
                        data: 'lainnya_komplikasi',
                        name: 'lainnya_komplikasi'
                    },
                    {
                        data: 'klasifikasi',
                        name: 'klasifikasi'
                    },
                    {
                        data: 'tata_laksana',
                        name: 'tata_laksana'
                    },
                    {
                        data: 'puskesmas',
                        name: 'puskesmas',
                        render: function(data, type, row, meta) {
                            return data === '-' ? '-' : (data.toLowerCase() === 'jika iya' ?
                                '&#10003;' : '&#10007;');
                        }
                    },
                    {
                        data: 'klinik',
                        name: 'klinik',
                        render: function(data, type, row, meta) {
                            return data === '-' ? '-' : (data.toLowerCase() === 'jika iya' ?
                                '&#10003;' : '&#10007;');
                        }
                    },
                    {
                        data: 'rsia_rsb',
                        name: 'rsia_rsb',
                        render: function(data, type, row, meta) {
                            return data === '-' ? '-' : (data.toLowerCase() === 'jika iya' ?
                                '&#10003;' : '&#10007;');
                        }
                    },
                    {
                        data: 'rs',
                        name: 'rs',
                        render: function(data, type, row, meta) {
                            return data === '-' ? '-' : (data.toLowerCase() === 'jika iya' ?
                                '&#10003;' : '&#10007;');
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
                scrollX: true
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            if (window.location.pathname.includes('/postnatal_care/nifas/show_nifas')) {
                var body = document.querySelector('body');
                body.classList.add('toggle-sidebar');
            }
        });

        var puskesmas = document.getElementById("puskesmas");
        var klinik = document.getElementById("klinik");
        var rsia_rsb = document.getElementById("rsia_rsb");
        var rs = document.getElementById("rs");
        var lain_lain_dirujuk = document.getElementById("lain_lain_dirujuk");
        var label_lain_lain_dirujuk = document.querySelector('label[for="lain_lain_dirujuk"]');
        var ppp = document.getElementById("ppp");
        var infeksi = document.getElementById("infeksi");
        var hdk = document.getElementById("hdk");
        var lainnya_komplikasi = document.getElementById("lainnya_komplikasi");
        var label_lainnya_komplikasi = document.querySelector('label[for="lainnya_komplikasi"]');
        puskesmas.addEventListener("change", function() {
            if (puskesmas.value !== "") {
                klinik.value = "-";
                rsia_rsb.value = "-";
                rs.value = "-";
                lain_lain_dirujuk.style.display = "none";
                lain_lain_dirujuk.value = "-";
                label_lain_lain_dirujuk.style.display = "none";
            } else {
                label_lain_lain_dirujuk.style.display = "block";
            }
        });
        klinik.addEventListener("change", function() {
            if (klinik.value !== "") {
                puskesmas.value = "-";
                rsia_rsb.value = "-";
                rs.value = "-";
                lain_lain_dirujuk.style.display = "none";
                lain_lain_dirujuk.value = "-";
                label_lain_lain_dirujuk.style.display = "none";
            } else {
                label_lain_lain_dirujuk.style.display = "block";
            }
        });
        rsia_rsb.addEventListener("change", function() {
            if (rsia_rsb.value !== "") {
                puskesmas.value = "-";
                klinik.value = "-";
                rs.value = "-";
                lain_lain_dirujuk.style.display = "none";
                lain_lain_dirujuk.value = "-";
                label_lain_lain_dirujuk.style.display = "none";
            } else {
                label_lain_lain_dirujuk.style.display = "block";
            }
        });
        rs.addEventListener("change", function() {
            if (rs.value !== "") {
                puskesmas.value = "-";
                klinik.value = "-";
                rsia_rsb.value = "-";
                lain_lain_dirujuk.style.display = "none";
                lain_lain_dirujuk.value = "-";
                label_lain_lain_dirujuk.style.display = "none";
            } else {
                label_lain_lain_dirujuk.style.display = "block";
            }
        });
        lain_lain_dirujuk.addEventListener("change", function() {
            if (lain_lain_dirujuk.value !== "") {
                puskesmas.value = "-";
                klinik.value = "-";
                rsia_rsb.value = "-";
                rs.value = "-";
            }
        });
        ppp.addEventListener("change", function() {
            if (ppp.value !== "") {
                infeksi.value = "-";
                hdk.value = "-";
                lainnya_komplikasi.style.display = "none";
                lainnya_komplikasi.value = "-";
                label_lainnya_komplikasi.style.display = "none";
            } else {
                label_lainnya_komplikasi.style.display = "block";
            }
        });
        infeksi.addEventListener("change", function() {
            if (infeksi.value !== "") {
                ppp.value = "-";
                hdk.value = "-";
                lainnya_komplikasi.style.display = "none";
                lainnya_komplikasi.value = "-";
                label_lainnya_komplikasi.style.display = "none";
            } else {
                label_lainnya_komplikasi.style.display = "block";
            }
        });
        hdk.addEventListener("change", function() {
            if (hdk.value !== "") {
                ppp.value = "-";
                infeksi.value = "-";
                lainnya_komplikasi.style.display = "none";
                lainnya_komplikasi.value = "-";
                label_lainnya_komplikasi.style.display = "none";
            } else {
                label_lainnya_komplikasi.style.display = "block";
            }
        });
        lainnya_komplikasi.addEventListener("change", function() {
            if (lainnya_komplikasi.value !== "") {
                ppp.value = "-";
                infeksi.value = "-";
                hdk.value = "-";
            }
        });
    </script>
@endsection
