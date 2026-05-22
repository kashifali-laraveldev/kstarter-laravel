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
    .perm-check-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 0.4rem 1rem; }
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
    <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#addRoleDrawer">
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
                        <th>Description</th>
                        <th>Permissions</th>
                        <th>Users</th>
                        <th>Created</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach([
                        [1, 'Admin',     'Full system access',               42, 5,  '2024-01-01'],
                        [2, 'Manager',   'Manage users and content',         28, 12, '2024-01-05'],
                        [3, 'Editor',    'Create and edit content',          15, 8,  '2024-01-10'],
                        [4, 'Moderator', 'Moderate user content',            10, 3,  '2024-01-15'],
                        [5, 'Viewer',    'Read-only access',                  5, 25, '2024-02-01'],
                        [6, 'Support',   'Handle support tickets',            8, 4,  '2024-02-10'],
                        [7, 'Analyst',   'View reports and analytics',        6, 2,  '2024-03-01'],
                    ] as $role)
                    <tr>
                        <td>{{ $role[0] }}</td>
                        <td><strong>{{ $role[1] }}</strong></td>
                        <td>{{ $role[2] }}</td>
                        <td><span class="badge bg-label-warning">{{ $role[3] }}</span></td>
                        <td><span class="badge bg-label-info">{{ $role[4] }}</span></td>
                        <td>{{ $role[5] }}</td>
                        <td>
                            <button class="btn btn-sm btn-icon btn-text-secondary btn-edit-role"
                                data-id="{{ $role[0] }}"
                                data-name="{{ $role[1] }}"
                                data-description="{{ $role[2] }}"
                                data-bs-toggle="offcanvas" data-bs-target="#editRoleDrawer">
                                <i class="bx bx-edit-alt"></i>
                            </button>
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
<div class="offcanvas offcanvas-end" tabindex="-1" id="addRoleDrawer" aria-labelledby="addRoleDrawerLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="addRoleDrawerLabel">
            <i class="bx bx-shield-plus me-2 text-primary"></i> Add New Role
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body">
        <form method="POST" onsubmit="return false">
            <div class="row g-3">
                <div class="col-12">
                    <label class="form-label">Role Name</label>
                    <input type="text" class="form-control" placeholder="e.g. Manager">
                </div>
                <div class="col-12">
                    <label class="form-label">Description</label>
                    <textarea class="form-control" rows="3" placeholder="Describe what this role can do..."></textarea>
                </div>
                <div class="col-12">
                    <label class="form-label">Permissions</label>
                    <div class="perm-check-grid mt-1">
                        @foreach(['Create Users','Edit Users','Delete Users','View Users','Create Roles','Edit Roles','Delete Roles','View Reports','Manage Permissions','System Settings'] as $perm)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="add_perm_{{ $loop->index }}">
                            <label class="form-check-label" for="add_perm_{{ $loop->index }}">{{ $perm }}</label>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
    </div>
    <div class="offcanvas-footer d-flex gap-2">
        <button type="submit" class="btn btn-primary">
            <i class="bx bx-check me-1"></i> Save Role
        </button>
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="offcanvas">Cancel</button>
        </form>
    </div>
</div>

{{-- Edit Role Offcanvas --}}
<div class="offcanvas offcanvas-end" tabindex="-1" id="editRoleDrawer" aria-labelledby="editRoleDrawerLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="editRoleDrawerLabel">
            <i class="bx bx-edit me-2 text-primary"></i> Edit Role
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body">
        <form method="POST" onsubmit="return false" id="editRoleForm">
            <div class="row g-3">
                <div class="col-12">
                    <label class="form-label">Role Name</label>
                    <input type="text" class="form-control" id="edit_role_name" placeholder="e.g. Manager">
                </div>
                <div class="col-12">
                    <label class="form-label">Description</label>
                    <textarea class="form-control" id="edit_role_description" rows="3"></textarea>
                </div>
                <div class="col-12">
                    <label class="form-label">Permissions</label>
                    <div class="perm-check-grid mt-1">
                        @foreach(['Create Users','Edit Users','Delete Users','View Users','Create Roles','Edit Roles','Delete Roles','View Reports','Manage Permissions','System Settings'] as $perm)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="edit_perm_{{ $loop->index }}">
                            <label class="form-check-label" for="edit_perm_{{ $loop->index }}">{{ $perm }}</label>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
    </div>
    <div class="offcanvas-footer d-flex gap-2">
        <button type="submit" class="btn btn-primary">
            <i class="bx bx-check me-1"></i> Update Role
        </button>
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="offcanvas">Cancel</button>
        </form>
    </div>
</div>

@endsection

@section('script')
<script src="{{ asset('admin_assets') }}/custom/js/roles.js?v={{ time() }}"></script>
@endsection
