@extends('admin.layout.admin_master')
@section('title', 'Permission Categories | KStarter')
@section('content')

<h4 class="fw-bold py-3 mb-4">Permission Categories</h4>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center flex-wrap gap-2">
        <h5 class="m-0">Categories List</h5>
        <div class="d-flex gap-2 align-items-center flex-wrap">
            <input type="text" class="form-control form-control-sm" placeholder="Search categories..." style="width:220px;">
            <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
                <i class="bx bx-plus me-1"></i> Add Category
            </button>
        </div>
    </div>
    <div class="table-responsive text-nowrap">
        <table class="table table-hover">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Category Name</th>
                    <th>Slug</th>
                    <th>Permissions Count</th>
                    <th>Description</th>
                    <th>Created</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach([
                    [1,'User Management','user-management',8,'Manage system users','2024-01-01'],
                    [2,'Role Management','role-management',6,'Manage roles and assignments','2024-01-05'],
                    [3,'Permission Management','permission-management',4,'Manage permissions','2024-01-10'],
                    [4,'Reports','reports',5,'Access and export reports','2024-01-15'],
                    [5,'Settings','settings',10,'System configuration settings','2024-02-01'],
                    [6,'Content Management','content-management',9,'Manage site content','2024-02-10'],
                ] as $cat)
                <tr>
                    <td>{{ $cat[0] }}</td>
                    <td><strong>{{ $cat[1] }}</strong></td>
                    <td><code>{{ $cat[2] }}</code></td>
                    <td><span class="badge bg-label-primary">{{ $cat[3] }}</span></td>
                    <td>{{ $cat[4] }}</td>
                    <td>{{ $cat[5] }}</td>
                    <td>
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#editCategoryModal">
                                    <i class="bx bx-edit-alt me-1"></i> Edit
                                </a>
                                <a class="dropdown-item text-danger" href="javascript:void(0);" onclick="return confirm('Delete this category?')">
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
        <small class="text-muted">Showing 1 to 6 of 6 entries</small>
        <nav>
            <ul class="pagination pagination-sm m-0">
                <li class="page-item disabled"><a class="page-link" href="#">Prev</a></li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
        </nav>
    </div>
</div>

{{-- Add Category Modal --}}
<div class="modal fade" id="addCategoryModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3"><label class="form-label">Category Name</label><input type="text" class="form-control" placeholder="e.g. User Management"></div>
                <div class="mb-3"><label class="form-label">Slug</label><input type="text" class="form-control" placeholder="e.g. user-management"></div>
                <div class="mb-3"><label class="form-label">Description</label><textarea class="form-control" rows="3" placeholder="Category description..."></textarea></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>

{{-- Edit Category Modal --}}
<div class="modal fade" id="editCategoryModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3"><label class="form-label">Category Name</label><input type="text" class="form-control" value="User Management"></div>
                <div class="mb-3"><label class="form-label">Slug</label><input type="text" class="form-control" value="user-management"></div>
                <div class="mb-3"><label class="form-label">Description</label><textarea class="form-control" rows="3">Manage system users</textarea></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Update</button>
            </div>
        </div>
    </div>
</div>

@endsection
