@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <div class="pagetitle">
            <h1 style="margin-bottom: 5px">Data Anak</h1>
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
                            <table class="table" id="anak-table" style="width:100%">
                                <thead>
                                    <tr>
                                        <th style="text-align: center">No</th>
                                        <th>Nama Anak</th>
                                        <th>Nama Ibu</th>
                                        <th>Nama Ayah</th>
                                        <th>Alamat</th>
                                        <th>Kecamatan</th>
                                        <th>Kabupaten</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Lingkar Kepala Bayi</th>
                                        <th>Anak Ke</th>
                                        <th>Berat Bayi</th>
                                        <th>Panjang Bayi</th>
                                        <th>Tanggal Lahir</th>
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
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-4 fw-bold" id="ModalInput">Input Identitas Anak</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('pasien.store_anak') }}" method="post" autocomplete="off">
                        @csrf
                        <div class="col-12">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="nama_anak" class="form-label">Nama Anak</label>
                                        <input type="text" class="form-control" id="nama_anak" name="nama_anak" required>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="id_ibu" class="form-label">Nama Ibu</label>
                                        <select class="form-control" id="id_ibu" name="id_ibu" required>
                                            <option value="">Pilih Ibu</option>
                                            @foreach ($ibus as $persalinan)
                                                <option value="{{ $persalinan->ibu->id_ibu }}">
                                                    {{ $persalinan->ibu->nama_ibu }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="nama_suami" class="form-label">Nama Suami</label>
                                        <input type="text" class="form-control" id="nama_suami" name="nama_suami"
                                            required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="alamat" class="form-label">Alamat</label>
                                        <textarea type="text" class="form-control" id="alamat" name="alamat" required></textarea>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="kec" class="form-label">Kecamatan</label>
                                        <input type="text" class="form-control" id="kec" name="kec" required>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="kab" class="form-label">Kabupaten</label>
                                        <input type="text" class="form-control" id="kab" name="kab" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                        <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" required>
                                            <option value="-">Pilih Jenis Kelamin</option>
                                            <option value="Laki-laki">Laki-laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="lngkr_kpl_bayi" class="form-label">Lingkar Kepala Bayi</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="lngkr_kpl_bayi"
                                                name="lngkr_kpl_bayi" placeholder="input Lingkar Kepala Bayi"
                                                pattern="[0-9,\,]*">
                                            <span class="input-group-text">cm</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="anak_ke" class="form-label">Anak Ke</label>
                                        <select class="form-select" id="anak_ke" name="anak_ke" required>
                                            <option value="">Pilih Anak Ke</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="brt_bayi" class="form-label">Berat Bayi</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="brt_bayi" name="brt_bayi"
                                                placeholder="input Berat Bayi" pattern="[0-9,\,]*">
                                            <span class="input-group-text">gram</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="pnjg_bayi" class="form-label">Panjang Bayi</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="pnjg_bayi" name="pnjg_bayi"
                                                placeholder="input Panjang Bayi" pattern="[0-9,\,]*">
                                            <span class="input-group-text">cm</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="tgl_lahir_bayi" class="form-label">Tanggal Lahir Bayi</label>
                                        <input type="datetime-local" class="form-control" id="tgl_lahir_bayi"
                                            name="tgl_lahir_bayi">
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
                        <div class="col-12">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="nama_anak" class="form-label">Nama Anak</label>
                                        <input type="text" class="form-control" id="edit_nama_anak" name="nama_anak"
                                            required>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="edit_id_ibu" class="form-label">Nama Ibu</label>
                                        <select class="form-control" id="edit_id_ibu" name="id_ibu" required>
                                            @foreach ($ibus as $persalinan)
                                                <option value="{{ $persalinan->ibu->id_ibu }}">
                                                    {{ $persalinan->ibu->nama_ibu }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="edit_nama_suami" class="form-label">Nama Suami</label>
                                        <input type="text" class="form-control" id="edit_nama_suami"
                                            name="nama_suami" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="edit_alamat" class="form-label">Alamat</label>
                                        <textarea type="text" class="form-control" id="edit_alamat" name="alamat" required></textarea>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="edit_kec" class="form-label">Kecamatan</label>
                                        <input type="text" class="form-control" id="edit_kec" name="kec"
                                            required>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="edit_kab" class="form-label">Kabupaten</label>
                                        <input type="text" class="form-control" id="edit_kab" name="kab"
                                            required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="edit_jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                        <select class="form-select" id="edit_jenis_kelamin" name="jenis_kelamin">
                                            <option value="-">Pilih Jenis Kelamin</option>
                                            <option value="Laki-laki">Laki-laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="edit_lngkr_kpl_bayi" class="form-label">Lingkar Kepala Bayi</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="edit_lngkr_kpl_bayi"
                                                name="lngkr_kpl_bayi" placeholder="input Lingkar Kepala Bayi"
                                                pattern="[0-9,\,]*">
                                            <span class="input-group-text">cm</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="edit_anak_ke" class="form-label">Anak Ke</label>
                                        <select class="form-select" id="edit_anak_ke" name="anak_ke">
                                            <option value="">Pilih Anak Ke</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="edit_brt_bayi" class="form-label">Berat Bayi</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="edit_brt_bayi"
                                                name="brt_bayi" placeholder="input Berat Bayi" pattern="[0-9,\,]*">
                                            <span class="input-group-text">gram</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="edit_pnjg_bayi" class="form-label">Panjang Bayi</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="edit_pnjg_bayi"
                                                name="pnjg_bayi" placeholder="input Panjang Bayi" pattern="[0-9,\,]*">
                                            <span class="input-group-text">cm</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="edit_tgl_lahir_bayi" class="form-label">Tanggal Lahir Bayi</label>
                                        <input type="datetime-local" class="form-control" id="edit_tgl_lahir_bayi"
                                            name="tgl_lahir_bayi">
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

            let table = $('#anak-table').DataTable({
                processing: true,
                serverSide: false,
                ordering: false,
                ajax: '{{ route('pasien.data_anak') }}',
                scrollX: false,
                fixedHeader: true,
                columns: [{
                        data: 'id_anak',
                        name: 'id_anak',
                        render: function(data, type, row, meta) {
                            return '<div style="text-align: center;">' + (meta.row + meta.settings
                                ._iDisplayStart + 1) + '</div>';
                        }
                    },
                    {
                        data: 'nama_anak',
                        name: 'nama_anak'
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
                        data: 'alamat',
                        name: 'alamat'
                    },
                    {
                        data: 'kec',
                        name: 'kec'
                    },
                    {
                        data: 'kab',
                        name: 'kab'
                    },
                    {
                        data: 'jenis_kelamin',
                        name: 'jenis_kelamin'
                    },
                    {
                        data: 'lngkr_kpl_bayi',
                        name: 'lngkr_kpl_bayi',
                        render: function(data, type, row) {
                            return data + ' cm';
                        }
                    },
                    {
                        data: 'anak_ke',
                        name: 'anak_ke'
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
                            <div style="display: flex; justify-content: center;">
                                <button class="btn btn-table btn-sm btn-primary edit-btn" data-id="${row.id_anak}" data-bs-toggle="modal" data-bs-target="#modalEdit" style="margin-right: 5px;">
                                    Edit
                                </button>
                                <button class="btn btn-sm btn-danger btn-delete" data-id="${row.id_anak}" data-url="${deleteUrl}" hidden>
                            Hapus
                        </button>
                            </div>
                        `;
                        }
                    }
                ],
                columnDefs: [{
                    // targets: [],
                    targets: [4, 8, 9, 10, 11, 12,],
                    visible: false
                }]
            });
            table.buttons().container().appendTo(
                '#colvis-button');
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
            ];
            inputs.forEach(function(input) {
                var element = document.getElementById(input.id);
                restrictInputToNumbers(element, input.maxLength);
            });
        });


        $('#anak-table').on('click', '.edit-btn', function() {
            let id = $(this).data('id');
            $.ajax({
                url: '{{ route('pasien.edit_anak', ':id') }}'.replace(':id', id),
                method: 'GET',
                success: function(data) {
                    $('#edit_nama_anak').val(data.nama_anak);
                    $('#edit_id_ibu').val(data.id_ibu);
                    $('#edit_nama_suami').val(data.nama_suami);
                    $('#edit_alamat').val(data.alamat);
                    $('#edit_kec').val(data.kec);
                    $('#edit_kab').val(data.kab);
                    $('#edit_jenis_kelamin').val(data.jenis_kelamin);
                    $('#edit_lngkr_kpl_bayi').val(data.lngkr_kpl_bayi);
                    $('#edit_anak_ke').val(data.anak_ke);
                    $('#edit_brt_bayi').val(data.brt_bayi);
                    $('#edit_pnjg_bayi').val(data.pnjg_bayi);
                    $('#edit_tgl_lahir_bayi').val(data.tgl_lahir_bayi);
                    $('#editForm').attr('action', '{{ route('pasien.update_anak', ':id') }}'.replace(
                        ':id', id));
                    $('#modalEdit').modal('show');
                }
            });
        });

        $(document).ready(function() {
            $('#id_ibu').change(function() {
                var id_ibu = $(this).val();
                $('#id_ibu').val('');
                $('#nama_suami').val('');
                $('#alamat').val('');
                $('#kec').val('');
                $('#kab').val('');
                $('#jenis_kelamin').val('');
                $('#lngkr_kpl_bayi').val('');
                $('#brt_bayi').val('');
                $('#tgl_lahir_bayi').val('');
                $('#pnjg_bayi').val('');
                if (id_ibu) {
                    $.ajax({
                        url: '{{ route('pasien.info_ibu', ':id_ibu') }}'.replace(':id_ibu',
                            id_ibu),
                        type: 'GET',
                        dataType: 'json',
                        success: function(response) {
                            if (response.ibu) {
                                $('#id_ibu').val(response.ibu.id_ibu);
                                $('#nama_suami').val(response.ibu.nama_suami);
                                $('#alamat').val(response.ibu.alamat_domisili);
                                $('#kec').val(response.ibu.kec);
                                $('#kab').val(response.ibu.kab);
                            }
                            if (response.persalinan) {
                                $('#jenis_kelamin').val(response.persalinan.jenis_kelamin);
                                $('#lngkr_kpl_bayi').val(response.persalinan.lngkr_kpl_bayi);
                                $('#brt_bayi').val(response.persalinan.brt_bayi);
                                $('#tgl_lahir_bayi').val(response.persalinan.tgl_lahir_bayi);
                                $('#pnjg_bayi').val(response.persalinan.pnjg_bayi);
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error('Error: ', error);
                        }
                    });
                }
            });
        });

        $('#anak-table').on('click', '.btn-delete', function() {
            const id = $(this).data('id');
            const url = $(this).data('url');
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Anda tidak akan bisa mengembalikan ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal',
                showLoaderOnConfirm: true,
                preConfirm: () => {
                    return $.ajax({
                        url: url,
                        type: 'POST',
                        data: {
                            _method: 'DELETE',
                            _token: '{{ csrf_token() }}'
                        },
                        error: function(xhr) {
                            Swal.fire(
                                'Gagal!',
                                'Data gagal dihapus.',
                                'error'
                            );
                        }
                    }).then(response => {
                        if (response.success) {
                            Swal.fire(
                                'Terhapus!',
                                'Data telah berhasil dihapus.',
                                'success'
                            );
                            setTimeout(function() {
                                location.reload();
                            }, 1000);
                        } else {
                            Swal.fire(
                                'Gagal!',
                                'Data gagal dihapus.',
                                'error'
                            );
                        }
                    });
                }
            });
        });
    </script>
@endsection
