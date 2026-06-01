@extends('admin.layout.admin_master')
@section('title', 'KStarter | Permissions')

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
        <h4 class="fw-bold mb-1">Manage Permissions</h4>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-style1 mb-0" style="--bs-breadcrumb-divider: '•';">
                <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Manage Permissions</li>
            </ol>
        </nav>
    </div>
    <button class="btn btn-primary" type="button" id="addPermissionBtn">
        <i class="bx bx-plus me-1"></i> Add Permission
    </button>
</div>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center gap-3">
        <input type="text" id="permSearchInput" class="form-control" placeholder="Search permissions..." style="max-width:20%;">
        <div class="d-flex gap-2">
            <button id="exportPermsBtn" class="btn btn-outline-success">
                <i class="bx bx-export me-1"></i> Export Excel
            </button>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="permissionsTable" class="table table-hover" style="width:100%">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Permission Name</th>
                        <th>Route</th>
                        <th>Category</th>
                        <th>Assigned Roles</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach([
                        [1,  'All Users Listing',         'admin/users',                  'User Management', ['Admin', 'Manager', 'Editor', 'Viewer', 'Support']],
                        [2,  'Create User',               'admin/users/create',           'User Management', ['Admin', 'Manager', 'Editor']],
                        [3,  'Edit User',                 'admin/users/{id}/edit',        'User Management', ['Admin', 'Manager']],
                        [4,  'Delete User',               'admin/users/{id}/delete',      'User Management', ['Admin']],
                        [5,  'All Roles Listing',         'admin/roles',                  'Role Management', ['Admin']],
                        [6,  'Create Role',               'admin/roles/create',           'Role Management', ['Admin']],
                        [7,  'Edit Role',                 'admin/roles/{id}/edit',        'Role Management', ['Admin']],
                        [8,  'Delete Role',               'admin/roles/{id}/delete',      'Role Management', ['Admin']],
                        [9,  'View Reports',              'admin/reports',                'Reports',         ['Admin', 'Manager', 'Analyst']],
                        [10, 'Export Report Data',        'admin/reports/export',         'Reports',         ['Admin', 'Analyst']],
                    ] as $perm)
                    <tr>
                        <td>{{ $perm[0] }}</td>
                        <td>{{ $perm[1] }}</td>
                        <td>{{ $perm[2] }}</td>
                        <td><span class="badge bg-label-info">{{ $perm[3] }}</span></td>
                        <td>
                            <div class="d-flex flex-wrap gap-1">
                                @foreach($perm[4] as $role)
                                    <span class="badge bg-label-warning">{{ $role }}</span>
                                @endforeach
                            </div>
                        </td>
                        <td>
                            <button class="btn btn-sm btn-icon btn-text-secondary btn-edit-perm"
                                data-id="{{ $perm[0] }}"
                                data-name="{{ $perm[1] }}"
                                data-route="{{ $perm[2] }}"
                                data-category="{{ $perm[3] }}">
                                <i class="bx bx-edit-alt"></i>
                            </button>
                            <a href="javascript:void(0);" class="btn btn-sm btn-icon btn-text-danger btn-delete-perm">
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

{{-- Add Permission Offcanvas --}}
<div class="offcanvas offcanvas-end" tabindex="-1" id="addPermissionDrawer"
     aria-labelledby="addPermissionDrawerLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="addPermissionDrawerLabel">
            <i class="bx bx-lock-open-alt me-2 text-primary"></i> Add New Permission
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
    </div>
    <form id="addPermissionForm" onsubmit="return false">
        <div class="offcanvas-body" id="addPermissionDrawerBody"></div>
        <div class="offcanvas-footer d-flex gap-2">
            <button type="submit" class="btn btn-primary">
                <i class="bx bx-check me-1"></i> Save Permission
            </button>
            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="offcanvas">Cancel</button>
        </div>
    </form>
</div>

{{-- Edit Permission Offcanvas --}}
<div class="offcanvas offcanvas-end" tabindex="-1" id="editPermissionDrawer"
     aria-labelledby="editPermissionDrawerLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="editPermissionDrawerLabel">
            <i class="bx bx-edit me-2 text-primary"></i> Edit Permission
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
    </div>
    <form id="editPermissionForm" onsubmit="return false">
        <div class="offcanvas-body" id="editPermissionDrawerBody"></div>
        <div class="offcanvas-footer d-flex gap-2">
            <button type="submit" class="btn btn-primary">
                <i class="bx bx-check me-1"></i> Update Permission
            </button>
            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="offcanvas">Cancel</button>
        </div>
    </form>
</div>

@endsection

@section('script')
<script src="{{ asset('admin_assets') }}/custom/js/permissions.js?v={{ time() }}"></script>
@endsection
