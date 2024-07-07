@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <div class="pagetitle">
            <h1 style="margin-bottom: 5px">Detail Pemantauan Bayi Ibu HIV</h1>
            @foreach ($hivs as $item)
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
                            @if (count($hivs) > 0)
                                <table class="table table-bordered table-anc">
                                    <thead>
                                        <tr>
                                            <th>JENIS PEMANTAUAN</th>
                                            <th style="width: 150px">TANGGAL</th>
                                            <th style="width: 150px">HASIL</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($hivs as $item)
                                            <tr>
                                                <td>Pemberian ARV</td>
                                                <td> {{ $item->tgl_pemberian_arv }}</td>
                                                <td> {{ $item->hasil_pemberian_arv }}</td>
                                            </tr>
                                            <tr>
                                                <td>DBS EID pada usia 6-8 Minggu</td>
                                                <td> {{ $item->tgl_bds }}</td>
                                                <td> {{ $item->hasil_bds }}</td>
                                            </tr>
                                            <tr>
                                                <td>Konfirmasi EID dalam 12 bulan</td>
                                                <td> {{ $item->tgl_konfirmasi_bds }}</td>
                                                <td> {{ $item->hasil_konfirmasi_bds }}</td>
                                            </tr>
                                            <tr>
                                                <td>Pemeriksaan balita terdeteksi HIV (serologis) (Bayi usia >=9 bulan atau
                                                    anak balita)</td>
                                                <td> {{ $item->tgl_pemeriksaan_balita }}</td>
                                                <td> {{ $item->hasil_pemeriksaan_balita }}</td>
                                            </tr>
                                            <tr>
                                                <td>Balita HIV masuk perawatan PDP</td>
                                                <td> {{ $item->tgl_perawatan_pdp }}</td>
                                                <td> {{ $item->hasil_perawatan_pdp }}</td>
                                            </tr>
                                            <tr>
                                                <td>Balita HIV mendapat pengobatan ARV</td>
                                                <td> {{ $item->tgl_pengobatan_arv }}</td>
                                                <td> {{ $item->hasil_pengobatan_arv }}</td>
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

    <div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="ModalEdit" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title fs-4 fw-bold" id="ModalEdit">Edit Pemantauan Bayi Ibu HIV</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                    <form id="editForm" method="post" autocomplete="off">
                        @csrf
                        @method('PUT')
                        <div class="col-12">
                            <div class="row d-flex align-items-stretch">
                                <div class="card-body col-md-4 d-flex flex-column" style="padding: 20px;">
                                    <input type="hidden" name="id_ibu" value="{{ $hiv->id_ibu }}">
                                    <h5 class="card-title">Jenis Pemantauan</h5>
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label">Pemberian ARV</label>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label">DBS EID pada usia 6-8 minggu</label>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label">Konfirmasi EID dalam 12 bulan</label>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label">Pemeriksaan balita terdeteksi HIV (serologis) (Bayi usia
                                            >=9 bulan atau anak balita)</label>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label">Balita HIV masuk perawatan PDP</label>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label">Balita HIV mendapat pengobatan ARV </label>
                                    </div>
                                    <div class="col-12 mt-auto">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                                <div class="card-body col-md-3 d-flex flex-column" style="padding: 20px;">
                                    <h5 class="card-title">Tanggal</h5>
                                    <div class="col-md-12 mb-3">
                                        <label for="edit_tgl_pemberian_arv" class="form-label" hidden>Tanggal Pemberian
                                            ARV</label>
                                        <input type="date" class="form-control" id="edit_tgl_pemberian_arv"
                                            name="tgl_pemberian_arv">
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="edit_tgl_bds" class="form-label" hidden>Tanggal DBS EID</label>
                                        <input type="date" class="form-control" id="edit_tgl_bds" name="tgl_bds">
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="edit_tgl_konfirmasi_bds" class="form-label" hidden>Tanggal Konfirmasi
                                            EID</label>
                                        <input type="date" class="form-control" id="edit_tgl_konfirmasi_bds"
                                            name="tgl_konfirmasi_bds">
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="edit_tgl_pemeriksaan_balita" class="form-label" hidden>Tanggal
                                            Pemeriksaan Balita</label>
                                        <input type="date" class="form-control" id="edit_tgl_pemeriksaan_balita"
                                            name="tgl_pemeriksaan_balita">
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="edit_tgl_perawatan_pdp" class="form-label" hidden>Tanggal Perawatan
                                            PDP</label>
                                        <input type="date" class="form-control" id="edit_tgl_perawatan_pdp"
                                            name="tgl_perawatan_pdp">
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="edit_tgl_pengobatan_arv" class="form-label" hidden>Tanggal Pengobatan
                                            ARV</label>
                                        <input type="date" class="form-control" id="edit_tgl_pengobatan_arv"
                                            name="tgl_pengobatan_arv">
                                    </div>
                                </div>
                                <div class="card-body col-md-3 d-flex flex-column" style="padding: 20px;">
                                    <h5 class="card-title">Hasil</h5>
                                    <div class="col-md-12 mb-3">
                                        <label for="edit_hasil_pemberian_arv" class="form-label" hidden></label>
                                        <input type="text" class="form-control" id="edit_hasil_pemberian_arv"
                                            name="hasil_pemberian_arv">
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="edit_hasil_bds" class="form-label" hidden></label>
                                        <select class="form-select" id="edit_hasil_bds" name="hasil_bds">
                                            <option value="">Pilih Hasil</option>
                                            <option value="Reaktif">Reaktif</option>
                                            <option value="Non Reaktif">Non Reaktif</option>
                                        </select>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="edit_hasil_konfirmasi_bds" class="form-label" hidden></label>
                                        <select class="form-select" id="edit_hasil_konfirmasi_bds"
                                            name="hasil_konfirmasi_bds">
                                            <option value="">Pilih Hasil</option>
                                            <option value="Reaktif">Reaktif</option>
                                            <option value="Non Reaktif">Non Reaktif</option>
                                        </select>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="edit_hasil_pemeriksaan_balita" class="form-label" hidden></label>
                                        <select class="form-select" id="edit_hasil_pemeriksaan_balita"
                                            name="hasil_pemeriksaan_balita">
                                            <option value="">Pilih Hasil</option>
                                            <option value="Reaktif">Reaktif</option>
                                            <option value="Non Reaktif">Non Reaktif</option>
                                        </select>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="edit_hasil_perawatan_pdp" class="form-label" hidden></label>
                                        <input type="text" class="form-control" id="edit_hasil_perawatan_pdp"
                                            name="hasil_perawatan_pdp">
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="edit_hasil_pengobatan_arv" class="form-label" hidden></label>
                                        <input type="text" class="form-control" id="edit_hasil_pengobatan_arv"
                                            name="hasil_pengobatan_arv">
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
            let modalEdit = $('#modalEdit');
            modalEdit.modal('hide');

            $(document).on('click', '.btn-edit', function() {
                var id = $(this).data('id');
                $.ajax({
                    url: '{{ route('postnatal_care.edit_showhiv', ':id') }}'.replace(':id', id),
                    method: "GET",
                    success: function(data) {
                        $('#edit_tanggal_screening_hbsag').val(data.tanggal_screening_hbsag);
                        $('#edit_tgl_pemberian_arv').val(data.tgl_pemberian_arv);
                        $('#edit_hasil_pemberian_arv').val(data.hasil_pemberian_arv);
                        $('#edit_tgl_bds').val(data.tgl_bds);
                        $('#edit_hasil_bds').val(data.hasil_bds);
                        $('#edit_tgl_konfirmasi_bds').val(data.tgl_konfirmasi_bds);
                        $('#edit_hasil_konfirmasi_bds').val(data.hasil_konfirmasi_bds);
                        $('#edit_tgl_pemeriksaan_balita').val(data.tgl_pemeriksaan_balita);
                        $('#edit_hasil_pemeriksaan_balita').val(data.hasil_pemeriksaan_balita);
                        $('#edit_tgl_perawatan_pdp').val(data.tgl_perawatan_pdp);
                        $('#edit_hasil_perawatan_pdp').val(data.hasil_perawatan_pdp);
                        $('#edit_tgl_pengobatan_arv').val(data.tgl_pengobatan_arv);
                        $('#edit_hasil_pengobatan_arv').val(data.hasil_pengobatan_arv);
                        $('#modalEdit').modal('show');
                        $('#editForm').attr('action',
                            '{{ route('postnatal_care.update_showhiv', ':id') }}'
                            .replace(':id', id));
                        $('#editForm').attr('method', "POST");
                        $('input[name="_method"]').val('PUT');
                    }
                });
            });
        });
    </script>
@endsection
