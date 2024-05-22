@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <div class="pagetitle">
            <h1>Data Ibu</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">Data Pasien</li>
                    <li class="breadcrumb-item active">Data Ibu</li>
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
                        <h5 class="card-title">Data Pasien Ibu</h5>
                        <div class="table-responsive">
                            <table class="table small" id="ibu-table" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Puskesmas</th>
                                        <th>NIK</th>
                                        <th>No Registrasi Ibu</th>
                                        <th>Nama Ibu</th>
                                        <th>Nama Suami</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Alamat Domisili</th>
                                        <th>Desa</th>
                                        <th>Kabupaten</th>
                                        <th>Pendidikan Ibu/Suami</th>
                                        <th>Pekerjaan_Ibu/Suami</th>
                                        <th>Umur</th>
                                        <th>RT/RW</th>
                                        <th>Kecamatan</th>
                                        <th>Provinsi</th>
                                        <th>Agama</th>
                                        <th>Tgl. Register</th>
                                        <th>Posyandu</th>
                                        <th>Nama Kader</th>
                                        <th>Nama Dukun</th>
                                        <th>Jamkesmas</th>
                                        <th>Gol Darah</th>
                                        <th>Telp/HP</th>
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
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-4 fw-bold" id="ModalInput">Input Data Ibu</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('pasien.store_ibu') }}" method="post" autocomplete="off">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="NIK" class="form-label">NIK</label>
                                <input type="text" class="form-control" id="NIK" name="NIK" maxlength="16"
                                    required>
                            </div>
                            <div class="col-md-4">
                                <label for="puskesmas" class="form-label">Puskesmas</label>
                                <input type="text" class="form-control" id="puskesmas" name="puskesmas" required>
                            </div>
                            <div class="col-md-4">
                                <label for="noregis" class="form-label">Nomer Registrasi Ibu</label>
                                <input type="text" class="form-control" id="noregis" name="noregis" maxlength="13"
                                    required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="nama_ibu" class="form-label">Nama Ibu</label>
                                <input type="text" class="form-control" id="nama_ibu" name="nama_ibu" required>
                            </div>
                            <div class="col-md-6">
                                <label for="nama_suami" class="form-label">Nama Suami</label>
                                <input type="text" class="form-control" id="nama_suami" name="nama_suami" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
                            </div>
                            <div class="col-md-6">
                                <label for="alamat_domisili" class="form-label">Alamat Domisili</label>
                                <input type="text" class="form-control" id="alamat_domisili" name="alamat_domisili"
                                    required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="desa" class="form-label">Desa</label>
                                <input type="text" class="form-control" id="desa" name="desa" required>
                            </div>
                            <div class="col-md-4">
                                <label for="kab" class="form-label">Kabupaten</label>
                                <input type="text" class="form-control" id="kab" name="kab" required>
                            </div>
                            <div class="col-md-4">
                                <label for="pendidikan_ibu_suami" class="form-label">Pendidikan Ibu/Suami</label>
                                <input type="text" class="form-control" id="pendidikan_ibu_suami"
                                    name="pendidikan_ibu_suami" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="pekerjaaan_ibu_suami" class="form-label">Pekerjaan Ibu/Suami</label>
                                <input type="text" class="form-control" id="pekerjaaan_ibu_suami"
                                    name="pekerjaaan_ibu_suami" required>
                            </div>
                            <div class="col-md-4">
                                <label for="umur" class="form-label">Umur</label>
                                <input type="number" class="form-control" id="umur" name="umur" required>
                            </div>
                            <div class="col-md-4">
                                <label for="rtrw" class="form-label">RT/RW</label>
                                <input type="text" class="form-control" id="rtrw" name="rtrw" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="kec" class="form-label">Kecamatan</label>
                                <input type="text" class="form-control" id="kec" name="kec" required>
                            </div>
                            <div class="col-md-4">
                                <label for="prov" class="form-label">Provinsi</label>
                                <input type="text" class="form-control" id="prov" name="prov" required>
                            </div>
                            <div class="col-md-4">
                                <label for="agama" class="form-label">Agama</label>
                                <input type="text" class="form-control" id="agama" name="agama" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="tanggal_reg" class="form-label">Tanggal Register</label>
                                <input type="date" class="form-control" id="tanggal_reg" name="tanggal_reg" required>
                            </div>
                            <div class="col-md-4">
                                <label for="posyandu" class="form-label">Posyandu</label>
                                <input type="text" class="form-control" id="posyandu" name="posyandu" required>
                            </div>
                            <div class="col-md-4">
                                <label for="nama_kader" class="form-label">Nama Kader</label>
                                <input type="text" class="form-control" id="nama_kader" name="nama_kader" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="nama_dukum" class="form-label">Nama Dukun</label>
                                <input type="text" class="form-control" id="nama_dukum" name="nama_dukum" required>
                            </div>
                            <div class="col-md-2">
                                <label for="jamkesmas" class="form-label">Jamkesmas</label>
                                <select class="form-select" id="jamkesmas" name="jamkesmas" required>
                                    <option value="">Pilih Jamkesmas</option>
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <label for="gol_darah" class="form-label">Gol Darah</label>
                                <select class="form-select" id="gol_darah" name="gol_darah" required>
                                    <option value="">Pilih Golongan Darah</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="AB">AB</option>
                                    <option value="O">O</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="telp" class="form-label">Nomer Telp</label>
                                <input type="number" class="form-control" id="telp" name="telp" required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="ModalEdit" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-4 fw-bold" id="ModalEdit">Edit Data Ibu</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editForm" method="post" autocomplete="off">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="edit_puskesmas" class="form-label">Puskesmas</label>
                                <input type="text" class="form-control" id="edit_puskesmas" name="puskesmas"
                                    required>
                            </div>
                            <div class="col-md-4">
                                <label for="edit_NIK" class="form-label">NIK</label>
                                <input type="text" class="form-control" id="edit_NIK" name="NIK" maxlength="16"
                                    required>
                            </div>
                            <div class="col-md-4">
                                <label for="edit_noregis" class="form-label">Nomer Registrasi Ibu</label>
                                <input type="text" class="form-control" id="edit_noregis" name="noregis"
                                    maxlength="13" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="edit_nama_ibu" class="form-label">Nama Ibu</label>
                                <input type="text" class="form-control" id="edit_nama_ibu" name="nama_ibu" required>
                            </div>
                            <div class="col-md-6">
                                <label for="edit_nama_suami" class="form-label">Nama Suami</label>
                                <input type="text" class="form-control" id="edit_nama_suami" name="nama_suami"
                                    required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="edit_tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                <input type="date" class="form-control" id="edit_tanggal_lahir" name="tanggal_lahir"
                                    required>
                            </div>
                            <div class="col-md-6">
                                <label for="edit_alamat_domisili" class="form-label">Alamat Domisili</label>
                                <input type="text" class="form-control" id="edit_alamat_domisili"
                                    name="alamat_domisili" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="edit_desa" class="form-label">Desa</label>
                                <input type="text" class="form-control" id="edit_desa" name="desa" required>
                            </div>
                            <div class="col-md-4">
                                <label for="edit_kab" class="form-label">Kabupaten</label>
                                <input type="text" class="form-control" id="edit_kab" name="kab" required>
                            </div>
                            <div class="col-md-4">
                                <label for="edit_pendidikan_ibu_suami" class="form-label">Pendidikan Ibu/Suami</label>
                                <input type="text" class="form-control" id="edit_pendidikan_ibu_suami"
                                    name="pendidikan_ibu_suami" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="edit_pekerjaaan_ibu_suami" class="form-label">Pekerjaan Ibu/Suami</label>
                                <input type="text" class="form-control" id="edit_pekerjaaan_ibu_suami"
                                    name="pekerjaaan_ibu_suami" required>
                            </div>
                            <div class="col-md-4">
                                <label for="edit_umur" class="form-label">Umur</label>
                                <input type="number" class="form-control" id="edit_umur" name="umur" required>
                            </div>
                            <div class="col-md-4">
                                <label for="edit_rtrw" class="form-label">RT/RW</label>
                                <input type="text" class="form-control" id="edit_rtrw" name="rtrw" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="edit_kec" class="form-label">Kecamatan</label>
                                <input type="text" class="form-control" id="edit_kec" name="kec" required>
                            </div>
                            <div class="col-md-4">
                                <label for="edit_prov" class="form-label">Provinsi</label>
                                <input type="text" class="form-control" id="edit_prov" name="prov" required>
                            </div>
                            <div class="col-md-4">
                                <label for="edit_agama" class="form-label">Agama</label>
                                <input type="text" class="form-control" id="edit_agama" name="agama" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="edit_tanggal_reg" class="form-label">Tanggal Register</label>
                                <input type="date" class="form-control" id="edit_tanggal_reg" name="tanggal_reg"
                                    required>
                            </div>
                            <div class="col-md-4">
                                <label for="edit_posyandu" class="form-label">Posyandu</label>
                                <input type="text" class="form-control" id="edit_posyandu" name="posyandu" required>
                            </div>
                            <div class="col-md-4">
                                <label for="edit_nama_kader" class="form-label">Nama Kader</label>
                                <input type="text" class="form-control" id="edit_nama_kader" name="nama_kader"
                                    required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="edit_nama_dukum" class="form-label">Nama Dukun</label>
                                <input type="text" class="form-control" id="edit_nama_dukum" name="nama_dukum"
                                    required>
                            </div>
                            <div class="col-md-2">
                                <label for="edit_jamkesmas" class="form-label">Jamkesmas</label>
                                <select class="form-select" id="edit_jamkesmas" name="jamkesmas" required>
                                    <option value="">Pilih Jamkesmas</option>
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <label for="edit_gol_darah" class="form-label">Gol Darah</label>
                                <select class="form-select" id="edit_gol_darah" name="gol_darah" required>
                                    <option value="">Pilih Golongan Darah</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="AB">AB</option>
                                    <option value="O">O</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="edit_telp" class="form-label">Nomer Telp</label>
                                <input type="number" class="form-control" id="edit_telp" name="telp" required>
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
            $('#ibu-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('pasien.data_ibu') }}',
                scrollX: true,
                fixedHeader: true,
                columns: [{
                        data: 'puskesmas',
                        name: 'puskesmas'
                    },
                    {
                        data: 'NIK',
                        name: 'NIK'
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
                        name: 'tanggal_lahir'
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
                        data: 'pendidikan_ibu_suami',
                        name: 'pendidikan_ibu_suami'
                    },
                    {
                        data: 'pekerjaaan_ibu_suami',
                        name: 'pekerjaaan_ibu_suami',
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
                        data: 'tanggal_reg',
                        name: 'tanggal_reg'
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
                        data: 'nama_dukum',
                        name: 'nama_dukum'
                    },
                    {
                        data: 'jamkesmas',
                        name: 'jamkesmas'
                    },
                    {
                        data: 'gol_darah',
                        name: 'gol_darah'
                    },
                    {
                        data: 'telp',
                        name: 'telp'
                    }, {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        render: function(data, type, row) {
                            let editUrl = '{{ route('pasien.edit_ibu', ':nik') }}'.replace(':nik',
                                row.NIK);
                            let deleteUrl = '{{ route('pasien.destroy_ibu', ':nik') }}'.replace(
                                ':nik', row.NIK);
                            return `
                    <div style="display: flex; align-items: center;">
                        <button class="btn btn-sm btn-success edit-btn" data-nik="${row.NIK}" data-bs-toggle="modal" data-bs-target="#modalEdit">
                            <i class="bi bi-pencil-fill"></i>
                        </button>
                        <form action="${deleteUrl}" method="POST" style="display:inline; margin-left: 5px;">
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
                    targets: [9,10,11,12,14,15,16,17,18,19,20,21,22], 
                    visible: false
                }]
            });
        });

        $('#ibu-table').on('click', '.edit-btn', function() {
            let nik = $(this).data('nik');
            $.ajax({
                url: '{{ route('pasien.edit_ibu', ':nik') }}'.replace(':nik',
                    nik),
                method: 'GET',
                success: function(data) {
                    $('#edit_NIK').val(data.NIK);
                    $('#edit_puskesmas').val(data.puskesmas);
                    $('#edit_noregis').val(data.noregis);
                    $('#edit_nama_ibu').val(data.nama_ibu);
                    $('#edit_nama_suami').val(data.nama_suami);
                    $('#edit_tanggal_lahir').val(data.tanggal_lahir);
                    $('#edit_alamat_domisili').val(data.alamat_domisili);
                    $('#edit_desa').val(data.desa);
                    $('#edit_kab').val(data.kab);
                    $('#edit_pendidikan_ibu_suami').val(data.pendidikan_ibu_suami);
                    $('#edit_pekerjaaan_ibu_suami').val(data.pekerjaaan_ibu_suami);
                    $('#edit_umur').val(data.umur);
                    $('#edit_rtrw').val(data.rtrw);
                    $('#edit_kec').val(data.kec);
                    $('#edit_prov').val(data.prov);
                    $('#edit_agama').val(data.agama);
                    $('#edit_tanggal_reg').val(data.tanggal_reg);
                    $('#edit_posyandu').val(data.posyandu);
                    $('#edit_nama_kader').val(data.nama_kader);
                    $('#edit_nama_dukum').val(data.nama_dukum);
                    $('#edit_jamkesmas').val(data.jamkesmas);
                    $('#edit_gol_darah').val(data.gol_darah);
                    $('#edit_telp').val(data.telp);
                    $('#edit_kab').val(data.kab);
                    $('#editForm').attr('action', '{{ route('pasien.update_ibu', ':nik') }}'.replace(
                        ':nik', nik));
                    $('#modalEdit').modal('show');
                }
            });
        });
    </script>
@endsection
