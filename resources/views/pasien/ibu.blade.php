@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <div class="pagetitle">
            <h1 style="margin-bottom: 5px">Data Ibu</h1>
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
                            <table class="table" id="ibu-table" style="width:100%">
                                <thead>
                                    <tr>
                                        <th style="text-align: center">No</th>
                                        <th>Puskesmas</th>
                                        <th>No Regis Ibu</th>
                                        <th>Nama Ibu</th>
                                        <th>Nama Suami</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Alamat Domisili</th>
                                        <th>Desa / Kelurahan</th>
                                        <th>Kabupaten</th>
                                        <th>Pekerjaan Ibu</th>
                                        <th>Pendidikan Ibu</th>
                                        <th>NIK</th>
                                        <th>Umur</th>
                                        <th>RT/RW</th>
                                        <th>Kecamatan</th>
                                        <th>Provinsi</th>
                                        <th>Agama</th>
                                        <th>BPJS</th>
                                        <th>Posyandu</th>
                                        <th>Nama Kader</th>
                                        <th>Tgl. Register</th>
                                        <th>Telp/HP</th>
                                        <th>Gol Darah</th>
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
                    <h1 class="modal-title fs-4 fw-bold" id="ModalInput">Input Identitas Ibu</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('pasien.store_ibu') }}" method="post" autocomplete="off">
                        @csrf
                        <div class="col-12">
                            <div class="card-body">
                                <br>
                                <div class="row">
                                    <div class="col-md-4 mb-2">
                                        <label for="nama_ibu" class="form-label">Nama Ibu</label>
                                        <input type="text" class="form-control" id="nama_ibu" name="nama_ibu" required>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <label for="nama_suami" class="form-label">Nama Suami</label>
                                        <input type="text" class="form-control" id="nama_suami" name="nama_suami"
                                            required>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                        <input type="text" class="form-control datepicker" id="tanggal_lahir"
                                            name="tanggal_lahir" required>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <label for="alamat_domisili" class="form-label">Alamat Domisili</label>
                                        <textarea class="form-control" id="alamat_domisili" name="alamat_domisili" required></textarea >
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <label for="desa" class="form-label">Desa / Kelurahan</label>
                                        <input type="text" class="form-control" id="desa" name="desa" required>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <label for="kab" class="form-label">Kabupaten</label>
                                        <input type="text" class="form-control" id="kab" name="kab" required>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <label for="pendidikan_ibu" class="form-label">Pendidikan Ibu</label>
                                        <input type="text" class="form-control" id="pendidikan_ibu"
                                            name="pendidikan_ibu" required>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <label for="pekerjaaan_ibu" class="form-label">Pekerjaan Ibu</label>
                                        <input type="text" class="form-control" id="pekerjaaan_ibu"
                                            name="pekerjaaan_ibu" required>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <label for="nik" class="form-label">NIK</label>
                                        <input type="text" class="form-control" id="nik" name="nik" 
                                            maxlength="16"  required>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <label for="noregis" class="form-label">Nomer Registrasi Ibu</label>
                                        <input type="text" class="form-control" id="noregis" name="noregis" required>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <label for="umur" class="form-label">Umur</label>
                                        <input type="number" class="form-control" id="umur" name="umur" required>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <label for="rtrw" class="form-label">RT/RW</label>
                                        <input type="text" class="form-control" id="rtrw" name="rtrw" required>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <label for="puskesmas" class="form-label">Puskesmas</label>
                                        <input type="text" class="form-control" id="puskesmas" name="puskesmas" required>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <label for="kec" class="form-label">Kecamatan</label>
                                        <input type="text" class="form-control" id="kec" name="kec" required>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <label for="prov" class="form-label">Provinsi</label>
                                        <input type="text" class="form-control" id="prov" name="prov" required>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <label for="agama" class="form-label">Agama</label>
                                        <input type="text" class="form-control" id="agama" name="agama" required>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <label for="jamkesmas" class="form-label">BPJS</label>
                                        <select class="form-select" id="jamkesmas" name="jamkesmas"required >
                                            <option value="-">Pilih BPJS</option>
                                            <option value="Ya">Ya</option>
                                            <option value="Tidak">Tidak</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <label for="posyandu" class="form-label">Posyandu</label>
                                        <input type="text" class="form-control" id="posyandu" name="posyandu" required >
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <label for="nama_kader" class="form-label">Nama Kader</label>
                                        <input type="text" class="form-control" id="nama_kader" name="nama_kader" required>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <label for="tanggal_reg" class="form-label">Tanggal Register</label>
                                        <input type="date" class="form-control" id="tanggal_reg" 
                                        name="tanggal_reg" value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" readonly>
                                    </div>                                    
                                    <div class="col-md-4 mb-2">
                                        <label for="gol_darah" class="form-label">Gol Darah</label>
                                        <select class="form-select" id="gol_darah" name="gol_darah" required>
                                            <option value="-">Pilih Golongan Darah</option>
                                            <option value="A">A</option>
                                            <option value="B">B</option>
                                            <option value="AB">AB</option>
                                            <option value="O">O</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <label for="telp" class="form-label">Nomer Telp</label>
                                        <input type="text" class="form-control" id="telp" name="telp" maxlength="13" pattern="\d{1,13}" required>
                                    </div>
                                </div>
                                <br>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="ModalEdit" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg"">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-4 fw-bold" id="ModalEdit">Edit Identitas Ibu</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editForm" method="post" autocomplete="off">
                        @csrf
                        @method('PUT')
                        <div class="col-12">
                            <div class="card-body">
                                <br>
                                <div class="row">
                                    <div class="col-md-4 mb-2">
                                        <label for="edit_nama_ibu" class="form-label">Nama Ibu</label>
                                        <input type="text" class="form-control" id="edit_nama_ibu" name="nama_ibu" readonly> 
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <label for="edit_nama_suami" class="form-label">Nama Suami</label>
                                        <input type="text" class="form-control" id="edit_nama_suami"
                                            name="nama_suami" required> 
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <label for="edit_tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                        <input type="date" class="form-control" id="edit_tanggal_lahir"
                                            name="tanggal_lahir" required> 
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <label for="edit_alamat_domisili" class="form-label">Alamat Domisili</label>
                                        <textarea class="form-control" id="edit_alamat_domisili" name="alamat_domisili"></textarea>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <label for="edit_desa" class="form-label">Desa / Kelurahan</label>
                                        <input type="text" class="form-control" id="edit_desa" name="desa"
                                            required>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <label for="edit_kab" class="form-label">Kabupaten</label>
                                        <input type="text" class="form-control" id="edit_kab" name="kab"
                                            required>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <label for="edit_pendidikan_ibu" class="form-label">Pendidikan Ibu</label>
                                        <input type="text" class="form-control" id="edit_pendidikan_ibu"
                                            name="pendidikan_ibu" required>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <label for="edit_pekerjaaan_ibu" class="form-label">Pekerjaan Ibu</label>
                                        <input type="text" class="form-control" id="edit_pekerjaaan_ibu"
                                            name="pekerjaaan_ibu" required>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <label for="edit_nik" class="form-label">NIK</label>
                                        <input type="text" class="form-control" id="edit_nik" name="nik"
                                            maxlength="16" readonly>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <label for="edit_noregis" class="form-label">Nomer Registrasi Ibu</label>
                                        <input type="text" class="form-control" id="edit_noregis" name="noregis"
                                            readonly>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <label for="edit_umur" class="form-label">Umur</label>
                                        <input type="number" class="form-control" id="edit_umur" name="umur"
                                            required>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <label for="edit_rtrw" class="form-label">RT/RW</label>
                                        <input type="text" class="form-control" id="edit_rtrw" name="rtrw"
                                            required>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <label for="edit_puskesmas" class="form-label">Puskesmas</label>
                                        <input type="text" class="form-control" id="edit_puskesmas" name="puskesmas"
                                            required>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <label for="edit_kec" class="form-label">Kecamatan</label>
                                        <input type="text" class="form-control" id="edit_kec" name="kec"
                                            required>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <label for="edit_prov" class="form-label">Provinsi</label>
                                        <input type="text" class="form-control" id="edit_prov" name="prov"
                                            required>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <label for="edit_agama" class="form-label">Agama</label>
                                        <input type="text" class="form-control" id="edit_agama" name="agama"
                                            required>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <label for="edit_jamkesmas" class="form-label">BPJS</label>
                                        <select class="form-select" id="edit_jamkesmas" name="jamkesmas" required>
                                            <option value="">Pilih BPJS</option>
                                            <option value="Ya">Ya</option>
                                            <option value="Tidak">Tidak</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <label for="edit_posyandu" class="form-label">Posyandu</label>
                                        <input type="text" class="form-control" id="edit_posyandu" name="posyandu"
                                            required>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <label for="edit_nama_kader" class="form-label">Nama Kader</label>
                                        <input type="text" class="form-control" id="edit_nama_kader"
                                            name="nama_kader" required>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <label for="edit_tanggal_reg" class="form-label">Tanggal Register</label>
                                        <input type="date" class="form-control" id="edit_tanggal_reg"
                                            name="tanggal_reg" readonly>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <label for="edit_gol_darah" class="form-label">Gol Darah</label>
                                        <select class="form-select" id="edit_gol_darah" name="gol_darah" required>
                                            <option value="-">Pilih Golongan Darah</option>
                                            <option value="A">A</option>
                                            <option value="B">B</option>
                                            <option value="AB">AB</option>
                                            <option value="O">O</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <label for="edit_telp" class="form-label">Nomer Telp</label>
                                        <input type="text" class="form-control" id="edit_telp" name="telp"
                                            maxlength="13" pattern="\d{1,13}">
                                    </div>
                                </div>
                                <br>
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

            let table = $('#ibu-table').DataTable({
                processing: true,
                serverSide: false,
                ordering: false,
                ajax: '{{ route('pasien.data_ibu') }}',
                scrollX: false,
                fixedHeader: true,
                columns: [{
                        data: 'id_ibu',
                        name: 'id_ibu',
                        render: function(data, type, row, meta) {
                            return '<div style="text-align: center;">' + (meta.row + meta.settings
                                ._iDisplayStart + 1) + '</div>';
                        }
                    },
                    {
                        data: 'puskesmas',
                        name: 'puskesmas'
                    },
                    {
                        data: 'noregis',
                        name: 'noregis'
                    },
                    {
                        data: 'nama_ibu',
                        name: 'nama_ibu'
                    },
                    {
                        data: 'nama_suami',
                        name: 'nama_suami'
                    },
                    {
                        data: 'tanggal_lahir',
                        name: 'tanggal_lahir',
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
                        data: 'alamat_domisili',
                        name: 'alamat_domisili'
                    },
                    {
                        data: 'desa',
                        name: 'desa'
                    },
                    {
                        data: 'kab',
                        name: 'kab'
                    },
                    {
                        data: 'pekerjaaan_ibu',
                        name: 'pekerjaaan_ibu'
                    },
                    {
                        data: 'pendidikan_ibu',
                        name: 'pendidikan_ibu'
                    },
                    {
                        data: 'nik',
                        name: 'nik'
                    },
                    {
                        data: 'umur',
                        name: 'umur',
                        render: function(data, type, row) {
                            return data + ' tahun';
                        }
                    },
                    {
                        data: 'rtrw',
                        name: 'rtrw'
                    },
                    {
                        data: 'kec',
                        name: 'kec'
                    },
                    {
                        data: 'prov',
                        name: 'prov'
                    },
                    {
                        data: 'agama',
                        name: 'agama'
                    },
                    {
                        data: 'jamkesmas',
                        name: 'jamkesmas'
                    },
                    {
                        data: 'posyandu',
                        name: 'posyandu'
                    },
                    {
                        data: 'nama_kader',
                        name: 'nama_kader'
                    },
                    {
                        data: 'tanggal_reg',
                        name: 'tanggal_reg'
                    },
                    {
                        data: 'telp',
                        name: 'telp'
                    },
                    {
                        data: 'gol_darah',
                        name: 'gol_darah'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        render: function(data, type, row) {
                            let editUrl = '{{ route('pasien.edit_ibu', ':id') }}'.replace(':id',
                                row.id_ibu);
                            let deleteUrl = '{{ route('pasien.delete_ibu', ':id') }}'.replace(':id',
                                row.id_ibu);

                            return `
                                <div style="display: flex; justify-content: center;">
                                    <button class="btn btn-table btn-sm btn-primary edit-btn" data-id="${row.id_ibu}" data-bs-toggle="modal" data-bs-target="#modalEdit" style="margin-right: 5px;">
                                        Edit
                                    </button>
                                    <button class="btn btn-table btn-sm btn-danger delete-btn" data-id="${row.id_ibu}" data-url="${deleteUrl}">
                                        Delete
                                    </button>
                                </div>
                            `;
                        }
                    }
                ],
                columnDefs: [{
                    targets: [5, 6, 7, 8, 9, 10, 11, 14, 15, 16, 17, 18, 19, 20, 21, 22],
                    // targets: [],
                    visible: false
                }]
            });
            table.buttons().container().appendTo(
                '#colvis-button');
        });

        $('#ibu-table').on('click', '.delete-btn', function() {
            let id = $(this).data('id');
            let url = $(this).data('url');

            if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
                $.ajax({
                    url: url,
                    type: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if (response.success) {
                            $('#ibu-table').DataTable().ajax.reload();
                            alert(response.success);
                        } else {
                            alert('Gagal menghapus data.');
                        }
                    },
                    error: function(xhr) {
                        alert('Terjadi kesalahan: ' + xhr.responseText);
                    }
                });
            }
        });
        $('#ibu-table').on('click', '.edit-btn', function() {
            let id = $(this).data('id');
            $.ajax({
                url: '{{ route('pasien.edit_ibu', ':id') }}'.replace(':id', id),
                method: 'GET',
                success: function(data) {
                    $('#edit_nik').val(data.nik);
                    $('#edit_puskesmas').val(data.puskesmas);
                    $('#edit_noregis').val(data.noregis);
                    $('#edit_nama_ibu').val(data.nama_ibu);
                    $('#edit_nama_suami').val(data.nama_suami);
                    $('#edit_tanggal_lahir').val(data.tanggal_lahir);
                    $('#edit_alamat_domisili').val(data.alamat_domisili);
                    $('#edit_desa').val(data.desa);
                    $('#edit_kab').val(data.kab);
                    $('#edit_pendidikan_ibu').val(data.pendidikan_ibu);
                    $('#edit_pekerjaaan_ibu').val(data.pekerjaaan_ibu);
                    $('#edit_umur').val(data.umur);
                    $('#edit_rtrw').val(data.rtrw);
                    $('#edit_kec').val(data.kec);
                    $('#edit_prov').val(data.prov);
                    $('#edit_agama').val(data.agama);
                    $('#edit_tanggal_reg').val(data.tanggal_reg);
                    $('#edit_posyandu').val(data.posyandu);
                    $('#edit_nama_kader').val(data.nama_kader);
                    $('#edit_jamkesmas').val(data.jamkesmas);
                    $('#edit_gol_darah').val(data.gol_darah);
                    $('#edit_telp').val(data.telp);
                    $('#edit_kab').val(data.kab);
                    $('#editForm').attr('action', '{{ route('pasien.update_ibu', ':id') }}'.replace(
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
                    format: 'DD-MM-YYYY'
                }
            }, function(start, end, label) {
                $(this.element).val(start.format('DD-MM-YYYY'));
                $(this.element).data('original-format', start.format('YYYY-MM-DD'));
            });
            $('.datepicker').on('apply.daterangepicker', function(ev, picker) {
                $(this).val(picker.startDate.format('DD-MM-YYYY'));
                $(this).data('original-format', picker.startDate.format('YYYY-MM-DD'));
            });
            $('.datepicker').on('cancel.daterangepicker', function(ev, picker) {
                $(this).val('');
            });
            $('form').on('submit', function() {
                $('.datepicker').each(function() {
                    $(this).val($(this).data('original-format'));
                });
            });
        });

        const bulanNames = [
            'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
            'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
        ];

        function updateInputValue() {
            const input = document.getElementById('noregis');
            const now = new Date();
            const monthIndex = now.getMonth();
            const year = now.getFullYear();
            const currentValue = input.value.trim();
            const currentMonth = bulanNames[monthIndex];
            if (!currentValue.match(/^\d{3}\/[A-Za-z]+\/\d{4}$/)) {
                input.value = (currentValue ? currentValue.split('/')[0] : '00') + '/' + currentMonth + '/' + year;
            }
        }
        window.onload = updateInputValue;
        document.getElementById('noregis').addEventListener('blur', updateInputValue);
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
            var telpInput = document.getElementById('telp');
            var telpEdit = document.getElementById('edit_telp');
            var nikInput = document.getElementById('nik');
            var rtrwInput = document.getElementById('rtrw');
            var rtrwEdit = document.getElementById('edit_rtrw');

            restrictInputToNumbers(telpInput, 13);
            restrictInputToNumbers(telpEdit, 13);
            restrictInputToNumbers(nikInput, 16);
            restrictInputToNumbersAndSlash(rtrwInput, 5);
            restrictInputToNumbersAndSlash(rtrwEdit, 5);
        });
    </script>
@endsection
