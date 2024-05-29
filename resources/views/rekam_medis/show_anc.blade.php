@extends('layouts.app')

@section('content')
    <div class="pagetitle">
        <h1>Detail Antenatal Care</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('rekam_medis.anc') }}">Antenatal Care</a></li>
                <li class="breadcrumb-item active">Detail Ibu {{ $anc->NIK }}</li>
                {{-- <p><strong>Nama Ibu: </strong>{{ $anc->NIK }}</p> --}}
            </ol>
        </nav>
    </div>

    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Detail Pemeriksaan</h5>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="anc-table" style="width:100%">
                                <thead>
                                    <tr>
                                        <th rowspan="3" class="align-middle">No.</th>
                                        <th colspan="4" rowspan="2" class="align-middle text-center"">REGISTER</th>
                                        <th colspan="12" class="text-center"">PEMERIKSAAN</th>
                                        <th colspan="5" rowspan="2" class="text-center"">PELAYANAN</th>
                                        <th rowspan="3" class="text-center align-middle">KONSELING</th>
                                    </tr>
                                    <tr>
                                        <th colspan="7" class="text-center">IBU</th>
                                        <th colspan="5" class="text-center">BAYI</th>
                                    </tr>
                                    <tr>
                                        <th class="align-middle">Tgl</th>
                                        <th class="vertical-text align-middle text-center">JKN*</th>
                                        <th class="vertical-text align-middle text-center">Usia Kehamilan</th>
                                        <th class="vertical-text align-middle text-center">Trimester ke</th>
                                        <th class="align-middle text-center">Keluhan</th>
                                        <th class="vertical-text align-middle text-center">BB (kg)</th>
                                        <th class="vertical-text align-middle text-center">TD (mmHg)</th>
                                        <th class="vertical-text align-middle text-center">LILA (cm)</th>
                                        <th class="vertical-text align-middle text-center">Status Gizi <sub><sup>2)</sup></sub></th>
                                        <th class="vertical-text align-middle text-center">TFU (cm)</th>
                                        <th class="vertical-text align-middle text-center">Refleks Patella (+/-)</th>
                                        <th class="vertical-text align-middle text-center">DJJ (x/menit)</th>
                                        <th class="vertical-text align-middle text-center">Kepala thd PAP <sub><sup>3)</sup></sub></th>
                                        <th class="vertical-text align-middle text-center">TBJ (gram)</th>
                                        <th class="vertical-text align-middle text-center">Presentasi <sub><sup>4)</sup></sub></th>
                                        <th class="vertical-text align-middle text-center">Jumlah Janin <sub><sup>5)</sup></sub></th>
                                        <th class="vertical-text align-middle text-center">Injeksi Td *</th>
                                        <th class="vertical-text align-middle text-center">Catat di Buku KIA *</th>
                                        <th class="vertical-text align-middle text-center">Fe (tab/botol)</th>
                                        <th class="vertical-text align-middle text-center">PMT Bumil KEK</th>
                                        <th class="vertical-text align-middle text-center">Ikut Kelas Ibu</th>
                                    </tr>
                                    <tr>
                                        <td class="text-center">1</td>
                                        <td class="text-center">2</td>
                                        <td class="text-center">3</td>
                                        <td class="text-center">4</td>
                                        <td class="text-center">5</td>
                                        <td class="text-center">6</td>
                                        <td class="text-center">7</td>
                                        <td class="text-center">8</td>
                                        <td class="text-center">9</td>
                                        <td class="text-center">10</td>
                                        <td class="text-center">11</td>
                                        <td class="text-center">12</td>
                                        <td class="text-center">13</td>
                                        <td class="text-center">14</td>
                                        <td class="text-center">15</td>
                                        <td class="text-center">16</td>
                                        <td class="text-center">17</td>
                                        <td class="text-center">18</td>
                                        <td class="text-center">19</td>
                                        <td class="text-center">20</td>
                                        <td class="text-center">21</td>
                                        <td class="text-center">22</td>
                                        <td class="text-center">23</td>
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
@endsection
