@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <div class="pagetitle">
            <h1 style="margin-bottom: 5px">Detail Pemantauan Bayi Ibu Hepatitis B</h1>
            <button type="button" class="btn btn-success btn-custom1" id="btn-plus">
                <i class="bi bi-plus-circle"></i> Tambah
            </button>
            @foreach ($hepatitis as $item)
                <button type="button" class="btn btn-primary btn-edit btn-custom1" data-id="{{ $item->id }}">
                    <i class="ri-edit-2-fill"></i> Edit
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
                            @if (count($hepatitis) > 0)
                                <table class="table table-bordered table-anc">
                                    <thead>
                                        <tr>
                                            <th colspan="3">Tanggal / Jam Pemberian:</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($hepatitis as $item)
                                            <tr>
                                                <td>HBO : {{ $item->hbo }}</td>
                                                <td>HBIG : {{ $item->hbig }}</td>
                                                <td>DPT/HB1 : {{ $item->hb1 }}</td>
                                            </tr>
                                            <tr>
                                                <td>DPT/HB2 : {{ $item->hb2 }}</td>
                                                <td>DPT/HB3 : {{ $item->hb3 }}</td>
                                            </tr>
                                            <tr>
                                                <th colspan="3">Pemeriksaan bayi (9-12 bulan):</th>
                                            </tr>
                                            <tr>
                                                <td>HBsAg</td>
                                                <td>Tanggal : {{ $item->tanggal_hbsag }}</td>
                                                <td>Hasil : {{ $item->hasil_hbsag }}</td>
                                            </tr>
                                            <tr>
                                                <td>Anti HBs</td>
                                                <td>Tanggal : {{ $item->tanggal_antihbs }}</td>
                                                <td>Hasil : {{ $item->hasil_antihbs }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <div class="alert alert-warning" role="alert">
                                    Tidak ada data Pemantauan Bayi Ibu Hepatitis B.
                                </div>
                            @endif
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
                    <h3 class="modal-title fs-4 fw-bold" id="ModalInput">Input Pemantauan Bayi Ibu Hepatitis B</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('postnatal_care.store_showhepatitis') }}" method="post" autocomplete="off">
                        @csrf
                        <div class="card col-12">
                            <div class="card-body">
                                <input type="hidden" name="nama_ibu" value="{{ $pb->nama_ibu }}">
                                <h5 class="card-title">Jam / Tanggal Pemberian</h5>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="hbo" class="form-label">HBO</label>
                                        <input type="datetime-local" class="form-control" id="hbo" name="hbo">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="hbig" class="form-label">HBIG</label>
                                        <input type="datetime-local" class="form-control" id="hbig" name="hbig">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="hb1" class="form-label">DPT/HB1</label>
                                        <input type="datetime-local" class="form-control" id="hb1" name="hb1">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="hb2" class="form-label">DPT/HB2</label>
                                        <input type="datetime-local" class="form-control" id="hb2" name="hb2">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="hb3" class="form-label">DPT/HB3</label>
                                        <input type="datetime-local" class="form-control" id="hb3" name="hb3">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Pemeriksaan Bayi (9 - 12 bulan)</h5>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="tanggal_hbsag" class="form-label">Tanggal HBsAg</label>
                                        <input type="datetime-local" class="form-control" id="tanggal_hbsag"
                                            name="tanggal_hbsag">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="hasil_hbsag" class="form-label">Hasil HBsAg</label>
                                        <select class="form-select" id="hasil_hbsag" name="hasil_hbsag">
                                            <option value="">Pilih Tiba</option>
                                            <option value="Reaktif">Reaktif</option>
                                            <option value="Non Reaktif">Non Reaktif</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="tanggal_antihbs" class="form-label">Tanggal Anti HBs</label>
                                        <input type="datetime-local" class="form-control" id="tanggal_antihbs"
                                            name="tanggal_antihbs">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="hasil_antihbs" class="form-label">Hasil HBsAg</label>
                                        <select class="form-select" id="hasil_antihbs" name="hasil_antihbs">
                                            <option value="">Pilih Tiba</option>
                                            <option value="Reaktif">Reaktif</option>
                                            <option value="Non Reaktif">Non Reaktif</option>
                                        </select>
                                    </div>
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

    <div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="ModalEdit" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title fs-4 fw-bold" id="ModalEdit">Edit Pemantauan Bayi Ibu Hepatitis B</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                    <form id="editForm" method="post" autocomplete="off">
                        @csrf
                        @method('PUT')
                        <div class="card col-12">
                            <div class="card-body">
                                <input type="hidden" name="nama_ibu" value="{{ $pb->nama_ibu }}">
                                <h5 class="card-title">Jam / Tanggal Pemberian</h5>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="edit_hbo" class="form-label">HBO</label>
                                        <input type="datetime-local" class="form-control" id="edit_hbo" name="hbo">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="edit_hbig" class="form-label">HBIG</label>
                                        <input type="datetime-local" class="form-control" id="edit_hbig" name="hbig">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="edit_hb1" class="form-label">DPT/HB1</label>
                                        <input type="datetime-local" class="form-control" id="edit_hb1" name="hb1">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="edit_hb2" class="form-label">DPT/HB2</label>
                                        <input type="datetime-local" class="form-control" id="edit_hb2" name="hb2">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="edit_hb3" class="form-label">DPT/HB3</label>
                                        <input type="datetime-local" class="form-control" id="edit_hb3" name="hb3">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Pemeriksaan Bayi (9 - 12 bulan)</h5>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="edit_tanggal_hbsag" class="form-label">Tanggal HBsAg</label>
                                        <input type="datetime-local" class="form-control" id="edit_tanggal_hbsag"
                                            name="tanggal_hbsag">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="edit_hasil_hbsag" class="form-label">Hasil HBsAg</label>
                                        <select class="form-select" id="edit_hasil_hbsag" name="hasil_hbsag">
                                            <option value="">Pilih Tiba</option>
                                            <option value="Reaktif">Reaktif</option>
                                            <option value="Non Reaktif">Non Reaktif</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="edit_tanggal_antihbs" class="form-label">Tanggal Anti HBs</label>
                                        <input type="datetime-local" class="form-control" id="edit_tanggal_antihbs"
                                            name="tanggal_antihbs">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="edit_hasil_antihbs" class="form-label">Hasil HBsAg</label>
                                        <select class="form-select" id="edit_hasil_antihbs" name="hasil_antihbs">
                                            <option value="">Pilih Tiba</option>
                                            <option value="Reaktif">Reaktif</option>
                                            <option value="Non Reaktif">Non Reaktif</option>
                                        </select>
                                    </div>
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
                    url: '{{ route('postnatal_care.edit_showhepatitis', ':id') }}'.replace(':id', id),
                    method: "GET",
                    success: function(data) {
                        $('#modalEdit').modal('show');
                        $('#editForm').attr('action',
                            '{{ route('postnatal_care.update_showhepatitis', ':id') }}'
                            .replace(
                                ':id', id));
                        $('#editForm').attr('method', "POST");
                        $('input[name="_method"]').val(
                            'PUT'); 
                        $('#edit_hbo').val(data.hbo);
                        $('#edit_hb2').val(data.hb2);
                        $('#edit_hbig').val(data.hbig);
                        $('#edit_hb3').val(data.hb3);
                        $('#edit_hb1').val(data.hb1);
                        $('#edit_tanggal_hbsag').val(data.tanggal_hbsag);
                        $('#edit_hasil_hbsag').val(data.hasil_hbsag);
                        $('#edit_tanggal_antihbs').val(data.tanggal_antihbs);
                        $('#edit_hasil_antihbs').val(data.hasil_antihbs);
                    }
                });
            });
        });
    </script>
@endsection
