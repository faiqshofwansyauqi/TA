@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <div class="pagetitle">
            <h1>Data Anak</h1>
            <br>
            <button type="button" class="btn btn-success" id="btn-plus">
                <i class="bi bi-plus-circle"></i> Tambah
            </button>
        </div>
    </div>


    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Data Pasien Anak</h5>
                        <div class="table-responsive">
                            <table class="table table-bordered table-anc" id="anak-table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal Terdaftar</th>
                                        <th>Nama Anak</th>
                                        <th>Anak Dari Ibu</th>
                                        <th>Usia Anak</th>
                                        <th>TTL</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Anak Ke</th>
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
                    <h1 class="modal-title fs-4 fw-bold" id="ModalInput">Input Data Anak</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('pasien.store_anak') }}" method="post" autocomplete="off">
                        @csrf
                        <div class="mb-3">
                            <label for="tanggal_terdaftar" class="form-label">Tanggal Terdaftar</label>
                            <input type="date" class="form-control" id="tanggal_terdaftar" name="tanggal_terdaftar"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="nama_anak" class="form-label">Nama Anak</label>
                            <input type="text" class="form-control" id="nama_anak" name="nama_anak" required>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="id_ibu" class="form-label">Ibu</label>
                                <select class="form-control" id="id_ibu" name="id_ibu" required>
                                    <option value="">Pilih Ibu</option>
                                    @foreach ($ibus as $ibu)
                                        <option value="{{ $ibu->nama_ibu }}">{{ $ibu->nama_ibu }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="usia_anak" class="form-label">Usia Anak</label>
                                <select class="form-select" id="usia_anak" name="usia_anak" required>
                                    <option value="">Pilih Usia Anak</option>
                                    @for ($i = 1; $i <= 6; $i++)
                                        <option value="{{ $i }}">{{ $i }} tahun</option>
                                    @endfor
                                </select>
                            </div>
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
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                    <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" required>
                                        <option value="">Pilih Jenis Kelamin</option>
                                        <option value="Laki - Laki">Laki - Laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="anak_ke" class="form-label">Anak Ke</label>
                                    <select class="form-select" id="anak_ke" name="anak_ke" required>
                                        <option value="">Pilih Anak Ke</option>
                                        @for ($i = 1; $i <= 6; $i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
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
                    <h1 class="modal-title fs-4 fw-bold" id="ModalEdit">Edit Data Anak</h1>
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
                            <label for="edit_nama_anak" class="form-label">Nama Anak</label>
                            <input type="text" class="form-control" id="edit_nama_anak" name="nama_anak" required>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="edit_id_ibu" class="form-label">Ibu</label>
                                <select class="form-control" id="edit_id_ibu" name="id_ibu" required>
                                    <option value="">Pilih Ibu</option>
                                    @foreach ($ibus as $ibu)
                                        <option value="{{ $ibu->nama_ibu }}">{{ $ibu->nama_ibu }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="edit_usia_anak" class="form-label">Usia Anak</label>
                                <select class="form-select" id="edit_usia_anak" name="usia_anak" required>
                                    <option value="">Pilih Usia Anak</option>
                                    @for ($i = 1; $i <= 6; $i++)
                                        <option value="{{ $i }}">{{ $i }} tahun</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="mb-3 d-flex">
                                <div style="flex: 1; margin-right: 10px;">
                                    <label for="edit_tempat_lahir" class="form-label">Tempat Lahir</label>
                                    <input type="text" class="form-control" id="edit_tempat_lahir"
                                        name="tempat_lahir" required>
                                </div>
                                <div style="flex: 1;">
                                    <label for="edit_tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                    <input type="date" class="form-control" id="edit_tanggal_lahir"
                                        name="tanggal_lahir" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="edit_jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                        <select class="form-select" id="edit_jenis_kelamin" name="jenis_kelamin"
                                            required>
                                            <option value="">Pilih Jenis Kelamin</option>
                                            <option value="Laki - Laki">Laki - Laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="edit_anak_ke" class="form-label">Anak Ke</label>
                                        <select class="form-select" id="edit_anak_ke" name="anak_ke" required>
                                            <option value="">Pilih Anak Ke</option>
                                            @for ($i = 1; $i <= 5; $i++)
                                                <option value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
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

        $(document).ready(function() {
            $('#anak-table').DataTable({
                processing: true,
                serverSide: true,
                ordering: false,
                ajax: '{{ route('pasien.data_anak') }}',
                columns: [{
                        data: 'id_anak',
                        name: 'id_anak',
                        render: function(data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    {
                        data: 'tanggal_terdaftar',
                        name: 'tanggal_terdaftar'
                    },
                    {
                        data: 'nama_anak',
                        name: 'nama_anak'
                    },
                    {
                        data: 'id_ibu',
                        name: 'nama_ibu'
                    },
                    {
                        data: 'usia_anak',
                        name: 'usia_anak',
                        render: function(data, type, row) {
                            return data + ' tahun';
                        }
                    },
                    {
                        data: null,
                        name: 'tempat_tanggal_lahir',
                        render: function(data, type, row) {
                            return row.tempat_lahir + ', ' + row.tanggal_lahir;
                        }
                    },
                    {
                        data: 'jenis_kelamin',
                        name: 'jenis_kelamin'
                    },
                    {
                        data: 'anak_ke',
                        name: 'anak_ke'
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
                            let editUrl = '{{ route('pasien.edit_anak', ':id') }}'.replace(':id',
                                row.id_anak);
                            let deleteUrl = '{{ route('pasien.destroy_anak', ':id') }}'.replace(
                                ':id', row.id_anak);
                            return `
                        <div style="display: flex; align-items: center;">
                            <button class="btn btn-sm btn-success edit-btn" data-id="${row.id_anak}" data-bs-toggle="modal" data-bs-target="#modalEdit">
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


        document.addEventListener('DOMContentLoaded', (event) => {
            const today = new Date().toISOString().split('T')[0];
            document.getElementById('tanggal_terdaftar').value = today;
        });

        $('#anak-table').on('click', '.edit-btn', function() {
            let id = $(this).data('id');
            $.ajax({
                url: '{{ route('pasien.edit_anak', ':id') }}'.replace(':id', id),
                method: 'GET',
                success: function(data) {
                    $('#edit_tanggal_terdaftar').val(data.tanggal_terdaftar);
                    $('#edit_nama_anak').val(data.nama_anak);
                    $('#edit_id_ibu').val(data.id_ibu);
                    $('#edit_usia_anak').val(data.usia_anak);
                    $('#edit_tempat_lahir').val(data.tempat_lahir);
                    $('#edit_tanggal_lahir').val(data.tanggal_lahir);
                    $('#edit_jenis_kelamin').val(data.jenis_kelamin);
                    $('#edit_anak_ke').val(data.anak_ke);
                    $('#edit_gol_darah').val(data.gol_darah);
                    $('#editForm').attr('action', '{{ route('pasien.update_anak', ':id') }}'.replace(
                        ':id', id));
                    $('#modalEdit').modal('show');
                }
            });
        });
    </script>
@endsection
