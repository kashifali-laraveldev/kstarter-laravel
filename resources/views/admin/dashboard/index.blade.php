@extends('admin.layout.admin_master')
@section('title', 'KStarter | Dashboard')
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
    </div>

    <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <span class="fw-semibold d-block mb-1 text-muted">Total Roles</span>
                        <h3 class="card-title mb-2">7</h3>
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
    </div>

    <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <span class="fw-semibold d-block mb-1 text-muted">Permissions</span>
                        <h3 class="card-title mb-2">42</h3>
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
    </div>

    <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <span class="fw-semibold d-block mb-1 text-muted">Categories</span>
                        <h3 class="card-title mb-2">6</h3>
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
                                    <img src="{{ asset('admin_assets/img/avatars/' . [1,5,6,7][$loop->index % 4] . '.png') }}"
                                        class="rounded-circle" style="width:32px;height:32px;object-fit:cover;" alt="{{ $user[0] }}">
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
</div>

@endsection
