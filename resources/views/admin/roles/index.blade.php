@extends('admin.layout.admin_master')
@section('title', 'KStarter | Roles')

@section('css')
<style>
    table.dataTable thead th { vertical-align: middle; }
    div.dataTables_wrapper div.dataTables_paginate ul.pagination { margin: 0; }
    div.dataTables_wrapper div.dataTables_info { padding-top: 0.5rem; }
    .offcanvas.offcanvas-end { width: 680px; }
    .offcanvas-header { border-bottom: 1px solid #e7e7e9; padding: 1.25rem 1.5rem; }
    .offcanvas-footer { border-top: 1px solid #e7e7e9; padding: 1.25rem 1.5rem; }
    .offcanvas-body { padding: 1.5rem; }

</style>
@endsection

@section('content')

<div class="py-3 mb-4 d-flex justify-content-between align-items-center">
    <div>
        <h4 class="fw-bold mb-1">Manage Roles</h4>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-style1 mb-0" style="--bs-breadcrumb-divider: '•';">
                <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Manage Roles</li>
            </ol>
        </nav>
    </div>
    <button class="btn btn-primary" type="button" id="addRoleBtn">
        <i class="bx bx-plus me-1"></i> Add Role
    </button>
</div>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center gap-3">
        <input type="text" id="roleSearchInput" class="form-control" placeholder="Search roles..." style="max-width:20%;">
        <div class="d-flex gap-2">
            <button id="exportRolesBtn" class="btn btn-outline-success">
                <i class="bx bx-export me-1"></i> Export Excel
            </button>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="rolesTable" class="table table-hover" style="width:100%">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Role Name</th>
                        <th>Permissions</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach([
                        [1, 'Admin',     ['Create Users','Edit Users','Delete Users','View Users','Create Roles','Edit Roles','Delete Roles','View Reports','Manage Permissions','System Settings']],
                        [2, 'Manager',   ['Create Users','Edit Users','View Users','View Reports','Manage Permissions']],
                        [3, 'Editor',    ['Create Users','Edit Users','View Users']],
                        [4, 'Moderator', ['View Users','View Reports']],
                        [5, 'Viewer',    ['View Users']],
                        [6, 'Support',   ['View Users','View Reports']],
                        [7, 'Analyst',   ['View Reports','Export Report Data']],
                    ] as $role)
                    <tr>
                        <td>{{ $role[0] }}</td>
                        <td>{{ $role[1] }}</td>
                        <td>
                            <div class="d-flex flex-wrap align-items-center gap-1">
                                @foreach(array_slice($role[2], 0, 3) as $perm)
                                    <span class="badge bg-label-warning">{{ $perm }}</span>
                                @endforeach
                                @if(count($role[2]) > 3)
                                    <span class="text-muted small">+{{ count($role[2]) - 3 }} more</span>
                                @endif
                            </div>
                        </td>
                        <td>
                            <a href="{{ url('admin/roles/' . $role[0] . '/edit') }}" class="btn btn-sm btn-icon btn-text-secondary">
                                <i class="bx bx-edit-alt"></i>
                            </a>
                            <a href="javascript:void(0);" class="btn btn-sm btn-icon btn-text-danger btn-delete-role">
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

{{-- Add Role Offcanvas --}}
<div class="offcanvas offcanvas-end" tabindex="-1" id="addRoleDrawer"
     aria-labelledby="addRoleDrawerLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="addRoleDrawerLabel">
            <i class="bx bx-shield-plus me-2 text-primary"></i> Add New Role
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
    </div>
    <form id="addRoleForm" onsubmit="return false">
        <div class="offcanvas-body" id="addRoleDrawerBody"></div>
        <div class="offcanvas-footer d-flex gap-2">
            <button type="submit" class="btn btn-primary">
                <i class="bx bx-check me-1"></i> Save Role
            </button>
            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="offcanvas">Cancel</button>
        </div>
    </form>
</div>

@endsection

@section('script')
<script src="{{ asset('admin_assets') }}/custom/js/roles.js?v={{ time() }}"></script>
@endsection
