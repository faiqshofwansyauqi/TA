@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <div class="pagetitle">
            <h1>Detail Pemantauan PPIA</h1>
            <br>
            <button type="button" class="btn btn-success" id="btn-plus">
                <i class="bi bi-plus-circle"></i> Tambah
            </button>
            @foreach ($ppias as $item)
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
                            @if (count($ppias) > 0)
                                <table class="table table-bordered table-anc">
                                    <thead>
                                        <tr>
                                            <th colspan="4">HASIL DETEKSI DINI</th>
                                        </tr>
                                        <tr>
                                            <th>1. Jenis Screening Test</th>
                                            <th style="text-align: center">Tgl Screening/Test</th>
                                            <th style="text-align: center">Kode Specimen</th>
                                            <th style="text-align: center">Hasil Screening</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($ppias as $item)
                                            <tr>
                                                <td>HBsAg</td>
                                                <td style="text-align: center">{{ $item->tanggal_screening_hbsag }}</td>
                                                <td style="text-align: center">{{ $item->kode_specimen_hbsag }}</td>
                                                <td style="text-align: center">{{ $item->hasil_screening_hbsag }}</td>
                                            </tr>
                                            <tr>
                                                <td>HIV</td>
                                                <td style="text-align: center">{{ $item->tanggal_screening_hiv }}</td>
                                                <td style="text-align: center">{{ $item->kode_specimen_hiv }}</td>
                                                <td style="text-align: center">{{ $item->hasil_screening_hiv }}</td>
                                            </tr>
                                            <tr>
                                                <td>Sifilis</td>
                                                <td style="text-align: center">{{ $item->tanggal_screening_sifilis }}</td>
                                                <td style="text-align: center">{{ $item->kode_specimen_sifilis }}</td>
                                                <td style="text-align: center">{{ $item->hasil_screening_sifilis }}</td>
                                            </tr>
                                            <tr>
                                                <td colspan="5" style="font: bold">2. Ibu Hamil dirujuk untuk tata
                                                    laksana:
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>HIV</td>
                                                <td>Tgl masuk PDP : {{ $item->tgl_masuk_pdp }}</td>
                                                <td colspan="3">Tgl Mulai Arv : {{ $item->tgl_mulai_arv }}</td>
                                            </tr>
                                            <tr>
                                                <td>Sifilis</td>
                                                <td>Ditangani : {{ $item->ditangani_sifilis }}</td>
                                                <td colspan="3">Diobati Adequat : {{ $item->obat_adequat }}</td>
                                            </tr>
                                            <tr>
                                                <td>Hepatitis B</td>
                                                <td>Dirujuk : {{ $item->dirujuk }}</td>
                                                <td colspan="3"></td>
                                            </tr>
                                            <tr>
                                                <td>3. Pasangan mengetahui status HIV:</td>
                                                <td>{{ $item->status_hiv }}</td>
                                                <td colspan="3"></td>
                                            </tr>
                                            <tr>
                                                <td>4. Pasangan diperiksa Sifilis:</td>
                                                <td>{{ $item->periksa_sifilis }}</td>
                                                <td colspan="3"></td>
                                            </tr>
                                            <tr>
                                                <td>5. Faskes Rujukan:</td>
                                                <td colspan="4">{{ $item->faskes_rujukan }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <div class="alert alert-warning" role="alert">
                                    Tidak ada data PPIA.
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
                    <h3 class="modal-title fs-4 fw-bold" id="ModalInput">Input Masa Nifas</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formInput" action="{{ route('postnatal_care.store_showppia') }}" method="post"
                        autocomplete="off">
                        @csrf
                        <div class="row">
                            <div class="col-3 mb-3">
                                <div class="card-body">
                                    <input type="hidden" name="NIK" value="{{ $ppia->NIK }}">
                                    <h5 class="card-title">Tanggal Screening</h5>
                                    <div class="mb-3">
                                        <div class="mb-2">
                                            <label for="tanggal_screening_hbsag" class="form-label">HBsAg</label>
                                            <input type="date" class="form-control" id="tanggal_screening_hbsag"
                                                name="tanggal_screening_hbsag">
                                        </div>
                                        <div class="mb-2">
                                            <label for="tanggal_screening_hiv" class="form-label">HIV</label>
                                            <input type="date" class="form-control" id="tanggal_screening_hiv"
                                                name="tanggal_screening_hiv">
                                        </div>
                                        <div class="mb-2">
                                            <label for="tanggal_screening_sifilis" class="form-label">Sifilis</label>
                                            <input type="date" class="form-control" id="tanggal_screening_sifilis"
                                                name="tanggal_screening_sifilis">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3 mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">Kode Specimen*</h5>
                                    <div class="mb-3">
                                        <div class="mb-2">
                                            <label for="kode_specimen_hbsag" class="form-label">HBsAg</label>
                                            <input type="text" class="form-control" id="kode_specimen_hbsag"
                                                name="kode_specimen_hbsag">
                                        </div>
                                        <div class="mb-2">
                                            <label for="kode_specimen_hiv" class="form-label">HIV</label>
                                            <input type="text" class="form-control" id="kode_specimen_hiv"
                                                name="kode_specimen_hiv">
                                        </div>
                                        <div class="mb-2">
                                            <label for="kode_specimen_sifilis" class="form-label">Sifilis</label>
                                            <input type="text" class="form-control" id="kode_specimen_sifilis"
                                                name="kode_specimen_sifilis">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3 mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">Hasil Screening</h5>
                                    <div class="mb-3">
                                        <div class="mb-2">
                                            <label for="hasil_screening_hbsag" class="form-label">HBsAG</label>
                                            <select class="form-select" id="hasil_screening_hbsag"
                                                name="hasil_screening_hbsag">
                                                <option value="">Pilih Tiba</option>
                                                <option value="Reaktif">Reaktif</option>
                                                <option value="Non Reaktif">Non Reaktif</option>
                                            </select>
                                        </div>
                                        <div class="mb-2">
                                            <label for="hasil_screening_hiv" class="form-label">HIV</label>
                                            <select class="form-select" id="hasil_screening_hiv"
                                                name="hasil_screening_hiv">
                                                <option value="">Pilih Tiba</option>
                                                <option value="Reaktif">Reaktif</option>
                                                <option value="Non Reaktif">Non Reaktif</option>
                                            </select>
                                        </div>
                                        <div class="mb-2">
                                            <label for="hasil_screening_sifilis" class="form-label">Sifilis</label>
                                            <select class="form-select" id="hasil_screening_sifilis"
                                                name="hasil_screening_sifilis">
                                                <option value="">Pilih Tiba</option>
                                                <option value="Reaktif">Reaktif</option>
                                                <option value="Non Reaktif">Non Reaktif</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3 mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">HIV</h5>
                                    <div class="mb-3">
                                        <div class="mb-2">
                                            <label for="tgl_masuk_pdp" class="form-label">Tanggal Masuk PDP</label>
                                            <input type="date" class="form-control" id="tgl_masuk_pdp"
                                                name="tgl_masuk_pdp">
                                        </div>
                                        <div class="mb-2">
                                            <label for="tgl_mulai_arv" class="form-label">Tanggal Mulai ARV</label>
                                            <input type="date" class="form-control" id="tgl_mulai_arv"
                                                name="tgl_mulai_arv">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3 mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">Sifilis</h5>
                                    <div class="mb-3">
                                        <div class="mb-2">
                                            <label for="ditangani_sifilis" class="form-label">Ditangani</label>
                                            <select class="form-select" id="ditangani_sifilis" name="ditangani_sifilis">
                                                <option value="">Pilih Ditangani</option>
                                                <option value="Ya">Ya</option>
                                                <option value="Tidak">Tidak</option>
                                            </select>
                                        </div>
                                        <div class="mb-2">
                                            <label for="obat_adequat" class="form-label">Diobati Adequat</label>
                                            <select class="form-select" id="obat_adequat" name="obat_adequat">
                                                <option value="">Pilih Diobati Adequat</option>
                                                <option value="Ya">Ya</option>
                                                <option value="Tidak">Tidak</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3 mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">Hepatitis B</h5>
                                    <div class="mb-3">
                                        <div class="mb-2">
                                            <label for="dirujuk" class="form-label">Dirujuk</label>
                                            <select class="form-select" id="dirujuk" name="dirujuk">
                                                <option value="">Pilih Dirujuk</option>
                                                <option value="Ya">Ya</option>
                                                <option value="Tidak">Tidak</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-5 mb-3">
                                <div class="card-body">
                                    <div class="mb-3">
                                        <div class="mb-2">
                                            <label for="status_hiv" class="form-label">Pasangan mengetahui status
                                                HIV</label>
                                            <select class="form-select" id="status_hiv" name="status_hiv">
                                                <option value="">Pilih Dirujuk</option>
                                                <option value="Ya">Ya</option>
                                                <option value="Tidak">Tidak</option>
                                            </select>
                                        </div>
                                        <div class="mb-2">
                                            <label for="periksa_sifilis" class="form-label">Pasangan diperiksa
                                                sifilis</label>
                                            <select class="form-select" id="periksa_sifilis" name="periksa_sifilis">
                                                <option value="">Pilih Dirujuk</option>
                                                <option value="Ya">Ya</option>
                                                <option value="Tidak">Tidak</option>
                                            </select>
                                        </div>
                                        <div class="mb-2">
                                            <label for="faskes_rujukan" class="form-label">Faskes Rujukan</label>
                                            <input type="text" class="form-control" id="faskes_rujukan"
                                                name="faskes_rujukan">
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
                    <h3 class="modal-title fs-4 fw-bold" id="ModalEdit">Update ANC</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                    <form id="editForm" method="post" autocomplete="off">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-3 mb-3">
                                <div class="card-body">
                                    <input type="hidden" name="NIK" value="{{ $ppia->NIK }}">
                                    <h5 class="card-title">Tanggal Screening</h5>
                                    <div class="mb-3">
                                        <div class="mb-2">
                                            <label for="edit_tanggal_screening_hbsag" class="form-label">HBsAg</label>
                                            <input type="date" class="form-control" id="edit_tanggal_screening_hbsag"
                                                name="tanggal_screening_hbsag">
                                        </div>
                                        <div class="mb-2">
                                            <label for="edit_tanggal_screening_hiv" class="form-label">HIV</label>
                                            <input type="date" class="form-control" id="edit_tanggal_screening_hiv"
                                                name="tanggal_screening_hiv">
                                        </div>
                                        <div class="mb-2">
                                            <label for="edit_tanggal_screening_sifilis" class="form-label">Sifilis</label>
                                            <input type="date" class="form-control"
                                                id="edit_tanggal_screening_sifilis" name="tanggal_screening_sifilis">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3 mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">Kode Specimen*</h5>
                                    <div class="mb-3">
                                        <div class="mb-2">
                                            <label for="edit_kode_specimen_hbsag" class="form-label">HBsAg</label>
                                            <input type="text" class="form-control" id="edit_kode_specimen_hbsag"
                                                name="kode_specimen_hbsag">
                                        </div>
                                        <div class="mb-2">
                                            <label for="edit_kode_specimen_hiv" class="form-label">HIV</label>
                                            <input type="text" class="form-control" id="edit_kode_specimen_hiv"
                                                name="kode_specimen_hiv">
                                        </div>
                                        <div class="mb-2">
                                            <label for="edit_kode_specimen_sifilis" class="form-label">Sifilis</label>
                                            <input type="text" class="form-control" id="edit_kode_specimen_sifilis"
                                                name="kode_specimen_sifilis">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3 mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">Hasil Screening</h5>
                                    <div class="mb-3">
                                        <div class="mb-2">
                                            <label for="edit_hasil_screening_hbsag" class="form-label">HBsAG</label>
                                            <select class="form-select" id="edit_hasil_screening_hbsag"
                                                name="hasil_screening_hbsag">
                                                <option value="">Pilih Tiba</option>
                                                <option value="Reaktif">Reaktif</option>
                                                <option value="Non Reaktif">Non Reaktif</option>
                                            </select>
                                        </div>
                                        <div class="mb-2">
                                            <label for="edit_hasil_screening_hiv" class="form-label">HIV</label>
                                            <select class="form-select" id="edit_hasil_screening_hiv"
                                                name="hasil_screening_hiv">
                                                <option value="">Pilih Tiba</option>
                                                <option value="Reaktif">Reaktif</option>
                                                <option value="Non Reaktif">Non Reaktif</option>
                                            </select>
                                        </div>
                                        <div class="mb-2">
                                            <label for="edit_hasil_screening_sifilis" class="form-label">Sifilis</label>
                                            <select class="form-select" id="edit_hasil_screening_sifilis"
                                                name="hasil_screening_sifilis">
                                                <option value="">Pilih Tiba</option>
                                                <option value="Reaktif">Reaktif</option>
                                                <option value="Non Reaktif">Non Reaktif</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3 mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">HIV</h5>
                                    <div class="mb-3">
                                        <div class="mb-2">
                                            <label for="edit_tgl_masuk_pdp" class="form-label">Tanggal Masuk PDP</label>
                                            <input type="date" class="form-control" id="edit_tgl_masuk_pdp"
                                                name="tgl_masuk_pdp">
                                        </div>
                                        <div class="mb-2">
                                            <label for="edit_tgl_mulai_arv" class="form-label">Tanggal Mulai ARV</label>
                                            <input type="date" class="form-control" id="edit_tgl_mulai_arv"
                                                name="tgl_mulai_arv">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3 mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">Sifilis</h5>
                                    <div class="mb-3">
                                        <div class="mb-2">
                                            <label for="edit_ditangani_sifilis" class="form-label">Ditangani</label>
                                            <select class="form-select" id="edit_ditangani_sifilis"
                                                name="ditangani_sifilis">
                                                <option value="">Pilih Ditangani</option>
                                                <option value="Ya">Ya</option>
                                                <option value="Tidak">Tidak</option>
                                            </select>
                                        </div>
                                        <div class="mb-2">
                                            <label for="edit_obat_adequat" class="form-label">Diobati Adequat</label>
                                            <select class="form-select" id="edit_obat_adequat" name="obat_adequat">
                                                <option value="">Pilih Diobati Adequat</option>
                                                <option value="Ya">Ya</option>
                                                <option value="Tidak">Tidak</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3 mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">Hepatitis B</h5>
                                    <div class="mb-3">
                                        <div class="mb-2">
                                            <label for="edit_dirujuk" class="form-label">Dirujuk</label>
                                            <select class="form-select" id="edit_dirujuk" name="dirujuk">
                                                <option value="">Pilih Dirujuk</option>
                                                <option value="Ya">Ya</option>
                                                <option value="Tidak">Tidak</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-5 mb-3">
                                <div class="card-body">
                                    <div class="mb-3">
                                        <div class="mb-2">
                                            <label for="edit_status_hiv" class="form-label">Pasangan mengetahui status
                                                HIV</label>
                                            <select class="form-select" id="edit_status_hiv" name="status_hiv">
                                                <option value="">Pilih Dirujuk</option>
                                                <option value="Ya">Ya</option>
                                                <option value="Tidak">Tidak</option>
                                            </select>
                                        </div>
                                        <div class="mb-2">
                                            <label for="edit_periksa_sifilis" class="form-label">Pasangan diperiksa
                                                sifilis</label>
                                            <select class="form-select" id="edit_periksa_sifilis" name="periksa_sifilis">
                                                <option value="">Pilih Dirujuk</option>
                                                <option value="Ya">Ya</option>
                                                <option value="Tidak">Tidak</option>
                                            </select>
                                        </div>
                                        <div class="mb-2">
                                            <label for="edit_faskes_rujukan" class="form-label">Faskes Rujukan</label>
                                            <input type="text" class="form-control" id="edit_faskes_rujukan"
                                                name="faskes_rujukan">
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

            // Pastikan modal edit disembunyikan
            let modalEdit = $('#modalEdit');
            modalEdit.modal('hide'); // Pastikan modal edit disembunyikan secara default

            $('#btn-plus').click(function() {
                let modalInput = $('#modalInput');
                modalInput.modal('show');
            });

            // Open modal for editing existing data
            // Menggunakan event delegation untuk tombol edit
            $(document).on('click', '.btn-edit', function() {
                var id = $(this).data('id'); // Get the ID from data-id attribute
                $.ajax({
                    url: '{{ route('postnatal_care.edit_showppia', ':id') }}'.replace(':id', id),
                    method: "GET",
                    success: function(data) {
                        $('#modalEdit').modal('show'); // Show the modal
                        $('#editForm').attr('action',
                            '{{ route('postnatal_care.update_showppia', ':id') }}'
                            .replace(
                                ':id', id));
                        $('#editForm').attr('method', "POST"); // Set the method to POST
                        $('input[name="_method"]').val(
                            'PUT'); // Set the hidden method input to PUT

                        // Fill the form with the data
                        $('#edit_tanggal_screening_hbsag').val(data.tanggal_screening_hbsag);
                        $('#edit_tanggal_screening_hiv').val(data.tanggal_screening_hiv);
                        $('#edit_tanggal_screening_sifilis').val(data
                            .tanggal_screening_sifilis);
                        $('#edit_kode_specimen_hbsag').val(data.kode_specimen_hbsag);
                        $('#edit_kode_specimen_hiv').val(data.kode_specimen_hiv);
                        $('#edit_kode_specimen_sifilis').val(data.kode_specimen_sifilis);
                        $('#edit_hasil_screening_hbsag').val(data.hasil_screening_hbsag);
                        $('#edit_hasil_screening_hiv').val(data.hasil_screening_hiv);
                        $('#edit_hasil_screening_sifilis').val(data.hasil_screening_sifilis);
                        $('#edit_tgl_masuk_pdp').val(data.tgl_masuk_pdp);
                        $('#edit_tgl_mulai_arv').val(data.tgl_mulai_arv);
                        $('#edit_ditangani_sifilis').val(data.ditangani_sifilis);
                        $('#edit_obat_adequat').val(data.obat_adequat);
                        $('#edit_dirujuk').val(data.dirujuk);
                        $('#edit_status_hiv').val(data.status_hiv);
                        $('#edit_periksa_sifilis').val(data.periksa_sifilis);
                        $('#edit_faskes_rujukan').val(data.faskes_rujukan);
                    }
                });
            });
        });
    </script>
@endsection
