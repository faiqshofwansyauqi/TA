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
                            <table class="table small" id="ibu-table">
                                <thead>
                                    <tr>
                                        <th>ID Ibu</th>
                                        <th>Tanggal Terdaftar</th>
                                        <th>Nama Ibu</th>
                                        <th>Alamat</th>
                                        <th>Usia</th>
                                        <th>Tempat Tanggal Lahir</th>
                                        <th>Nomer Telepon</th>
                                        <th>Golongan Darah</th>
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
                        <div class="mb-3">
                            <label for="tanggal_terdaftar" class="form-label">Tanggal Pendaftaran</label>
                            <input type="date" class="form-control" id="tanggal_terdaftar" name="tanggal_terdaftar"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="nama_ibu" class="form-label">Nama Ibu</label>
                            <input type="text" class="form-control" id="nama_ibu" name="nama_ibu" required>
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea class="form-control" id="alamat" rows="3" name="alamat"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="usia_ibu" class="form-label">Usia Ibu</label>
                            <select class="form-select" id="usia_ibu" name="usia_ibu" required>
                                <option value="">Pilih Usia Ibu</option>
                                @for ($i = 17; $i <= 100; $i++)
                                    <option value="{{ $i }}">{{ $i }} tahun</option>
                                @endfor
                            </select>
                        </div>
                        <div class="mb-3 d-flex">
                            <div style="flex: 1; margin-right: 10px;">
                                <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                                <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" required>
                            </div>
                            <div style="flex: 1;">
                                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="nomer_telepon" class="form-label">Nomer Telepon</label>
                                    <input type="tel" class="form-control" id="nomer_telepon" name="nomer_telepon"
                                        pattern="[0-9]{10,13}" title="Nomer telepon harus terdiri dari 10 hingga 13 angka"
                                        maxlength="13" required>
                                    <small>Contoh: 081234567890</small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="gol_darah" class="form-label">Golongan Darah</label>
                                    <select class="form-select" id="gol_darah" name="gol_darah" required>
                                        <option value="">Pilih Golongan Darah</option>
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="AB">AB</option>
                                        <option value="O">O</option>
                                    </select>
                                </div>
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
                        <div class="mb-3">
                            <label for="edit_tanggal_terdaftar" class="form-label">Tanggal Terdaftar</label>
                            <input type="date" class="form-control" id="edit_tanggal_terdaftar"
                                name="tanggal_terdaftar" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_nama_ibu" class="form-label">Nama Ibu</label>
                            <input type="text" class="form-control" id="edit_nama_ibu" name="nama_ibu" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_alamat" class="form-label">Alamat</label>
                            <textarea class="form-control" id="edit_alamat" rows="3" name="alamat"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="edit_usia_ibu" class="form-label">Usia Ibu</label>
                            <select class="form-select" id="edit_usia_ibu" name="usia_ibu" required>
                                <option value="">Pilih Usia Ibu</option>
                                @for ($i = 17; $i <= 100; $i++)
                                    <option value="{{ $i }}">{{ $i }} tahun</option>
                                @endfor
                            </select>
                        </div>
                        <div class="mb-3 d-flex">
                            <div style="flex: 1; margin-right: 10px;">
                                <label for="edit_tempat_lahir" class="form-label">Tempat Lahir</label>
                                <input type="text" class="form-control" id="edit_tempat_lahir" name="tempat_lahir"
                                    required>
                            </div>
                            <div style="flex: 1;">
                                <label for="edit_tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                <input type="date" class="form-control" id="edit_tanggal_lahir" name="tanggal_lahir"
                                    required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="edit_nomer_telepon" class="form-label">Nomer Telepon</label>
                                    <input type="tel" class="form-control" id="edit_nomer_telepon" name="edit_nomer_telepon"
                                        pattern="[0-9]{10,13}" title="Nomer telepon harus terdiri dari 10 hingga 13 angka"
                                        maxlength="13" required>
                                    <small>Contoh: 081234567890</small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="edit_gol_darah" class="form-label">Golongan Darah</label>
                                    <select class="form-select" id="edit_gol_darah" name="gol_darah" required>
                                        <option value="">Pilih Golongan Darah</option>
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="AB">AB</option>
                                        <option value="O">O</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
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

        document.addEventListener('DOMContentLoaded', (event) => {
            const today = new Date().toISOString().split('T')[0];
            document.getElementById('tanggal_terdaftar').value = today;
        });

        $(document).ready(function() {
            $('#ibu-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('pasien.data_ibu') }}',
                columns: [{
                        data: 'id_ibu',
                        name: 'id_ibu'
                    },
                    {
                        data: 'tanggal_terdaftar',
                        name: 'tanggal_terdaftar'
                    },
                    {
                        data: 'nama_ibu',
                        name: 'nama_ibu'
                    },
                    {
                        data: 'alamat',
                        name: 'alamat'
                    },
                    {
                        data: 'usia_ibu',
                        name: 'usia_ibu',
                        render: function(data, type, row) {
                            return data + ' tahun';
                        }
                    },
                    {
                        data: 'tempat_tanggal_lahir',
                        name: 'tempat_tanggal_lahir'
                    },
                    {
                        data: 'nomer_telepon',
                        name: 'nomer_telepon'
                    },
                    {
                        data: 'gol_darah',
                        name: 'gol_darah'
                    }, {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        render: function(data, type, row) {
                            let editUrl = '{{ route('pasien.edit_ibu', ':id') }}'.replace(':id',
                                row.id_ibu);
                            let deleteUrl = '{{ route('pasien.destroy_ibu', ':id') }}'.replace(
                                ':id', row.id_ibu);
                            return `
                        <div style="display: flex; align-items: center;">
                            <button class="btn btn-sm btn-success edit-btn" data-id="${row.id_ibu}" data-bs-toggle="modal" data-bs-target="#modalEdit">
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
                ]
            });
        });

        $('#ibu-table').on('click', '.edit-btn', function() {
            let id = $(this).data('id');
            $.ajax({
                url: '{{ route('pasien.edit_ibu', ':id') }}'.replace(':id', id),
                method: 'GET',
                success: function(data) {
                    $('#edit_tanggal_terdaftar').val(data.tanggal_terdaftar);
                    $('#edit_nama_ibu').val(data.nama_ibu);
                    $('#edit_usia_ibu').val(data.usia_ibu);
                    $('#edit_alamat').val(data.alamat);
                    $('#edit_tempat_lahir').val(data.tempat_lahir);
                    $('#edit_tanggal_lahir').val(data.tanggal_lahir);
                    $('#edit_nomer_telepon').val(data.nomer_telepon);
                    $('#edit_gol_darah').val(data.gol_darah);
                    $('#editForm').attr('action', '{{ route('pasien.update_ibu', ':id') }}'.replace(
                        ':id', id));
                    $('#modalEdit').modal('show');
                }
            });
        });

        var nomerTeleponInput = document.getElementById('nomer_telepon');
        nomerTeleponInput.addEventListener('input', function() {
            if (nomerTeleponInput.value.length > 13) {
                nomerTeleponInput.value = nomerTeleponInput.value.slice(0, 13);
            }
        });
    </script>
@endsection
