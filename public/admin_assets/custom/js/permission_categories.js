$(document).ready(function () {

    var table = $('#categoriesTable').DataTable({
        pageLength: 10,
        paging: true,
        searching: true,
        ordering: true,
        columnDefs: [{ orderable: false, targets: [2, 3, 4] }],
        buttons: [{
            extend: 'excel',
            text: '',
            exportOptions: { columns: [0, 1, 2, 3] }
        }],
        language: {
            info: 'Showing _START_ to _END_ of _TOTAL_ categories',
            paginate: {
                previous: '<i class="bx bx-chevron-left"></i>',
                next: '<i class="bx bx-chevron-right"></i>'
            }
        },
        dom: 't<"row align-items-center mt-3"<"col-md-6"i><"col-md-6 d-flex justify-content-end"p>>',
    });

    $('#catSearchInput').on('keyup input search', function () {
        table.search(this.value).draw();
    });

    $('#exportCatsBtn').on('click', function () {
        table.button(0).trigger();
    });

    // ── Inline editable display order ─────────────────────────────────────────
    $(document).on('keypress', '.order-input', function (e) {
        if (!/^\d$/.test(e.key)) e.preventDefault();
    });

    $(document).on('input', '.order-input', function () {
        this.value = this.value.replace(/\D/g, '');
    });

    $(document).on('blur', '.order-input', function () {
        var input = $(this);
        var val   = parseInt(input.val(), 10);
        if (isNaN(val) || val < 1) input.val(1);
        input.addClass('order-saved');
        setTimeout(function () { input.removeClass('order-saved'); }, 1200);
    });

    $(document).on('keydown', '.order-input', function (e) {
        if (e.key === 'Enter') $(this).blur();
    });

    // ── Live icon preview (delegated — works after AJAX inject) ───────────────
    $(document).on('input', '#edit_cat_icon', function () {
        var cls = $(this).val().trim() || 'bx bx-category';
        $('#edit_cat_icon_preview i').attr('class', cls);
    });

    // ── Add Category ──────────────────────────────────────────────────────────
    $('#addCategoryBtn').on('click', function () {
        loadSpinnerSwal();
        $.get('/admin/permission-categories/form/add')
            .done(function (res) {
                hideSpinnerSwal();
                $('#addCategoryDrawerBody').html(res.html);
                bootstrap.Offcanvas.getOrCreateInstance(document.getElementById('addCategoryDrawer'), { backdrop: false, keyboard: false, scroll: true }).show();
            })
            .fail(function () {
                hideSpinnerSwal();
                errorSwal('Failed to load form. Please try again.');
            });
    });

    // ── Edit Category ─────────────────────────────────────────────────────────
    $(document).on('click', '.btn-edit-cat', function () {
        var btn  = $(this);
        var data = {
            name: btn.data('name'),
            icon: btn.data('icon'),
        };
        loadSpinnerSwal();
        $.get('/admin/permission-categories/form/edit/' + btn.data('id'))
            .done(function (res) {
                hideSpinnerSwal();
                $('#editCategoryDrawerBody').html(res.html);
                $('#edit_cat_name').val(data.name);
                $('#edit_cat_icon').val(data.icon);
                $('#edit_cat_icon_preview i').attr('class', data.icon || 'bx bx-category');
                bootstrap.Offcanvas.getOrCreateInstance(document.getElementById('editCategoryDrawer'), { backdrop: false, keyboard: false, scroll: true }).show();
            })
            .fail(function () {
                hideSpinnerSwal();
                errorSwal('Failed to load form. Please try again.');
            });
    });

    // ── Delete Category ───────────────────────────────────────────────────────
    $(document).on('click', '.btn-delete-cat', function () {
        warningSwal('This action cannot be undone.', 'Yes, delete it!').then(function (result) {
            if (result.isConfirmed) { successSwal('Category has been deleted.'); }
        });
    });

});
