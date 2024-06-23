@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <div class="pagetitle">
            <h1>Detail Kartu Menuju Sehat</h1>
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
                        <canvas id="kmsChart" width="200" height="200"></canvas>
                        <br>
                        <div class="table-responsive">
                            <table class="table table-bordered table-anc" id="kms-table" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Umur (Bulan)</th>
                                        @for ($i = 0; $i <= 24; $i++)
                                            <th style="width: 130px; text-align: center;">{{ $i }}</th>
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
                                        @for ($i = count($kmss); $i <= 24; $i++)
                                            <td></td>
                                        @endfor
                                    </tr>
                                    <tr>
                                        <th>BB (kg)</th>
                                        @foreach ($kmss as $kms)
                                            <td style="text-align: center">{{ $kms->barat_badan }}</td>
                                        @endforeach
                                        @for ($i = count($kmss); $i <= 24; $i++)
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
                                        <td colspan="13" style="text-align: center">200</td>
                                    </tr>
                                    <tr>
                                        <th>N/T</th>
                                        @foreach ($kmss as $kms)
                                            <td style="text-align: center">{{ $kms->nt }}</td>
                                        @endforeach
                                        @for ($i = count($kmss); $i <= 24; $i++)
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
                        <div class="card col-12">
                            <div class="card-body">
                                <h5 class="card-title"></h5>
                                <input type="hidden" name="nama_anak" value="{{ $kms->nama_anak }}">
                                <div class="mb-3">
                                    <label for="bulan_penimbangan">Bulan penimbangan</label>
                                    <input type="date" class="form-control" id="bulan_penimbangan"
                                        name="bulan_penimbangan">
                                </div>
                                <div class="mb-3">
                                    <label for="barat_badan">BB (kg)</label>
                                    <input type="number" class="form-control" id="barat_badan" name="barat_badan"
                                        step="any">
                                </div>
                                <div class="mb-3">
                                    <label for="nt" class="form-label">N/T</label>
                                    <select class="form-select" id="nt" name="nt">
                                        <option value="">Pilih N/T</option>
                                        <option value="N">Naik</option>
                                        <option value="T">Turun</option>
                                    </select>
                                </div>
                                <div class="mb-3" id="asi-eks-group">
                                    <label for="asi_eksklusif" class="form-label">Asi Eksklusif</label>
                                    <select class="form-select" id="asi_eksklusif" name="asi_eksklusif">
                                        <option value="">Pilih Asi Eksklusif</option>
                                        <option value="jika iya">&#10003; <!-- Ceklis --></option>
                                        <option value="jika tidak">&#10007; <!-- Uncek --></option>
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

            // Ambil data dari tabel
            const labels = [];
            const data = [];

            // Mengambil label dari header tabel ke array labels
            $('#kms-table thead tr th').each(function(index, element) {
                if (index > 0) { // Skip header pertama
                    labels.push($(element).text());
                }
            });
            console.log('Labels:', labels); // Log labels array to console

            // Mengambil data berat badan dari semua kolom
            $('#kms-table tbody tr:nth-child(2) td').each(function(tdIndex, tdElement) {
                const value = $(tdElement).text();
                data.push(value ? parseFloat(value) : null);
            });

            console.log('Data:', data); // Log data array to console

            // Buat grafik menggunakan Chart.js
            const ctx = document.getElementById('kmsChart').getContext('2d');
            const kmsChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Berat Badan (kg)',
                        data: data,
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1,
                        fill: false
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        x: {
                            title: {
                                display: true,
                                text: 'Umur (bulan)'
                            }
                        },
                        y: {
                            min: 0, // Set the minimum value of the y-axis to 1 kg
                            max: 18, // Set the maximum value of the y-axis to 18 kg
                            ticks: {
                                beginAtZero: false, // Ensure that the axis starts exactly at the min value
                                stepSize: 1 // Set the step size to 1 kg for better readability
                            },
                            title: {
                                display: true,
                                text: 'Berat Badan (kg)'
                            }
                        }
                    }
                }
            });

            console.log('Chart created successfully.'); // Log confirmation of chart creation

        });
    </script>
@endsection
