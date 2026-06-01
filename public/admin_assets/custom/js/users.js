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

    // ── Select2 — initialise once on page load ────────────────────────────────
    $('#userDrawer select').each(function () {
        $(this).select2({ theme: 'bootstrap-5', dropdownParent: $('#userDrawer'), width: '100%' });
    });

    var drawer = bootstrap.Offcanvas.getOrCreateInstance(
        document.getElementById('userDrawer'),
        { backdrop: false, keyboard: false, scroll: true }
    );

    function setAddMode() {
        $('#userDrawerIcon').attr('class', 'bx bx-user-plus me-2 text-primary');
        $('#userDrawerTitle').text('Add New User');
        $('#userDrawerSaveLabel').text('Save User');
        $('#userPasswordLabel').text('Password');
        document.getElementById('userForm').reset();
        $('#user_role').val('').trigger('change');
        $('#user_status').val('Active').trigger('change');
    }

    function setEditMode(data) {
        $('#userDrawerIcon').attr('class', 'bx bx-edit me-2 text-primary');
        $('#userDrawerTitle').text('Edit User');
        $('#userDrawerSaveLabel').text('Update User');
        $('#userPasswordLabel').text('New Password (leave blank to keep)');
        $('#user_first_name').val(data.first_name);
        $('#user_last_name').val(data.last_name);
        $('#user_username').val(data.username);
        $('#user_email').val(data.email);
        $('#user_mobile').val(data.mobile);
        $('#user_department').val(data.department);
        $('#user_password').val('');
        $('#user_password_confirmation').val('');
        $('#user_role').val(data.role).trigger('change');
        $('#user_status').val(data.status).trigger('change');
    }

    // ── Add User ──────────────────────────────────────────────────────────────
    $('#addUserBtn').on('click', function () {
        setAddMode();
        drawer.show();
    });

    // ── Edit User ─────────────────────────────────────────────────────────────
    $(document).on('click', '.btn-edit-user', function () {
        var btn   = $(this);
        var parts = (btn.data('name') || '').split(' ');
        setEditMode({
            first_name: parts[0] || '',
            last_name:  parts.slice(1).join(' ') || '',
            username:   btn.data('username'),
            email:      btn.data('email'),
            mobile:     btn.data('mobile'),
            department: btn.data('department'),
            role:       btn.data('role'),
            status:     btn.data('status'),
        });
        drawer.show();
    });

    // ── Delete User ───────────────────────────────────────────────────────────
    $(document).on('click', '.btn-delete-user', function () {
        warningSwal('This action cannot be undone.', 'Yes, delete it!').then(function (result) {
            if (result.isConfirmed) { successSwal('User has been deleted.'); }
        });
    });

});
