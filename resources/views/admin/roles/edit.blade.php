@extends('admin.layout.admin_master')
@section('title', 'KStarter Laravel | Edit Role')

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
    .perm-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 0.5rem 1rem; }
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

<form method="POST" action="{{ route('admin.roles.update', encodeId($role->id)) }}">
@csrf
<div class="card">
    <div class="card-body">

        <div class="mb-4">
            <label class="form-label">Role Name</label>
            <input type="text" class="form-control @error('role_name') is-invalid @enderror" name="role_name" value="{{ old('role_name', $role->role_name) }}" placeholder="e.g. Manager">
            @error('role_name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h6 class="mb-0"><i class="bx bx-lock-open-alt me-2 text-primary"></i> Permissions</h6>
            <div class="d-flex gap-2">
                <button type="button" class="btn btn-sm btn-outline-primary" id="selectAllPerms">Select All</button>
                <button type="button" class="btn btn-sm btn-outline-secondary" id="clearAllPerms">Clear All</button>
            </div>
        </div>

        <div class="row g-3">
            @foreach($categories as $category)
            @if($category->permissions->isNotEmpty())
            <div class="col-12">
                <div class="perm-card">
                    <div class="perm-card-header">
                        <i class="{{ $category->css_class }}"></i>
                        <span>{{ $category->category_name }}</span>
                    </div>
                    <div class="perm-card-body">
                        <div class="perm-grid">
                            @foreach($category->permissions as $permission)
                            @php $encodedPermId = encodeId($permission->id); @endphp
                            <div class="form-check">
                                <input class="form-check-input perm-checkbox" type="checkbox"
                                    name="permission_ids[]"
                                    value="{{ $encodedPermId }}"
                                    id="perm_{{ $encodedPermId }}"
                                    {{ in_array($permission->id, $rolePermissionIds) ? 'checked' : '' }}>
                                <label class="form-check-label" for="perm_{{ $encodedPermId }}">{{ $permission->permission_name }}</label>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            @endif
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
