@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <div class="pagetitle">
            <h1>Pemeriksaan PNC</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">Rekam Medis</li>
                    <li class="breadcrumb-item active">PNC</li>
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
                            <table class="table small" id="pnc-table">
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
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-4 fw-bold" id="ModalInput">Input Periksaan PNC</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('rekam_medis.store_pnc') }}" method="post" autocomplete="off">
                        @csrf
                        <div class="row">
                            <div class="col-md-4 mb-2">
                                <label for="id_ibu" class="form-label">Ibu</label>
                                <select class="form-control" id="id_ibu" name="id_ibu" required>
                                    <option value="">Pilih Ibu</option>
                                    @foreach ($ibus as $ibu)
                                        <option value="{{ $ibu->nama_ibu }}">{{ $ibu->nama_ibu }}</option>
                                    @endforeach
                                </select>
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
            $('#pnc-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('rekam_medis.data_pnc') }}',
                columns: [{
                        data: 'id_ibu',
                        name: 'id_ibu'
                    },
                    {
                        data: 'id_ibu',
                        render: function(data) {
                            return '<button class="btn btn-sm btn-info detail-pnc" data-id="' +
                                data + '">Detail</button>';
                        }
                    }
                ]
            });

            $(document).on('click', '.detail-pnc', function() {
                var idIbu = $(this).data('id');

                window.location.href = '{{ route('rekam_medis.detail_pnc') }}?id_ibu=' + idIbu;
            });
        });
    </script>
@endsection
