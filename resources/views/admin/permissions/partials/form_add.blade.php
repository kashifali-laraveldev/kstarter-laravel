<div class="row g-3">
    <div class="col-12">
        <label class="form-label">Permission Category</label>
        <select class="form-select" name="permission_category_id" id="add_perm_category">
            <option value="">Select Category</option>
            @foreach($categories as $category)
            <option value="{{ encodeId($category->id) }}">{{ $category->category_name }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-12">
        <label class="form-label">Permission Name</label>
        <input type="text" class="form-control" name="permission_name" placeholder="e.g. All Users Listing">
    </div>
    <div class="col-12">
        <label class="form-label">Route</label>
        <div class="input-group">
            <span class="input-group-text text-muted"><i class="bx bx-link"></i></span>
            <input type="text" class="form-control" name="route" placeholder="e.g. admin/users">
        </div>
    </div>
    <div class="col-12">
        <label class="form-label">CSS Class <span class="text-muted small">(icon)</span></label>
        <div class="input-group">
            <span class="input-group-text text-muted"><i class="bx bx-brush"></i></span>
            <input type="text" class="form-control" name="css_class" placeholder="e.g. bx bx-user">
        </div>
    </div>
    <div class="col-12">
        <div class="form-check form-switch mt-1">
            <input class="form-check-input" type="checkbox" name="show_in_menu" id="add_show_in_menu" value="1">
            <label class="form-check-label" for="add_show_in_menu">Show in Sidebar Menu</label>
        </div>
    </div>
</div>
