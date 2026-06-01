@extends('admin.layout.admin_master')
@section('title', 'KStarter | Permission Categories')

@section('css')
<style>
    table.dataTable thead th { vertical-align: middle; }
    div.dataTables_wrapper div.dataTables_paginate ul.pagination { margin: 0; }
    div.dataTables_wrapper div.dataTables_info { padding-top: 0.5rem; }
    .offcanvas.offcanvas-end { width: 680px; }
    .offcanvas-header { border-bottom: 1px solid #e7e7e9; padding: 1.25rem 1.5rem; }
    .offcanvas-footer { border-top: 1px solid #e7e7e9; padding: 1.25rem 1.5rem; }
    .offcanvas-body { padding: 1.5rem; }

    /* Inline editable display order */
    .order-input {
        width: 70px;
        text-align: center;
        border: 1px solid #d9dee3;
        border-radius: 0.375rem;
        padding: 0.25rem 0.5rem;
        font-size: 0.875rem;
        color: #697a8d;
        background: #f8f8ff;
        transition: border-color 0.15s, box-shadow 0.15s, background 0.15s;
        outline: none;
        cursor: text;
    }
    .order-input:hover {
        border-color: #696cff;
        background: #fff;
    }
    .order-input:focus {
        border-color: #696cff;
        background: #fff;
        box-shadow: 0 0 0 0.15rem rgba(105,108,255,0.15);
    }
    .order-saved {
        border-color: #71dd37 !important;
        background: #fff !important;
        box-shadow: 0 0 0 0.15rem rgba(113,221,55,0.15) !important;
    }
</style>
@endsection

@section('content')

<div class="py-3 mb-4 d-flex justify-content-between align-items-center">
    <div>
        <h4 class="fw-bold mb-1">Manage Permission Categories</h4>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-style1 mb-0" style="--bs-breadcrumb-divider: '•';">
                <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Permission Categories</li>
            </ol>
        </nav>
    </div>
    <button class="btn btn-primary" type="button" id="addCategoryBtn">
        <i class="bx bx-plus me-1"></i> Add Category
    </button>
</div>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center gap-3">
        <input type="text" id="catSearchInput" class="form-control" placeholder="Search categories..." style="max-width:20%;">
        <div class="d-flex gap-2">
            <button id="exportCatsBtn" class="btn btn-outline-success">
                <i class="bx bx-export me-1"></i> Export Excel
            </button>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="categoriesTable" class="table table-hover" style="width:100%">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Category Name</th>
                        <th>Permissions</th>
                        <th>Display Order</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach([
                        [1, 'User Management',      'bx bx-user',           ['All Users Listing', 'Create User', 'Edit User', 'Delete User', 'View User'],                 1],
                        [2, 'Role Management',       'bx bx-shield',         ['All Roles Listing', 'Create Role', 'Edit Role', 'Delete Role'],                              2],
                        [3, 'Permission Management', 'bx bx-lock-open-alt',  ['All Permissions', 'Create Permission', 'Edit Permission', 'Delete Permission'],               3],
                        [4, 'Reports',               'bx bx-bar-chart-alt-2',['View Reports', 'Export Report Data', 'Download Report'],                                     4],
                        [5, 'Settings',              'bx bx-cog',            ['General Settings', 'Mail Settings', 'Payment Settings', 'SMS Settings', 'Cache Settings',
                                                                               'Backup Settings', 'Security Settings', 'API Settings', 'Log Settings', 'Profile Settings'],  5],
                        [6, 'Content Management',    'bx bx-file',           ['Manage Pages', 'Manage Blog', 'Manage Media', 'Manage Banners', 'Manage FAQs',
                                                                               'Manage Testimonials', 'Manage Tags', 'Manage Categories', 'Manage Comments'],                 6],
                    ] as $cat)
                    <tr>
                        <td>{{ $cat[0] }}</td>
                        <td>{{ $cat[1] }}</td>
                        <td>
                            <div class="d-flex flex-wrap align-items-center gap-1">
                                @foreach(array_slice($cat[3], 0, 3) as $perm)
                                    <span class="badge bg-label-primary">{{ $perm }}</span>
                                @endforeach
                                @if(count($cat[3]) > 3)
                                    <span class="text-muted small">+{{ count($cat[3]) - 3 }} more</span>
                                @endif
                            </div>
                        </td>
                        <td>
                            <input type="text"
                                class="order-input"
                                value="{{ $cat[4] }}"
                                data-id="{{ $cat[0] }}"
                                title="Click to edit display order">
                        </td>
                        <td>
                            <button class="btn btn-sm btn-icon btn-text-secondary btn-edit-cat"
                                data-id="{{ $cat[0] }}"
                                data-name="{{ $cat[1] }}"
                                data-icon="{{ $cat[2] }}">
                                <i class="bx bx-edit-alt"></i>
                            </button>
                            <a href="javascript:void(0);" class="btn btn-sm btn-icon btn-text-danger btn-delete-cat">
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

{{-- Add Category Offcanvas --}}
<div class="offcanvas offcanvas-end" tabindex="-1" id="addCategoryDrawer"
     aria-labelledby="addCategoryDrawerLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="addCategoryDrawerLabel">
            <i class="bx bx-category me-2 text-primary"></i> Add New Category
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
    </div>
    <form id="addCategoryForm" onsubmit="return false">
        <div class="offcanvas-body" id="addCategoryDrawerBody"></div>
        <div class="offcanvas-footer d-flex gap-2">
            <button type="submit" class="btn btn-primary">
                <i class="bx bx-check me-1"></i> Save Category
            </button>
            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="offcanvas">Cancel</button>
        </div>
    </form>
</div>

{{-- Edit Category Offcanvas --}}
<div class="offcanvas offcanvas-end" tabindex="-1" id="editCategoryDrawer"
     aria-labelledby="editCategoryDrawerLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="editCategoryDrawerLabel">
            <i class="bx bx-edit me-2 text-primary"></i> Edit Category
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
    </div>
    <form id="editCategoryForm" onsubmit="return false">
        <div class="offcanvas-body" id="editCategoryDrawerBody"></div>
        <div class="offcanvas-footer d-flex gap-2">
            <button type="submit" class="btn btn-primary">
                <i class="bx bx-check me-1"></i> Update Category
            </button>
            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="offcanvas">Cancel</button>
        </div>
    </form>
</div>

@endsection

@section('script')
<script src="{{ asset('admin_assets') }}/custom/js/permission_categories.js?v={{ time() }}"></script>
@endsection
