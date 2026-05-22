$(document).ready(function() {
    var table = $('#usersTable').DataTable({
        pageLength: 10,
        paging: true,
        searching: true,
        ordering: true,
        columnDefs: [{
            orderable: false,
            targets: [1, 8]
        }],
        buttons: [{
            extend: 'excel',
            text: '',
            exportOptions: {
                columns: [0, 1, 2, 3, 4, 5, 6, 7]
            }
        }],
        language: {
            search: '',
            info: 'Showing _START_ to _END_ of _TOTAL_ users',
            paginate: {
                previous: '<i class="bx bx-chevron-left"></i>',
                next: '<i class="bx bx-chevron-right"></i>'
            }
        },
        dom: 't<"row align-items-center mt-3"<"col-md-6"i><"col-md-6 d-flex justify-content-end"p>>',
    });

    // Select2 — initialize per-drawer when offcanvas is fully shown
    function initSelect2InDrawer(drawerId) {
        $('#' + drawerId + ' select').each(function() {
            if (!$(this).hasClass('select2-hidden-accessible')) {
                $(this).select2({
                    theme: 'bootstrap-5',
                    dropdownParent: $('#' + drawerId),
                    width: '100%',
                });
            }
        });
    }

    document.getElementById('addUserDrawer').addEventListener('shown.bs.offcanvas', function() {
        initSelect2InDrawer('addUserDrawer');
    });

    // Store edit data temporarily, then populate after Select2 is ready
    var pendingEditData = null;

    document.getElementById('editUserDrawer').addEventListener('shown.bs.offcanvas', function() {
        initSelect2InDrawer('editUserDrawer');
        if (pendingEditData) {
            $('#edit_first_name').val(pendingEditData.first_name);
            $('#edit_last_name').val(pendingEditData.last_name);
            $('#edit_username').val(pendingEditData.username);
            $('#edit_email').val(pendingEditData.email);
            $('#edit_mobile').val(pendingEditData.mobile);
            $('#edit_department').val(pendingEditData.department);
            $('#edit_role').val(pendingEditData.role).trigger('change');
            $('#edit_status').val(pendingEditData.status).trigger('change');
            pendingEditData = null;
        }
    });

    $('#userSearchInput').on('keyup', function() {
        table.search(this.value).draw();
    });

    $('#exportExcelBtn').on('click', function() {
        table.button(0).trigger();
    });

    $(document).on('click', '.btn-edit-user', function() {
        var btn = $(this);
        var fullName = btn.data('name').split(' ');
        pendingEditData = {
            first_name: fullName[0] || '',
            last_name: fullName.slice(1).join(' ') || '',
            username: btn.data('username'),
            email: btn.data('email'),
            mobile: btn.data('mobile'),
            department: btn.data('department'),
            role: btn.data('role'),
            status: btn.data('status'),
        };
    });

    $(document).on('click', '.btn-delete-user', function() {
        Swal.fire({
            title: 'Delete User?',
            text: 'This action cannot be undone.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#ff3e1d',
            cancelButtonColor: '#8592a3',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: 'Deleted!',
                    text: 'User has been deleted.',
                    icon: 'success',
                    confirmButtonColor: '#696cff'
                });
            }
        });
    });
});
