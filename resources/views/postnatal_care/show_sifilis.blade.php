@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <div class="pagetitle">
            <h1>Detail Pemantauan Bayi Ibu Sifilis</h1>
            <br>
            <button type="button" class="btn btn-success" id="btn-plus">
                <i class="bi bi-plus-circle"></i> Tambah
            </button>
            @foreach ($sifilis as $item)
                <button type="button" class="btn btn-primary btn-edit" data-id="{{ $item->id }}">
                    <i class="bi bi-pencil-square"></i> Edit
                </button>
            @endforeach
        </div>
    </div>

    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <br>
                        <div class="table-responsive">
                            @if (count($sifilis) > 0)
                                <table class="table table-bordered table-anc">
                                    <thead>
                                        <tr>
                                            <th colspan="3">PEMANTAUAN BAYI DARI IBU SIFILIS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($sifilis as $item)
                                            <tr>
                                                <td>Bayi dari ibu Sifilis dirujuk</td>
                                                <td>Ya / Tidak</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>Bayi &lt;2 tahun diperiksa Sifilis</td>
                                                <td>Ya / Tidak</td>
                                                <td>Hasil: Reaktif/Non Reaktif</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <div class="alert alert-warning" role="alert">
                                    Tidak ada data Pemantauan Bayi Ibu HIV.
                                </div>
                            @endif
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
                    <h3 class="modal-title fs-4 fw-bold" id="ModalInput">Input Pemantauan Bayi Ibu Sifilis</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('postnatal_care.store_showsifilis') }}" method="post" autocomplete="off">
                        @csrf
                        <div class="card col-12">
                            <div class="row d-flex align-items-stretch">
                                <div class="card-body col-md-4 d-flex flex-column" style="padding: 30px;">
                                    <input type="hidden" name="NIK" value="{{ $pb->NIK }}">
                                    <h5 class="card-title" hidden></h5>
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label">Bayi dari ibu sifilis dirujuk</label>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label">Bayi <2 tahun diperiksa sifilis</label>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label">Hasil</label>
                                    </div>
                                    <div class="col-12 mt-auto">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                                <div class="card-body col-md-4 d-flex flex-column" style="padding: 30px;">
                                    <h5 class="card-title" hidden></h5>
                                    <div class="col-md-12 mb-2">
                                        <label for="sifilis_dirujuk" class="form-label" hidden></label>
                                        <select class="form-select" id="sifilis_dirujuk" name="sifilis_dirujuk">
                                            <option value="">Pilih Tiba</option>
                                            <option value="Ya">Ya</option>
                                            <option value="Tidak">Tidak</option>
                                        </select>
                                    </div>
                                    <div class="col-md-12 mb-2">
                                        <label for="periksa_sifilis" class="form-label" hidden></label>
                                        <select class="form-select" id="periksa_sifilis" name="periksa_sifilis">
                                            <option value="">Pilih Tiba</option>
                                            <option value="Ya">Ya</option>
                                            <option value="Tidak">Tidak</option>
                                        </select>
                                    </div>
                                    <div class="col-md-12 mb-2">
                                        <label for="hasil_sifilis" class="form-label" hidden></label>
                                        <select class="form-select" id="hasil_sifilis" name="hasil_sifilis">
                                            <option value="">Pilih Tiba</option>
                                            <option value="Reaktif">Reaktif</option>
                                            <option value="Non Reaktif">Non Reaktif</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="ModalEdit" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title fs-4 fw-bold" id="ModalEdit">Edit Pemantauan Bayi Ibu Sifilis</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                    <form id="editForm" method="post" autocomplete="off">
                        @csrf
                        @method('PUT')
                        <div class="card col-12">
                            <div class="row d-flex align-items-stretch">
                                <div class="card-body col-md-4 d-flex flex-column" style="padding: 30px;">
                                    <input type="hidden" name="NIK" value="{{ $pb->NIK }}">
                                    <h5 class="card-title" hidden></h5>
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label">Bayi dari ibu sifilis dirujuk</label>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label">Bayi <2 tahun diperiksa sifilis</label>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label">Hasil</label>
                                    </div>
                                    <div class="col-12 mt-auto">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                                <div class="card-body col-md-4 d-flex flex-column" style="padding: 30px;">
                                    <h5 class="card-title" hidden></h5>
                                    <div class="col-md-12 mb-2">
                                        <label for="edit_sifilis_dirujuk" class="form-label" hidden></label>
                                        <select class="form-select" id="edit_sifilis_dirujuk" name="sifilis_dirujuk">
                                            <option value="">Pilih Tiba</option>
                                            <option value="Ya">Ya</option>
                                            <option value="Tidak">Tidak</option>
                                        </select>
                                    </div>
                                    <div class="col-md-12 mb-2">
                                        <label for="edit_periksa_sifilis" class="form-label" hidden></label>
                                        <select class="form-select" id="edit_periksa_sifilis" name="periksa_sifilis">
                                            <option value="">Pilih Tiba</option>
                                            <option value="Ya">Ya</option>
                                            <option value="Tidak">Tidak</option>
                                        </select>
                                    </div>
                                    <div class="col-md-12 mb-2">
                                        <label for="edit_hasil_sifilis" class="form-label" hidden></label>
                                        <select class="form-select" id="edit_hasil_sifilis" name="hasil_sifilis">
                                            <option value="">Pilih Tiba</option>
                                            <option value="Reaktif">Reaktif</option>
                                            <option value="Non Reaktif">Non Reaktif</option>
                                        </select>
                                    </div>
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
            function toggleButtons() {
                const tableBody = $('.table-anc tbody');
                const addButton = $('#btn-plus');
                const editButton = $('#btn-edit');

                if (tableBody.children('tr').length > 0) {
                    addButton.hide();
                    editButton.show();
                } else {
                    addButton.show();
                    editButton.hide();
                }
            }

            toggleButtons();
            let modalEdit = $('#modalEdit');
            modalEdit.modal('hide');

            $('#btn-plus').click(function() {
                let modalInput = $('#modalInput');
                modalInput.modal('show');
            });

            $(document).on('click', '.btn-edit', function() {
                var id = $(this).data('id');
                $.ajax({
                    url: '{{ route('postnatal_care.edit_showsifilis', ':id') }}'.replace(':id', id),
                    method: "GET",
                    success: function(data) {
                        $('#modalEdit').modal('show');
                        $('#editForm').attr('action',
                            '{{ route('postnatal_care.update_showsifilis', ':id') }}'
                            .replace(
                                ':id', id));
                        $('#editForm').attr('method', "POST");
                        $('input[name="_method"]').val(
                            'PUT');

                        $('#edit_sifilis_dirujuk').val(data.sifilis_dirujuk);
                        $('#edit_periksa_sifilis').val(data.periksa_sifilis);
                        $('#edit_hasil_sifilis').val(data.hasil_sifilis);
                    }
                });
            });
        });
    </script>
@endsection
