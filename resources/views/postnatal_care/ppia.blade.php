@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <div class="pagetitle">
            <h1 style="margin-bottom: 5px">Pemantauan PPIA</h1>
            <div class="header-right">
                <button type="button" class="btn btn-success btn-custom1" id="btn-plus">
                    <i class="bi bi-plus-circle"></i> Tambah
                </button>
                <div id="colvis-button"></div>
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
                            <table class="table table-bordered table-anc" id="ppia-table" style="width:100%">
                                <thead>
                                    <tr>
                                        <th style="text-align: center">No</th>
                                        <th>Nama Ibu</th>
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

    <!-- Modal for Input -->
    <div class="modal fade" id="modalInput" tabindex="-1" aria-labelledby="ModalInput" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-4 fw-bold" id="ModalInput">Input Pemantauan PPIA</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-warning" role="alert" id="pehatikan-message" style="display: none;">
                        Pehatikan! Diisi jika ibu positif PPIA
                    </div>
                    <form action="{{ route('postnatal_care.store_ppia') }}" method="post" autocomplete="off">
                        @csrf
                        <div class="col-12">
                            <div class="card-body">
                                <div class="col-md-12 mb-3">
                                    <label for="id_ibu" class="form-label">Ibu</label>
                                    <select class="form-control" id="id_ibu" name="id_ibu" required>
                                        <option value="">Pilih Ibu</option>
                                        @foreach ($ibus as $anc)
                                            <option value="{{ $anc->ibu->id_ibu }}">{{ $anc->ibu->nama_ibu }}</option>
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
            let pehatikanMessage = $('#pehatikan-message');

            $('#btn-plus').click(function() {
                pehatikanMessage.show();
                modalInput.modal('show');
            });

            let table = $('#ppia-table').DataTable({
                processing: true,
                serverSide: false,
                ordering: false,
                ajax: '{{ route('postnatal_care.data_ppia') }}',
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
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        render: function(data, type, row) {
                            let viewUrl = '{{ route('postnatal_care.show_ppia', ':id') }}'.replace(
                                ':id', row.id);
                            let deleteUrl = '{{ route('postnatal_care.destroy_ppia', ':id') }}'
                                .replace(':id', row.id);
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
                buttons: []
            });
        });
    </script>
@endsection
