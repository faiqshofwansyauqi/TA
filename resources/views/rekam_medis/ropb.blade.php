@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <div class="pagetitle">
            <h1>Riwayat Obstetrik dan Pemeriksaan Bidan</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">Rekam Medis</li>
                    <li class="breadcrumb-item active">Riwayat Obstetrik dan Pemeriksaan Bidan</li>
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
                            <table class="table small" id="ropb-table" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Nama Ibu</th>
                                        <th>Gravida</th>
                                        <th>Pertus</th>
                                        <th>Abortus</th>
                                        <th>Hidup</th>
                                        <th>Riwayat Komplikasi</th>
                                        <th>Penyakit</th>
                                        <th>Tanggal Periksa</th>
                                        <th>Tanggal HPHT</th>
                                        <th>Taksiran Persalinan</th>
                                        <th>Persalinan Sebelumnya</th>
                                        <th>Berat Badan</th>
                                        <th>Tinggi Badan</th>
                                        <th>Buku KIA</th>
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
        <div class="modal-dialog modal-dialog-scrollable modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-4 fw-bold" id="ModalInput">Input Riwayat Obstetrik dan Pemeriksaan Bidan</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('rekam_medis.store_ropb') }}" method="post" autocomplete="off">
                        @csrf
                        <div class="row">
                            <div class="card col-5 mx-5 ">
                                <div class="card-body">
                                    <h5 class="card-title">Riwayat Obstetrik</h5>
                                    <div class="row">
                                        <div class="col-md-12 mb-2">
                                            <label for="NIK" class="form-label">Ibu</label>
                                            <select class="form-control" id="NIK" name="NIK" required>
                                                <option value="">Pilih Ibu</option>
                                                @foreach ($ibus as $ibu)
                                                    <option value="{{ $ibu->nama_ibu }}">{{ $ibu->nama_ibu }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-2">
                                            <label for="gravida" class="form-label">Gravida</label>
                                            <input type="number" class="form-control" id="gravida" name="gravida"
                                                required>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="partus" class="form-label">Partus</label>
                                            <input type="number" class="form-control" id="partus" name="partus"
                                                required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-2">
                                            <label for="abortus" class="form-label">Abortus</label>
                                            <input type="number" class="form-control" id="abortus" name="abortus"
                                                required>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="hidup" class="form-label">Hidup</label>
                                            <input type="number" class="form-control" id="hidup" name="hidup"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-2">
                                        <label for="rwyt_komplikasi" class="form-label">Riwayat Komplikasi Kebidanan</label>
                                        <input type="text" class="form-control" id="rwyt_komplikasi"
                                            name="rwyt_komplikasi" required>
                                    </div>
                                    <div class="col-md-12 mb-2">
                                        <label for="pnykt_kronis_alergi" class="form-label">Penyakit Kronis dan
                                            Alergi</label>
                                        <input type="text" class="form-control" id="pnykt_kronis_alergi"
                                            name="pnykt_kronis_alergi" required>
                                    </div>
                                </div>
                            </div>
                            <div class="card col-5">
                                <div class="card-body">
                                    <h5 class="card-title">Pemeriksaan Bidan</h5>
                                    <div class="row">
                                        <div class="col-md-6 mb-2">
                                            <label for="tgl_periksa" class="form-label">Tanggal Periksa</label>
                                            <input type="date" class="form-control" id="tgl_periksa"
                                                name="tgl_periksa" required>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="tgl_hpht" class="form-label">Tanggal HPHT</label>
                                            <input type="date" class="form-control" id="tgl_hpht" name="tgl_hpht"
                                                required>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="tksrn_persalinan" class="form-label">Taksiran Persalinan</label>
                                            <input type="date" class="form-control" id="tksrn_persalinan"
                                                name="tksrn_persalinan" required>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="prlnan_sebelum" class="form-label">Persalinan Sebelumnya</label>
                                            <input type="date" class="form-control" id="prlnan_sebelum"
                                                name="prlnan_sebelum" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-2">
                                            <label for="berat_badan" class="form-label">Berat Badan</label>
                                            <div class="input-group mb-2">
                                                <input type="number" class="form-control" id="berat_badan"
                                                    name="berat_badan" required>
                                                <span class="input-group-text">Kg</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="tinggi_badan" class="form-label">Berat Tinggi</label>
                                            <div class="input-group mb-2">
                                                <input type="number" class="form-control" id="tinggi_badan"
                                                    name="tinggi_badan" required>
                                                <span class="input-group-text">Cm</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-2">
                                        <label for="buku_kia" class="form-label">Buku KIA</label>
                                        <select class="form-select" id="buku_kia" name="buku_kia" required>
                                            <option value="">Pilih Keadaan Ibu</option>
                                            <option value="Memiliki">Memiliki</option>
                                            <option value="Tidak">Tidak</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="card col-11 mx-4 ">
                                <div class="card-body">
                                    <h5 class="card-title">Rencana Persalinan</h5>
                                    <div class="row">
                                        <div class="col-md-12 mb-2">
                                            <label for="tgl_persalinan" class="form-label">Tanggal Persalinan</label>
                                            <input type="date" class="form-control" id="tgl_persalinan"
                                                name="tgl_persalinan" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-2">
                                            <label for="penolong" class="form-label">Penolong</label>
                                            <select class="form-select" id="penolong" name="penolong" required>
                                                <option value="">Pilih Penolong</option>
                                                <option value="Keluarga">Keluarga</option>
                                                <option value="Dukun">Dukun</option>
                                                <option value="Dr. Umum">Dr. Umum</option>
                                                <option value="Dr. Spesialis">Dr. Spesialis</option>
                                                <option value="Lain-lain">Lain-lain</option>
                                                <option value="Tidak ad">Tidak ad</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="tempat" class="form-label">Tempat</label>
                                            <select class="form-select" id="tempat" name="tempat" required>
                                                <option value="">Pilih Tempat</option>
                                                <option value="Rumah">Rumah</option>
                                                <option value="Poskesdas">Poskesdas</option>
                                                <option value="Pustu">Pustu</option>
                                                <option value="Puskesmas">Puskesmas</option>
                                                <option value="RB">RB</option>
                                                <option value="RSIA">RSIA</option>
                                                <option value="RS">RS</option>
                                                <option value="RS ODHA">RS ODHA</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-2">
                                            <label for="pendamping" class="form-label">Pendamping</label>
                                            <select class="form-select" id="pendamping" name="pendamping" required>
                                                <option value="">Pilih Pendamping</option>
                                                <option value="Suami">Suami</option>
                                                <option value="Keluarga">Keluarga</option>
                                                <option value="Teman">Teman</option>
                                                <option value="Tetangga">Tetangga</option>
                                                <option value="Lain-lain">Lain-lain</option>
                                                <option value="Tidak ada">Tidak ada</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="transport" class="form-label">Transportasi</label>
                                            <select class="form-select" id="transport" name="transport" required>
                                                <option value="">Pilih Transportasi</option>
                                                <option value="Motor">Motor</option>
                                                <option value="Mobil">Mobil</option>
                                                <option value="Ambulans">Ambulans</option>
                                                <option value="Umum">Umum</option>
                                                <option value="Lain-lain">Lain-lain</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-2">
                                        <label for="pendonor" class="form-label">Calon donor darah</label>
                                        <select class="form-select" id="pendonor" name="pendonor" required>
                                            <option value="">Pilih Calon donor darah</option>
                                            <option value="Suami">Suami</option>
                                            <option value="Keluarga">Keluarga</option>
                                            <option value="Teman">Teman</option>
                                            <option value="Lain-lain">Lain-lain</option>
                                            <option value="Tidak ada">Tidak ada</option>
                                        </select>
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
                    <h1 class="modal-title fs-4 fw-bold" id="ModalEdit">Edit Persalinan</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                    <form id="editForm" method="post" autocomplete="off">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="card col-md-5 mx-5">
                                <div class="card-body">
                                    <h5 class="card-title">Riwayat Obstetrik</h5>
                                    <div class="row">
                                        <div class="col-md-12 mb-2">
                                            <label for="edit_NIK" class="form-label">Ibu</label>
                                            <select class="form-control" id="edit_NIK" name="NIK" required>
                                                <option value="">Pilih Ibu</option>
                                                @foreach ($ibus as $ibu)
                                                    <option value="{{ $ibu->nama_ibu }}">{{ $ibu->nama_ibu }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-2">
                                            <label for="edit_gravida" class="form-label">Gravida</label>
                                            <input type="number" class="form-control" id="edit_gravida" name="gravida"
                                                required>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="edit_partus" class="form-label">Partus</label>
                                            <input type="number" class="form-control" id="edit_partus" name="partus"
                                                required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-2">
                                            <label for="edit_abortus" class="form-label">Abortus</label>
                                            <input type="number" class="form-control" id="edit_abortus" name="abortus"
                                                required>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="edit_hidup" class="form-label">Hidup</label>
                                            <input type="number" class="form-control" id="edit_hidup" name="hidup"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-2">
                                        <label for="edit_rwyt_komplikasi" class="form-label">Riwayat Komplikasi
                                            Kebidanan</label>
                                        <input type="text" class="form-control" id="edit_rwyt_komplikasi"
                                            name="rwyt_komplikasi" required>
                                    </div>
                                    <div class="col-md-12 mb-2">
                                        <label for="edit_pnykt_kronis_alergi" class="form-label">Penyakit Kronis dan
                                            Alergi</label>
                                        <input type="text" class="form-control" id="edit_pnykt_kronis_alergi"
                                            name="pnykt_kronis_alergi" required>
                                    </div>
                                </div>
                            </div>
                            <div class="card col-5">
                                <div class="card-body">
                                    <h5 class="card-title">Pemeriksaan Bidan</h5>
                                    <div class="row">
                                        <div class="col-md-6 mb-2">
                                            <label for="edit_tgl_periksa" class="form-label">Tanggal Periksa</label>
                                            <input type="date" class="form-control" id="edit_tgl_periksa"
                                                name="tgl_periksa" required>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="edit_tgl_hpht" class="form-label">Tanggal HPHT</label>
                                            <input type="date" class="form-control" id="edit_tgl_hpht"
                                                name="tgl_hpht" required>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="edit_tksrn_persalinan" class="form-label">Taksiran
                                                Persalinan</label>
                                            <input type="date" class="form-control" id="edit_tksrn_persalinan"
                                                name="tksrn_persalinan" required>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="edit_prlnan_sebelum" class="form-label">Persalinan
                                                Sebelumnya</label>
                                            <input type="date" class="form-control" id="edit_prlnan_sebelum"
                                                name="prlnan_sebelum" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-2">
                                            <label for="edit_berat_badan" class="form-label">Berat Badan</label>
                                            <div class="input-group mb-2">
                                                <input type="number" class="form-control" id="edit_berat_badan"
                                                    name="berat_badan" required>
                                                <span class="input-group-text">Kg</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="edit_tinggi_badan" class="form-label">Berat Tinggi</label>
                                            <div class="input-group mb-2">
                                                <input type="number" class="form-control" id="edit_tinggi_badan"
                                                    name="tinggi_badan" required>
                                                <span class="input-group-text">Cm</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-2">
                                        <label for="edit_buku_kia" class="form-label">Buku KIA</label>
                                        <select class="form-select" id="edit_buku_kia" name="buku_kia" required>
                                            <option value="">Pilih Keadaan Ibu</option>
                                            <option value="Memiliki">Memiliki</option>
                                            <option value="Tidak">Tidak</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="card col-11 mx-4 ">
                                <div class="card-body">
                                    <h5 class="card-title">Rencana Persalinan</h5>
                                    <div class="row">
                                        <div class="col-md-12 mb-2">
                                            <label for="edit_tgl_persalinan" class="form-label">Tanggal Persalinan</label>
                                            <input type="date" class="form-control" id="edit_tgl_persalinan"
                                                name="tgl_persalinan" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-2">
                                            <label for="edit_penolong" class="form-label">Penolong</label>
                                            <select class="form-select" id="edit_penolong" name="penolong" required>
                                                <option value="">Pilih Penolong</option>
                                                <option value="Keluarga">Keluarga</option>
                                                <option value="Dukun">Dukun</option>
                                                <option value="Dr. Umum">Dr. Umum</option>
                                                <option value="Dr. Spesialis">Dr. Spesialis</option>
                                                <option value="Lain-lain">Lain-lain</option>
                                                <option value="Tidak ad">Tidak ad</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="edit_tempat" class="form-label">Tempat</label>
                                            <select class="form-select" id="edit_tempat" name="tempat" required>
                                                <option value="">Pilih Tempat</option>
                                                <option value="Rumah">Rumah</option>
                                                <option value="Poskesdas">Poskesdas</option>
                                                <option value="Pustu">Pustu</option>
                                                <option value="Puskesmas">Puskesmas</option>
                                                <option value="RB">RB</option>
                                                <option value="RSIA">RSIA</option>
                                                <option value="RS">RS</option>
                                                <option value="RS ODHA">RS ODHA</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-2">
                                            <label for="edit_pendamping" class="form-label">Pendamping</label>
                                            <select class="form-select" id="edit_pendamping" name="pendamping" required>
                                                <option value="">Pilih Pendamping</option>
                                                <option value="Suami">Suami</option>
                                                <option value="Keluarga">Keluarga</option>
                                                <option value="Teman">Teman</option>
                                                <option value="Tetangga">Tetangga</option>
                                                <option value="Lain-lain">Lain-lain</option>
                                                <option value="Tidak ada">Tidak ada</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="edit_transport" class="form-label">Transportasi</label>
                                            <select class="form-select" id="edit_transport" name="transport" required>
                                                <option value="">Pilih Transportasi</option>
                                                <option value="Motor">Motor</option>
                                                <option value="Mobil">Mobil</option>
                                                <option value="Ambulans">Ambulans</option>
                                                <option value="Umum">Umum</option>
                                                <option value="Lain-lain">Lain-lain</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-2">
                                        <label for="edit_pendonor" class="form-label">Calon donor darah</label>
                                        <select class="form-select" id="edit_pendonor" name="pendonor" required>
                                            <option value="">Pilih Calon donor darah</option>
                                            <option value="Suami">Suami</option>
                                            <option value="Keluarga">Keluarga</option>
                                            <option value="Teman">Teman</option>
                                            <option value="Lain-lain">Lain-lain</option>
                                            <option value="Tidak ada">Tidak ada</option>
                                        </select>
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

    <div class="modal fade" id="modalView" tabindex="-1" aria-labelledby="modalViewLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-4 fw-bold" id="modalViewLabel">Detail Persalinan</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table" id="detailTable">
                        <thead>
                            <tr>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
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
            $('#ropb-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('rekam_medis.data_ropb') }}',
                scrollX: true,
                fixedHeader: true,
                columns: [{
                        data: 'NIK',
                        name: 'NIK'
                    },
                    {
                        data: 'gravida',
                        name: 'gravida'
                    },
                    {
                        data: 'partus',
                        name: 'partus'
                    },
                    {
                        data: 'abortus',
                        name: 'abortus'
                    },
                    {
                        data: 'hidup',
                        name: 'hidup'
                    },
                    {
                        data: 'rwyt_komplikasi',
                        name: 'rwyt_komplikasi'
                    },
                    {
                        data: 'pnykt_kronis_alergi',
                        name: 'pnykt_kronis_alergi'
                    },
                    {
                        data: 'tgl_periksa',
                        name: 'tgl_periksa',
                        render: function(data) {
                            var date = new Date(data);
                            var day = date.getDate();
                            var month = date.getMonth() + 1;
                            var year = date.getFullYear();
                            if (day < 10) {
                                day = '0' + day;
                            }
                            if (month < 10) {
                                month = '0' + month;
                            }
                            return day + ' - ' + month + ' - ' + year;
                        }
                    },
                    {
                        data: 'tgl_hpht',
                        name: 'tgl_hpht',
                        render: function(data) {
                            var date = new Date(data);
                            var day = date.getDate();
                            var month = date.getMonth() + 1;
                            var year = date.getFullYear();
                            if (day < 10) {
                                day = '0' + day;
                            }
                            if (month < 10) {
                                month = '0' + month;
                            }
                            return day + ' - ' + month + ' - ' + year;
                        }
                    },
                    {
                        data: 'tksrn_persalinan',
                        name: 'tksrn_persalinan',
                        render: function(data) {
                            var date = new Date(data);
                            var day = date.getDate();
                            var month = date.getMonth() + 1;
                            var year = date.getFullYear();
                            if (day < 10) {
                                day = '0' + day;
                            }
                            if (month < 10) {
                                month = '0' + month;
                            }
                            return day + ' - ' + month + ' - ' + year;
                        }
                    },
                    {
                        data: 'prlnan_sebelum',
                        name: 'prlnan_sebelum',
                        render: function(data) {
                            var date = new Date(data);
                            var day = date.getDate();
                            var month = date.getMonth() + 1;
                            var year = date.getFullYear();
                            if (day < 10) {
                                day = '0' + day;
                            }
                            if (month < 10) {
                                month = '0' + month;
                            }
                            return day + ' - ' + month + ' - ' + year;
                        }
                    },
                    {
                        data: 'berat_badan',
                        name: 'berat_badan',
                        render: function(data, type, row) {
                            return data + ' Kg';
                        }
                    },
                    {
                        data: 'tinggi_badan',
                        name: 'tinggi_badan',
                        render: function(data, type, row) {
                            return data + ' Cm';
                        }
                    },
                    {
                        data: 'buku_kia',
                        name: 'buku_kia'
                    }, {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        render: function(data, type, row) {
                            let viewUrl = '{{ route('rekam_medis.show_ropb', ':id') }}'
                                .replace(':id', row.id);
                            let editUrl = '{{ route('rekam_medis.edit_ropb', ':id') }}'
                                .replace(':id', row.id);
                            let deleteUrl = '{{ route('rekam_medis.destroy_ropb', ':id') }}'
                                .replace(':id', row.id);
                            return `
                            <div style="display: flex; align-items: center;">
                            <button class="btn btn-sm btn-primary view-btn" data-id="${row.id}" data-bs-toggle="modal" data-bs-target="#modalView">
                                <i class="bi bi-eye-fill"></i>
                            </button>
                            <div style="display: flex; align-items: center;">
                            <button class="btn btn-sm btn-success edit-btn" data-id="${row.id}" data-bs-toggle="modal" data-bs-target="#modalEdit">
                            <i class="bi bi-pencil-fill"></i>
                            </button>
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
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print',
                    {
                        extend: 'colvis',
                        text: 'Column visibility'
                    }
                ],
                columnDefs: [{
                    targets: [8, 9, 10, 11, 12, 13],
                    visible: false
                }]
            });
        });

        $('#ropb-table').on('click', '.view-btn', function() {
            let id = $(this).data('id');
            $.ajax({
                url: '{{ route('rekam_medis.show_ropb', ':id') }}'.replace(':id', id),
                method: 'GET',
                success: function(data) {
                    let namaIbu = data.ibu.nama_ibu;
                    function formatDate(dateString) {
                        if (!dateString) return '';
                        if (isNaN(new Date(dateString))) return 'Invalid date format';
                        const date = new Date(dateString);
                        const year = date.getFullYear();
                        const month = String(date.getMonth() + 1).padStart(2, '0');
                        const day = String(date.getDate()).padStart(2, '0');
                        return `${day}-${month}-${year}`;
                    }
                    let RiwayatObstetrikHtml = `
                    <div class="table-responsive">
                        <h5><strong>Riwayat Obstetrik</strong></h5>
                        <table class="table table-borderless">
                            <thead>
                            </thead>
                            <tbody>
                                <tr>
                                    <td >Gravida</td>
                                    <td >${data.gravida}</td>
                                </tr>
                                <tr>
                                    <td>Partus</td>
                                    <td>${data.partus}</td>
                                </tr>
                                <tr>
                                    <td>Abortus</td>
                                    <td>${data.abortus}</td>
                                </tr>
                                <tr>
                                    <td>Hidup</td>
                                    <td>${data.hidup}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
            `;    
                let RiwayatObstetrikLanjutHtml = `
                    <div>
                        <p>Riwayat Komplikasi Kebidanan: ${data.rwyt_komplikasi}</p>                    
                        <p>Penyakit Kronis dan Alergi: ${data.pnykt_kronis_alergi}</p>
                    </div>
                        
            `;    
                    let PemeriksaanBidanHtml = `
                    <div class="table-responsive">
                        <h5><strong>Pemeriksaan Bidan</strong></h5>
                        <table class="table table-borderless">
                            <thead>                                
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Tanggal Periksa</td>
                                    <td>${formatDate(data.tgl_periksa)}</td>
                                    <td>BB Sebelum Hamil</td>
                                    <td>${data.berat_badan} Kg</td>
                                </tr>
                                <tr>
                                    <td>Tanggal HPHT</td>
                                    <td>${formatDate(data.tgl_hpht)}</td>
                                    <td>Tinggi Badan</td>
                                    <td>${data.tinggi_badan} Cm</td>
                                </tr>
                                <tr>
                                    <td>Taksiran Persalinan</td>
                                    <td>${formatDate(data.tksrn_persalinan)}</td>
                                    <td>Buku Kia</td>
                                    <td>${data.buku_kia}</td>
                                </tr>
                                <tr>
                                    <td>Persalinan Sebelumnya</td>
                                    <td>${formatDate(data.prlnan_sebelum)}</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
            `;
                    let RencanaPersalinanHtml = `
                    <div class="table-responsive">
                        <h5><strong>Rencana Persalinan</strong></h5>
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Penolong</th>
                                    <th>Tempat</th>
                                    <th>Pendamping</th>
                                    <th>Transportasi</th>
                                    <th>Pendonor</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>${formatDate(data.tgl_persalinan)}</td>
                                    <td>${data.penolong}</td>
                                    <td>${data.tempat}</td>
                                    <td>${data.pendamping}</td>
                                    <td>${data.transport}</td>
                                    <td>${data.pendonor}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
            `;

                    let tableHtml = `
                    <div class="container">
                    <div class="row justify-content-between"> <!-- Mengatur posisi horizontal ke kanan kiri -->
                        <div class="col-md-4">
                            ${RiwayatObstetrikHtml}                
                        </div>
                        <div class="col-md-8">
                            ${PemeriksaanBidanHtml}
                        </div>
                        <div class="col-md-8">
                            ${RiwayatObstetrikLanjutHtml}                
                        </div>
                    </div>
                </div>
                <div class="container mt-3">
                    <div class="row justify-content-center"> <!-- Mengatur posisi horizontal ke tengah -->
                        <div class="col-md-10">
                            ${RencanaPersalinanHtml}
                        </div>
                    </div>
                </div>
            `;
                    $('#modalViewLabel').html(`Detail Persalinan Ibu ${namaIbu}`);
                    $('#modalView .modal-body').html(tableHtml);
                    $('#modalView').modal('show');
                }
            });
        });


        $('#ropb-table').on('click', '.edit-btn', function() {
            let id = $(this).data('id');
            $.ajax({
                url: '{{ route('rekam_medis.edit_ropb', ':id') }}'.replace(':id', id),
                method: 'GET',
                success: function(data) {
                    $('#edit_NIK').val(data.NIK);
                    $('#edit_gravida').val(data.gravida);
                    $('#edit_partus').val(data.partus);
                    $('#edit_abortus').val(data.abortus);
                    $('#edit_hidup').val(data.hidup);
                    $('#edit_rwyt_komplikasi').val(data.rwyt_komplikasi);
                    $('#edit_pnykt_kronis_alergi').val(data.pnykt_kronis_alergi);
                    $('#edit_tgl_periksa').val(data.tgl_periksa);
                    $('#edit_tgl_hpht').val(data.tgl_hpht);
                    $('#edit_tksrn_persalinan').val(data.tksrn_persalinan);
                    $('#edit_prlnan_sebelum').val(data.prlnan_sebelum);
                    $('#edit_berat_badan').val(data.berat_badan);
                    $('#edit_tinggi_badan').val(data.tinggi_badan);
                    $('#edit_penolong').val(data.penolong);
                    $('#edit_cara_persalinan').val(data.cara_persalinan);
                    $('#edit_buku_kia').val(data.buku_kia);
                    $('#edit_tgl_persalinan').val(data.tgl_persalinan);
                    $('#edit_penolong').val(data.penolong);
                    $('#edit_tempat').val(data.tempat);
                    $('#edit_pendamping').val(data.pendamping);
                    $('#edit_transport').val(data.transport);
                    $('#edit_pendonor').val(data.pendonor);
                    $('#editForm').attr('action', '{{ route('rekam_medis.update_ropb', ':id') }}'
                        .replace(
                            ':id', id));
                    $('#modalEdit').modal('show');
                }
            });
        });
    </script>
@endsection
