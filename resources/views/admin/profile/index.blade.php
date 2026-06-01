@extends('admin.layout.admin_master')
@section('title', 'KStarter Laravel | Profile')

@section('content')

@php
    $profile  = $user->profile;
    $roleName = optional(optional($user->userRoles->first())->role)->role_name ?? '-';
    $initials = strtoupper(substr($profile->first_name ?? $user->user_name, 0, 1));
@endphp

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

        <div class="d-flex align-items-center gap-4 mb-4">
            @if($profile && $profile->profile_picture)
                <img src="{{ asset('storage/' . $profile->profile_picture) }}"
                    id="profileAvatarPreview"
                    style="width:80px;height:80px;object-fit:cover;border-radius:10px;flex-shrink:0;"
                    alt="{{ $initials }}">
            @else
                <span id="profileAvatarPreview" style="width:80px;height:80px;font-size:32px;background:#696cff;color:#fff;border-radius:10px;display:flex;align-items:center;justify-content:center;font-weight:700;flex-shrink:0;">{{ $initials }}</span>
            @endif
            <div>
                <label for="profile_picture_input" class="btn btn-primary btn-sm me-2" tabindex="0">
                    <i class="bx bx-upload me-1"></i> Upload Photo
                </label>
                <p class="text-muted small mb-0 mt-1">Allowed JPG, GIF, PNG or WEBP. Max size 2MB</p>
                <p id="profile_file_label" class="text-primary small mb-0 mt-1" style="display:none;word-break:break-all;"></p>
            </div>
        </div>

        <hr class="mt-0 mb-4">

        <form id="profileForm" enctype="multipart/form-data" autocomplete="off">
            {{-- file input inside form so FormData captures it --}}
            <input type="file" id="profile_picture_input" name="profile_picture" hidden accept="image/png,image/jpeg,image/gif,image/webp">
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">First Name</label>
                    <input class="form-control" type="text" name="first_name" value="{{ $profile->first_name ?? '' }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Last Name</label>
                    <input class="form-control" type="text" name="last_name" value="{{ $profile->last_name ?? '' }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">User Name</label>
                    <input class="form-control" type="text" value="{{ $user->user_name }}" disabled>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Email Address</label>
                    <input class="form-control" type="email" value="{{ $profile->email_address ?? '' }}" disabled>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Mobile Number</label>
                    <input class="form-control" type="text" name="mobile_number" value="{{ $profile->mobile_number ?? '' }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Department</label>
                    <input class="form-control" type="text" name="department_name" value="{{ $profile->department_name ?? '' }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">User Role(s)</label>
                    <input class="form-control" type="text" value="{{ $roleName }}" disabled>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Status</label>
                    <input class="form-control" type="text" value="{{ $user->status }}" disabled>
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
<div class="card">
    <div class="card-header">
        <h6 class="mb-0"><i class="bx bx-lock me-2 text-primary"></i> Change Password</h6>
    </div>
    <div class="card-body">
        <form id="changePasswordForm" autocomplete="off">
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Current Password</label>
                    <input class="form-control" type="password" name="current_password" placeholder="············">
                </div>
                <div class="col-md-6">
                    <label class="form-label">New Password</label>
                    <input class="form-control" type="password" name="new_password" placeholder="············">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Confirm New Password</label>
                    <input class="form-control" type="password" name="new_password_confirmation" placeholder="············">
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

@endsection

@section('script')
<script src="{{ asset('admin_assets') }}/custom/js/profile.js?v={{ time() }}"></script>
@endsection
