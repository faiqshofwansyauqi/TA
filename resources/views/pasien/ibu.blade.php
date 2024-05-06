@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <div class="pagetitle">
            <h1>Data Ibu</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">Data Pasien</li>
                    <li class="breadcrumb-item active">Data Ibu</li>
                </ol>
            </nav>
        </div>
    </div>
    <button type="button" class="btn btn-success" id="btn-plus">
        <i class="bi bi-plus-circle"></i> Tambah
    </button>

    <div class="modal fade" id="modalInput" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-4 fw-bold" id="exampleModalLabel">Input Data Ibu</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{-- <form action="{{ route('hotspot.store_Profile') }}" method="post" autocomplete="off"> --}}
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <div class="d-flex justify-content-between">
                            <div class="col-md-5">
                                <label for="no_telp" class="form-label">Nomer Telp</label>
                                <input type="number" class="form-control" id="no_telp" name="no_telp" required>
                            </div>
                            <div class="col-md-6">
                                <label for="nik" class="form-label">NIK</label>
                                <input type="number" class="form-control" id="nik" name="nik" required>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
                    </div>
                    <div class="mb-3">
                        <label for="rtrw" class="form-label">RT / RW</label>
                        <input type="text" class="form-control" id="rtrw" name="rtrw" required>
                    </div>
                    <div class="mb-3">
                        <label for="umur" class="form-label">Umur</label>
                        <input type="text" class="form-control" id="umur" name="umur" required>
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
            let modalInput = $('#modalInput');
            $('#btn-plus').click(function() {
                modalInput.modal('show');
            });
        });
    </script>
@endsection
