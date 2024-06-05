@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <div class="pagetitle">
            <h1>Masa Nifas</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item">Intranatal Care</li>
                    <li class="breadcrumb-item active">Masa Nifas</li>
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
                            <table class="table small" id="anc-table" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Nama Ibu</th>
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
        <div class="modal-dialog modal-dialog-scrollable modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-4 fw-bold" id="ModalInput">Input Masa Nifas</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('postnatal_care.store_nifas') }}" method="post" autocomplete="off">
                        @csrf
                        <div class="card col-12">
                            <div class="card-body">
                                <h5 class="card-title"></h5>
                                <div class="col-md-12 mb-3">
                                    <label for="NIK" class="form-label">Ibu</label>
                                    <select class="form-control" id="NIK" name="NIK" required>
                                        <option value="">Pilih Ibu</option>
                                        @foreach ($ibus as $ibu)
                                            <option value="{{ $ibu->nama_ibu }}">{{ $ibu->nama_ibu }}</option>
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
        });

        $(document).ready(function() {
            $('#anc-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('postnatal_care.data_nifas') }}',
                scrollX: true,
                fixedHeader: true,
                columns: [{
                        data: 'NIK',
                        name: 'NIK'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        render: function(data, type, row) { 
                            let viewUrl = '{{ route('postnatal_care.show_nifas', ':id') }}'.replace(
                                ':id', row.id);                           
                            let deleteUrl = '{{ route('postnatal_care.destroy_nifas', ':id') }}'.replace(
                                ':id', row.id);
                            return `
                            <div style="display: flex; align-items: center;">
                            <a href="${viewUrl}" class="btn btn-sm btn-primary">
                            <i class="bi bi-eye-fill"></i>
                            </a>
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
            });
        });
    </script>
@endsection
