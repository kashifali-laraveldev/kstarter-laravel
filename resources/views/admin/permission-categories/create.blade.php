@extends('admin.layout.admin_master')
@section('title', 'KStarter Laravel | Add New Category')
@section('content')

<h4 class="fw-bold py-3 mb-4">
    <span class="text-muted fw-light"><a href="{{ url('admin/permission-categories') }}">Permission Categories</a> /</span> Add New Category
</h4>

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <h5 class="card-header">Category Information</h5>
            <div class="card-body">
                <form method="POST" onsubmit="return false">
                    <div class="mb-3">
                        <label class="form-label">Category Name</label>
                        <input type="text" class="form-control" placeholder="e.g. User Management">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Slug</label>
                        <input type="text" class="form-control" placeholder="e.g. user-management">
                        <small class="text-muted">Auto-generated from name, use lowercase with hyphens</small>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea class="form-control" rows="3" placeholder="Category description..."></textarea>
                    </div>
                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary me-2">Save Category</button>
                        <a href="{{ url('admin/permission-categories') }}" class="btn btn-outline-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card">
            <h5 class="card-header">Note</h5>
            <div class="card-body">
                <ul class="list-unstyled mb-0">
                    <li class="mb-2"><i class="bx bx-check-circle text-success me-2"></i>Use a descriptive name</li>
                    <li class="mb-2"><i class="bx bx-check-circle text-success me-2"></i>Slug must be unique</li>
                    <li><i class="bx bx-check-circle text-success me-2"></i>Group related permissions</li>
                </ul>
            </div>
        </div>
    </div>
</div>

@endsection
