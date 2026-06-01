@extends('admin.layout.admin_master')
@section('title', 'KStarter Laravel | Add New Permission')
@section('content')

<h4 class="fw-bold py-3 mb-4">
    <span class="text-muted fw-light"><a href="{{ url('admin/permissions') }}">Permissions</a> /</span> Add New Permission
</h4>

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <h5 class="card-header">Permission Information</h5>
            <div class="card-body">
                <form method="POST" onsubmit="return false">
                    <div class="mb-3">
                        <label class="form-label">Permission Name</label>
                        <input type="text" class="form-control" placeholder="e.g. create-users">
                        <small class="text-muted">Use lowercase with hyphens (e.g. create-users, edit-roles)</small>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Category</label>
                        <select class="form-select">
                            <option value="">Select Category</option>
                            <option>User Management</option>
                            <option>Role Management</option>
                            <option>Permission Management</option>
                            <option>Reports</option>
                            <option>Settings</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Guard</label>
                        <select class="form-select">
                            <option>web</option>
                            <option>api</option>
                        </select>
                    </div>
                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary me-2">Save Permission</button>
                        <a href="{{ url('admin/permissions') }}" class="btn btn-outline-secondary">Cancel</a>
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
                    <li class="mb-2"><i class="bx bx-check-circle text-success me-2"></i>Use lowercase-hyphen format</li>
                    <li class="mb-2"><i class="bx bx-check-circle text-success me-2"></i>Assign to a category</li>
                    <li><i class="bx bx-check-circle text-success me-2"></i>Choose correct guard</li>
                </ul>
            </div>
        </div>
    </div>
</div>

@endsection
