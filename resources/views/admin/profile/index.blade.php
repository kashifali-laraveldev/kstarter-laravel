@extends('admin.layout.admin_master')
@section('title', 'KStarter | Profile')
@section('content')

<h4 class="fw-bold py-3 mb-4">Profile</h4>

<div class="row">
    <div class="col-md-12">
        <div class="card mb-4">
            <h5 class="card-header">Profile Details</h5>
            <div class="card-body">
                <div class="d-flex align-items-start align-items-sm-center gap-4">
                    <span class="avatar avatar-xl" style="width:100px;height:100px;font-size:40px;background:#696cff;color:#fff;border-radius:10px;display:flex;align-items:center;justify-content:center;font-weight:700;">J</span>
                    <div class="button-wrapper">
                        <label for="upload" class="btn btn-primary me-2 mb-2" tabindex="0">
                            <i class="bx bx-upload me-1"></i> Upload new photo
                            <input type="file" id="upload" hidden accept="image/png, image/jpeg">
                        </label>
                        <button type="button" class="btn btn-outline-secondary mb-2">
                            <i class="bx bx-reset me-1"></i> Reset
                        </button>
                        <p class="text-muted mb-0 mt-1">Allowed JPG, GIF or PNG. Max size of 800K</p>
                    </div>
                </div>
            </div>
            <hr class="my-0">
            <div class="card-body">
                <form method="POST" onsubmit="return false">
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label">First Name</label>
                            <input class="form-control" type="text" value="John" autofocus>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Last Name</label>
                            <input class="form-control" type="text" value="Doe">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Email</label>
                            <input class="form-control" type="email" value="john.doe@example.com">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Phone Number</label>
                            <input class="form-control" type="text" placeholder="202 555 0111">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Organization</label>
                            <input class="form-control" type="text" value="KStarter">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Address</label>
                            <input class="form-control" type="text" placeholder="Your address">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">State</label>
                            <input class="form-control" type="text" placeholder="California">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Country</label>
                            <select class="form-select">
                                <option>United States</option>
                                <option>United Kingdom</option>
                                <option>Pakistan</option>
                                <option>India</option>
                                <option>Canada</option>
                            </select>
                        </div>
                    </div>
                    <div class="mt-2">
                        <button type="submit" class="btn btn-primary me-2">Save Changes</button>
                        <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="card mb-4">
            <h5 class="card-header">Change Password</h5>
            <div class="card-body">
                <form onsubmit="return false">
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Current Password</label>
                            <input class="form-control" type="password" placeholder="············">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">New Password</label>
                            <input class="form-control" type="password" placeholder="············">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Confirm New Password</label>
                            <input class="form-control" type="password" placeholder="············">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Change Password</button>
                </form>
            </div>
        </div>

        <div class="card">
            <h5 class="card-header">Delete Account</h5>
            <div class="card-body">
                <div class="alert alert-warning">
                    <h6 class="alert-heading fw-bold mb-1">Are you sure you want to delete your account?</h6>
                    <p class="mb-0">Once you delete your account, there is no going back. Please be certain.</p>
                </div>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" id="accountActivation">
                    <label class="form-check-label" for="accountActivation">I confirm my account deactivation</label>
                </div>
                <button type="button" class="btn btn-danger">Deactivate Account</button>
            </div>
        </div>
    </div>
</div>

@endsection
