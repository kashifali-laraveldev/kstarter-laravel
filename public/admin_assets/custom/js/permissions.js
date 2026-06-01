$(document).ready(function () {

    var table = $('#permissionsTable').DataTable({
        pageLength: 10,
        paging: true,
        searching: true,
        ordering: true,
        columnDefs: [{ orderable: false, targets: [3, 4] }],
        buttons: [{
            extend: 'excel',
            text: '',
            exportOptions: { columns: [0, 1, 2, 3] }
        }],
        language: {
            info: 'Showing _START_ to _END_ of _TOTAL_ permissions',
            paginate: {
                previous: '<i class="bx bx-chevron-left"></i>',
                next: '<i class="bx bx-chevron-right"></i>'
            }
        },
        dom: 't<"row align-items-center mt-3"<"col-md-6"i><"col-md-6 d-flex justify-content-end"p>>',
    });

    function initSelect2(drawerId) {
        $('#' + drawerId + ' select').each(function () {
            if (!$(this).hasClass('select2-hidden-accessible')) {
                $(this).select2({ theme: 'bootstrap-5', dropdownParent: $('#' + drawerId), width: '100%' });
            }
        });
    }

    $('#permSearchInput').on('keyup input search', function () {
        table.search(this.value).draw();
    });

    $('#exportPermsBtn').on('click', function () {
        table.button(0).trigger();
    });

    // ── Add Permission ────────────────────────────────────────────────────────
    $('#addPermissionBtn').on('click', function () {
        loadSpinnerSwal();
        $.get('/admin/permissions/form/add')
            .done(function (res) {
                hideSpinnerSwal();
                $('#addPermissionDrawerBody').html(res.html);
                initSelect2('addPermissionDrawer');
                bootstrap.Offcanvas.getOrCreateInstance(document.getElementById('addPermissionDrawer'), { backdrop: false, keyboard: false, scroll: true }).show();
            })
            .fail(function () {
                hideSpinnerSwal();
                errorSwal('Failed to load form. Please try again.');
            });
    });

    $('#addPermissionForm').on('submit', function () {
        loadSpinnerSwal();
        $.ajax({
            url: '/admin/permissions/store',
            method: 'POST',
            data: $(this).serialize(),
            success: function (res) {
                hideSpinnerSwal();
                if (res.status) {
                    bootstrap.Offcanvas.getInstance(document.getElementById('addPermissionDrawer')).hide();
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

    // ── Edit Permission ───────────────────────────────────────────────────────
    var currentPermId = null;

    $(document).on('click', '.btn-edit-perm', function () {
        currentPermId = $(this).data('id');
        loadSpinnerSwal();
        $.get('/admin/permissions/form/edit/' + currentPermId)
            .done(function (res) {
                hideSpinnerSwal();
                $('#editPermissionDrawerBody').html(res.html);
                initSelect2('editPermissionDrawer');
                bootstrap.Offcanvas.getOrCreateInstance(document.getElementById('editPermissionDrawer'), { backdrop: false, keyboard: false, scroll: true }).show();
            })
            .fail(function () {
                hideSpinnerSwal();
                errorSwal('Failed to load form. Please try again.');
            });
    });

    $('#editPermissionForm').on('submit', function () {
        if (!currentPermId) return;
        loadSpinnerSwal();
        $.ajax({
            url: '/admin/permissions/update/' + currentPermId,
            method: 'POST',
            data: $(this).serialize(),
            success: function (res) {
                hideSpinnerSwal();
                if (res.status) {
                    bootstrap.Offcanvas.getInstance(document.getElementById('editPermissionDrawer')).hide();
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

    // ── Delete Permission ─────────────────────────────────────────────────────
    $(document).on('click', '.btn-delete-perm', function () {
        var id = $(this).data('id');
        warningSwal('This action cannot be undone.', 'Yes, delete it!').then(function (result) {
            if (!result.isConfirmed) return;
            loadSpinnerSwal();
            $.ajax({
                url: '/admin/permissions/delete/' + id,
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
