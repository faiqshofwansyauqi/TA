@extends('layouts.app')

@section('content')
<div class="pagetitle">
    <h1>Detail Antenatal Care</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('rekam_medis.anc') }}">Antenatal Care</a></li>
            <li class="breadcrumb-item active">Detail Ibu {{ $anc->NIK }}</li>
        </ol>
    </nav>
</div>

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Detail Pemeriksaan</h5>
                    <p><strong>Nama Ibu: </strong>{{ $anc->NIK }}</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
