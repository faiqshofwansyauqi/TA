@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <div class="pagetitle">
            <h1 style="margin-bottom: 5px">Laporan Ibu Hamil</h1>
        </div>
    </div>
    
    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <br>
                        <form id="year-filter-form" action="{{ route('laporan.puskesmas') }}" method="GET" class="mb-3">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="year" class="form-label">Pilih Tahun</label>
                                    <select name="year" id="year" class="form-select" onchange="document.getElementById('year-filter-form').submit();">
                                        @for ($i = 2020; $i <= now()->year; $i++)
                                            <option value="{{ $i }}" {{ request('year') == $i ? 'selected' : '' }}>
                                                {{ $i }}
                                            </option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                        </form>
                        <div class="table-responsive">
                            <table class="table table-borderless table-anc" id="laporan-table" style="width:100%">
                                <thead>
                                    <tr>
                                        <th rowspan="3" class="align-middle text-center">No</th>
                                        <th rowspan="3" class="align-middle text-center">Bulan</th>
                                        <th colspan="3" rowspan="2" class="align-middle text-center">HASIL</th>
                                        <th colspan="3" rowspan="2" class="align-middle text-center">K1</th>
                                        <th colspan="3" rowspan="2" class="align-middle text-center">K4</th>
                                        <th colspan="5" class="align-middle text-center">KN1</th>
                                        <th colspan="5" class="align-middle text-center">KN2</th>
                                    </tr>
                                    <tr>
                                        <th colspan="2" class="align-middle text-center">BLN INI</th>
                                        <th colspan="2" class="align-middle text-center">BLN LALU</th>
                                        <th rowspan="2" class="align-middle text-center">Kumulatif</th>
                                        <th colspan="2" class="align-middle text-center">BLN INI</th>
                                        <th colspan="2" class="align-middle text-center">BLN LALU</th>
                                        <th rowspan="2" class="align-middle text-center">Kumulatif</th>
                                    </tr>
                                    <tr>
                                        <th class="text-center vertical-header">BUMIL</th>
                                        <th class="text-center vertical-header">BULIN</th>
                                        <th class="text-center vertical-header">BAYI</th>
                                        <th class="text-center vertical-header">BLN INI</th>
                                        <th class="text-center vertical-header">BLN LALU</th>
                                        <th class="text-center normal-header">Kumulatif</th>
                                        <th class="text-center vertical-header">BLN INI</th>
                                        <th class="text-center vertical-header">BLN LALU</th>
                                        <th class="text-center normal-header">Kumulatif</th>
                                        <th class="text-center normal-header">L</th>
                                        <th class="text-center normal-header">P</th>
                                        <th class="text-center normal-header">L</th>
                                        <th class="text-center normal-header">P</th>
                                        <th class="text-center normal-header">L</th>
                                        <th class="text-center normal-header">P</th>
                                        <th class="text-center normal-header">L</th>
                                        <th class="text-center normal-header">P</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($laporan as $monthNumber => $data)
                                        <tr>
                                            <td class="text-center">{{ $monthNumber }}</td>
                                            <td class="text-center">{{ $data['bulan'] }}</td>
                                            <td class="text-center">{{ $data['anc'] ?: '' }}</td>
                                            <td class="text-center">{{ $data['persalinan'] ?: '' }}</td>
                                            <td class="text-center">{{ $data['anak'] ?: '' }}</td>
                                            <td class="text-center">{{ $data['bulan_ini_k1'] ?: '' }}</td>
                                            <td class="text-center">
                                                @if ($data['anc'] > 0)
                                                    {{ $data['bulan_lalu_k1'] ?: '' }}
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if ($data['anc'] > 0)
                                                    {{ $data['bulan_ini_k1'] + $data['bulan_lalu_k1'] ?: '' }}
                                                @endif
                                            </td>
                                            <td class="text-center">{{ $data['bulan_ini_k2'] ?: '' }}</td>
                                            <td class="text-center">
                                                @if ($data['anc'] > 0)
                                                    {{ $data['bulan_lalu_k2'] ?: '' }}
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if ($data['anc'] > 0)
                                                    {{ $data['bulan_ini_k2'] + $data['bulan_lalu_k2'] ?: '' }}
                                                @endif
                                            </td>
                                            <td class="text-center">{{ $data['kn1l_bulan_ini'] ?: '' }}</td>
                                            <td class="text-center">{{ $data['kn1p_bulan_ini'] ?: '' }}</td>
                                            <td class="text-center">
                                                @if ($data['anc'] > 0)
                                                    {{ $data['kn1l_bulan_lalu'] ?: '' }}
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if ($data['anc'] > 0)
                                                    {{ $data['kn1p_bulan_lalu'] ?: '' }}
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if ($data['anc'] > 0)
                                                    {{ $data['kn1l_bulan_ini'] + $data['kn1p_bulan_ini'] + $data['kn1l_bulan_lalu'] + $data['kn1p_bulan_lalu'] ?: '' }}
                                                @endif
                                            </td>
                                            <td class="text-center">{{ $data['kn2l_bulan_ini'] ?: '' }}</td>
                                            <td class="text-center">{{ $data['kn2p_bulan_ini'] ?: '' }}</td>
                                            <td class="text-center">
                                                @if ($data['anc'] > 0)
                                                    {{ $data['kn2l_bulan_lalu'] ?: '' }}
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if ($data['anc'] > 0)
                                                    {{ $data['kn2p_bulan_lalu'] ?: '' }}
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if ($data['anc'] > 0)
                                                    {{ $data['kn2l_bulan_ini'] + $data['kn2p_bulan_ini'] + $data['kn2l_bulan_lalu'] + $data['kn2p_bulan_lalu'] ?: '' }}
                                                @endif
                                            </td>
                                            <!-- Add other columns as needed -->
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script></script>
@endsection
