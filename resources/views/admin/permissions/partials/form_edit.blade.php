<div class="row g-3">
    <div class="col-12">
        <label class="form-label">Permission Category</label>
        <select class="form-select" name="category" id="edit_perm_category">
            <option value="">Select Category</option>
            <option>User Management</option>
            <option>Role Management</option>
            <option>Permission Management</option>
            <option>Reports</option>
            <option>Settings</option>
        </select>
    </div>
    <div class="col-12">
        <label class="form-label">Permission Name</label>
        <input type="text" class="form-control" name="name" id="edit_perm_name" placeholder="e.g. All Users Listing">
    </div>
    <div class="col-12">
        <label class="form-label">Route</label>
        <div class="input-group">
            <span class="input-group-text text-muted"><i class="bx bx-link"></i></span>
            <input type="text" class="form-control" name="route" id="edit_perm_route" placeholder="e.g. admin/users">
        </div>
    </div>
    <div class="col-12">
        <div class="form-check form-switch mt-1">
            <input class="form-check-input" type="checkbox" name="show_in_menu" id="edit_perm_show_in_menu">
            <label class="form-check-label" for="edit_perm_show_in_menu">Show in Menu</label>
        </div>
    </div>
</div>
