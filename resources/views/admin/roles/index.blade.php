@extends('admin.layout.admin_master')
@section('title', 'KStarter Laravel | Roles')

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
    @if(validatePermissions('admin/roles/form/add'))
    <button class="btn btn-primary" type="button" id="addRoleBtn">
        <i class="bx bx-plus me-1"></i> Add Role
    </button>
    @endif
</div>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center gap-3">
        <input type="text" id="roleSearchInput" class="form-control" placeholder="Search roles..." style="max-width:20%;">
        <div class="d-flex gap-2">
            <button id="exportRolesBtn" class="btn btn-success">
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
                    @forelse($roles as $index => $role)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $role->role_name }}</td>
                        <td>
                            <div class="d-flex flex-wrap align-items-center gap-1">
                                @php $permCount = $role->permissions_count ?? 0; @endphp
                                @if($permCount > 0)
                                    <span class="badge bg-label-warning">{{ $permCount }} permission{{ $permCount > 1 ? 's' : '' }}</span>
                                @else
                                    <span class="text-muted small">No permissions</span>
                                @endif
                            </div>
                        </td>
                        <td>
                            @if(validatePermissions('admin/roles/edit/{id}') && $role->id !== 1)
                            <a href="{{ route('admin.roles.edit', encodeId($role->id)) }}" class="btn btn-sm btn-icon btn-text-secondary">
                                <i class="bx bx-edit-alt"></i>
                            </a>
                            @endif
                            @if(validatePermissions('admin/roles/delete/{id}') && $role->id !== 1)
                            <a href="javascript:void(0);" class="btn btn-sm btn-icon btn-text-danger btn-delete-role"
                                data-id="{{ encodeId($role->id) }}">
                                <i class="bx bx-trash"></i>
                            </a>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center text-muted py-3">No roles found.</td>
                    </tr>
                    @endforelse
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
