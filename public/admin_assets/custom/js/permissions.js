$(document).ready(function () {
    var table = $('#permissionsTable').DataTable({
        pageLength: 10,
        paging: true,
        searching: true,
        ordering: true,
        columnDefs: [
            { orderable: false, targets: [3, 4, 5] },
            {
                targets: 4,
                render: function (data, type) {
                    if (type === 'display') return data;
                    return $('<div>').html(data).text().trim();
                }
            }
        ],
        buttons: [{
            extend: 'excel',
            text: '',
            exportOptions: { columns: [0,1,2,3,4], orthogonal: 'search' }
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

    function initSelect2InDrawer(drawerId) {
        $('#' + drawerId + ' select').each(function () {
            if (!$(this).hasClass('select2-hidden-accessible')) {
                $(this).select2({ theme: 'bootstrap-5', dropdownParent: $('#' + drawerId), width: '100%' });
            }
        });
    }

    document.getElementById('addPermissionDrawer').addEventListener('shown.bs.offcanvas', function () {
        initSelect2InDrawer('addPermissionDrawer');
    });

    var pendingEditPerm = null;

    document.getElementById('editPermissionDrawer').addEventListener('shown.bs.offcanvas', function () {
        initSelect2InDrawer('editPermissionDrawer');
        if (pendingEditPerm) {
            $('#edit_perm_name').val(pendingEditPerm.name);
            $('#edit_perm_category').val(pendingEditPerm.category).trigger('change');
            $('#edit_perm_route').val(pendingEditPerm.route);
            pendingEditPerm = null;
        }
    });

    var permSearchTerm = '';

    $.fn.dataTable.ext.search.push(function (settings, data) {
        if (settings.nTable.id !== 'permissionsTable') return true;
        if (!permSearchTerm) return true;
        var term     = permSearchTerm.toLowerCase();
        var permName = (data[1] || '').toLowerCase();
        var route    = (data[2] || '').toLowerCase();
        var category = (data[3] || '').toLowerCase();
        var roles    = $('<div>').html(data[4] || '').text().toLowerCase();
        return permName.includes(term) || route.includes(term) || category.includes(term) || roles.includes(term);
    });

    $('#permSearchInput').on('keyup input search', function () {
        permSearchTerm = this.value;
        table.draw();
    });

    $('#exportPermsBtn').on('click', function () {
        table.button(0).trigger();
    });

    $(document).on('click', '.btn-edit-perm', function () {
        var btn = $(this);
        pendingEditPerm = {
            name:     btn.data('name'),
            category: btn.data('category'),
            route:    btn.data('route'),
        };
    });

    $(document).on('click', '.btn-delete-perm', function () {
        Swal.fire({
            title: 'Delete Permission?',
            text: 'This action cannot be undone.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#ff3e1d',
            cancelButtonColor: '#8592a3',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({ title: 'Deleted!', text: 'Permission has been deleted.', icon: 'success', confirmButtonColor: '#696cff' });
            }
        });
    });
});
