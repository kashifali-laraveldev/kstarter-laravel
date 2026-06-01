<div class="row g-3">
    <div class="col-md-6">
        <label class="form-label">First Name</label>
        <input type="text" class="form-control" name="first_name" placeholder="John">
    </div>
    <div class="col-md-6">
        <label class="form-label">Last Name</label>
        <input type="text" class="form-control" name="last_name" placeholder="Doe">
    </div>
    <div class="col-md-6">
        <label class="form-label">User Name</label>
        <input type="text" class="form-control" name="username" placeholder="john.doe">
    </div>
    <div class="col-md-6">
        <label class="form-label">Email Address</label>
        <input type="email" class="form-control" name="email_address" placeholder="john@example.com">
    </div>
    <div class="col-md-6">
        <label class="form-label">Mobile Number</label>
        <input type="text" class="form-control" name="mobile_number" placeholder="+1 202 555 0111">
    </div>
    <div class="col-md-6">
        <label class="form-label">Department</label>
        <input type="text" class="form-control" name="department_name" placeholder="e.g. Engineering">
    </div>
    <div class="col-12">
        <label class="form-label">User Role(s)</label>
        <select class="form-select" name="role_id[]" id="add_user_role" multiple>
            @foreach($roles as $role)
                <option value="{{ encodeId($role->id) }}">{{ $role->role_name }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-6">
        <label class="form-label">Password</label>
        <input type="password" class="form-control" name="password" placeholder="············">
    </div>
    <div class="col-md-6">
        <label class="form-label">Confirm Password</label>
        <input type="password" class="form-control" name="password_confirmation" placeholder="············">
    </div>
</div>
