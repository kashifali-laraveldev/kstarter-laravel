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

    function initSelect2(drawerId) {
        $('#' + drawerId + ' select').each(function () {
            if (!$(this).hasClass('select2-hidden-accessible')) {
                $(this).select2({ theme: 'bootstrap-5', dropdownParent: $('#' + drawerId), width: '100%' });
            }
        });
    }

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

    // ── Edit Permission ───────────────────────────────────────────────────────
    $(document).on('click', '.btn-edit-perm', function () {
        var btn  = $(this);
        var data = {
            name:     btn.data('name'),
            category: btn.data('category'),
            route:    btn.data('route'),
        };
        loadSpinnerSwal();
        $.get('/admin/permissions/form/edit/' + btn.data('id'))
            .done(function (res) {
                hideSpinnerSwal();
                $('#editPermissionDrawerBody').html(res.html);
                initSelect2('editPermissionDrawer');
                $('#edit_perm_name').val(data.name);
                $('#edit_perm_category').val(data.category).trigger('change');
                $('#edit_perm_route').val(data.route);
                bootstrap.Offcanvas.getOrCreateInstance(document.getElementById('editPermissionDrawer'), { backdrop: false, keyboard: false, scroll: true }).show();
            })
            .fail(function () {
                hideSpinnerSwal();
                errorSwal('Failed to load form. Please try again.');
            });
    });

    // ── Delete Permission ─────────────────────────────────────────────────────
    $(document).on('click', '.btn-delete-perm', function () {
        warningSwal('This action cannot be undone.', 'Yes, delete it!').then(function (result) {
            if (result.isConfirmed) { successSwal('Permission has been deleted.'); }
        });
    });

});
