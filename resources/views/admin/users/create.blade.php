@extends('admin.layout.admin_master')
@section('title', 'Add New User | KStarter')
@section('content')

<h4 class="fw-bold py-3 mb-4">
    <span class="text-muted fw-light"><a href="{{ url('admin/users') }}">Users</a> /</span> Add New User
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
                            <input type="text" class="form-control" placeholder="John">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Last Name</label>
                            <input type="text" class="form-control" placeholder="Doe">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">User Name</label>
                            <input type="text" class="form-control" placeholder="john.doe">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Email Address</label>
                            <input type="email" class="form-control" placeholder="john@example.com">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Mobile Number</label>
                            <input type="text" class="form-control" placeholder="+1 202 555 0111">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Department</label>
                            <input type="text" class="form-control" placeholder="e.g. Engineering">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">User Role</label>
                            <select class="form-select">
                                <option value="">Select Role</option>
                                <option>Admin</option>
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
                                <option>Active</option>
                                <option>Inactive</option>
                            </select>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" placeholder="············">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" placeholder="············">
                        </div>
                    </div>
                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary me-2">Save User</button>
                        <a href="{{ url('admin/users') }}" class="btn btn-outline-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card mb-4">
            <h5 class="card-header">Avatar</h5>
            <div class="card-body text-center">
                <div class="mb-3">
                    <span class="avatar" style="width:80px;height:80px;font-size:32px;background:#696cff;color:#fff;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;font-weight:700;">?</span>
                </div>
                <label for="userAvatar" class="btn btn-outline-primary btn-sm">
                    <i class="bx bx-upload me-1"></i> Upload Photo
                    <input type="file" id="userAvatar" hidden accept="image/png, image/jpeg">
                </label>
                <p class="text-muted small mt-2 mb-0">Allowed JPG or PNG. Max 800KB</p>
            </div>
        </div>

        <div class="card">
            <h5 class="card-header">Note</h5>
            <div class="card-body">
                <ul class="list-unstyled mb-0">
                    <li class="mb-2"><i class="bx bx-check-circle text-success me-2"></i>Use a valid email address</li>
                    <li class="mb-2"><i class="bx bx-check-circle text-success me-2"></i>Password min 8 characters</li>
                    <li class="mb-2"><i class="bx bx-check-circle text-success me-2"></i>Assign appropriate role</li>
                    <li><i class="bx bx-check-circle text-success me-2"></i>Username must be unique</li>
                </ul>
            </div>
        </div>
    </div>
</div>

@endsection
