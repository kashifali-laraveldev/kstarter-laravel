@extends('admin.layout.admin_master')
@section('title', 'Add New Role | KStarter')
@section('content')

<h4 class="fw-bold py-3 mb-4">
    <span class="text-muted fw-light"><a href="{{ url('admin/roles') }}">Roles</a> /</span> Add New Role
</h4>

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <h5 class="card-header">Role Information</h5>
            <div class="card-body">
                <form method="POST" onsubmit="return false">
                    <div class="mb-3">
                        <label class="form-label">Role Name</label>
                        <input type="text" class="form-control" placeholder="e.g. Manager">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea class="form-control" rows="3" placeholder="Role description..."></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Permissions</label>
                        <div class="row">
                            @foreach([
                                'Create Users','Edit Users','Delete Users','View Users',
                                'Create Roles','Edit Roles','Delete Roles','View Roles',
                                'Create Permissions','Edit Permissions','Delete Permissions','View Reports',
                            ] as $perm)
                            <div class="col-md-4 col-6 mb-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="perm_{{ $loop->index }}">
                                    <label class="form-check-label" for="perm_{{ $loop->index }}">{{ $perm }}</label>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary me-2">Save Role</button>
                        <a href="{{ url('admin/roles') }}" class="btn btn-outline-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card">
            <h5 class="card-header">Note</h5>
            <div class="card-body">
                <ul class="list-unstyled mb-0">
                    <li class="mb-2"><i class="bx bx-check-circle text-success me-2"></i>Use a clear role name</li>
                    <li class="mb-2"><i class="bx bx-check-circle text-success me-2"></i>Select relevant permissions</li>
                    <li><i class="bx bx-check-circle text-success me-2"></i>Avoid duplicate role names</li>
                </ul>
            </div>
        </div>
    </div>
</div>

@endsection
