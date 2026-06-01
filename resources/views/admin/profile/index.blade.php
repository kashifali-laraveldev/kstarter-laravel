@extends('admin.layout.admin_master')
@section('title', 'KStarter | Profile')

@section('content')

<div class="py-3 mb-4 d-flex justify-content-between align-items-center">
    <div>
        <h4 class="fw-bold mb-1">My Profile</h4>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-style1 mb-0" style="--bs-breadcrumb-divider: '•';">
                <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">My Profile</li>
            </ol>
        </nav>
    </div>
</div>

{{-- Profile Details --}}
<div class="card mb-4">
    <div class="card-header">
        <h6 class="mb-0"><i class="bx bx-user me-2 text-primary"></i> Profile Details</h6>
    </div>
    <div class="card-body">

        {{-- Avatar Upload --}}
        <div class="d-flex align-items-center gap-4 mb-4">
            <span class="avatar" style="width:80px;height:80px;font-size:32px;background:#696cff;color:#fff;border-radius:10px;display:flex;align-items:center;justify-content:center;font-weight:700;flex-shrink:0;">J</span>
            <div>
                <label for="upload" class="btn btn-primary btn-sm me-2" tabindex="0">
                    <i class="bx bx-upload me-1"></i> Upload Photo
                    <input type="file" id="upload" hidden accept="image/png, image/jpeg">
                </label>
                <button type="button" class="btn btn-outline-secondary btn-sm">
                    <i class="bx bx-reset me-1"></i> Reset
                </button>
                <p class="text-muted small mb-0 mt-1">Allowed JPG, GIF or PNG. Max size 800K</p>
            </div>
        </div>

        <hr class="mt-0 mb-4">

        <form method="POST" onsubmit="return false">
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">First Name</label>
                    <input class="form-control" type="text" value="John">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Last Name</label>
                    <input class="form-control" type="text" value="Doe">
                </div>
                <div class="col-md-6">
                    <label class="form-label">User Name</label>
                    <input class="form-control" type="text" value="john.doe">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Email Address</label>
                    <input class="form-control" type="email" value="john.doe@example.com">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Mobile Number</label>
                    <input class="form-control" type="text" value="+1 202 555 0111">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Department</label>
                    <input class="form-control" type="text" value="Engineering">
                </div>
                <div class="col-md-6">
                    <label class="form-label">User Role</label>
                    <input class="form-control" type="text" value="Admin" disabled>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Status</label>
                    <input class="form-control" type="text" value="Active" disabled>
                </div>
            </div>
            <div class="mt-4 d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="bx bx-check me-1"></i> Save Changes
                </button>
                <button type="reset" class="btn btn-outline-secondary">Cancel</button>
            </div>
        </form>
    </div>
</div>

{{-- Change Password --}}
<div class="card mb-4">
    <div class="card-header">
        <h6 class="mb-0"><i class="bx bx-lock me-2 text-primary"></i> Change Password</h6>
    </div>
    <div class="card-body">
        <form onsubmit="return false">
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Current Password</label>
                    <input class="form-control" type="password" placeholder="············">
                </div>
                <div class="col-md-6">
                    <label class="form-label">New Password</label>
                    <input class="form-control" type="password" placeholder="············">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Confirm New Password</label>
                    <input class="form-control" type="password" placeholder="············">
                </div>
            </div>
            <div class="mt-4">
                <button type="submit" class="btn btn-primary">
                    <i class="bx bx-check me-1"></i> Change Password
                </button>
            </div>
        </form>
    </div>
</div>

{{-- Delete Account --}}
<div class="card">
    <div class="card-header">
        <h6 class="mb-0"><i class="bx bx-trash me-2 text-danger"></i> Delete Account</h6>
    </div>
    <div class="card-body">
        <div class="alert alert-warning mb-3">
            <h6 class="alert-heading fw-bold mb-1">Are you sure you want to delete your account?</h6>
            <p class="mb-0">Once you delete your account, there is no going back. Please be certain.</p>
        </div>
        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" id="accountActivation">
            <label class="form-check-label" for="accountActivation">I confirm my account deactivation</label>
        </div>
        <button type="button" class="btn btn-danger">
            <i class="bx bx-trash me-1"></i> Deactivate Account
        </button>
    </div>
</div>

@endsection
