@extends('admin.layout.admin_master')
@section('title', 'Roles | KStarter')
@section('content')

<h4 class="fw-bold py-3 mb-4">Roles</h4>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center flex-wrap gap-2">
        <h5 class="m-0">Roles List</h5>
        <div class="d-flex gap-2 align-items-center flex-wrap">
            <input type="text" class="form-control form-control-sm" placeholder="Search roles..." style="width:220px;">
            <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addRoleModal">
                <i class="bx bx-plus me-1"></i> Add Role
            </button>
        </div>
    </div>
    <div class="table-responsive text-nowrap">
        <table class="table table-hover">
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
                    [1,'Admin','Full system access',42,5,'2024-01-01'],
                    [2,'Manager','Manage users and content',28,12,'2024-01-05'],
                    [3,'Editor','Create and edit content',15,8,'2024-01-10'],
                    [4,'Moderator','Moderate user content',10,3,'2024-01-15'],
                    [5,'Viewer','Read-only access',5,25,'2024-02-01'],
                    [6,'Support','Handle support tickets',8,4,'2024-02-10'],
                    [7,'Analyst','View reports and analytics',6,2,'2024-03-01'],
                ] as $role)
                <tr>
                    <td>{{ $role[0] }}</td>
                    <td><strong>{{ $role[1] }}</strong></td>
                    <td>{{ $role[2] }}</td>
                    <td><span class="badge bg-label-warning">{{ $role[3] }}</span></td>
                    <td><span class="badge bg-label-info">{{ $role[4] }}</span></td>
                    <td>{{ $role[5] }}</td>
                    <td>
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#editRoleModal">
                                    <i class="bx bx-edit-alt me-1"></i> Edit
                                </a>
                                <a class="dropdown-item text-danger" href="javascript:void(0);" onclick="return confirm('Delete this role?')">
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
        <small class="text-muted">Showing 1 to 7 of 7 entries</small>
        <nav>
            <ul class="pagination pagination-sm m-0">
                <li class="page-item disabled"><a class="page-link" href="#">Prev</a></li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
        </nav>
    </div>
</div>

{{-- Add Role Modal --}}
<div class="modal fade" id="addRoleModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Role</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3"><label class="form-label">Role Name</label><input type="text" class="form-control" placeholder="e.g. Manager"></div>
                <div class="mb-3"><label class="form-label">Description</label><textarea class="form-control" rows="3" placeholder="Role description..."></textarea></div>
                <div class="mb-3">
                    <label class="form-label">Permissions</label>
                    <div class="row">
                        @foreach(['Create Users','Edit Users','Delete Users','View Reports','Manage Roles','Manage Permissions'] as $perm)
                        <div class="col-6"><div class="form-check mb-2"><input class="form-check-input" type="checkbox"><label class="form-check-label">{{ $perm }}</label></div></div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>

{{-- Edit Role Modal --}}
<div class="modal fade" id="editRoleModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Role</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3"><label class="form-label">Role Name</label><input type="text" class="form-control" value="Admin"></div>
                <div class="mb-3"><label class="form-label">Description</label><textarea class="form-control" rows="3">Full system access</textarea></div>
                <div class="mb-3">
                    <label class="form-label">Permissions</label>
                    <div class="row">
                        @foreach(['Create Users','Edit Users','Delete Users','View Reports','Manage Roles','Manage Permissions'] as $perm)
                        <div class="col-6"><div class="form-check mb-2"><input class="form-check-input" type="checkbox" checked><label class="form-check-label">{{ $perm }}</label></div></div>
                        @endforeach
                    </div>
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
