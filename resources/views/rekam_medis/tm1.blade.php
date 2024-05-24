@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <div class="pagetitle">
            <h1>Pemeriksaan Fisik</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">Rekam Medis</li>
                    <li class="breadcrumb-item active">Pemeriksaan Fisik</li>
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
                            <table class="table small" id="tm1-table" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Nama Ibu</th>
                                        <th>Konjungtiva</th>
                                        <th>Sklera</th>
                                        <th>Kulit</th>
                                        <th>Leher</th>
                                        <th>Gigi/Mulut</th>
                                        <th>THT</th>
                                        <th>Jantung</th>
                                        <th>Paru</th>
                                        <th>Perut</th>
                                        <th>Tungkai</th>
                                        <th>GS</th>
                                        <th>CRL</th>
                                        <th>DJJ</th>
                                        <th>Sesuai Usia Kehamilan</th>
                                        <th>Taksiran Persalinan</th>
                                        <th>Skrining Preeklamasi</th>
                                        <th>KESIMPULAN</th>
                                        <th>REKOMENDASI</th>
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
                    <h1 class="modal-title fs-4 fw-bold" id="ModalInput">Input Pemeriksaan Fisik</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('rekam_medis.store_tm1') }}" method="post" autocomplete="off">
                        @csrf
                        <div class="card col-12">
                            <div class="card-body">
                                <h5 class="card-title">Form Pemeriksaan Fisik</h5>
                                <div class="row">
                                    <div class="col-md-4 mb-2">
                                        <label for="NIK" class="form-label">Ibu</label>
                                        <select class="form-control" id="NIK" name="NIK" required>
                                            <option value="">Pilih Ibu</option>
                                            @foreach ($ibus as $ibu)
                                                <option value="{{ $ibu->nama_ibu }}">{{ $ibu->nama_ibu }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <label for="konjungtiva" class="form-label">Konjungtiva</label>
                                        <select class="form-select" id="konjungtiva" name="konjungtiva" required>
                                            <option value="">Pilih Konjungtiva</option>
                                            <option value="Normal">Normal</option>
                                            <option value="Tidak">Tidak</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <label for="sklera" class="form-label">Sklera</label>
                                        <select class="form-select" id="sklera" name="sklera" required>
                                            <option value="">Pilih Sklera</option>
                                            <option value="Normal">Normal</option>
                                            <option value="Tidak">Tidak</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-2">
                                        <label for="kulit" class="form-label">Kulit</label>
                                        <select class="form-select" id="kulit" name="kulit" required>
                                            <option value="">Pilih Kulit</option>
                                            <option value="Normal">Normal</option>
                                            <option value="Tidak">Tidak</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="leher" class="form-label">Leher</label>
                                        <select class="form-select" id="leher" name="leher" required>
                                            <option value="">Pilih Leher</option>
                                            <option value="Normal">Normal</option>
                                            <option value="Tidak">Tidak</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 mb-2">
                                        <label for="gigi_mulut" class="form-label">Gigi/Mulut</label>
                                        <select class="form-select" id="gigi_mulut" name="gigi_mulut" required>
                                            <option value="">Pilih Gigi/Mulut</option>
                                            <option value="Normal">Normal</option>
                                            <option value="Tidak">Tidak</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <label for="tht" class="form-label">THT</label>
                                        <select class="form-select" id="tht" name="tht" required>
                                            <option value="">Pilih THT</option>
                                            <option value="Normal">Normal</option>
                                            <option value="Tidak">Tidak</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <label for="jantung" class="form-label">Jantung</label>
                                        <select class="form-select" id="jantung" name="jantung" required>
                                            <option value="">Pilih Jantung</option>
                                            <option value="Normal">Normal</option>
                                            <option value="Tidak">Tidak</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 mb-2">
                                        <label for="paru" class="form-label">Paru</label>
                                        <select class="form-select" id="paru" name="paru" required>
                                            <option value="">Pilih Paru</option>
                                            <option value="Normal">Normal</option>
                                            <option value="Tidak">Tidak</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <label for="perut" class="form-label">Perut</label>
                                        <select class="form-select" id="perut" name="perut" required>
                                            <option value="">Pilih Perut</option>
                                            <option value="Normal">Normal</option>
                                            <option value="Tidak">Tidak</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <label for="tungkai" class="form-label">Tungkai</label>
                                        <select class="form-select" id="tungkai" name="tungkai" required>
                                            <option value="">Pilih Tungkai</option>
                                            <option value="Normal">Normal</option>
                                            <option value="Tidak">Tidak</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 mb-2">
                                        <label for="gs" class="form-label">GS</label>
                                        <div class="input-group">
                                            <input type="number" class="form-control" id="gs" name="gs"
                                                required>
                                            <span class="input-group-text">Cm</span>
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <label for="crl" class="form-label">CRL</label>
                                        <div class="input-group">
                                            <input type="number" class="form-control" id="crl" name="crl"
                                                required>
                                            <span class="input-group-text">Cm</span>
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <label for="djj" class="form-label">DJJ</label>
                                        <div class="input-group">
                                            <input type="number" class="form-control" id="djj" name="djj"
                                                required>
                                            <span class="input-group-text">dpm</span>
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <label for="usia_kehamilan" class="form-label">Usia Kehamilan</label>
                                        <div class="input-group">
                                            <input type="number" class="form-control" id="usia_kehamilan"
                                                name="usia_kehamilan" required>
                                            <span class="input-group-text">mgg</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-2">
                                        <label for="tkrsn_persalinan" class="form-label">Taksiran Persalinan</label>
                                        <input type="date" class="form-control" id="tkrsn_persalinan"
                                            name="tkrsn_persalinan" required>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="rekomendasi" class="form-label">Rekomendasi</label>
                                        <select class="form-select" id="rekomendasi" name="rekomendasi" required>
                                            <option value="">Pilih Rekomendasi</option>
                                            <option value="ANC dapat dilanjutkan di FKTP">ANC dapat dilanjutkan di FKTP
                                            </option>
                                            <option value="Rujuk FKRTL">Rujuk FKRTL</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label for="skrining" class="form-label">Skrining Preeklamasi</label>
                                    <input type="text" class="form-control" id="skrining" name="skrining" required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="kesimpulan" class="form-label">Kesimpulan</label>
                                    <input type="text" class="form-control" id="kesimpulan" name="kesimpulan"
                                        required>
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
            $('#tm1-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('rekam_medis.data_tm1') }}',
                scrollX: true,
                fixedHeader: true,
                columns: [{
                        data: 'NIK',
                        name: 'NIK'
                    },
                    {
                        data: 'konjungtiva',
                        name: 'konjungtiva'
                    },
                    {
                        data: 'sklera',
                        name: 'sklera'
                    },
                    {
                        data: 'kulit',
                        name: 'kulit'
                    },
                    {
                        data: 'leher',
                        name: 'leher'
                    },
                    {
                        data: 'gigi_mulut',
                        name: 'gigi_mulut'
                    },
                    {
                        data: 'tht',
                        name: 'tht'
                    },
                    {
                        data: 'jantung',
                        name: 'jantung'
                    },
                    {
                        data: 'paru',
                        name: 'paru'
                    },
                    {
                        data: 'perut',
                        name: 'perut'
                    },
                    {
                        data: 'tungkai',
                        name: 'tungkai'
                    },
                    {
                        data: 'gs',
                        name: 'gs',
                        render: function(data, type, row) {
                            return data + ' Cm';
                        }
                    },
                    {
                        data: 'crl',
                        name: 'crl',
                        render: function(data, type, row) {
                            return data + ' Cm';
                        }
                    },
                    {
                        data: 'djj',
                        name: 'djj',
                        render: function(data, type, row) {
                            return data + ' dpm';
                        }
                    },
                    {
                        data: 'usia_kehamilan',
                        name: 'usia_kehamilan',
                        render: function(data, type, row) {
                            return data + ' mgg';
                        }
                    },
                    {
                        data: 'tkrsn_persalinan',
                        name: 'tkrsn_persalinan',
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
                        data: 'skrining',
                        name: 'skrining'
                    },
                    {
                        data: 'kesimpulan',
                        name: 'kesimpulan'
                    },
                    {
                        data: 'rekomendasi',
                        name: 'rekomendasi'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        render: function(data, type, row) {
                            let viewUrl = '{{ route('rekam_medis.show_tm1', ':id') }}'
                                .replace(':id', row.id);
                            let editUrl = '{{ route('rekam_medis.edit_tm1', ':id') }}'
                                .replace(':id', row.id);
                            let deleteUrl = '{{ route('rekam_medis.destroy_tm1', ':id') }}'
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
                    targets: [11, 12, 13, 14, 15, 16, 17, 18],
                    visible: false
                }]
            });
        });
    </script>
@endsection
