@extends('admin.layout.admin_master')
@section('title', 'KStarter | Edit Role')

@section('css')
<style>
    .perm-card { border: 1px solid #e7e7e9; border-radius: 0.5rem; overflow: hidden; }
    .perm-card-header {
        background: linear-gradient(135deg, #f0f1ff 0%, #f8f8ff 100%);
        border-bottom: 1px solid #e7e7e9;
        padding: 0.65rem 1rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    .perm-card-header i { color: #696cff; font-size: 1rem; }
    .perm-card-header span { font-size: 0.8rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; color: #566a7f; }
    .perm-card-body { padding: 1rem; }
    .perm-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(180px, 1fr)); gap: 0.5rem 1rem; }
    .perm-grid .form-check-label { font-size: 0.875rem; color: #566a7f; cursor: pointer; }
    .perm-grid .form-check-input { cursor: pointer; }
</style>
@endsection

@section('content')

<div class="py-3 mb-4 d-flex justify-content-between align-items-center">
    <div>
        <h4 class="fw-bold mb-1">Edit Role</h4>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-style1 mb-0" style="--bs-breadcrumb-divider: '•';">
                <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ url('admin/roles') }}">Manage Roles</a></li>
                <li class="breadcrumb-item active">Edit Role</li>
            </ol>
        </nav>
    </div>
    <a href="{{ url('admin/roles') }}" class="btn btn-outline-secondary">
        <i class="bx bx-arrow-back me-1"></i> Back to Roles
    </a>
</div>

<form method="POST" onsubmit="return false">
<div class="card">
    <div class="card-body">

        {{-- Role Name --}}
        <div class="mb-4">
            <label class="form-label">Role Name</label>
            <input type="text" class="form-control" id="role_name" value="Admin" placeholder="e.g. Manager">
        </div>

        {{-- Permissions --}}
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h6 class="mb-0"><i class="bx bx-lock-open-alt me-2 text-primary"></i> Permissions</h6>
            <div class="d-flex gap-2">
                <button type="button" class="btn btn-sm btn-outline-primary" id="selectAllPerms">Select All</button>
                <button type="button" class="btn btn-sm btn-outline-secondary" id="clearAllPerms">Clear All</button>
            </div>
        </div>

        <div class="row g-3">
            @foreach([
                'User Management'       => ['icon' => 'bx-user',        'perms' => ['Create Users','Edit Users','Delete Users','View Users']],
                'Role Management'       => ['icon' => 'bx-shield',      'perms' => ['Create Roles','Edit Roles','Delete Roles','View Roles']],
                'Permission Management' => ['icon' => 'bx-lock-open-alt','perms' => ['Create Permissions','Edit Permissions','Delete Permissions','View Permissions']],
                'Reports'               => ['icon' => 'bx-bar-chart-alt-2','perms' => ['View Reports','Export Report Data','Download Report']],
                'Settings'              => ['icon' => 'bx-cog',         'perms' => ['General Settings','Mail Settings','Payment Settings','Security Settings']],
                'Content Management'    => ['icon' => 'bx-file',        'perms' => ['Manage Pages','Manage Blog','Manage Media','Manage Categories']],
            ] as $category => $cat)
            <div class="col-12">
                <div class="perm-card">
                    <div class="perm-card-header">
                        <i class="bx {{ $cat['icon'] }}"></i>
                        <span>{{ $category }}</span>
                    </div>
                    <div class="perm-card-body">
                        <div class="perm-grid">
                            @foreach($cat['perms'] as $perm)
                            <div class="form-check">
                                <input class="form-check-input perm-checkbox" type="checkbox" id="perm_{{ $loop->parent->index }}_{{ $loop->index }}">
                                <label class="form-check-label" for="perm_{{ $loop->parent->index }}_{{ $loop->index }}">{{ $perm }}</label>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>
    <div class="card-footer d-flex gap-2">
        <button type="submit" class="btn btn-primary">
            <i class="bx bx-check me-1"></i> Update Role
        </button>
        <a href="{{ url('admin/roles') }}" class="btn btn-outline-secondary">Cancel</a>
    </div>
</div>
</form>

@endsection

@section('script')
<script>
$(document).ready(function () {
    $('#selectAllPerms').on('click', function () {
        $('.perm-checkbox').prop('checked', true);
    });
    $('#clearAllPerms').on('click', function () {
        $('.perm-checkbox').prop('checked', false);
    });
});
</script>
@endsection
