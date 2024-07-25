@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <div class="pagetitle">
            <h1 style="margin-bottom: 5px">Pemeriksaan Bidan Saat K1</h1>
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
                            <table class="table table-borderless table-anc" id="ropb-table" style="width:100%">
                                <thead>
                                    <tr>
                                        <th style="text-align: center">No</th>
                                        <th>Nama Ibu</th>
                                        <th>Gravida</th>
                                        <th>Pertus</th>
                                        <th>Abortus</th>
                                        <th>Hidup</th>
                                        <th>Riwayat Komplikasi</th>
                                        <th>Penyakit</th>
                                        <th>Tanggal Periksa</th>
                                        <th>Tanggal HPHT</th>
                                        <th>Taksiran Persalinan</th>
                                        <th>Persalinan Sebelumnya</th>
                                        <th>Berat Badan</th>
                                        <th>Tinggi Badan</th>
                                        <th>Buku KIA</th>
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
                    <h3 class="modal-title fs-4 fw-bold" id="ModalInput">Input Pemeriksaan Bidan Saat K1</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('antenatal_care.store_ropb') }}" method="post" autocomplete="off">
                        @csrf
                        <div class="row">
                            <div class=" col-6">
                                <div class="card-body">
                                    <h5 class="card-title">Riwayat Obstetrik</h5>
                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <label for="id_ibu" class="form-label">Ibu</label>
                                            <select class="form-control" id="id_ibu" name="id_ibu" required>
                                                <option value="">Pilih Ibu</option>
                                                @foreach ($ibus as $ibu)
                                                    <option value="{{ $ibu->id_ibu }}">{{ $ibu->nama_ibu }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3 mb-3">
                                            <label for="gravida" class="form-label">Gravida</label>
                                            <input type="number" class="form-control" id="gravida" name="gravida"
                                                required>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="partus" class="form-label">Partus</label>
                                            <input type="number" class="form-control" id="partus" name="partus"
                                                required>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="abortus" class="form-label">Abortus</label>
                                            <input type="number" class="form-control" id="abortus" name="abortus"
                                                required>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="hidup" class="form-label">Hidup</label>
                                            <input type="number" class="form-control" id="hidup" name="hidup"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="rwyt_komplikasi" class="form-label">Riwayat Komplikasi Kebidanan</label>
                                        <input type="text" class="form-control" id="rwyt_komplikasi"
                                            name="rwyt_komplikasi" required>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="pnykt_kronis_alergi" class="form-label">Penyakit Kronis dan
                                            Alergi</label>
                                        <input type="text" class="form-control" id="pnykt_kronis_alergi"
                                            name="pnykt_kronis_alergi" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </div>
                            <div class=" col-6">
                                <div class="card-body">
                                    <h5 class="card-title">Pemeriksaan Bidan</h5>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="tgl_periksa" class="form-label">Tanggal Periksa</label>
                                            <input type="text" class="form-control datepicker" id="tgl_periksa"
                                                name="tgl_periksa" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="tgl_hpht" class="form-label">Tanggal HPHT</label>
                                            <input type="text" class="form-control datepicker" id="tgl_hpht"
                                                name="tgl_hpht" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="tksrn_persalinan" class="form-label">Taksiran Persalinan</label>
                                            <input type="text" class="form-control datepicker" id="tksrn_persalinan"
                                                name="tksrn_persalinan" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="prlnan_sebelum" class="form-label">Persalinan Sebelumnya</label>
                                            <input type="text" class="form-control datepicker" id="prlnan_sebelum"
                                                name="prlnan_sebelum">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="berat_badan" class="form-label">Berat Badan</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" id="berat_badan"
                                                    name="berat_badan" required>
                                                <span class="input-group-text">Kg</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="tinggi_badan" class="form-label">Berat Tinggi</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" id="tinggi_badan"
                                                    name="tinggi_badan" required>
                                                <span class="input-group-text">Cm</span>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="buku_kia" class="form-label">Buku KIA</label>
                                            <select class="form-select" id="buku_kia" name="buku_kia" required>
                                                <option value="">Pilih Keadaan Ibu</option>
                                                <option value="Memiliki">Memiliki</option>
                                                <option value="Tidak">Tidak</option>
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
                    <h3 class="modal-title fs-4 fw-bold" id="ModalEdit">Edit Pemeriksaan Bidan Saat K1 </h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                    <form id="editForm" method="post" autocomplete="off">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class=" col-6">
                                <div class="card-body">
                                    <h5 class="card-title">Riwayat Obstetrik</h5>
                                    <div class="row">
                                        <div class="col-md-3 mb-3">
                                            <label for="edit_gravida" class="form-label">Gravida</label>
                                            <input type="number" class="form-control" id="edit_gravida" name="gravida"
                                                required>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="edit_partus" class="form-label">Partus</label>
                                            <input type="number" class="form-control" id="edit_partus" name="partus"
                                                required>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="edit_abortus" class="form-label">Abortus</label>
                                            <input type="number" class="form-control" id="edit_abortus" name="abortus"
                                                required>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="edit_hidup" class="form-label">Hidup</label>
                                            <input type="number" class="form-control" id="edit_hidup" name="hidup"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="edit_rwyt_komplikasi" class="form-label">Riwayat Komplikasi
                                            Kebidanan</label>
                                        <input type="text" class="form-control" id="edit_rwyt_komplikasi"
                                            name="rwyt_komplikasi" required>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="edit_pnykt_kronis_alergi" class="form-label">Penyakit Kronis dan
                                            Alergi</label>
                                        <input type="text" class="form-control" id="edit_pnykt_kronis_alergi"
                                            name="pnykt_kronis_alergi" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary"
                                        style="margin-top: 50px">Simpan</button>
                                </div>
                            </div>
                            <div class=" col-6">
                                <div class="card-body">
                                    <h5 class="card-title">Pemeriksaan Bidan</h5>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="edit_tgl_periksa" class="form-label">Tanggal Periksa</label>
                                            <input type="date" class="form-control" id="edit_tgl_periksa"
                                                name="tgl_periksa" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="edit_tgl_hpht" class="form-label">Tanggal HPHT</label>
                                            <input type="date" class="form-control" id="edit_tgl_hpht"
                                                name="tgl_hpht" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="edit_tksrn_persalinan" class="form-label">Taksiran
                                                Persalinan</label>
                                            <input type="date" class="form-control"
                                                id="edit_tksrn_persalinan" name="tksrn_persalinan" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="edit_prlnan_sebelum" class="form-label">Persalinan
                                                Sebelumnya</label>
                                            <input type="date" class="form-control"
                                                id="edit_prlnan_sebelum" name="prlnan_sebelum">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="edit_berat_badan" class="form-label">Berat Badan</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" id="edit_berat_badan"
                                                    name="berat_badan" required>
                                                <span class="input-group-text">Kg</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="edit_tinggi_badan" class="form-label">Berat Tinggi</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" id="edit_tinggi_badan"
                                                    name="tinggi_badan" required>
                                                <span class="input-group-text">Cm</span>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="edit_buku_kia" class="form-label">Buku KIA</label>
                                            <select class="form-select" id="edit_buku_kia" name="buku_kia" required>
                                                <option value="">Pilih Keadaan Ibu</option>
                                                <option value="Memiliki">Memiliki</option>
                                                <option value="Tidak">Tidak</option>
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

    <div class="modal fade" id="modalView" tabindex="-1" aria-labelledby="modalViewLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-4 fw-bold" id="modalViewLabel">Detail Pemeriksaan Bidan/Dokter Saat K1</h1>
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

            let table = $('#ropb-table').DataTable({
                processing: true,
                serverSide: false,
                ordering: false,
                ajax: '{{ route('antenatal_care.data_ropb') }}',
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
                        data: 'gravida',
                        name: 'gravida'
                    },
                    {
                        data: 'partus',
                        name: 'partus'
                    },
                    {
                        data: 'abortus',
                        name: 'abortus'
                    },
                    {
                        data: 'hidup',
                        name: 'hidup'
                    },
                    {
                        data: 'rwyt_komplikasi',
                        name: 'rwyt_komplikasi'
                    },
                    {
                        data: 'pnykt_kronis_alergi',
                        name: 'pnykt_kronis_alergi'
                    },
                    {
                        data: 'tgl_periksa',
                        name: 'tgl_periksa',
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
                        data: 'tgl_hpht',
                        name: 'tgl_hpht',
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
                        data: 'tksrn_persalinan',
                        name: 'tksrn_persalinan',
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
                        data: 'prlnan_sebelum',
                        name: 'prlnan_sebelum',
                        render: function(data) {
                            if (data === null || data === undefined) {
                                return '-';
                            }
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
                        data: 'berat_badan',
                        name: 'berat_badan',
                        render: function(data, type, row) {
                            return data + ' Kg';
                        }
                    },
                    {
                        data: 'tinggi_badan',
                        name: 'tinggi_badan',
                        render: function(data, type, row) {
                            return data + ' Cm';
                        }
                    },
                    {
                        data: 'buku_kia',
                        name: 'buku_kia'
                    }, {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        render: function(data, type, row) {
                            let viewUrl = '{{ route('antenatal_care.show_ropb', ':id') }}'.replace(
                                ':id', row.id);
                            let editUrl = '{{ route('antenatal_care.edit_ropb', ':id') }}'.replace(
                                ':id', row.id);
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
                    targets: [5, 6, 10, 11, 12, 13, ],
                    visible: false
                }]
            });
            table.buttons().container().appendTo(
                '#colvis-button');
        });

        $('#ropb-table').on('click', '.view-btn', function() {
            let id = $(this).data('id');
            $.ajax({
                url: '{{ route('antenatal_care.show_ropb', ':id') }}'.replace(':id', id),
                method: 'GET',
                success: function(data) {
                    let namaIbu = data.nama_ibu;

                    function formatDate(dateString) {
                        if (!dateString) return '';
                        if (isNaN(new Date(dateString))) return 'Invalid date format';
                        const date = new Date(dateString);
                        const year = date.getFullYear();
                        const month = String(date.getMonth() + 1).padStart(2, '0');
                        const day = String(date.getDate()).padStart(2, '0');
                        return `${day}/${month}/${year}`;
                    }
                    let RiwayatObstetrikHtml = `
                    <div class="table-responsive">
                        <h5><strong>Riwayat Obstetrik</strong></h5>
                        <table class="table table-borderless">
                            <thead>
                            </thead>
                            <tbody>
                                <tr>
                                    <td width="170">Gravida</td>
                                    <td class="text-center" width="30">:</td>
                                    <td class="text-center">${data.gravida}</td>
                                </tr>
                                <tr>
                                    <td width="170">Partus</td>
                                    <td class="text-center" width="30">:</td>
                                    <td class="text-center">${data.partus}</td>
                                </tr>
                                <tr>
                                    <td width="170">Abortus</td>
                                    <td class="text-center" width="30">:</td>
                                    <td class="text-center">${data.abortus}</td>
                                </tr>
                                <tr>
                                    <td width="170">Hidup</td>
                                    <td class="text-center" width="30">:</td>
                                    <td class="text-center">${data.hidup}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
            `;
                    let RiwayatObstetrikLanjutHtml = `
                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <thead>
                            </thead>
                            <tbody>
                                <tr>
                                    <td width="260">Riwayat Komplikasi Kebidanan</td>
                                    <td class="text-center" width="30">:</td>
                                    <td >${data.rwyt_komplikasi}</td>
                                </tr>
                                <tr>
                                    <td width="260">Penyakit Kronis dan Alergi</td>
                                    <td class="text-center" width="30">:</td>
                                    <td>${data.pnykt_kronis_alergi}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div>
            `;
                    let PemeriksaanBidanHtml = `
                    <div class="table-responsive">
                        <h5><strong>Pemeriksaan Bidan</strong></h5>
                        <table class="table table-borderless">
                            <thead>                                
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Tanggal Periksa</td>
                                    <td class="text-center" width="30">:</td>
                                    <td>${formatDate(data.tgl_periksa)}</td>
                                    <td>BB Sebelum Hamil</td>
                                    <td class="text-center" width="30">:</td>
                                    <td>${data.berat_badan} Kg</td>
                                </tr>
                                <tr>
                                    <td>Tanggal HPHT</td>
                                    <td class="text-center" width="30">:</td>
                                    <td>${formatDate(data.tgl_hpht)}</td>
                                    <td>Tinggi Badan</td>
                                    <td class="text-center" width="30">:</td>
                                    <td>${data.tinggi_badan} Cm</td>
                                </tr>
                                <tr>
                                    <td>Taksiran Persalinan</td>
                                    <td class="text-center" width="30">:</td>
                                    <td>${formatDate(data.tksrn_persalinan)}</td>
                                    <td>Buku Kia</td>
                                    <td class="text-center" width="30">:</td>
                                    <td>${data.buku_kia}</td>
                                </tr>
                                <tr>
                                    <td>Persalinan Sebelumnya</td>
                                    <td class="text-center" width="30">:</td>
                                    <td>${formatDate(data.prlnan_sebelum)}</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
            `;
                    let tableHtml = `
                    <div class="container">
                    <div class="row justify-content-between">
                        <div class="col-md-4">
                            ${RiwayatObstetrikHtml}                
                        </div>
                        <div class="col-md-8">
                            ${PemeriksaanBidanHtml}
                        </div>
                        <div class="col-md-12">
                            ${RiwayatObstetrikLanjutHtml}                
                        </div>
                    </div>
                </div>
            `;
                    $('#modalView .modal-body').html(tableHtml);
                    $('#modalView').modal('show');
                }
            });
        });

        $('#ropb-table').on('click', '.edit-btn', function() {
            let id = $(this).data('id');
            $.ajax({
                url: '{{ route('antenatal_care.edit_ropb', ':id') }}'.replace(':id', id),
                method: 'GET',
                success: function(data) {
                    $('#edit_id_ibu').val(data.id_ibu);
                    $('#edit_gravida').val(data.gravida);
                    $('#edit_partus').val(data.partus);
                    $('#edit_abortus').val(data.abortus);
                    $('#edit_hidup').val(data.hidup);
                    $('#edit_rwyt_komplikasi').val(data.rwyt_komplikasi);
                    $('#edit_pnykt_kronis_alergi').val(data.pnykt_kronis_alergi);
                    $('#edit_tgl_periksa').val(data.tgl_periksa);
                    $('#edit_tgl_hpht').val(data.tgl_hpht);
                    $('#edit_tksrn_persalinan').val(data.tksrn_persalinan);
                    $('#edit_prlnan_sebelum').val(data.prlnan_sebelum);
                    $('#edit_berat_badan').val(data.berat_badan);
                    $('#edit_tinggi_badan').val(data.tinggi_badan);
                    $('#edit_penolong').val(data.penolong);
                    $('#edit_cara_persalinan').val(data.cara_persalinan);
                    $('#edit_buku_kia').val(data.buku_kia);
                    $('#editForm').attr('action', '{{ route('antenatal_care.update_ropb', ':id') }}'
                        .replace(
                            ':id', id));
                    $('#modalEdit').modal('show');
                }
            });
        });

        $(function() {
            $('.datepicker').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                autoUpdateInput: false,
                locale: {
                    format: 'DD/MM/YYYY'
                }
            }, function(start, end, label) {
                $(this.element).val(start.format('DD/MM/YYYY'));
                $(this.element).data('original-format', start.format('YYYY-MM-DD'));
            });
            $('.datepicker').on('apply.daterangepicker', function(ev, picker) {
                $(this).val(picker.startDate.format('DD/MM/YYYY'));
                $(this).data('original-format', picker.startDate.format('YYYY-MM-DD'));
            });
            $('form').on('submit', function() {
                $('.datepicker').each(function() {
                    $(this).val($(this).data('original-format'));
                });
            });
        });
    </script>
@endsection
