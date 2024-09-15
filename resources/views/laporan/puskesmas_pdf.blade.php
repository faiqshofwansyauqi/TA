<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Laporan Ibu Hamil {{ $year }}</title>
</head>

<body>
    <h3>Laporan Ibu Hamil Tahun {{ $year }}</h3>
    <table>
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
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="signature">
        <div class="content">
            <p>Indramayu, {{ \Carbon\Carbon::now()->format('d F Y') }}</p>
            @foreach ($user->roles as $role)
                Kepala
                @if ($role->name === 'IBI')
                    Ikatan Bidan Indramayu
                @else
                    {{ $role->name }}
                @endif
                {{ !$loop->last ? ',' : '' }}
            @endforeach
            <br><br><br>
            <p><strong>{{ $user->name }}</strong></p>
            <p>NIP. {{ $user->nip }}</p>
        </div>
    </div>
</body>
<style>
    @page {
        margin: 20px;
    }

    body {
        margin: 0;
        padding: 0;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th,
    td {
        border: 1px solid black;
        padding: 8px;
        text-align: center;
        font-size: 12px;
    }

    th {
        background-color: #f2f2f2;
    }

    h1 {
        text-align: center;
    }

    .signature {
        margin-top: 10px;
        float: right;
        text-align: left;
    }

    .signature .content {
        text-align: left;
        padding-right: 10px;
    }

    .signature p {
        margin: 0;
        padding: 2px 0;
        line-height: 1;
    }
</style>

</html>
