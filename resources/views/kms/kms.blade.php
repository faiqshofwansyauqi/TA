@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <div class="pagetitle">
            <h1 style="margin-bottom: 5px">Kartu Menuju Sehat</h1>
            <button type="button" class="btn btn-success btn-custom1" id="btn-plus">
                <i class="bi bi-plus-circle"></i> Tambah
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
                            <table class="table table-bordered table-anc" id="kms-table" style="width:100%">
                                <thead>
                                    <tr>
                                        <th style="text-align: center">No</th>
                                        <th>Nama Anak</th>
                                        <th>Nama Ibu</th>
                                        <th>Jenis Kelamin</th>
                                        <th style="text-align: center">Action</th>
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
        <div class="modal-dialog modal-dialog-scrollable modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-4 fw-bold" id="ModalInput">Input Kartu Menuju Sehat</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('kms.store_kms') }}" method="post" autocomplete="off">
                        @csrf
                        <div class="col-12">
                            <div class="card-body">
                                <h5 class="card-title"></h5>
                                <div class="col-md-12 mb-3">
                                    <label for="id_anak" class="form-label">Nama Anak</label>
                                    <select class="form-control" id="id_anak" name="id_anak" required>
                                        <option value="">Pilih Nama Anak</option>
                                        @foreach ($anaks as $anak)
                                            <option value="{{ $anak->id_anak }}">{{ $anak->nama_anak }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                    <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" required>
                                        <option value="">Pilih Jenis Kelamin</option>
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="id_ibu" class="form-label">Ibu</label>
                                    <select class="form-control" id="id_ibu" name="id_ibu" required>
                                        <option value="">Pilih Ibu</option>
                                        @foreach ($anaks as $anak)
                                            <option value="{{ $anak->ibu->id_ibu }}">{{ $anak->ibu->nama_ibu }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
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

            $(document).ready(function() {
                $('#kms-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ordering: false,
                    ajax: '{{ route('kms.data_kms') }}',
                    scrollX: false,
                    fixedHeader: true,
                    columns: [{
                            data: 'id',
                            name: 'id',
                            render: function(data, type, row, meta) {
                                return '<div style="text-align: center;">' + (meta.row +
                                    meta.settings
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
                            data: 'jenis_kelamin',
                            name: 'jenis_kelamin'
                        },
                        {
                            data: 'action',
                            name: 'action',
                            orderable: false,
                            searchable: false,
                            render: function(data, type, row) {
                                let viewUrl =
                                    '{{ route('kms.show_kms', ':id') }}'.replace(
                                        ':id', row.id);
                                let deleteUrl =
                                    '{{ route('kms.destroy_kms', ':id') }}'
                                    .replace(
                                        ':id', row.id);
                                return `
                            <div style="display: flex; justify-content: center;">
                            <a href="${viewUrl}" class="btn btn-sm btn-dark">
                            <i class="bi bi-eye-fill"></i>
                            </a>
                            <button type="button" class="btn btn-sm btn-danger btn-delete" data-id="${row.id}" data-url="${deleteUrl}" hidden>
                                        <i class="bi bi-trash3-fill"></i>
                                    </button>
                            </div>
                            `;
                            }
                        }
                    ],
                    dom: '<"d-flex justify-content-between align-items-center"lBf>rtip',
                    buttons: [],
                });
            });

            $('#id_anak').change(function() {
                var id_anak = $(this).val();
                $.ajax({
                    url: '{{ route('kms.info_anak', ':id_anak') }}'.replace(':id_anak',
                        id_anak),
                    type: 'GET',
                    success: function(response) {
                        $('#id_ibu').val(response.id_ibu);
                        $('#jenis_kelamin').val(response.jenis_kelamin);
                    },
                    error: function(xhr, status, error) {
                        console.error('Terjadi kesalahan:', error);
                    }
                });
            });
        });
    </script>
@endsection
