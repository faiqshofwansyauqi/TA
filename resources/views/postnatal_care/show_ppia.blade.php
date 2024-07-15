@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center">
    <div class="pagetitle">
        <h1 style="margin-bottom: 5px">Detail Pemantauan PPIA</h1>
        @foreach ($ppias as $item)
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
                        @if (count($ppias) > 0)
                        <table class="table table-borderless table-anc">
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
                                    <td colspan="5" style="font: bold">2. Ibu Hamil dirujuk untuk tata laksana:</td>
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
                                    <td colspan="4">3. Pasangan mengetahui status HIV: {{ $item->status_hiv }}</td>
                                </tr>
                                <tr>
                                    <td colspan="4">4. Pasangan diperiksa Sifilis: {{ $item->periksa_sifilis }}</td>
                                </tr>
                                <tr>
                                    <td colspan="4">5. Faskes Rujukan: {{ $item->faskes_rujukan }}</td>
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

<div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="ModalEdit" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title fs-4 fw-bold" id="ModalEdit">Edit Detail Pemantauan PPIA</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>
            <div class="modal-body">
                <form id="editForm" method="post" autocomplete="off">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-3 mb-3">
                            <div class="card-body">
                                <input type="hidden" name="nama_ibu" value="{{ $ppia->nama_ibu }}">
                                <h5 class="card-title">Tanggal Screening</h5>
                                <div class="mb-3">
                                    <div class="mb-2">
                                        <label for="edit_tanggal_screening_hbsag" class="form-label">HBsAg</label>
                                        <input type="date" class="form-control" id="edit_tanggal_screening_hbsag"
                                            name="tanggal_screening_hbsag" required>
                                    </div>
                                    <div class="mb-2">
                                        <label for="edit_tanggal_screening_hiv" class="form-label">HIV</label>
                                        <input type="date" class="form-control" id="edit_tanggal_screening_hiv"
                                            name="tanggal_screening_hiv" required>
                                    </div>
                                    <div class="mb-2">
                                        <label for="edit_tanggal_screening_sifilis" class="form-label">Sifilis</label>
                                        <input type="date" class="form-control"
                                            id="edit_tanggal_screening_sifilis" name="tanggal_screening_sifilis" readonly>
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
                                            name="kode_specimen_hbsag" required>
                                    </div>
                                    <div class="mb-2">
                                        <label for="edit_kode_specimen_hiv" class="form-label">HIV</label>
                                        <input type="text" class="form-control" id="edit_kode_specimen_hiv"
                                            name="kode_specimen_hiv" required>
                                    </div>
                                    <div class="mb-2">
                                        <label for="edit_kode_specimen_sifilis" class="form-label">Sifilis</label>
                                        <input type="text" class="form-control" id="edit_kode_specimen_sifilis"
                                            name="kode_specimen_sifilis" required>
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
                                            name="hasil_screening_hbsag" required>
                                            <option value="">Pilih Hasil Screening HBsAG</option>
                                            <option value="Reaktif">Reaktif</option>
                                            <option value="Non Reaktif">Non Reaktif</option>
                                        </select>
                                    </div>
                                    <div class="mb-2">
                                        <label for="edit_hasil_screening_hiv" class="form-label">HIV</label>
                                        <select class="form-select" id="edit_hasil_screening_hiv"
                                            name="hasil_screening_hiv" required>
                                            <option value="">Pilih Hasil Screening HIV</option>
                                            <option value="Reaktif">Reaktif</option>
                                            <option value="Non Reaktif">Non Reaktif</option>
                                        </select>
                                    </div>
                                    <div class="mb-2">
                                        <label for="edit_hasil_screening_sifilis" class="form-label">Sifilis</label>
                                        <select class="form-select" id="edit_hasil_screening_sifilis"
                                            name="hasil_screening_sifilis" required>
                                            <option value="">Pilih Hasil Screening Sifilis</option>
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
                                            name="tgl_masuk_pdp" required>
                                    </div>
                                    <div class="mb-2">
                                        <label for="edit_tgl_mulai_arv" class="form-label">Tanggal Mulai ARV</label>
                                        <input type="date" class="form-control" id="edit_tgl_mulai_arv"
                                            name="tgl_mulai_arv" required>
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
                                            <option value="">Pilih Status HIV</option>
                                            <option value="Ya">Ya</option>
                                            <option value="Tidak">Tidak</option>
                                        </select>
                                    </div>
                                    <div class="mb-2">
                                        <label for="edit_periksa_sifilis" class="form-label">Pasangan diperiksa
                                            sifilis</label>
                                        <select class="form-select" id="edit_periksa_sifilis" name="periksa_sifilis">
                                            <option value="">Pilih Periksa Sifilis</option>
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
        let modalEdit = $('#modalEdit');
        modalEdit.modal('hide');

        $(document).on('click', '.btn-edit', function() {
            var id = $(this).data('id');
            $.ajax({
                url: '{{ route('postnatal_care.edit_showppia', ':id') }}'.replace(':id', id),
                method: "GET",
                success: function(data) {
                    console.log(data);
                    $('#modalEdit').modal('show');
                    $('#editForm').attr('action', '{{ route('postnatal_care.update_showppia', ':id') }}'.replace(':id', id));
                    $('#editForm').attr('method', "POST");
                    $('input[name="_method"]').val('PUT');
                    $('#edit_tanggal_screening_hbsag').val(data.tanggal_screening_hbsag);
                    $('#edit_tanggal_screening_hiv').val(data.tanggal_screening_hiv);
                    $('#edit_tanggal_screening_sifilis').val(data.tanggal_screening_sifilis);
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
                },
                error: function(error) {
                    console.error("An error occurred:", error);
                }
            });
        });
    });
</script>
@endsection
