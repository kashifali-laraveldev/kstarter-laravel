@extends('admin.layout.admin_master')
@section('title', 'Users | KStarter')

@section('content')

    <div class="py-3 mb-4">
        <h4 class="fw-bold mb-1">Manage Users</h4>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-style1 mb-0" style="--bs-breadcrumb-divider: '•';">
                <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Manage Users</li>
            </ol>
        </nav>
    </div>

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center gap-3">
            <input type="text" id="userSearchInput" class="form-control" placeholder="Search users..."
                style="max-width:20%;">
            <div class="d-flex gap-2">
                <button id="exportExcelBtn" class="btn btn-outline-success">
                    <i class="bx bx-export me-1"></i> Export Excel
                </button>
                <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#addUserDrawer">
                    <i class="bx bx-plus me-1"></i> Add User
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="usersTable" class="table table-hover" style="width:100%">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>User Name</th>
                            <th>Email Address</th>
                            <th>Mobile Number</th>
                            <th>Department</th>
                            <th>User Role</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ([
            [1, 'John Doe', 'john.doe', 'john@example.com', '+1 202 555 0111', 'Engineering', 'Admin', 'Active', 'success'],
            [2, 'Jane Smith', 'jane.smith', 'jane@example.com', '+1 202 555 0122', 'Marketing', 'Editor', 'Active', 'success'],
            [3, 'Bob Wilson', 'bob.wilson', 'bob@example.com', '+1 202 555 0133', 'HR', 'Viewer', 'Inactive', 'danger'],
            [4, 'Alice Brown', 'alice.brown', 'alice@example.com', '+1 202 555 0144', 'Finance', 'Manager', 'Active', 'success'],
            [5, 'Tom Clark', 'tom.clark', 'tom@example.com', '+1 202 555 0155', 'Engineering', 'Admin', 'Active', 'success'],
            [6, 'Sarah Davis', 'sarah.davis', 'sarah@example.com', '+1 202 555 0166', 'Design', 'Editor', 'Inactive', 'danger'],
            [7, 'Mike Johnson', 'mike.johnson', 'mike@example.com', '+1 202 555 0177', 'Support', 'Viewer', 'Active', 'success'],
            [8, 'Emily White', 'emily.white', 'emily@example.com', '+1 202 555 0188', 'Marketing', 'Manager', 'Active', 'success'],
            [9, 'David Lee', 'david.lee', 'david@example.com', '+1 202 555 0199', 'Finance', 'Analyst', 'Active', 'success'],
            [10, 'Laura Hall', 'laura.hall', 'laura@example.com', '+1 202 555 0200', 'Design', 'Editor', 'Inactive', 'danger'],
            [11, 'Chris Martin', 'chris.martin', 'chris@example.com', '+1 202 555 0211', 'Engineering', 'Viewer', 'Active', 'success'],
            [12, 'Megan Turner', 'megan.turner', 'megan@example.com', '+1 202 555 0222', 'HR', 'Manager', 'Active', 'success'],
            [13, 'James Walker', 'james.walker', 'james@example.com', '+1 202 555 0233', 'Support', 'Moderator', 'Inactive', 'danger'],
            [14, 'Sophia Adams', 'sophia.adams', 'sophia@example.com', '+1 202 555 0244', 'Marketing', 'Editor', 'Active', 'success'],
            [15, 'Daniel Scott', 'daniel.scott', 'daniel@example.com', '+1 202 555 0255', 'Finance', 'Analyst', 'Active', 'success'],
            [16, 'Olivia Baker', 'olivia.baker', 'olivia@example.com', '+1 202 555 0266', 'Engineering', 'Viewer', 'Active', 'success'],
            [17, 'Ryan Carter', 'ryan.carter', 'ryan@example.com', '+1 202 555 0277', 'Design', 'Admin', 'Inactive', 'danger'],
            [18, 'Emma Nelson', 'emma.nelson', 'emma@example.com', '+1 202 555 0288', 'HR', 'Editor', 'Active', 'success'],
            [19, 'Liam Roberts', 'liam.roberts', 'liam@example.com', '+1 202 555 0299', 'Support', 'Viewer', 'Active', 'success'],
            [20, 'Ava Mitchell', 'ava.mitchell', 'ava@example.com', '+1 202 555 0300', 'Marketing', 'Manager', 'Active', 'success'],
        ] as $user)
                            <tr>
                                <td>{{ $user[0] }}</td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <span
                                            class="avatar avatar-sm avatar-initial rounded-circle bg-label-primary">{{ strtoupper(substr($user[1], 0, 1)) }}</span>
                                        <strong>{{ $user[1] }}</strong>
                                    </div>
                                </td>
                                <td>{{ $user[2] }}</td>
                                <td>{{ $user[3] }}</td>
                                <td>{{ $user[4] }}</td>
                                <td>{{ $user[5] }}</td>
                                <td><span class="badge bg-label-primary">{{ $user[6] }}</span></td>
                                <td><span class="badge bg-label-{{ $user[8] }}">{{ $user[7] }}</span></td>
                                <td>
                                    <button class="btn btn-sm btn-icon btn-text-secondary btn-edit-user"
                                        data-id="{{ $user[0] }}" data-name="{{ $user[1] }}"
                                        data-username="{{ $user[2] }}" data-email="{{ $user[3] }}"
                                        data-mobile="{{ $user[4] }}" data-department="{{ $user[5] }}"
                                        data-role="{{ $user[6] }}" data-status="{{ $user[7] }}"
                                        data-bs-toggle="offcanvas" data-bs-target="#editUserDrawer">
                                        <i class="bx bx-edit-alt"></i>
                                    </button>
                                    <a href="javascript:void(0);"
                                        class="btn btn-sm btn-icon btn-text-danger btn-delete-user">
                                        <i class="bx bx-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Add User Offcanvas Drawer --}}
    <div class="offcanvas offcanvas-end" tabindex="-1" id="addUserDrawer" aria-labelledby="addUserDrawerLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="addUserDrawerLabel">
                <i class="bx bx-user-plus me-2 text-primary"></i> Add New User
            </h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
        </div>
        <div class="offcanvas-body">
            <form method="POST" onsubmit="return false">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">First Name</label>
                        <input type="text" class="form-control" placeholder="John">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Last Name</label>
                        <input type="text" class="form-control" placeholder="Doe">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">User Name</label>
                        <input type="text" class="form-control" placeholder="john.doe">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Email Address</label>
                        <input type="email" class="form-control" placeholder="john@example.com">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Mobile Number</label>
                        <input type="text" class="form-control" placeholder="+1 202 555 0111">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Department</label>
                        <input type="text" class="form-control" placeholder="e.g. Engineering">
                    </div>
                    <div class="col-md-6">
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
                    <div class="col-md-6">
                        <label class="form-label">Status</label>
                        <select class="form-select">
                            <option>Active</option>
                            <option>Inactive</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" placeholder="············">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" placeholder="············">
                    </div>
                </div>
        </div>
        <div class="offcanvas-footer d-flex gap-2">
            <button type="submit" class="btn btn-primary">
                <i class="bx bx-check me-1"></i> Save User
            </button>
            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="offcanvas">
                Cancel
            </button>
            </form>
        </div>
    </div>

    {{-- Edit User Offcanvas Drawer --}}
    <div class="offcanvas offcanvas-end" tabindex="-1" id="editUserDrawer" aria-labelledby="editUserDrawerLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="editUserDrawerLabel">
                <i class="bx bx-edit me-2 text-primary"></i> Edit User
            </h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
        </div>
        <div class="offcanvas-body">
            <form method="POST" onsubmit="return false" id="editUserForm">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">First Name</label>
                        <input type="text" class="form-control" id="edit_first_name" placeholder="John">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="edit_last_name" placeholder="Doe">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">User Name</label>
                        <input type="text" class="form-control" id="edit_username" placeholder="john.doe">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="edit_email" placeholder="john@example.com">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Mobile Number</label>
                        <input type="text" class="form-control" id="edit_mobile" placeholder="+1 202 555 0111">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Department</label>
                        <input type="text" class="form-control" id="edit_department" placeholder="e.g. Engineering">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">User Role</label>
                        <select class="form-select" id="edit_role">
                            <option>Admin</option>
                            <option>Manager</option>
                            <option>Editor</option>
                            <option>Viewer</option>
                            <option>Moderator</option>
                            <option>Analyst</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Status</label>
                        <select class="form-select" id="edit_status">
                            <option>Active</option>
                            <option>Inactive</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <hr class="my-1">
                        <small class="text-muted">Leave password blank to keep unchanged</small>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">New Password</label>
                        <input type="password" class="form-control" placeholder="············">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" placeholder="············">
                    </div>
                </div>
        </div>
        <div class="offcanvas-footer d-flex gap-2">
            <button type="submit" class="btn btn-primary">
                <i class="bx bx-check me-1"></i> Update User
            </button>
            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="offcanvas">
                Cancel
            </button>
            </form>
        </div>
    </div>

@endsection

@section('script')
    <script src="{{ asset('admin_assets') }}/custom/js/users.js?v={{ time() }}"></script>
@endsection
