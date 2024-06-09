@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <div class="pagetitle">
            <h1>Masa Nifas</h1>
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
                        <h5 class="card-title"></h5>
                        <div class="table-responsive">
                            <table class="table table-bordered table-anc" id="anc-table" style="width:100%">
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
                                            <option value="{{ $ibu->NIK }}">{{ $ibu->NIK }}</option>
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
                ordering: false,
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
                            let deleteUrl = '{{ route('postnatal_care.destroy_nifas', ':id') }}'
                                .replace(
                                    ':id', row.id);
                            return `
                            <div style="display: flex; align-items: center;">
                            <a href="${viewUrl}" class="btn btn-sm btn-primary">
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
            });
        });

        // $('#anc-table').on('click', '.btn-delete', function() {
        //     const id = $(this).data('id');
        //     const url = $(this).data('url');

        //     Swal.fire({
        //         title: 'Apakah Anda yakin?',
        //         text: "Anda tidak akan bisa mengembalikan ini!",
        //         icon: 'warning',
        //         showCancelButton: true,
        //         confirmButtonColor: '#3085d6',
        //         cancelButtonColor: '#d33',
        //         confirmButtonText: 'Ya, hapus!',
        //         cancelButtonText: 'Batal',
        //         showLoaderOnConfirm: true,
        //         preConfirm: () => {
        //             return $.ajax({
        //                 url: url,
        //                 type: 'POST',
        //                 data: {
        //                     _method: 'DELETE',
        //                     _token: '{{ csrf_token() }}'
        //                 },
        //                 error: function(xhr) {
        //                     Swal.fire(
        //                         'Gagal!',
        //                         'Data gagal dihapus.',
        //                         'error'
        //                     );
        //                 }
        //             }).then(response => {
        //                 if (response.success) {
        //                     Swal.fire(
        //                         'Terhapus!',
        //                         'Data telah berhasil dihapus.',
        //                         'success'
        //                     );
        //                     $('.swal2-confirm').remove();
        //                     setTimeout(function() {
        //                         location.reload();
        //                     }, 1000);
        //                 } else {
        //                     Swal.fire(
        //                         'Gagal!',
        //                         'Data gagal dihapus.',
        //                         'error'
        //                     );
        //                 }
        //             });
        //         }
        //     });
        // });
    </script>
@endsection
