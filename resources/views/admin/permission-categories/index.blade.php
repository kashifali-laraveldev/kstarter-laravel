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
        border: 1px solid transparent;
        border-radius: 0.375rem;
        padding: 0.25rem 0.5rem;
        font-size: 0.875rem;
        color: #697a8d;
        background: transparent;
        transition: border-color 0.15s, background 0.15s;
        outline: none;
    }
    .order-input:hover {
        border-color: #d9dee3;
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
    <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#addCategoryDrawer">
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
                        [1, 'User Management',      8,  1],
                        [2, 'Role Management',       6,  2],
                        [3, 'Permission Management', 4,  3],
                        [4, 'Reports',               5,  4],
                        [5, 'Settings',              10, 5],
                        [6, 'Content Management',    9,  6],
                    ] as $cat)
                    <tr>
                        <td>{{ $cat[0] }}</td>
                        <td>{{ $cat[1] }}</td>
                        <td><span class="badge bg-label-primary">{{ $cat[2] }}</span></td>
                        <td>
                            <input type="text"
                                class="order-input"
                                value="{{ $cat[3] }}"
                                data-id="{{ $cat[0] }}"
                                title="Click to edit display order">
                        </td>
                        <td>
                            <button class="btn btn-sm btn-icon btn-text-secondary btn-edit-cat"
                                data-id="{{ $cat[0] }}"
                                data-name="{{ $cat[1] }}"
                                data-bs-toggle="offcanvas" data-bs-target="#editCategoryDrawer">
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
<div class="offcanvas offcanvas-end" tabindex="-1" id="addCategoryDrawer" aria-labelledby="addCategoryDrawerLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="addCategoryDrawerLabel">
            <i class="bx bx-category me-2 text-primary"></i> Add New Category
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body">
        <form method="POST" onsubmit="return false">
            <div class="row g-3">
                <div class="col-12">
                    <label class="form-label">Category Name</label>
                    <input type="text" class="form-control" id="add_cat_name" placeholder="e.g. User Management">
                </div>
            </div>
    </div>
    <div class="offcanvas-footer d-flex gap-2">
        <button type="submit" class="btn btn-primary">
            <i class="bx bx-check me-1"></i> Save Category
        </button>
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="offcanvas">Cancel</button>
        </form>
    </div>
</div>

{{-- Edit Category Offcanvas --}}
<div class="offcanvas offcanvas-end" tabindex="-1" id="editCategoryDrawer" aria-labelledby="editCategoryDrawerLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="editCategoryDrawerLabel">
            <i class="bx bx-edit me-2 text-primary"></i> Edit Category
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body">
        <form method="POST" onsubmit="return false" id="editCategoryForm">
            <div class="row g-3">
                <div class="col-12">
                    <label class="form-label">Category Name</label>
                    <input type="text" class="form-control" id="edit_cat_name" placeholder="e.g. User Management">
                </div>
            </div>
    </div>
    <div class="offcanvas-footer d-flex gap-2">
        <button type="submit" class="btn btn-primary">
            <i class="bx bx-check me-1"></i> Update Category
        </button>
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="offcanvas">Cancel</button>
        </form>
    </div>
</div>

@endsection

@section('script')
<script src="{{ asset('admin_assets') }}/custom/js/permission_categories.js?v={{ time() }}"></script>
@endsection
