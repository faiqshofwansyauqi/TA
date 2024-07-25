@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <div class="pagetitle">
            <h1 style="margin-bottom: 5px">Masa Persalinan</h1>
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
                            <table class="table table-borderless table-anc" id="persalinan-table" style="width:100%">
                                <thead>
                                    <tr>
                                        <th style="text-align: center">No</th>
                                        <th style="min-width: 130px">Nama Ibu</th>
                                        <th style="min-width: 140px">Tanggal</th>
                                        <th style="min-width: 80px">Usia Ibu</th>
                                        <th style="min-width: 300px">Alamat</th>
                                        <th style="min-width: 70px">GPA</th>
                                        <th style="min-width: 97px">Usia Hamil</th>
                                        <th style="min-width: 108px">Jenis Kelamin</th>
                                        <th style="min-width: 140px">Kala I</th>
                                        <th style="min-width: 140px">Kala II</th>
                                        <th style="min-width: 140px">Kala III</th>
                                        <th style="min-width: 150px">Tanggal Lahir Bayi</th>
                                        <th style="min-width: 110px">Panjang Bayi</th>
                                        <th style="min-width: 90px">Berat Bayi</th>
                                        <th style="min-width: 160px">Lingkar Kepala Bayi</th>
                                        <th style="min-width: 80px">Vitamin K</th>
                                        <th style="min-width: 50px">HBO</th>
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
                                        <label for="tgl_datang" class="form-label">Tanggal Datang</label>
                                        <input type="datetime-local" class="form-control" id="tgl_datang" name="tgl_datang" required>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="usia_ibu" class="form-label">Usia Ibu</label>
                                        <input type="number" class="form-control" id="usia_ibu" name="usia_ibu" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="alamat" class="form-label">Alamat</label>
                                        <textarea class="form-control" id="alamat" rows="2" name="alamat" required></textarea>
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <label for="gravida" class="form-label">Gravida</label>
                                        <input type="text" class="form-control" id="gravida" pattern="[0-9,\,]*"
                                            name="gravida" required>
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <label for="partus" class="form-label">Partus</label>
                                        <input type="text" class="form-control" id="partus" pattern="[0-9,\,]*"
                                            name="partus" required>
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <label for="abortus" class="form-label">Abortus</label>
                                        <input type="text" class="form-control" id="abortus" pattern="[0-9,\,]*"
                                            name="abortus" required>
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <label for="usia_hamil" class="form-label">Usia Hamil</label>
                                        <input type="number" class="form-control" id="usia_hamil" name="usia_hamil" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <label for="keadaan_ibu" class="form-label">Keadaan Ibu</label>
                                        <select class="form-select" id="keadaan_ibu" name="keadaan_ibu" required>
                                            <option value="">Pilih Keadaan Ibu</option>
                                            <option value="Mati">Mati</option>
                                            <option value="Hidup">Hidup</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="kala1" class="form-label">Kala I</label>
                                        <input type="datetime-local" class="form-control" id="kala1" name="kala1">
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="kala2" class="form-label">Kala II</label>
                                        <input type="datetime-local" class="form-control" id="kala2" name="kala2">
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="kala3" class="form-label">Kala III</label>
                                        <input type="datetime-local" class="form-control" id="kala3" name="kala3">
                                    </div>
                                </div>
                                <div class='row'>
                                    <div class="col-md-3 mb-3">
                                        <label for="tgl_lahir_bayi" class="form-label">Tanggal Lahir Bayi</label>
                                        <input type="datetime-local" class="form-control" id="tgl_lahir_bayi"
                                            name="tgl_lahir_bayi">
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="brt_bayi" class="form-label">Berat Bayi</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="brt_bayi" name="brt_bayi"
                                                placeholder="input Berat Bayi" pattern="[0-9,\,]*">
                                            <span class="input-group-text">gram</span>
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="pnjg_bayi" class="form-label">Panjang Bayi</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="pnjg_bayi" name="pnjg_bayi"
                                                placeholder="input Panjang Bayi" pattern="[0-9,\,]*">
                                            <span class="input-group-text">cm</span>
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="lngkr_kpl_bayi" class="form-label">Lingkar Kepala Bayi</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="lngkr_kpl_bayi"
                                                name="lngkr_kpl_bayi" placeholder="input Lingkar Kepala Bayi"
                                                pattern="[0-9,\,]*">
                                            <span class="input-group-text">cm</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="vit_k" class="form-label">Vitamin K</label>
                                        <select class="form-select" id="vit_k" name="vit_k">
                                            <option value="">Pilih Vitamin K</option>
                                            <option value="jika iya">&#10003;</option>
                                            <option value="jika tidak">&#10007;</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="hbo" class="form-label">HBO</label>
                                        <select class="form-select" id="hbo" name="hbo">
                                            <option value="">Pilih HBO</option>
                                            <option value="jika iya">&#10003;</option>
                                            <option value="jika tidak">&#10007;</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="jenis_kelamin" class="form-label">jenis Kelamin</label>
                                        <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" required>
                                            <option value="">Pilih Jenis Kelamin</option>
                                            <option value="Laki-laki">Laki-laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
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
                                    <div class="col-md-4 mb-3">
                                        <label for="edit_tgl_datang" class="form-label">Tanggal Datang</label>
                                        <input type="datetime-local" class="form-control" id="edit_tgl_datang"
                                            name="tgl_datang" required>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="edit_usia_ibu" class="form-label">Usia Ibu</label>
                                        <input type="number" class="form-control" id="edit_usia_ibu" name="usia_ibu" required>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="edit_alamat" class="form-label">Alamat</label>
                                        <textarea class="form-control" id="edit_alamat" rows="2" name="alamat" required></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <label for="edit_gravida" class="form-label">Gravida</label>
                                        <input type="text" class="form-control" id="edit_gravida" pattern="[0-9,\,]*"
                                            name="gravida" required>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="edit_partus" class="form-label">Partus</label>
                                        <input type="text" class="form-control" id="edit_partus" pattern="[0-9,\,]*"
                                            name="partus" required>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="edit_abortus" class="form-label">Abortus</label>
                                        <input type="text" class="form-control" id="edit_abortus" pattern="[0-9,\,]*"
                                            name="abortus" required>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="edit_usia_hamil" class="form-label">Usia Hamil</label>
                                        <input type="number" class="form-control" id="edit_usia_hamil"
                                            name="usia_hamil" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <label for="edit_keadaan_ibu" class="form-label">Keadaan Ibu</label>
                                        <select class="form-select" id="edit_keadaan_ibu" name="keadaan_ibu" required>
                                            <option value="">Pilih Keadaan Ibu</option>
                                            <option value="Mati">Mati</option>
                                            <option value="Hidup">Hidup</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="edit_kala1" class="form-label">Kala I</label>
                                        <input type="datetime-local" class="form-control" id="edit_kala1"
                                            name="kala1">
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="edit_kala2" class="form-label">Kala II</label>
                                        <input type="datetime-local" class="form-control" id="edit_kala2"
                                            name="kala2">
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="edit_kala3" class="form-label">Kala III</label>
                                        <input type="datetime-local" class="form-control" id="edit_kala3"
                                            name="kala3">
                                    </div>
                                </div>
                                <div class='row'>
                                    <div class="col-md-3 mb-3">
                                        <label for="edit_tgl_lahir_bayi" class="form-label">Tanggal Lahir Bayi</label>
                                        <input type="datetime-local" class="form-control" id="edit_tgl_lahir_bayi"
                                            name="tgl_lahir_bayi">
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="edit_brt_bayi" class="form-label">Berat Bayi</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="edit_brt_bayi"
                                                name="brt_bayi" placeholder="input Berat Bayi" pattern="[0-9,\,]*">
                                            <span class="input-group-text">gram</span>
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="edit_pnjg_bayi" class="form-label">Panjang Bayi</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="edit_pnjg_bayi"
                                                name="pnjg_bayi" placeholder="input Panjang Bayi" pattern="[0-9,\,]*">
                                            <span class="input-group-text">cm</span>
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="edit_lngkr_kpl_bayi" class="form-label">Lingkar Kepala Bayi</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="edit_lngkr_kpl_bayi"
                                                name="lngkr_kpl_bayi" placeholder="input Lingkar Kepala Bayi"
                                                pattern="[0-9,\,]*">
                                            <span class="input-group-text">cm</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="edit_vit_k" class="form-label">Vitamin K</label>
                                        <select class="form-select" id="edit_vit_k" name="vit_k">
                                            <option value="">Pilih Vitamin K</option>
                                            <option value="jika iya">&#10003;</option>
                                            <option value="jika tidak">&#10007;</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="edit_hbo" class="form-label">HBO</label>
                                        <select class="form-select" id="edit_hbo" name="hbo">
                                            <option value="">Pilih HBO</option>
                                            <option value="jika iya">&#10003;</option>
                                            <option value="jika tidak">&#10007;</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="edit_jenis_kelamin" class="form-label">jenis Kelamin</label>
                                        <select class="form-select" id="edit_jenis_kelamin" name="jenis_kelamin" required>
                                            <option value="">Pilih Jenis Kelamin</option>
                                            <option value="Laki-laki">Laki-laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
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
                        name: 'nama_ibu'
                    },
                    {
                        data: 'tgl_datang',
                        name: 'tgl_datang',
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
                        data: 'usia_ibu',
                        name: 'usia_ibu',
                        render: function(data, type, row) {
                            return data + ' Tahun';
                        }
                    },
                    {
                        data: 'alamat',
                        name: 'alamat'
                    },
                    {
                        data: 'gravida',
                        name: 'gravida',
                        render: function(data, type, row) {
                            return "G" + data + "P" + row.partus + "A" + row.abortus;
                        }
                    },
                    {
                        data: 'usia_hamil',
                        name: 'usia_hamil',
                        render: function(data, type, row) {
                            return data + ' Minggu';
                        }
                    },
                    {
                        data: 'keadaan_ibu',
                        name: 'keadaan_ibu'
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
                        data: 'kala3',
                        name: 'kala3',
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
                        data: 'tgl_lahir_bayi',
                        name: 'tgl_lahir_bayi',
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
                        data: 'brt_bayi',
                        name: 'brt_bayi',
                        render: function(data, type, row) {
                            return data + ' gram';
                        }
                    },
                    {
                        data: 'pnjg_bayi',
                        name: 'pnjg_bayi',
                        render: function(data, type, row) {
                            return data + ' cm';
                        }
                    },
                    {
                        data: 'lngkr_kpl_bayi',
                        name: 'lngkr_kpl_bayi',
                        render: function(data, type, row) {
                            return data + ' cm';
                        }
                    },
                    {
                        data: 'vit_k',
                        name: 'vit_k',
                        render: function(data, type, row, meta) {
                            if (data === null) {
                                return '';
                            } else {
                                return data.toLowerCase() === 'jika iya' ?
                                    '<i class="ri-check-line"></i>' :
                                    '<i class="ri-close-line"></i>';
                            }
                        }
                    },
                    {
                        data: 'hbo',
                        name: 'hbo',
                        render: function(data, type, row, meta) {
                            if (data === null) {
                                return '';
                            } else {
                                return data.toLowerCase() === 'jika iya' ?
                                    '<i class="ri-check-line"></i>' :
                                    '<i class="ri-close-line"></i>';
                            }
                        }
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
                dom: '<"d-flex justify-content-between align-items-center"<"#dt-buttons"B>f>rtip',
                buttons: [{
                    extend: 'colvis',
                    className: 'btn btn-secondary btn-sm',
                }],
                columnDefs: [{
                    // targets: [4, 5, 6, 7, 8, 9,],
                    targets: [4, 8, 9, 10, 11, 12, 13, 14],
                    visible: false
                }]
            });
            table.buttons().container().appendTo(
                '#colvis-button');
        });

        $(document).ready(function() {
            $('#id_ibu').change(function() {
                var id_ibu = $(this).val();
                $('#id_ibu').val('');
                $('#gravida').val('');
                $('#partus').val('');
                $('#abortus').val('');
                $('#usia_ibu').val('');
                if (id_ibu) {
                    $.ajax({
                        url: '{{ route('intranatal_care.info_rnca_persalinan', ':id_ibu') }}'
                            .replace(':id_ibu',
                                id_ibu),
                        type: 'GET',
                        dataType: 'json',
                        success: function(response) {
                            if (response.ibu) {
                                $('#id_ibu').val(response.ibu.id_ibu);
                                $('#usia_ibu').val(response.ibu.umur);
                            }
                            if (response.ropb) {
                                $('#gravida').val(response.ropb.gravida);
                                $('#partus').val(response.ropb.partus);
                                $('#abortus').val(response.ropb.abortus);
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
                    id: 'brt_bayi',
                    maxLength: 5
                },
                {
                    id: 'edit_brt_bayi',
                    maxLength: 5
                },
                {
                    id: 'pnjg_bayi',
                    maxLength: 10
                },
                {
                    id: 'edit_pnjg_bayi',
                    maxLength: 10
                },
                {
                    id: 'lngkr_kpl_bayi',
                    maxLength: 10
                },
                {
                    id: 'edit_lngkr_kpl_bayi',
                    maxLength: 10
                },
                {
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
                                <td>Tanggal Datang</td>
                                <td class="text-center">${formatDateOnly(data.tgl_datang)}</td>
                                <td class="text-center">${formatTimeOnly(data.tgl_datang)}</td>
                            </tr>
                            <tr>
                                <td>Kala I</td>
                                <td class="text-center">${formatDateOnly(data.kala1)}</td>
                                <td class="text-center">${formatTimeOnly(data.kala1)}</td>
                            </tr>
                            <tr>
                                <td>Kala II</td>
                                <td class="text-center">${formatDateOnly(data.kala2)}</td>
                                <td class="text-center">${formatTimeOnly(data.kala2)}</td>
                            </tr>
                            <tr>
                                <td>Kala III</td>
                                <td class="text-center">${formatDateOnly(data.kala3)}</td>
                                <td class="text-center">${formatTimeOnly(data.kala3)}</td>
                            </tr>
                            <tr>
                                <td>Tanggal Bayi Lahir</td>
                                <td class="text-center">${formatDateOnly(data.tgl_lahir_bayi)}</td>
                                <td class="text-center">${formatTimeOnly(data.tgl_lahir_bayi)}</td>
                            </tr>
                            <tr>
                                <td>G P A</td>
                                <td class="text-center" colspan="2">G${data.gravida}P${data.partus}A${data.abortus}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            `;
                    let vitaminKIcon = data.vit_k === 'jika iya' ? '<i class="ri-check-line"></i>' :
                        '<i class="ri-close-line"></i>';
                    let HBOIcon = data.hbo === 'jika iya' ? '<i class="ri-check-line"></i>' :
                        '<i class="ri-close-line"></i>';

                    let additionalInfoTableHtml = `
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td>Usia Kehamilan</td>
                                <td>${data.usia_hamil} Minggu</td>
                            </tr>
                            <tr>
                                <td>Usia Ibu</td>
                                <td>${data.usia_ibu} Tahun</td>
                            </tr>
                            <tr>
                                <td>Berat Bayi</td>
                                <td>${data.brt_bayi} gram</td>
                            </tr>
                            <tr>
                                <td>Panjang Bayi</td>
                                <td>${data.pnjg_bayi} cm</td>
                            </tr>
                            <tr>
                                <td>Lingkar Kepala Bayi</td>
                                <td>${data.lngkr_kpl_bayi} cm</td>
                            </tr>
                            <tr>
                                <td>Keadaan Ibu</td>
                                <td>${data.keadaan_ibu}</td>
                            </tr>
                            <tr>
                                <td>Jenis Kelamin</td>
                                <td>${data.jenis_kelamin}</td>
                            </tr>
                            <tr>
                                <td>Vitamin K : ${vitaminKIcon}</td>
                                <td>HBO : ${HBOIcon}</td>
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

        $('#persalinan-table').on('click', '.edit-btn', function() {
            let id = $(this).data('id');
            $.ajax({
                url: '{{ route('intranatal_care.edit_persalinan', ':id') }}'.replace(':id', id),
                method: 'GET',
                success: function(data) {
                    console.log("Pesan diterima:", data);
                    $('#edit_nama_ibu').val(data.nama_ibu);
                    $('#edit_tgl_datang').val(data.tgl_datang);
                    $('#edit_usia_ibu').val(data.usia_ibu);
                    $('#edit_alamat').val(data.alamat);
                    $('#edit_gravida').val(data.gravida);
                    $('#edit_partus').val(data.partus);
                    $('#edit_abortus').val(data.abortus);
                    $('#edit_usia_hamil').val(data.usia_hamil);
                    $('#edit_keadaan_ibu').val(data.keadaan_ibu);
                    $('#edit_kala1').val(data.kala1);
                    $('#edit_kala2').val(data.kala2);
                    $('#edit_kala3').val(data.kala3);
                    $('#edit_tgl_lahir_bayi').val(data.tgl_lahir_bayi);
                    $('#edit_brt_bayi').val(data.brt_bayi);
                    $('#edit_pnjg_bayi').val(data.pnjg_bayi);
                    $('#edit_lngkr_kpl_bayi').val(data.lngkr_kpl_bayi);
                    $('#edit_vit_k').val(data.vit_k);
                    $('#edit_hbo').val(data.hbo);
                    $('#edit_jenis_kelamin').val(data.jenis_kelamin);
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
