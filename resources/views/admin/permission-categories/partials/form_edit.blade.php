<div class="row g-3">
    <div class="col-12">
        <label class="form-label">Category Name</label>
        <input type="text" class="form-control" name="category_name" id="edit_cat_name"
            value="{{ $category->category_name }}" placeholder="e.g. User Management">
    </div>
    <div class="col-12">
        <label class="form-label">Icon Class</label>
        <div class="input-group">
            <span class="input-group-text" id="edit_cat_icon_preview">
                <i class="{{ $category->css_class ?: 'bx bx-category' }}"></i>
            </span>
            <input type="text" class="form-control" name="css_class" id="edit_cat_icon"
                value="{{ $category->css_class }}" placeholder="e.g. bx bx-user">
        </div>
        <div class="form-text">Use any Boxicons class, e.g. <code>bx bx-user</code></div>
    </div>
</div>
