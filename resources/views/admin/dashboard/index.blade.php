@extends('admin.layout.admin_master')
@section('title', 'KStarter Laravel | Dashboard')
@section('content')

<h4 class="fw-bold py-3 mb-4">Dashboard</h4>

<div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
        <a href="{{ url('admin/users') }}" class="text-decoration-none">
            <div class="card h-100" style="cursor:pointer;transition:box-shadow .2s;" onmouseover="this.style.boxShadow='0 4px 20px rgba(105,108,255,.15)'" onmouseout="this.style.boxShadow=''">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <span class="fw-semibold d-block mb-1 text-muted">Total Users</span>
                            <h3 class="card-title mb-2">{{ $totalUsers }}</h3>
                            <small class="text-muted">Registered in the system</small>
                        </div>
                        <div class="avatar flex-shrink-0">
                            <span class="avatar-initial rounded bg-label-primary p-3">
                                <i class="bx bx-user fs-4"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
        <a href="{{ url('admin/roles') }}" class="text-decoration-none">
            <div class="card h-100" style="cursor:pointer;transition:box-shadow .2s;" onmouseover="this.style.boxShadow='0 4px 20px rgba(255,171,0,.15)'" onmouseout="this.style.boxShadow=''">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <span class="fw-semibold d-block mb-1 text-muted">Total Roles</span>
                            <h3 class="card-title mb-2">{{ $totalRoles }}</h3>
                            <small class="text-muted">Access control levels</small>
                        </div>
                        <div class="avatar flex-shrink-0">
                            <span class="avatar-initial rounded bg-label-warning p-3">
                                <i class="bx bx-shield fs-4"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
        <a href="{{ url('admin/permissions') }}" class="text-decoration-none">
            <div class="card h-100" style="cursor:pointer;transition:box-shadow .2s;" onmouseover="this.style.boxShadow='0 4px 20px rgba(3,195,236,.15)'" onmouseout="this.style.boxShadow=''">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <span class="fw-semibold d-block mb-1 text-muted">Permissions</span>
                            <h3 class="card-title mb-2">{{ $totalPermissions }}</h3>
                            <small class="text-muted">Across all categories</small>
                        </div>
                        <div class="avatar flex-shrink-0">
                            <span class="avatar-initial rounded bg-label-info p-3">
                                <i class="bx bx-lock-open-alt fs-4"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
        <a href="{{ url('admin/permission-categories') }}" class="text-decoration-none">
            <div class="card h-100" style="cursor:pointer;transition:box-shadow .2s;" onmouseover="this.style.boxShadow='0 4px 20px rgba(255,62,29,.15)'" onmouseout="this.style.boxShadow=''">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <span class="fw-semibold d-block mb-1 text-muted">Categories</span>
                            <h3 class="card-title mb-2">{{ $totalCategories }}</h3>
                            <small class="text-muted">Permission groups</small>
                        </div>
                        <div class="avatar flex-shrink-0">
                            <span class="avatar-initial rounded bg-label-danger p-3">
                                <i class="bx bx-category fs-4"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
</div>

<div class="row">
    <div class="col-12 mb-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="m-0">Recent Users</h5>
                <a href="{{ route('admin.users') }}" class="btn btn-sm btn-outline-primary">View All</a>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Joined</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @forelse($recentUsers as $user)
                        @php
                            $profile  = $user->profile;
                            $roleName = optional(optional($user->userRoles->first())->role)->role_name ?? '-';
                            $initials = strtoupper(substr($profile->first_name ?? $user->user_name, 0, 1));
                        @endphp
                        <tr>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    @if($profile && $profile->profile_picture)
                                        <img src="{{ asset('storage/' . $profile->profile_picture) }}"
                                            class="rounded-circle" style="width:32px;height:32px;object-fit:cover;" alt="{{ $initials }}">
                                    @else
                                        <span class="avatar avatar-sm flex-shrink-0" style="width:32px;height:32px;font-size:14px;background:#696cff;color:#fff;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;font-weight:700;">{{ $initials }}</span>
                                    @endif
                                    <strong>{{ ($profile->first_name ?? '') . ' ' . ($profile->last_name ?? '') ?: $user->user_name }}</strong>
                                </div>
                            </td>
                            <td>{{ $user->user_name }}</td>
                            <td><span class="badge bg-label-primary">{{ $roleName }}</span></td>
                            <td><span class="badge bg-label-{{ $user->status === 'Active' ? 'success' : 'danger' }}">{{ $user->status }}</span></td>
                            <td>{{ $user->created_at->format('Y-m-d') }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted py-3">No users found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
