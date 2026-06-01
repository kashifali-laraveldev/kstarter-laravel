$(document).ready(function () {

    var table = $('#rolesTable').DataTable({
        pageLength: 10,
        paging: true,
        searching: true,
        ordering: true,
        columnDefs: [{ orderable: false, targets: [2, 3] }],
        buttons: [{ extend: 'excel', text: '', exportOptions: { columns: [0, 1, 2] } }],
        language: {
            info: 'Showing _START_ to _END_ of _TOTAL_ roles',
            paginate: {
                previous: '<i class="bx bx-chevron-left"></i>',
                next: '<i class="bx bx-chevron-right"></i>'
            }
        },
        dom: 't<"row align-items-center mt-3"<"col-md-6"i><"col-md-6 d-flex justify-content-end"p>>',
    });

    $('#roleSearchInput').on('keyup input search', function () {
        table.search(this.value).draw();
    });

    $('#exportRolesBtn').on('click', function () {
        table.button(0).trigger();
    });

    // ── Add Role ──────────────────────────────────────────────────────────────
    $('#addRoleBtn').on('click', function () {
        loadSpinnerSwal();
        $.get('/admin/roles/form/add')
            .done(function (res) {
                hideSpinnerSwal();
                $('#addRoleDrawerBody').html(res.html);
                bootstrap.Offcanvas.getOrCreateInstance(document.getElementById('addRoleDrawer'), { backdrop: false, keyboard: false, scroll: true }).show();
            })
            .fail(function () {
                hideSpinnerSwal();
                errorSwal('Failed to load form. Please try again.');
            });
    });

    $('#addRoleForm').on('submit', function () {
        loadSpinnerSwal();
        $.ajax({
            url: '/admin/roles/store',
            method: 'POST',
            data: $(this).serialize(),
            success: function (res) {
                hideSpinnerSwal();
                if (res.status) {
                    bootstrap.Offcanvas.getInstance(document.getElementById('addRoleDrawer')).hide();
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

    // ── Delete Role ───────────────────────────────────────────────────────────
    $(document).on('click', '.btn-delete-role', function () {
        var id = $(this).data('id');
        warningSwal('This action cannot be undone.', 'Yes, delete it!').then(function (result) {
            if (!result.isConfirmed) return;
            loadSpinnerSwal();
            $.ajax({
                url: '/admin/roles/delete/' + id,
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
