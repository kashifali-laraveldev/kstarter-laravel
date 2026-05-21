@extends('admin.layout.admin_master')
@section('title', 'Dashboard | KStarter')
@section('content')

<h4 class="fw-bold py-3 mb-4">Dashboard</h4>

<div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <span class="fw-semibold d-block mb-1 text-muted">Total Users</span>
                        <h3 class="card-title mb-2">59</h3>
                        <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +12%</small>
                        <small class="text-muted"> vs last month</small>
                    </div>
                    <div class="avatar flex-shrink-0">
                        <span class="avatar-initial rounded bg-label-primary p-3">
                            <i class="bx bx-user fs-4"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <span class="fw-semibold d-block mb-1 text-muted">Total Roles</span>
                        <h3 class="card-title mb-2">7</h3>
                        <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +2</small>
                        <small class="text-muted"> new this month</small>
                    </div>
                    <div class="avatar flex-shrink-0">
                        <span class="avatar-initial rounded bg-label-warning p-3">
                            <i class="bx bx-shield fs-4"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <span class="fw-semibold d-block mb-1 text-muted">Permissions</span>
                        <h3 class="card-title mb-2">42</h3>
                        <small class="text-info fw-semibold"><i class="bx bx-right-arrow-alt"></i> 6 categories</small>
                    </div>
                    <div class="avatar flex-shrink-0">
                        <span class="avatar-initial rounded bg-label-info p-3">
                            <i class="bx bx-lock-open-alt fs-4"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <span class="fw-semibold d-block mb-1 text-muted">Categories</span>
                        <h3 class="card-title mb-2">6</h3>
                        <small class="text-danger fw-semibold"><i class="bx bx-down-arrow-alt"></i> -1</small>
                        <small class="text-muted"> vs last month</small>
                    </div>
                    <div class="avatar flex-shrink-0">
                        <span class="avatar-initial rounded bg-label-danger p-3">
                            <i class="bx bx-category fs-4"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-8 mb-4">
        <div class="card h-100">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="m-0">Recent Users</h5>
                <a href="{{ route('admin.users') }}" class="btn btn-sm btn-outline-primary">View All</a>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Joined</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach([
                            ['John Doe','john@example.com','Admin','Active','success','2024-01-10'],
                            ['Jane Smith','jane@example.com','Editor','Active','success','2024-01-15'],
                            ['Bob Wilson','bob@example.com','Viewer','Inactive','danger','2024-02-01'],
                            ['Alice Brown','alice@example.com','Manager','Active','success','2024-02-10'],
                            ['Tom Clark','tom@example.com','Admin','Active','success','2024-02-20'],
                        ] as $user)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <span class="avatar avatar-sm avatar-initial rounded-circle bg-label-primary">{{ strtoupper(substr($user[0],0,1)) }}</span>
                                    <strong>{{ $user[0] }}</strong>
                                </div>
                            </td>
                            <td>{{ $user[1] }}</td>
                            <td><span class="badge bg-label-primary">{{ $user[2] }}</span></td>
                            <td><span class="badge bg-label-{{ $user[4] }}">{{ $user[3] }}</span></td>
                            <td>{{ $user[5] }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-4">
        <div class="card h-100">
            <div class="card-header">
                <h5 class="m-0">Role Distribution</h5>
            </div>
            <div class="card-body">
                @foreach([
                    ['Admin', 5, 'primary', 8],
                    ['Manager', 12, 'warning', 20],
                    ['Editor', 8, 'info', 14],
                    ['Moderator', 3, 'danger', 5],
                    ['Viewer', 25, 'success', 42],
                    ['Support', 4, 'secondary', 7],
                    ['Analyst', 2, 'dark', 3],
                ] as $role)
                <div class="mb-3">
                    <div class="d-flex justify-content-between mb-1">
                        <span class="fw-semibold">{{ $role[0] }}</span>
                        <span class="text-muted small">{{ $role[1] }} users ({{ $role[3] }}%)</span>
                    </div>
                    <div class="progress" style="height:6px;">
                        <div class="progress-bar bg-{{ $role[2] }}" role="progressbar" style="width:{{ $role[3] }}%"></div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection
