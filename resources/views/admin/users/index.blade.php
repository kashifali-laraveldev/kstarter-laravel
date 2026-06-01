@extends('admin.layout.admin_master')
@section('title', 'KStarter Laravel | Users')

@section('content')

    <div class="py-3 mb-4 d-flex justify-content-between align-items-center">
        <div>
            <h4 class="fw-bold mb-1">Manage Users</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-style1 mb-0" style="--bs-breadcrumb-divider: '•';">
                    <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Manage Users</li>
                </ol>
            </nav>
        </div>
        @if (validatePermissions('admin/users/form/add'))
            <button class="btn btn-primary" type="button" id="addUserBtn">
                <i class="bx bx-plus me-1"></i> Add User
            </button>
        @endif
    </div>

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center gap-3">
            <input type="text" id="userSearchInput" class="form-control" placeholder="Search users..."
                style="max-width:20%;">
            <div class="d-flex gap-2">
                <button id="exportExcelBtn" class="btn btn-success">
                    <i class="bx bx-export me-1"></i> Export Excel
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
                            <th>User Role(s)</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @forelse($users as $index => $user)
                            @php
                                $profile  = $user->profile;
                                $fullName = trim(($profile->first_name ?? '') . ' ' . ($profile->last_name ?? ''));
                                $initials = strtoupper(substr($profile->first_name ?? $user->user_name, 0, 1));
                            @endphp
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        @if ($profile && $profile->profile_picture)
                                            <img src="{{ asset('storage/' . $profile->profile_picture) }}"
                                                class="rounded-circle" style="width:32px;height:32px;object-fit:cover;"
                                                alt="{{ $fullName }}">
                                        @else
                                            <span
                                                style="width:32px;height:32px;font-size:13px;background:#696cff;color:#fff;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;font-weight:700;flex-shrink:0;">{{ $initials }}</span>
                                        @endif
                                        <strong>{{ $fullName ?: $user->user_name }}</strong>
                                    </div>
                                </td>
                                <td>{{ $user->user_name }}</td>
                                <td>{{ $profile->email_address ?? '-' }}</td>
                                <td>{{ $profile->mobile_number ?? '-' }}</td>
                                <td>{{ $profile->department_name ?? '-' }}</td>
                                <td>
                                    @forelse($user->userRoles as $userRole)
                                        @if($userRole->role)
                                            <span class="badge bg-label-secondary me-1">{{ $userRole->role->role_name }}</span>
                                        @endif
                                    @empty
                                        <span class="text-muted">-</span>
                                    @endforelse
                                </td>
                                <td>
                                    @if(validatePermissions('admin/users/form/edit/{id}') && $user->id !== 1)
                                        <span class="badge bg-label-{{ $user->status === 'Active' ? 'success' : 'danger' }} btn-toggle-status"
                                            data-id="{{ encodeId($user->id) }}"
                                            style="cursor:pointer;"
                                            title="Click to toggle status">{{ $user->status }}</span>
                                    @else
                                        <span class="badge bg-label-{{ $user->status === 'Active' ? 'success' : 'danger' }}">{{ $user->status }}</span>
                                    @endif
                                </td>
                                <td>
                                    @if (validatePermissions('admin/users/form/edit/{id}'))
                                        <button class="btn btn-sm btn-icon btn-text-secondary btn-edit-user"
                                            data-id="{{ encodeId($user->id) }}">
                                            <i class="bx bx-edit-alt"></i>
                                        </button>
                                    @endif
                                    @if (validatePermissions('admin/users/delete/{id}') && $user->id !== 1)
                                        <a href="javascript:void(0);"
                                            class="btn btn-sm btn-icon btn-text-danger btn-delete-user"
                                            data-id="{{ encodeId($user->id) }}">
                                            <i class="bx bx-trash"></i>
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Add User Drawer --}}
    <div class="offcanvas offcanvas-end" tabindex="-1" id="addUserDrawer" aria-labelledby="addUserDrawerLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="addUserDrawerLabel">
                <i class="bx bx-user-plus me-2 text-primary"></i> Add New User
            </h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
        </div>
        <form id="addUserForm" onsubmit="return false">
            <div class="offcanvas-body" id="addUserDrawerBody"></div>
            <div class="offcanvas-footer d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="bx bx-check me-1"></i> Save User
                </button>
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="offcanvas">Cancel</button>
            </div>
        </form>
    </div>

    {{-- Edit User Drawer --}}
    <div class="offcanvas offcanvas-end" tabindex="-1" id="editUserDrawer" aria-labelledby="editUserDrawerLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="editUserDrawerLabel">
                <i class="bx bx-edit me-2 text-primary"></i> Edit User
            </h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
        </div>
        <form id="editUserForm" onsubmit="return false">
            <div class="offcanvas-body" id="editUserDrawerBody"></div>
            <div class="offcanvas-footer d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="bx bx-check me-1"></i> Update User
                </button>
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="offcanvas">Cancel</button>
            </div>
        </form>
    </div>

@endsection

@section('script')
    <script src="{{ asset('admin_assets') }}/custom/js/users.js?v={{ time() }}"></script>
@endsection
