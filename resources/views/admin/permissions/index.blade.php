@extends('admin.layout.admin_master')
@section('title', 'KStarter Laravel | Permissions')

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
    @if(validatePermissions('admin/permissions/form/add'))
    <button class="btn btn-primary" type="button" id="addPermissionBtn">
        <i class="bx bx-plus me-1"></i> Add Permission
    </button>
    @endif
</div>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center gap-3">
        <input type="text" id="permSearchInput" class="form-control" placeholder="Search permissions..." style="max-width:20%;">
        <div class="d-flex gap-2">
            <button id="exportPermsBtn" class="btn btn-success">
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
                        <th>Show in Menu</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @forelse($permissions as $index => $permission)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $permission->permission_name }}</td>
                        <td>{{ $permission->route }}</td>
                        <td>
                            @if($permission->category)
                                <span class="badge bg-label-info">{{ $permission->category->category_name }}</span>
                            @else
                                <span class="text-muted small">-</span>
                            @endif
                        </td>
                        <td>
                            @if($permission->show_in_menu)
                                <span class="badge bg-label-success">Yes</span>
                            @else
                                <span class="badge bg-label-secondary">No</span>
                            @endif
                        </td>
                        <td>
                            @if(validatePermissions('admin/permissions/form/edit/{id}'))
                            <button class="btn btn-sm btn-icon btn-text-secondary btn-edit-perm"
                                data-id="{{ encodeId($permission->id) }}">
                                <i class="bx bx-edit-alt"></i>
                            </button>
                            @endif
                            @if(validatePermissions('admin/permissions/delete/{id}'))
                            <a href="javascript:void(0);" class="btn btn-sm btn-icon btn-text-danger btn-delete-perm"
                                data-id="{{ encodeId($permission->id) }}">
                                <i class="bx bx-trash"></i>
                            </a>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted py-3">No permissions found.</td>
                    </tr>
                    @endforelse
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
