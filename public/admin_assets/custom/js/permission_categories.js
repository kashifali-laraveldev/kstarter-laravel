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
        var id    = input.data('id');
        var val   = parseInt(input.val(), 10);
        if (isNaN(val) || val < 1) { input.val(1); val = 1; }

        $.ajax({
            url: '/admin/permission-categories/order/' + id,
            method: 'POST',
            data: { order: val },
            success: function (res) {
                if (res.status) {
                    input.addClass('order-saved');
                    setTimeout(function () { input.removeClass('order-saved'); }, 1200);
                } else {
                    errorSwal(res.message);
                }
            },
            error: function () {
                errorSwal('Failed to update order.');
            }
        });
    });

    $(document).on('keydown', '.order-input', function (e) {
        if (e.key === 'Enter') $(this).blur();
    });

    // ── Live icon preview ─────────────────────────────────────────────────────
    $(document).on('input', '#add_cat_icon, #edit_cat_icon', function () {
        var cls      = $(this).val().trim() || 'bx bx-category';
        var previewId = this.id === 'add_cat_icon' ? '#add_cat_icon_preview i' : '#edit_cat_icon_preview i';
        $(previewId).attr('class', cls);
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

    $('#addCategoryForm').on('submit', function () {
        loadSpinnerSwal();
        $.ajax({
            url: '/admin/permission-categories/store',
            method: 'POST',
            data: $(this).serialize(),
            success: function (res) {
                hideSpinnerSwal();
                if (res.status) {
                    bootstrap.Offcanvas.getInstance(document.getElementById('addCategoryDrawer')).hide();
                    successSwal(res.message).then(function () { location.reload(); });
                } else {
                    errorSwal(res.message);
                }
            },
            error: function () {
                hideSpinnerSwal();
                errorSwal('Something went wrong. Please try again.');
            }
        });
    });

    // ── Edit Category ─────────────────────────────────────────────────────────
    var currentCatId = null;

    $(document).on('click', '.btn-edit-cat', function () {
        currentCatId = $(this).data('id');
        loadSpinnerSwal();
        $.get('/admin/permission-categories/form/edit/' + currentCatId)
            .done(function (res) {
                hideSpinnerSwal();
                $('#editCategoryDrawerBody').html(res.html);
                bootstrap.Offcanvas.getOrCreateInstance(document.getElementById('editCategoryDrawer'), { backdrop: false, keyboard: false, scroll: true }).show();
            })
            .fail(function () {
                hideSpinnerSwal();
                errorSwal('Failed to load form. Please try again.');
            });
    });

    $('#editCategoryForm').on('submit', function () {
        if (!currentCatId) return;
        loadSpinnerSwal();
        $.ajax({
            url: '/admin/permission-categories/update/' + currentCatId,
            method: 'POST',
            data: $(this).serialize(),
            success: function (res) {
                hideSpinnerSwal();
                if (res.status) {
                    bootstrap.Offcanvas.getInstance(document.getElementById('editCategoryDrawer')).hide();
                    successSwal(res.message).then(function () { location.reload(); });
                } else {
                    errorSwal(res.message);
                }
            },
            error: function () {
                hideSpinnerSwal();
                errorSwal('Something went wrong. Please try again.');
            }
        });
    });

    // ── Delete Category ───────────────────────────────────────────────────────
    $(document).on('click', '.btn-delete-cat', function () {
        var id = $(this).data('id');
        warningSwal('This action cannot be undone.', 'Yes, delete it!').then(function (result) {
            if (!result.isConfirmed) return;
            loadSpinnerSwal();
            $.ajax({
                url: '/admin/permission-categories/delete/' + id,
                method: 'POST',
                success: function (res) {
                    hideSpinnerSwal();
                    if (res.status) {
                        successSwal(res.message).then(function () { location.reload(); });
                    } else {
                        errorSwal(res.message);
                    }
                },
                error: function () {
                    hideSpinnerSwal();
                    errorSwal('Something went wrong. Please try again.');
                }
            });
        });
    });

});
