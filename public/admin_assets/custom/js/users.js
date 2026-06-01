$(document).ready(function () {

    var table = $('#usersTable').DataTable({
        pageLength: 10,
        paging: true,
        searching: true,
        ordering: true,
        columnDefs: [{ orderable: false, targets: [1, 8] }],
        buttons: [{ extend: 'excel', text: '', exportOptions: { columns: [0,1,2,3,4,5,6,7] } }],
        language: {
            info: 'Showing _START_ to _END_ of _TOTAL_ users',
            paginate: {
                previous: '<i class="bx bx-chevron-left"></i>',
                next: '<i class="bx bx-chevron-right"></i>'
            }
        },
        dom: 't<"row align-items-center mt-3"<"col-md-6"i><"col-md-6 d-flex justify-content-end"p>>',
    });

    $('#userSearchInput').on('keyup input search', function () {
        table.search(this.value).draw();
    });

    $('#exportExcelBtn').on('click', function () {
        table.button(0).trigger();
    });

    function initSelect2(drawerId) {
        $('#' + drawerId + ' select').each(function () {
            if (!$(this).hasClass('select2-hidden-accessible')) {
                $(this).select2({ theme: 'bootstrap-5', dropdownParent: $('#' + drawerId), width: '100%' });
            }
        });
    }

    // ── Add User ──────────────────────────────────────────────────────────────
    $('#addUserBtn').on('click', function () {
        loadSpinnerSwal();
        $.get('/admin/users/form/add')
            .done(function (res) {
                hideSpinnerSwal();
                $('#addUserDrawerBody').html(res.html);
                initSelect2('addUserDrawer');
                bootstrap.Offcanvas.getOrCreateInstance(document.getElementById('addUserDrawer'), { backdrop: false, keyboard: false, scroll: true }).show();
            })
            .fail(function () {
                hideSpinnerSwal();
                errorSwal('Failed to load form. Please try again.');
            });
    });

    $('#addUserForm').on('submit', function () {
        loadSpinnerSwal();
        $.ajax({
            url: '/admin/users/store',
            method: 'POST',
            data: $(this).serialize(),
            success: function (res) {
                hideSpinnerSwal();
                if (res.status) {
                    bootstrap.Offcanvas.getInstance(document.getElementById('addUserDrawer')).hide();
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

    // ── Edit User ─────────────────────────────────────────────────────────────
    var currentUserId = null;

    $(document).on('click', '.btn-edit-user', function () {
        currentUserId = $(this).data('id');
        loadSpinnerSwal();
        $.get('/admin/users/form/edit/' + currentUserId)
            .done(function (res) {
                hideSpinnerSwal();
                $('#editUserDrawerBody').html(res.html);
                initSelect2('editUserDrawer');
                bootstrap.Offcanvas.getOrCreateInstance(document.getElementById('editUserDrawer'), { backdrop: false, keyboard: false, scroll: true }).show();
            })
            .fail(function () {
                hideSpinnerSwal();
                errorSwal('Failed to load form. Please try again.');
            });
    });

    $('#editUserForm').on('submit', function () {
        if (!currentUserId) return;
        loadSpinnerSwal();
        $.ajax({
            url: '/admin/users/update/' + currentUserId,
            method: 'POST',
            data: $(this).serialize(),
            success: function (res) {
                hideSpinnerSwal();
                if (res.status) {
                    bootstrap.Offcanvas.getInstance(document.getElementById('editUserDrawer')).hide();
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

    // ── Toggle Status ─────────────────────────────────────────────────────────
    $(document).on('click', '.btn-toggle-status', function () {
        var badge      = $(this);
        var id         = badge.data('id');
        var isActive   = badge.text().trim() === 'Active';
        var actionWord = isActive ? 'deactivate' : 'activate';

        warningSwal('Are you sure you want to ' + actionWord + ' this user?', 'Yes, ' + actionWord + '!')
            .then(function (result) {
                if (!result.isConfirmed) return;
                loadSpinnerSwal();
                $.ajax({
                    url: '/admin/users/toggle-status/' + id,
                    method: 'POST',
                    success: function (res) {
                        hideSpinnerSwal();
                        if (res.status) {
                            var nowActive = res.new_status === 'Active';
                            badge.text(res.new_status)
                                 .removeClass('bg-label-success bg-label-danger')
                                 .addClass(nowActive ? 'bg-label-success' : 'bg-label-danger');
                            successSwal(res.message);
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

    // ── Delete User ───────────────────────────────────────────────────────────
    $(document).on('click', '.btn-delete-user', function () {
        var id = $(this).data('id');
        warningSwal('This action cannot be undone.', 'Yes, delete it!').then(function (result) {
            if (!result.isConfirmed) return;
            loadSpinnerSwal();
            $.ajax({
                url: '/admin/users/delete/' + id,
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
