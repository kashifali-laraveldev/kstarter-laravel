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

    // Inline editable display order — integers only
    $(document).on('keypress', '.order-input', function (e) {
        // Allow only digit keys (0-9)
        if (!/^\d$/.test(e.key)) e.preventDefault();
    });

    $(document).on('input', '.order-input', function () {
        // Strip any non-digit characters (handles paste)
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

    // Edit drawer
    var pendingEditCat = null;

    $(document).on('click', '.btn-edit-cat', function () {
        var btn = $(this);
        pendingEditCat = {
            name: btn.data('name'),
        };
    });

    document.getElementById('editCategoryDrawer').addEventListener('shown.bs.offcanvas', function () {
        if (pendingEditCat) {
            $('#edit_cat_name').val(pendingEditCat.name);
            pendingEditCat = null;
        }
    });

    // Delete
    $(document).on('click', '.btn-delete-cat', function () {
        Swal.fire({
            title: 'Delete Category?',
            text: 'This action cannot be undone.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#ff3e1d',
            cancelButtonColor: '#8592a3',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({ title: 'Deleted!', text: 'Category has been deleted.', icon: 'success', confirmButtonColor: '#696cff' });
            }
        });
    });
});
