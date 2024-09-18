@extends('layouts.app')

@section('content')
    <div class="pagetitle">
        <h1>Profile</h1>
    </div>
    <section class="section profile">
        <div class="row">
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center position-relative">
                        <a href="#" class="btn-blue btn-lg position-absolute" style="top: 10px; right: 20px;"
                            data-bs-toggle="modal" data-bs-target="#profilePhotoModal">
                            <i class="ri-pencil-line"></i>
                        </a>
                        <img src="{{ $user->profile_photo_url }}" alt="Profile" class="rounded-circle">
                        <h2>{{ $user->name }}</h2>
                        <h3>
                            @foreach ($user->roles as $role)
                                {{ $role->name }}{{ !$loop->last ? ',' : '' }}
                            @endforeach
                        </h3>
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <div class="card">
                    <div class="card-body pt-3">
                        <ul class="nav nav-tabs nav-tabs-bordered">
                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab"
                                    data-bs-target="#profile-overview">Profil
                                    Detail</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit
                                    Profile</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#password-edit">Edit
                                    Password</button>
                            </li>
                        </ul>
                        <div class="tab-content pt-2">
                            <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                <br>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Nama</div>
                                    <div class="col-lg-9 col-md-8">{{ $user->name }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Email</div>
                                    <div class="col-lg-9 col-md-8">{{ $user->email }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Tanggal Lahir</div>
                                    <div class="col-lg-9 col-md-8">{{ \Carbon\Carbon::parse($user->tgl_lahir)->format('d/m/Y') }}</div>
                                </div>                                
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">NIP</div>
                                    <div class="col-lg-9 col-md-8">{{ $user->nip }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Puskesmas</div>
                                    <div class="col-lg-9 col-md-8">{{ $user->puskesmas }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Alamat</div>
                                    <div class="col-lg-9 col-md-8">{{ $user->alamat }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Password</div>
                                    <div class="col-lg-9 col-md-8">***********</div>
                                </div>
                            </div>
                            <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
                                <form action="{{ route('dashboard.profile_update', $user->id) }}" method="post">
                                    @method('PUT')
                                    @csrf
                                    <div class="row mb-3">
                                        <label for="Nama" class="col-md-4 col-lg-3 col-form-label">Nama</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="name" type="text" class="form-control" id="Nama"
                                                placeholder="Nama" value="{{ $user->name }}">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="email" type="email" class="form-control" id="Email"
                                                value="{{ $user->email }}">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="Tgl_lahir" class="col-md-4 col-lg-3 col-form-label">Tanggal
                                            Lahir</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="tgl_lahir" type="date" class="form-control" id="Tgl_lahir"
                                                value="{{ $user->tgl_lahir }}" required>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="Nip" class="col-md-4 col-lg-3 col-form-label">NIP</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="nip" type="text" class="form-control" id="Nip"
                                                pattern="[0-9,\,]*" value="{{ $user->nip }}" required>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="Puskesmas" class="col-md-4 col-lg-3 col-form-label">Puskesmas</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="puskesmas" type="text" class="form-control" id="Puskesmas" value="{{ $user->puskesmas }}">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="Alamat" class="col-md-4 col-lg-3 col-form-label">Alamat</label>
                                        <div class="col-md-8 col-lg-9">
                                            <textarea name="alamat" class="form-control" id="Alamat" rows="4" required>{{ $user->alamat }}</textarea>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-primary">Simpan Profile</button>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade profile-edit pt-3" id="password-edit">
                                <form id="password-form" action="{{ route('dashboard.update_password') }}"
                                    method="post">
                                    @csrf
                                    <div class="row mb-3">
                                        <label for="current_password" class="col-md-4 col-lg-3 col-form-label">Password
                                            Lama</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="current_password" type="password" class="form-control"
                                                id="current_password">
                                            <div id="current_password_error" class="text-danger"></div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="new_password" class="col-md-4 col-lg-3 col-form-label">Password
                                            Baru</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="new_password" type="password" class="form-control"
                                                id="new_password">
                                            <div id="new_password_error" class="text-danger"></div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="new_password_confirmation"
                                            class="col-md-4 col-lg-3 col-form-label">Konfirmasi Password Baru</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="new_password_confirmation" type="password" class="form-control"
                                                id="new_password_confirmation">
                                            <div id="new_password_confirmation_error" class="text-danger"></div>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <button type="button" id="update-password-btn" class="btn btn-primary">Simpan
                                            Password</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" id="profilePhotoModal" tabindex="-1" aria-labelledby="profilePhotoModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="profilePhotoModalLabel">Upload Foto Profil</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('dashboard.update_profile', $user->id) }}" method="post"
                        enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="mb-3">
                            <label for="profilePhoto" class="form-label">Pilih Foto</label>
                            <input name="profile_photo" type="file" class="form-control" id="profilePhoto"
                                accept=".jpeg, .png, .jpg, .gif">
                        </div>
                        <div class="d-flex justify-content-left">
                            <button type="submit" class="btn btn-sm btn-primary"
                                style="margin-right: 20px">Simpan</button>
                            @if ($user->profile_photo)
                                <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#deletePhotoModal">Hapus Foto Profil</button>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @if ($user->profile_photo)
        <div class="modal fade" id="deletePhotoModal" tabindex="-1" aria-labelledby="deletePhotoModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deletePhotoModalLabel">Hapus Foto Profil</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Apakah Anda yakin ingin menghapus foto profil ini?</p>
                        <form action="{{ route('dashboard.delete_profile', $user->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <div class="d-flex justify-content-end">
                                <button type="button" class="btn btn-secondary me-2"
                                    data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('#update-password-btn').click(function() {
                var form = $('#password-form');
                var formData = form.serialize();

                $.ajax({
                    url: form.attr('action'),
                    type: 'POST',
                    data: formData,
                    success: function(response) {
                        window.location.reload();
                    },
                    error: function(xhr) {
                        $('#current_password_error').text('');
                        $('#new_password_error').text('');
                        $('#new_password_confirmation_error').text('');
                        var errors = xhr.responseJSON.errors;
                        if (errors.current_password) {
                            $('#current_password_error').text(errors.current_password[0]);
                        }
                        if (errors.new_password) {
                            $('#new_password_error').text(errors.new_password[0]);
                        }
                        if (errors.new_password_confirmation) {
                            $('#new_password_confirmation_error').text(errors
                                .new_password_confirmation[0]);
                        }
                    }
                });
            });
        });
        document.addEventListener('DOMContentLoaded', function() {
            function restrictInputToNumbers(input, maxLength) {
                if (input) {
                    input.addEventListener('input', function() {
                        var value = input.value;
                        value = value.replace(/[^0-9/,]/g, '');
                        if (value.length > maxLength) {
                            value = value.substring(0, maxLength);
                        }
                        input.value = value;
                    });
                }
            }
            var inputs = [{
                id: 'Nip',
                maxLength: 19
            }, ];
            inputs.forEach(function(input) {
                var element = document.getElementById(input.id);
                restrictInputToNumbers(element, input.maxLength);
            });
        });
    </script>
@endsection
