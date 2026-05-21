@extends('admin.layout.admin_master')
@section('title', 'Users | KStarter')

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
<style>
    div.dataTables_wrapper div.dataTables_length select {
        padding: 0.375rem 2rem 0.375rem 0.75rem;
    }
    div.dataTables_wrapper div.dataTables_filter input {
        margin-left: 0.5rem;
    }
    table.dataTable thead th {
        vertical-align: middle;
    }
    div.dataTables_wrapper div.dataTables_paginate ul.pagination {
        margin: 0;
    }
    div.dataTables_wrapper div.dataTables_info {
        padding-top: 0.5rem;
    }
</style>
@endsection

@section('content')

<h4 class="fw-bold py-3 mb-4">Users</h4>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center flex-wrap gap-2">
        <h5 class="m-0">Users List</h5>
        <a href="{{ url('admin/users/create') }}" class="btn btn-primary">
            <i class="bx bx-plus me-1"></i> Add User
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="usersTable" class="table table-hover" style="width:100%">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>User Name</th>
                        <th>Email Address</th>
                        <th>Mobile Number</th>
                        <th>Department</th>
                        <th>User Role</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach([
                        [1,'John Doe','john.doe','john@example.com','+1 202 555 0111','Engineering','Admin','Active','success'],
                        [2,'Jane Smith','jane.smith','jane@example.com','+1 202 555 0122','Marketing','Editor','Active','success'],
                        [3,'Bob Wilson','bob.wilson','bob@example.com','+1 202 555 0133','HR','Viewer','Inactive','danger'],
                        [4,'Alice Brown','alice.brown','alice@example.com','+1 202 555 0144','Finance','Manager','Active','success'],
                        [5,'Tom Clark','tom.clark','tom@example.com','+1 202 555 0155','Engineering','Admin','Active','success'],
                        [6,'Sarah Davis','sarah.davis','sarah@example.com','+1 202 555 0166','Design','Editor','Inactive','danger'],
                        [7,'Mike Johnson','mike.johnson','mike@example.com','+1 202 555 0177','Support','Viewer','Active','success'],
                        [8,'Emily White','emily.white','emily@example.com','+1 202 555 0188','Marketing','Manager','Active','success'],
                        [9,'David Lee','david.lee','david@example.com','+1 202 555 0199','Finance','Analyst','Active','success'],
                        [10,'Laura Hall','laura.hall','laura@example.com','+1 202 555 0200','Design','Editor','Inactive','danger'],
                        [11,'Chris Martin','chris.martin','chris@example.com','+1 202 555 0211','Engineering','Viewer','Active','success'],
                        [12,'Megan Turner','megan.turner','megan@example.com','+1 202 555 0222','HR','Manager','Active','success'],
                        [13,'James Walker','james.walker','james@example.com','+1 202 555 0233','Support','Moderator','Inactive','danger'],
                        [14,'Sophia Adams','sophia.adams','sophia@example.com','+1 202 555 0244','Marketing','Editor','Active','success'],
                        [15,'Daniel Scott','daniel.scott','daniel@example.com','+1 202 555 0255','Finance','Analyst','Active','success'],
                        [16,'Olivia Baker','olivia.baker','olivia@example.com','+1 202 555 0266','Engineering','Viewer','Active','success'],
                        [17,'Ryan Carter','ryan.carter','ryan@example.com','+1 202 555 0277','Design','Admin','Inactive','danger'],
                        [18,'Emma Nelson','emma.nelson','emma@example.com','+1 202 555 0288','HR','Editor','Active','success'],
                        [19,'Liam Roberts','liam.roberts','liam@example.com','+1 202 555 0299','Support','Viewer','Active','success'],
                        [20,'Ava Mitchell','ava.mitchell','ava@example.com','+1 202 555 0300','Marketing','Manager','Active','success'],
                    ] as $user)
                    <tr>
                        <td>{{ $user[0] }}</td>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <span class="avatar avatar-sm avatar-initial rounded-circle bg-label-primary">{{ strtoupper(substr($user[1],0,1)) }}</span>
                                <strong>{{ $user[1] }}</strong>
                            </div>
                        </td>
                        <td>{{ $user[2] }}</td>
                        <td>{{ $user[3] }}</td>
                        <td>{{ $user[4] }}</td>
                        <td>{{ $user[5] }}</td>
                        <td><span class="badge bg-label-primary">{{ $user[6] }}</span></td>
                        <td><span class="badge bg-label-{{ $user[8] }}">{{ $user[7] }}</span></td>
                        <td>
                            <a href="{{ url('admin/users/' . $user[0] . '/edit') }}" class="btn btn-sm btn-icon btn-text-secondary">
                                <i class="bx bx-edit-alt"></i>
                            </a>
                            <a href="javascript:void(0);" class="btn btn-sm btn-icon btn-text-danger btn-delete-user">
                                <i class="bx bx-trash"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

@section('script')
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function () {
        $('#usersTable').DataTable({
            pageLength: 10,
            lengthMenu: [5, 10, 25, 50],
            columnDefs: [
                { orderable: false, targets: [1, 8] }
            ],
            language: {
                search: '',
                searchPlaceholder: 'Search users...',
                lengthMenu: 'Show _MENU_ entries',
                info: 'Showing _START_ to _END_ of _TOTAL_ users',
                paginate: {
                    previous: '<i class="bx bx-chevron-left"></i>',
                    next: '<i class="bx bx-chevron-right"></i>'
                }
            },
            dom: '<"row align-items-center mb-3"<"col-md-6"l><"col-md-6 d-flex justify-content-end"f>>t<"row align-items-center mt-3"<"col-md-6"i><"col-md-6 d-flex justify-content-end"p>>',
        });

        $(document).on('click', '.btn-delete-user', function () {
            Swal.fire({
                title: 'Delete User?',
                text: 'This action cannot be undone.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#ff3e1d',
                cancelButtonColor: '#8592a3',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: 'Deleted!',
                        text: 'User has been deleted.',
                        icon: 'success',
                        confirmButtonColor: '#696cff'
                    });
                }
            });
        });
    });
</script>
@endsection
