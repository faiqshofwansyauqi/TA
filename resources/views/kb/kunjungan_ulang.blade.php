@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <div class="pagetitle">
            <h1 style="margin-bottom: 5px">Kunjungan Ulang</h1>
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
                            <table class="table" id="kj-table" style="width:100%">
                                <thead>
                                    <tr>
                                        <th style="text-align: center">No</th>
                                        <th>Tanggal Datang</th>
                                        <th>Berat Badan</th>
                                        <th>Tekanan Darah</th>
                                        <th>Interval</th>
                                        <th>Tanggal Kembali</th>
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
                    <h3 class="modal-title fs-4 fw-bold" id="ModalInput">Input Kunjungan Ulang</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('kb.store_kunjungan_ulang') }}" method="post" autocomplete="off">
                        @csrf
                        <div class="col-12">
                            <div class="card-body">
                                <br>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="tgl_dilayani" class="form-label">Tanggal Datang</label>
                                        <input type="date" class="form-control" name="tgl_dilayani" id="tgl_dilayani"
                                            required>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="berat_badan" class="form-label">Berat Badan</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="berat_badan" name="berat_badan"
                                                pattern="[0-9,\,]*">
                                            <span class="input-group-text">Kg</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="tkn_darah" class="form-label">TD <sup>(mmhg)</sup></label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="tkn_darah" name="tkn_darah">
                                            <span class="input-group-text">mmhg</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="interval" class="form-label">Interval</label>
                                        <select class="form-select" id="interval" name="interval" required>
                                            <option value="">Pilih Interval</option>
                                            <option value="90 Hari">90 Hari</option>
                                            <option value="30 Hari">30 Hari</option>
                                            <option value="3 Tahun">3 Tahun</option>
                                            <option value="5 Tahun">5 Tahun</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="tgl_kembali" class="form-label">Tanggal Kembali</label>
                                        <input type="date" class="form-control" id="tgl_kembali" name="tgl_kembali"
                                            required>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Simpan</button>
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
                    <h3 class="modal-title fs-4 fw-bold" id="ModalEdit">Edit Kunjungan Ulang</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                    <form id="editForm" method="post" autocomplete="off">
                        @csrf
                        @method('PUT')
                        <div class="col-12">
                            <div class="card-body">
                                <br>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="edit_tgl_dilayani" class="form-label">Tanggal Datang</label>
                                        <input type="date" class="form-control" name="tgl_dilayani"
                                            id="edit_tgl_dilayani" required>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="edit_berat_badan" class="form-label">Berat Badan</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="edit_berat_badan"
                                                name="berat_badan" pattern="[0-9,\,]*">
                                            <span class="input-group-text">Kg</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="edit_tkn_darah" class="form-label">TD <sup>(mmhg)</sup></label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="edit_tkn_darah"
                                                name="tkn_darah">
                                            <span class="input-group-text">mmhg</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="edit_interval" class="form-label">Interval</label>
                                        <select class="form-select" id="edit_interval" name="interval" required>
                                            <option value="">Pilih Interval</option>
                                            <option value="90 Hari">90 Hari</option>
                                            <option value="30 Hari">30 Hari</option>
                                            <option value="3 Tahun">3 Tahun</option>
                                            <option value="5 Tahun">5 Tahun</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="edit_tgl_kembali" class="form-label">Tanggal Kembali</label>
                                        <input type="date" class="form-control" id="edit_tgl_kembali"
                                            name="tgl_kembali" required>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Simpan</button>
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

            let table = $('#kj-table').DataTable({
                processing: true,
                serverSide: false,
                ordering: false,
                ajax: '{{ route('kb.data_kunjungan_ulang') }}',
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
                        data: 'tgl_dilayani',
                        name: 'tgl_dilayani',
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
                        data: 'berat_badan',
                        name: 'berat_badan',
                        render: function(data, type, row) {
                            return data + ' Kg'; // Menambahkan 'KG' di belakang nilai berat badan
                        }
                    },
                    {
                        data: 'tkn_darah',
                        name: 'tkn_darah',
                        render: function(data, type, row) {
                            return data + ' mmgh'; // Menambahkan 'KG' di belakang nilai berat badan
                        }
                    },
                    {
                        data: 'interval',
                        name: 'interval'
                    },
                    {
                        data: 'tgl_kembali',
                        name: 'tgl_kembali',
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
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        render: function(data, type, row) {
                            let editUrl =
                                '{{ route('kb.edit_kunjungan_ulang', ':id') }}'
                                .replace(
                                    ':id', row.id);
                            return `
                            <div style="display: flex; justify-content: center;">       
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

        function updateTglKembali(tglDatang, interval, tglKembali) {
            if (tglDatang) {
                const datangDate = new Date(tglDatang);
                let kembaliDate;

                switch (interval) {
                    case '90 Hari':
                        kembaliDate = new Date(datangDate);
                        kembaliDate.setDate(datangDate.getDate() + 90);
                        break;
                    case '30 Hari':
                        kembaliDate = new Date(datangDate);
                        kembaliDate.setDate(datangDate.getDate() + 30);
                        break;
                    case '3 Tahun':
                        kembaliDate = new Date(datangDate);
                        kembaliDate.setFullYear(datangDate.getFullYear() + 3);
                        break;
                    case '5 Tahun':
                        kembaliDate = new Date(datangDate);
                        kembaliDate.setFullYear(datangDate.getFullYear() + 5);
                        break;
                    default:
                        kembaliDate = null;
                }

                if (kembaliDate) {
                    tglKembali.value = kembaliDate.toISOString().split('T')[0];
                }
            }
        }

        document.getElementById('interval').addEventListener('change', function() {
            const tglDatang = document.getElementById('tgl_dilayani').value;
            const interval = this.value;
            const tglKembali = document.getElementById('tgl_kembali');
            updateTglKembali(tglDatang, interval, tglKembali);
        });

        document.getElementById('edit_interval').addEventListener('change', function() {
            const tglDatang = document.getElementById('edit_tgl_dilayani').value;
            const interval = this.value;
            const tglKembali = document.getElementById('edit_tgl_kembali');
            updateTglKembali(tglDatang, interval, tglKembali);
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
        $('#kj-table').on('click', '.edit-btn', function() {
            let id = $(this).data('id');
            $.ajax({
                url: '{{ route('kb.edit_kunjungan_ulang', ':id') }}'.replace(':id', id),
                method: 'GET',
                success: function(data) {
                    $('#edit_tgl_dilayani').val(data.tgl_dilayani);
                    $('#edit_berat_badan').val(data.berat_badan);
                    $('#edit_tkn_darah').val(data.tkn_darah);
                    $('#edit_interval').val(data.interval);
                    $('#edit_tgl_kembali').val(data.tgl_kembali);
                    $('#editForm').attr('action',
                        '{{ route('kb.update_kunjungan_ulang', ':id') }}'
                        .replace(
                            ':id', id));
                    $('#modalEdit').modal('show');
                }
            });
        });
    </script>
@endsection
