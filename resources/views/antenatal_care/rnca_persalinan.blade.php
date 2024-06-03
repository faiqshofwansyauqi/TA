@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <div class="pagetitle">
            <h1>Rencana Persalinan</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item">Antenatal Care</li>
                    <li class="breadcrumb-item active">Rencana Persalinan</li>
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
                            <table class="table small" id="rnca-table" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>NIK</th>
                                        <th>Tanggal</th>
                                        <th>Penolong</th>
                                        <th>Pendamping</th>
                                        <th>Tempat</th>
                                        <th>Transportasi</th>
                                        <th>Pendonor</th>
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
        <div class="modal-dialog modal-dialog-scrollable modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title fs-4 fw-bold" id="ModalInput">Input Riwayat Obstetrik, Pemeriksaan Bidan dan
                        Rencana Persalinan</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('antenatal_care.store_rnca') }}" method="post" autocomplete="off">
                        @csrf
                        <div class="row">
                            <div class="card col-11 mx-4 ">
                                <div class="card-body">
                                    <h5 class="card-title">Rencana Persalinan</h5>
                                    <div class="row">
                                        <div class="col-md-4 mb-2">
                                            <label for="NIK" class="form-label">Ibu</label>
                                            <select class="form-control" id="NIK" name="NIK" required>
                                                <option value="">Pilih Ibu</option>
                                                @foreach ($ibus as $ibu)
                                                    <option value="{{ $ibu->nama_ibu }}">{{ $ibu->nama_ibu }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label for="tgl_persalinan" class="form-label">Tanggal Persalinan</label>
                                            <input type="date" class="form-control" id="tgl_persalinan"
                                                name="tgl_persalinan" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 mb-2">
                                            <label for="penolong" class="form-label">Penolong</label>
                                            <select class="form-select" id="penolong" name="penolong" required>
                                                <option value="">Pilih Penolong</option>
                                                <option value="Keluarga">Keluarga</option>
                                                <option value="Dukun">Dukun</option>
                                                <option value="Dr. Umum">Dr. Umum</option>
                                                <option value="Dr. Spesialis">Dr. Spesialis</option>
                                                <option value="Lain-lain">Lain-lain</option>
                                                <option value="Tidak ad">Tidak ad</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 mb-2">
                                            <label for="tempat" class="form-label">Tempat</label>
                                            <select class="form-select" id="tempat" name="tempat" required>
                                                <option value="">Pilih Tempat</option>
                                                <option value="Rumah">Rumah</option>
                                                <option value="Poskesdas">Poskesdas</option>
                                                <option value="Pustu">Pustu</option>
                                                <option value="Puskesmas">Puskesmas</option>
                                                <option value="RB">RB</option>
                                                <option value="RSIA">RSIA</option>
                                                <option value="RS">RS</option>
                                                <option value="RS ODHA">RS ODHA</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 mb-2">
                                            <label for="pendamping" class="form-label">Pendamping</label>
                                            <select class="form-select" id="pendamping" name="pendamping" required>
                                                <option value="">Pilih Pendamping</option>
                                                <option value="Suami">Suami</option>
                                                <option value="Keluarga">Keluarga</option>
                                                <option value="Teman">Teman</option>
                                                <option value="Tetangga">Tetangga</option>
                                                <option value="Lain-lain">Lain-lain</option>
                                                <option value="Tidak ada">Tidak ada</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 mb-2">
                                            <label for="transport" class="form-label">Transportasi</label>
                                            <select class="form-select" id="transport" name="transport" required>
                                                <option value="">Pilih Transportasi</option>
                                                <option value="Motor">Motor</option>
                                                <option value="Mobil">Mobil</option>
                                                <option value="Ambulans">Ambulans</option>
                                                <option value="Umum">Umum</option>
                                                <option value="Lain-lain">Lain-lain</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 mb-2">
                                            <label for="pendonor" class="form-label">Calon donor darah</label>
                                            <select class="form-select" id="pendonor" name="pendonor" required>
                                                <option value="">Pilih Calon donor darah</option>
                                                <option value="Suami">Suami</option>
                                                <option value="Keluarga">Keluarga</option>
                                                <option value="Teman">Teman</option>
                                                <option value="Lain-lain">Lain-lain</option>
                                                <option value="Tidak ada">Tidak ada</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 mb-2">
                                            <label for="pendonor_darah" class="form-label">Gol Darah Pendonor</label>
                                            <select class="form-select" id="pendonor_darah" name="pendonor_darah"
                                                required>
                                                <option value="">Pilih Gol Darah</option>
                                                <option value="A">A</option>
                                                <option value="B">B</option>
                                                <option value="AB">AB</option>
                                                <option value="O">O</option>
                                                <option value="Tidak ada">Tidak ada</option>
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

    <div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="ModalEdit" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title fs-4 fw-bold" id="ModalEdit">Edit Riwayat Obstetrik, Pemeriksaan Bidan dan
                        Rencana Persalinan </h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                    <form id="editForm" method="post" autocomplete="off">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="card col-11 mx-4 ">
                                <div class="card-body">
                                    <h5 class="card-title">Rencana Persalinan</h5>
                                    <div class="row">
                                        <div class="col-md-4 mb-2">
                                            <label for="edit_NIK" class="form-label">Ibu</label>
                                            <select class="form-control" id="edit_NIK" name="NIK" required>
                                                <option value="">Pilih Ibu</option>
                                                @foreach ($ibus as $ibu)
                                                    <option value="{{ $ibu->nama_ibu }}">{{ $ibu->nama_ibu }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label for="edit_tgl_persalinan" class="form-label">Tanggal Persalinan</label>
                                            <input type="date" class="form-control" id="edit_tgl_persalinan"
                                                name="tgl_persalinan" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 mb-2">
                                            <label for="edit_penolong" class="form-label">Penolong</label>
                                            <select class="form-select" id="edit_penolong" name="penolong" required>
                                                <option value="">Pilih Penolong</option>
                                                <option value="Keluarga">Keluarga</option>
                                                <option value="Dukun">Dukun</option>
                                                <option value="Dr. Umum">Dr. Umum</option>
                                                <option value="Dr. Spesialis">Dr. Spesialis</option>
                                                <option value="Lain-lain">Lain-lain</option>
                                                <option value="Tidak ad">Tidak ad</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 mb-2">
                                            <label for="edit_tempat" class="form-label">Tempat</label>
                                            <select class="form-select" id="edit_tempat" name="tempat" required>
                                                <option value="">Pilih Tempat</option>
                                                <option value="Rumah">Rumah</option>
                                                <option value="Poskesdas">Poskesdas</option>
                                                <option value="Pustu">Pustu</option>
                                                <option value="Puskesmas">Puskesmas</option>
                                                <option value="RB">RB</option>
                                                <option value="RSIA">RSIA</option>
                                                <option value="RS">RS</option>
                                                <option value="RS ODHA">RS ODHA</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 mb-2">
                                            <label for="edit_pendamping" class="form-label">Pendamping</label>
                                            <select class="form-select" id="edit_pendamping" name="pendamping" required>
                                                <option value="">Pilih Pendamping</option>
                                                <option value="Suami">Suami</option>
                                                <option value="Keluarga">Keluarga</option>
                                                <option value="Teman">Teman</option>
                                                <option value="Tetangga">Tetangga</option>
                                                <option value="Lain-lain">Lain-lain</option>
                                                <option value="Tidak ada">Tidak ada</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 mb-2">
                                            <label for="edit_transport" class="form-label">Transportasi</label>
                                            <select class="form-select" id="edit_transport" name="transport" required>
                                                <option value="">Pilih Transportasi</option>
                                                <option value="Motor">Motor</option>
                                                <option value="Mobil">Mobil</option>
                                                <option value="Ambulans">Ambulans</option>
                                                <option value="Umum">Umum</option>
                                                <option value="Lain-lain">Lain-lain</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 mb-2">
                                            <label for="edit_pendonor" class="form-label">Calon donor darah</label>
                                            <select class="form-select" id="edit_pendonor" name="pendonor" required>
                                                <option value="">Pilih Calon donor darah</option>
                                                <option value="Suami">Suami</option>
                                                <option value="Keluarga">Keluarga</option>
                                                <option value="Teman">Teman</option>
                                                <option value="Lain-lain">Lain-lain</option>
                                                <option value="Tidak ada">Tidak ada</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 mb-2">
                                            <label for="edit_pendonor_darah" class="form-label">Gol Darah Pendonor</label>
                                            <select class="form-select" id="edit_pendonor_darah" name="pendonor_darah"
                                                required>
                                                <option value="">Pilih Gol Darah</option>
                                                <option value="A">A</option>
                                                <option value="B">B</option>
                                                <option value="AB">AB</option>
                                                <option value="O">O</option>
                                                <option value="Tidak ada">Tidak ada</option>
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

    <div class="modal fade" id="modalView" tabindex="-1" aria-labelledby="modalViewLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-4 fw-bold" id="modalViewLabel">Detail Persalinan</h1>
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
            $('#rnca-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('antenatal_care.data_rnca') }}',
                scrollX: true,
                fixedHeader: true,
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'NIK',
                        name: 'NIK'
                    },
                    {
                        data: 'tgl_persalinan',
                        name: 'tgl_persalinan'
                    },
                    {
                        data: 'penolong',
                        name: 'penolong'
                    },
                    {
                        data: 'pendamping',
                        name: 'pendamping'
                    },
                    {
                        data: 'tempat',
                        name: 'tempat'
                    },
                    {
                        data: 'transport',
                        name: 'transport'
                    },
                    {
                        data: 'pendonor',
                        name: 'pendonor'
                    },
                    {
                        data: 'pendonor_darah',
                        name: 'pendonor_darah'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        render: function(data, type, row) {
                            let viewUrl = '{{ route('antenatal_care.show_rnca', ':id') }}'
                                .replace(':id', row.id);
                            let editUrl = '{{ route('antenatal_care.edit_rnca', ':id') }}'
                                .replace(':id', row.id);
                            let deleteUrl = '{{ route('antenatal_care.destroy_rnca', ':id') }}'
                                .replace(':id', row.id);
                            return `
                            <div style="display: flex; align-items: center;">
                            <button class="btn btn-sm btn-primary view-btn" data-id="${row.id}" data-bs-toggle="modal" data-bs-target="#modalView">
                                <i class="bi bi-eye-fill"></i>
                            </button>
                            <div style="display: flex; align-items: center;">
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
                buttons: [
                    'excel', 'pdf', 'print',
                    {
                        extend: 'colvis',
                        text: 'Column visibility'
                    }
                ],
                columnDefs: [{
                    targets: [],
                    visible: false
                }]
            });
        });

        $('#rnca-table').on('click', '.view-btn', function() {
            let id = $(this).data('id');
            $.ajax({
                url: '{{ route('antenatal_care.show_rnca', ':id') }}'.replace(':id', id),
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
                        return `${day}-${month}-${year}`;
                    }
                    let RencanaPersalinanHtml = `
                    <div class="table-responsive">
                        <h5><strong>Rencana Persalinan</strong></h5>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">Tanggal</th>
                                    <th class="text-center">Penolong</th>
                                    <th class="text-center">Tempat</th>
                                    <th class="text-center">Pendamping</th>
                                    <th class="text-center">Transportasi</th>
                                    <th class="text-center">Pendonor</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center">${formatDate(data.tgl_persalinan)}</td>
                                    <td class="text-center">${data.penolong}</td>
                                    <td class="text-center">${data.tempat}</td>
                                    <td class="text-center">${data.pendamping}</td>
                                    <td class="text-center">${data.transport}</td>
                                    <td class="text-center">${data.pendonor} / ${data.pendonor_darah} </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
            `;

                    let tableHtml = `
                <div class="container mt-3">
                    <div class="row justify-content-center">
                        <div class="col-md-10">
                            ${RencanaPersalinanHtml}
                        </div>
                    </div>
                </div>
            `;
                    $('#modalViewLabel').html(`Detail Persalinan Ibu ${namaIbu}`);
                    $('#modalView .modal-body').html(tableHtml);
                    $('#modalView').modal('show');
                }
            });
        });


        $('#rnca-table').on('click', '.edit-btn', function() {
            let id = $(this).data('id');
            $.ajax({
                url: '{{ route('antenatal_care.edit_rnca', ':id') }}'.replace(':id', id),
                method: 'GET',
                success: function(data) {
                    $('#edit_NIK').val(data.NIK);
                    $('#edit_tgl_persalinan').val(data.tgl_persalinan);
                    $('#edit_penolong').val(data.penolong);
                    $('#edit_tempat').val(data.tempat);
                    $('#edit_pendamping').val(data.pendamping);
                    $('#edit_transport').val(data.transport);
                    $('#edit_pendonor').val(data.pendonor);
                    $('#edit_pendonor_darah').val(data.pendonor_darah);
                    $('#editForm').attr('action', '{{ route('antenatal_care.update_rnca', ':id') }}'
                        .replace(
                            ':id', id));
                    $('#modalEdit').modal('show');
                }
            });
        });
    </script>
@endsection
