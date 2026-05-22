$(document).ready(function () {
    var table = $('#rolesTable').DataTable({
        pageLength: 10,
        paging: true,
        searching: true,
        ordering: true,
        columnDefs: [{ orderable: false, targets: [3, 4, 6] }],
        buttons: [{
            extend: 'excel',
            text: '',
            exportOptions: { columns: [0,1,2,3,4,5] }
        }],
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

    var pendingEditRole = null;

    $(document).on('click', '.btn-edit-role', function () {
        var btn = $(this);
        pendingEditRole = {
            name:        btn.data('name'),
            description: btn.data('description'),
        };
    });

    document.getElementById('editRoleDrawer').addEventListener('shown.bs.offcanvas', function () {
        if (pendingEditRole) {
            $('#edit_role_name').val(pendingEditRole.name);
            $('#edit_role_description').val(pendingEditRole.description);
            pendingEditRole = null;
        }
    });

    $(document).on('click', '.btn-delete-role', function () {
        Swal.fire({
            title: 'Delete Role?',
            text: 'This action cannot be undone.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#ff3e1d',
            cancelButtonColor: '#8592a3',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({ title: 'Deleted!', text: 'Role has been deleted.', icon: 'success', confirmButtonColor: '#696cff' });
            }
        });
    });
});
