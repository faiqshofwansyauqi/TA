@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <div class="pagetitle">
            <h1 style="margin-bottom: 5px">Master Kepala IBI & Puskesmas</h1>
            <button type="button" class="btn btn-success btn-custom1" id="btn-plus">
                <i class="bi bi-plus-circle"></i> Tambah
            </button>
        </div>
    </div>

    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <br>
                        <div class="table-responsive">
                            <table class="table table-bordered table-anc" id="admin-table" style="width:100%">
                                <thead>
                                    <tr>
                                        <th style="text-align: center">No</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Roles</th>
                                        <th style="text-align: center">Action</th>
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
        <div class="modal-dialog modal-dialog-scrollable modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-4 fw-bold" id="ModalInput">Input User</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('setting.store_user') }}" autocomplete="off" class="row g-3 needs-validation"
                        novalidate method="POST" id="userForm">
                        @csrf
                        <div class="col-12">
                            <div class="card-body">
                                <div class="col-12 mb-1">
                                    <label for="yourName" class="form-label">Full Name</label>
                                    <input type="text" name="name" class="form-control" id="yourName" required>
                                    <div class="invalid-feedback">Please enter your full name.</div>
                                </div>
                                <div class="col-12 mb-1">
                                    <label for="yourEmail" class="form-label">Email</label>
                                    <div class="input-group has-validation">
                                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                                        <input type="email" name="email" class="form-control" id="yourEmail" required>
                                        <div class="invalid-feedback">Please enter a valid email address.</div>
                                    </div>
                                </div>
                                <div class="col-12 mb-1">
                                    <label for="yourPassword" class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control" id="yourPassword" required>
                                    <div class="invalid-feedback">Please enter a password.</div>
                                </div>
                                <div class="col-12 mb-1">
                                    <label for="confirmPassword" class="form-label">Confirm Password</label>
                                    <input type="password" name="password_confirmation" class="form-control"
                                        id="confirmPassword" required>
                                    <div class="invalid-feedback">Please confirm your password.</div>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="roles" class="form-label">Roles</label>
                                    <select class="form-control" id="roles" name="roles[]" required>
                                        <option value="">Pilih Role</option>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->name }}">{{ $role->name }}</option>
                                        @endforeach
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

    <div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="ModalEdit" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title fs-4 fw-bold" id="ModalEdit">Update Role</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                    <form id="editForm" method="post" autocomplete="off">
                        @csrf
                        @method('PUT')
                        <div class="col-12">
                            <div class="card-body">
                                <input type="hidden" name="edit_id" value="id">
                                <div class="mb-3">
                                    <label for="edit_name" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="edit_name" name="name" required>
                                </div>
                                <div class="mb-3">
                                    <label for="edit_email" class="form-label">Email</label>
                                    <div class="input-group has-validation">
                                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                                        <input type="email" name="email" class="form-control" id="edit_email"
                                            required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <input type="hidden" name="edit_password" value="password">
                                </div>
                                <div class="mb-3">
                                    <label for="edit_roles" class="form-label">Roles</label>
                                    <select class="form-control" id="edit_roles" name="roles[]" required>
                                        <option value="">Pilih Role</option>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->name }}">{{ $role->name }}</option>
                                        @endforeach
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
            $('#btn-plus').click(function() {
                modalInput.modal('show');
            });
        });

        $(document).ready(function() {
            $('#admin-table').DataTable({
                processing: true,
                serverSide: false,
                ordering: false,
                ajax: '{{ route('setting.data_ibi_puskesmas') }}',
                scrollX: false,
                fixedHeader: true,
                columns: [{
                        data: 'id',
                        name: 'id',
                        render: function(data, type, row, meta) {
                            return '<div style="text-align: center;">' + (meta.row + meta.settings
                                ._iDisplayStart + 1) + '</div>';
                        }
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'roles',
                        name: 'roles'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        render: function(data, type, row) {
                            let editUrl = '{{ route('setting.edit_user', ':id') }}'.replace(':id',
                                row.id);
                            let deleteUrl = '{{ route('setting.destroy_user', ':id') }}'.replace(
                                ':id', row.id);
                            return `
                            <div style="display: flex; justify-content: center;">
                                <button class="btn btn-sm btn-primary edit-btn" data-id="${row.id}" data-bs-toggle="modal" data-bs-target="#modalEdit" style="margin-right: 5px;">
                                    <i class="ri-edit-2-fill"></i>
                                </button>
                                <button class="btn btn-sm btn-danger btn-delete" data-id="${row.id}" data-url="${deleteUrl}">
                            <i class="bi bi-trash3-fill"></i>
                        </button>
                            </div>
                        `;
                        }
                    }
                ],
                dom: '<"d-flex justify-content-between align-items-center"lBf>rtip',
                buttons: [],
            });
        });

        $('#admin-table').on('click', '.edit-btn', function() {
            let id = $(this).data('id');
            $.ajax({
                url: '{{ route('setting.edit_user', ':id') }}'.replace(':id', id),
                method: 'GET',
                success: function(data) {
                    $('#edit_id').val(data.id);
                    $('#edit_name').val(data.name);
                    $('#edit_email').val(data.email);
                    $('#edit_password').val(data.password);
                    $('#edit_roles').val(data.roles.map(role => role.name));
                    $('#editForm').attr('action',
                        '{{ route('setting.update_user', ':id') }}'
                        .replace(
                            ':id', id));
                    $('#modalEdit').modal('show');
                }
            });
        });

        $('#admin-table').on('click', '.btn-delete', function() {
            const id = $(this).data('id');
            const url = $(this).data('url');
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Anda tidak akan bisa mengembalikan ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal',
                showLoaderOnConfirm: true,
                preConfirm: () => {
                    return $.ajax({
                        url: url,
                        type: 'POST',
                        data: {
                            _method: 'DELETE',
                            _token: '{{ csrf_token() }}'
                        },
                        error: function(xhr) {
                            Swal.fire(
                                'Gagal!',
                                'Data gagal dihapus.',
                                'error'
                            );
                        }
                    }).then(response => {
                        if (response.success) {
                            Swal.fire(
                                'Terhapus!',
                                'Data telah berhasil dihapus.',
                                'success'
                            );
                            setTimeout(function() {
                                location.reload();
                            }, 1000);
                        } else {
                            Swal.fire(
                                'Gagal!',
                                'Data gagal dihapus.',
                                'error'
                            );
                        }
                    });
                }
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('userForm');
            const password = document.getElementById('yourPassword');
            const confirmPassword = document.getElementById('confirmPassword');

            form.addEventListener('submit', function(event) {
                console.log('Form submit event triggered');
                if (password.value !== confirmPassword.value) {
                    console.log('Passwords do not match');
                    event.preventDefault();
                    confirmPassword.setCustomValidity("Passwords do not match");
                    confirmPassword.reportValidity();
                } else {
                    console.log('Passwords match');
                    confirmPassword.setCustomValidity("");
                }
            });
        });
    </script>
@endsection
