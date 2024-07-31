@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <div class="pagetitle">
            <h1 style="margin-bottom: 5px">Detail Kartu Menuju Sehat</h1>
            <button type="button" class="btn btn-success btn-sm" id="btn-plus" style="margin-right: 10px">
                Tambah
            </button>
        </div>
    </div>

    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <canvas id="kmsChart" width="2446.88" height="800.11" style="margin-bottom: 20px;"></canvas>
                            <table class="table table-borderless table-anc" id="kms-table" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Umur (Bulan)</th>
                                        @for ($i = 0; $i <= 60; $i++)
                                            <th style="text-align: center;">{{ $i }}</th>
                                        @endfor
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th style="vertical-align: middle;">Bulan penimbangan</th>
                                        @foreach ($kmss as $kms)
                                            <td>
                                                <div
                                                    style="text-align: center; transform: rotate(180deg); writing-mode: vertical-rl;">
                                                    {{ $kms->bulan_penimbangan }}
                                                </div>
                                            </td>
                                        @endforeach
                                        @for ($i = count($kmss); $i <= 60; $i++)
                                            <td></td>
                                        @endfor
                                    </tr>
                                    <tr>
                                        <th>BB (kg)</th>
                                        @foreach ($kmss as $kms)
                                            <td style="text-align: center">{{ $kms->berat_badan }}</td>
                                        @endforeach
                                        @for ($i = count($kmss); $i <= 60; $i++)
                                            <td></td>
                                        @endfor
                                    </tr>
                                    <tr>
                                        <th>KBM (gr)</th>
                                        <td></td>
                                        <td>800</td>
                                        <td>900</td>
                                        <td>800</td>
                                        <td>600</td>
                                        <td>500</td>
                                        <td colspan="2" style="text-align: center">400</td>
                                        <td colspan="4" style="text-align: center">300</td>
                                        <td colspan="49" style="text-align: center">200</td>
                                    </tr>
                                    <tr>
                                        <th>N/T</th>
                                        @foreach ($kmss as $kms)
                                            <td style="text-align: center">{{ $kms->nt }}</td>
                                        @endforeach
                                        @for ($i = count($kmss); $i <= 60; $i++)
                                            <td></td>
                                        @endfor
                                    </tr>
                                    <tr id="asi-eks-row">
                                        <th>ASI Eksklusif</th>
                                        @foreach ($kmss as $index => $kms)
                                            @if ($index <= 6)
                                                <td style="text-align: center">{!! $kms->asi_eksklusif == 'jika iya' ? '&#10003;' : '&#10007;' !!}</td>
                                            @endif
                                        @endforeach
                                        @for ($i = count($kmss); $i <= 6; $i++)
                                            <td></td>
                                        @endfor
                                    </tr>
                                </tbody>
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
                    <h1 class="modal-title fs-4 fw-bold" id="ModalInput">Input Detail Kartu Menuju Sehat</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('kms.store_show_kms') }}" method="post" autocomplete="off">
                        @csrf
                        <div class="col-12">
                            <div class="card-body">
                                <input type="hidden" name="id_anak" value="{{ $kms->id_anak }}">
                                <input type="hidden" name="id_ibu" value="{{ $kms->id_ibu }}">
                                <div class="mb-3">
                                    <label for="bulan_penimbangan">Bulan penimbangan</label>
                                    <input type="date" class="form-control" id="bulan_penimbangan"
                                        name="bulan_penimbangan">
                                </div>
                                <div class="mb-3">
                                    <label for="berat_badan">BB (kg)</label>
                                    <input type="number" class="form-control" id="berat_badan" name="berat_badan"
                                        step="any">
                                </div>
                                <div class="mb-3">
                                    <label for="nt" class="form-label">N/T</label>
                                    <select class="form-select" id="nt" name="nt">
                                        <option value="-">Pilih N/T</option>
                                        <option value="N">Naik</option>
                                        <option value="T">Turun</option>
                                        <option value="TT">Tetap</option>
                                    </select>
                                </div>
                                <div class="mb-3" id="asi-eks-group">
                                    <label for="asi_eksklusif" class="form-label">Asi Eksklusif</label>
                                    <select class="form-select" id="asi_eksklusif" name="asi_eksklusif">
                                        <option value="-">Pilih Asi Eksklusif</option>
                                        <option value="jika iya">&#10003; <!-- Ceklis --></option>
                                        <option value="jika tidak">&#10007; <!-- Uncek --></option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
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
            let asiEksGroup = $('#asi-eks-group');
            let asiEksInput = $('#asi_eksklusif');

            function checkAndHideAsiEksklusif() {
                let asiEksRow = $('#asi-eks-row');
                let dataCount = asiEksRow.find('td:contains("✓"), td:contains("✗")').length;
                console.log("Jumlah data ASI Eksklusif: ", dataCount);

                if (dataCount >= 7) {
                    asiEksGroup.hide();
                    asiEksInput.val('').prop('disabled', true);
                    console.log("ASI Eksklusif disembunyikan");
                } else {
                    asiEksGroup.show();
                    asiEksInput.prop('disabled', false);
                    console.log("ASI Eksklusif ditampilkan");
                }
            }
            checkAndHideAsiEksklusif();
            $('#btn-plus').click(function() {
                checkAndHideAsiEksklusif();
                modalInput.modal('show');
            });
            $('#kms-table').on('draw.dt', function() {
                checkAndHideAsiEksklusif();
            });

            const labels = [];
            const data = [];


            $('#kms-table thead tr th').each(function(index, element) {
                if (index > 0) {
                    labels.push($(element).text());
                }
            });
            console.log('Labels:', labels);

            $('#kms-table tbody tr:nth-child(2) td').each(function(tdIndex, tdElement) {
                const value = $(tdElement).text();
                data.push(value ? parseFloat(value) : null);
            });

            console.log('Data:', data);
            const ctx = document.getElementById('kmsChart').getContext('2d');
            const kmsChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Berat Badan (kg)',
                        data: data,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 0,
                        fill: false
                    }]
                },
                options: {
                    responsive: false,
                    plugins: {
                        zoom: {
                            pan: {
                                enabled: true,
                                mode: 'x',
                            },
                        }
                    },
                    scales: {
                        x: {
                            title: {
                                display: true,
                                text: 'Umur (bulan)'
                            },
                            min: 0,
                            max: 60,
                            ticks: {
                                autoSkip: false,
                                maxRotation: 0,
                                minRotation: 0
                            }
                        },
                        y: {
                            min: 0,
                            max: 28,
                            ticks: {
                                beginAtZero: true,
                                stepSize: 1
                            },
                            title: {
                                display: true,
                                text: 'Berat Badan (kg)'
                            }
                        }
                    }
                }
            });
            console.log('Chart created successfully.');
        });

        document.addEventListener('DOMContentLoaded', function() {
            if (window.location.pathname.includes('/kms/show_kms')) {
                var body = document.querySelector('body');
                if (window.innerWidth >= 768) {
                    body.classList.add('toggle-sidebar');
                } else {
                    body.classList.remove('toggle-sidebar');
                }
            }
        });
    </script>
@endsection
