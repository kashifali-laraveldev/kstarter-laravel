@extends('admin.layout.admin_master')
@section('title', 'Edit User | KStarter')
@section('content')

<h4 class="fw-bold py-3 mb-4">
    <span class="text-muted fw-light"><a href="{{ url('admin/users') }}">Users</a> /</span> Edit User
</h4>

<div class="row">
    <div class="col-md-8">
        <div class="card mb-4">
            <h5 class="card-header">User Information</h5>
            <div class="card-body">
                <form method="POST" onsubmit="return false">
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label">First Name</label>
                            <input type="text" class="form-control" value="John">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Last Name</label>
                            <input type="text" class="form-control" value="Doe">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">User Name</label>
                            <input type="text" class="form-control" value="john.doe">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Email Address</label>
                            <input type="email" class="form-control" value="john@example.com">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Mobile Number</label>
                            <input type="text" class="form-control" value="+1 202 555 0111">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Department</label>
                            <input type="text" class="form-control" value="Engineering">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">User Role</label>
                            <select class="form-select">
                                <option selected>Admin</option>
                                <option>Manager</option>
                                <option>Editor</option>
                                <option>Viewer</option>
                                <option>Moderator</option>
                                <option>Analyst</option>
                            </select>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Status</label>
                            <select class="form-select">
                                <option selected>Active</option>
                                <option>Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary me-2">Update User</button>
                        <a href="{{ url('admin/users') }}" class="btn btn-outline-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>

        <div class="card">
            <h5 class="card-header">Change Password</h5>
            <div class="card-body">
                <form onsubmit="return false">
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label">New Password</label>
                            <input type="password" class="form-control" placeholder="············">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" placeholder="············">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-warning">Update Password</button>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card mb-4">
            <h5 class="card-header">Avatar</h5>
            <div class="card-body text-center">
                <div class="mb-3">
                    <span class="avatar" style="width:80px;height:80px;font-size:32px;background:#696cff;color:#fff;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;font-weight:700;">J</span>
                </div>
                <label for="userAvatar" class="btn btn-outline-primary btn-sm">
                    <i class="bx bx-upload me-1"></i> Change Photo
                    <input type="file" id="userAvatar" hidden accept="image/png, image/jpeg">
                </label>
                <p class="text-muted small mt-2 mb-0">Allowed JPG or PNG. Max 800KB</p>
            </div>
        </div>

        <div class="card">
            <h5 class="card-header">User Info</h5>
            <div class="card-body">
                <ul class="list-unstyled mb-0">
                    <li class="mb-2"><span class="text-muted">ID:</span> <strong>#{{ $id }}</strong></li>
                    <li class="mb-2"><span class="text-muted">Joined:</span> <strong>2024-01-10</strong></li>
                    <li class="mb-2"><span class="text-muted">Last Login:</span> <strong>2024-03-20</strong></li>
                    <li><span class="text-muted">Status:</span> <span class="badge bg-label-success">Active</span></li>
                </ul>
            </div>
        </div>
    </div>
</div>

@endsection
