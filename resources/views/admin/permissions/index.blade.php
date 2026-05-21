@extends('admin.layout.admin_master')
@section('title', 'Permissions | KStarter')
@section('content')

<h4 class="fw-bold py-3 mb-4">Permissions</h4>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center flex-wrap gap-2">
        <h5 class="m-0">Permissions List</h5>
        <div class="d-flex gap-2 align-items-center flex-wrap">
            <input type="text" class="form-control form-control-sm" placeholder="Search permissions..." style="width:220px;">
            <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addPermissionModal">
                <i class="bx bx-plus me-1"></i> Add Permission
            </button>
        </div>
    </div>
    <div class="table-responsive text-nowrap">
        <table class="table table-hover">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Permission Name</th>
                    <th>Category</th>
                    <th>Guard</th>
                    <th>Assigned Roles</th>
                    <th>Created</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach([
                    [1,'create-users','User Management','web',3,'2024-01-01'],
                    [2,'edit-users','User Management','web',2,'2024-01-01'],
                    [3,'delete-users','User Management','web',1,'2024-01-01'],
                    [4,'view-users','User Management','web',5,'2024-01-01'],
                    [5,'create-roles','Role Management','web',1,'2024-01-05'],
                    [6,'edit-roles','Role Management','web',1,'2024-01-05'],
                    [7,'delete-roles','Role Management','web',1,'2024-01-05'],
                    [8,'view-reports','Reports','web',3,'2024-01-10'],
                ] as $perm)
                <tr>
                    <td>{{ $perm[0] }}</td>
                    <td><code>{{ $perm[1] }}</code></td>
                    <td><span class="badge bg-label-info">{{ $perm[2] }}</span></td>
                    <td><span class="badge bg-label-secondary">{{ $perm[3] }}</span></td>
                    <td><span class="badge bg-label-warning">{{ $perm[4] }} roles</span></td>
                    <td>{{ $perm[5] }}</td>
                    <td>
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#editPermissionModal">
                                    <i class="bx bx-edit-alt me-1"></i> Edit
                                </a>
                                <a class="dropdown-item text-danger" href="javascript:void(0);" onclick="return confirm('Delete this permission?')">
                                    <i class="bx bx-trash me-1"></i> Delete
                                </a>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-footer d-flex justify-content-between align-items-center">
        <small class="text-muted">Showing 1 to 8 of 42 entries</small>
        <nav>
            <ul class="pagination pagination-sm m-0">
                <li class="page-item disabled"><a class="page-link" href="#">Prev</a></li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">4</a></li>
                <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
        </nav>
    </div>
</div>

{{-- Add Permission Modal --}}
<div class="modal fade" id="addPermissionModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Permission</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3"><label class="form-label">Permission Name</label><input type="text" class="form-control" placeholder="e.g. create-users"></div>
                <div class="mb-3">
                    <label class="form-label">Category</label>
                    <select class="form-select">
                        <option>User Management</option>
                        <option>Role Management</option>
                        <option>Reports</option>
                        <option>Settings</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Guard</label>
                    <select class="form-select"><option>web</option><option>api</option></select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>

{{-- Edit Permission Modal --}}
<div class="modal fade" id="editPermissionModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Permission</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3"><label class="form-label">Permission Name</label><input type="text" class="form-control" value="create-users"></div>
                <div class="mb-3">
                    <label class="form-label">Category</label>
                    <select class="form-select"><option selected>User Management</option><option>Role Management</option><option>Reports</option><option>Settings</option></select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Guard</label>
                    <select class="form-select"><option selected>web</option><option>api</option></select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Update</button>
            </div>
        </div>
    </div>
</div>

@endsection
