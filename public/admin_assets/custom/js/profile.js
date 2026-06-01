$(document).ready(function () {

    // ── Avatar preview on file select ─────────────────────────────────────────
    $('#profile_picture_input').on('change', function () {
        var file = this.files[0];
        if (!file) return;

        // Show filename label
        $('#profile_file_label').text(file.name).show();

        var reader = new FileReader();
        reader.onload = function (e) {
            var src     = e.target.result;
            var preview = $('#profileAvatarPreview');
            if (preview.is('img')) {
                preview.attr('src', src);
            } else {
                preview.replaceWith(
                    $('<img>', {
                        id:    'profileAvatarPreview',
                        src:   src,
                        alt:   'Preview',
                        style: 'width:80px;height:80px;object-fit:cover;border-radius:10px;flex-shrink:0;'
                    })
                );
            }
        };
        reader.readAsDataURL(file);
    });

    // ── Update Profile ────────────────────────────────────────────────────────
    $('#profileForm').on('submit', function (e) {
        e.preventDefault();
        var form = this;

        // Show spinner first, defer AJAX so browser renders it before reading file
        loadSpinnerSwal();
        setTimeout(function () {
            var formData = new FormData(form);

            $.ajax({
                url: '/admin/profile/update',
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                xhr: function () {
                    var xhr = new window.XMLHttpRequest();
                    xhr.upload.addEventListener('progress', function (e) {
                        if (e.lengthComputable) {
                            var pct = Math.round((e.loaded / e.total) * 100);
                            Swal.update({
                                html: '<div class="ks-spin-ring"></div><div class="ks-spin-label">Uploading&hellip; ' + pct + '%</div>'
                            });
                        }
                    });
                    return xhr;
                },
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
        }, 50);
    });

    // ── Change Password ───────────────────────────────────────────────────────
    $('#changePasswordForm').on('submit', function (e) {
        e.preventDefault();
        loadSpinnerSwal();
        $.ajax({
            url: '/admin/profile/change-password',
            method: 'POST',
            data: $(this).serialize(),
            success: function (res) {
                hideSpinnerSwal();
                if (res.status) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Password Changed!',
                        text: 'You will be logged out now. Please login with your new password.',
                        confirmButtonColor: '#696cff',
                        confirmButtonText: 'OK',
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                    }).then(function () {
                        // Submit the logout form to properly end the session
                        var logoutForm = document.querySelector('form[action*="admin/logout"]');
                        if (logoutForm) {
                            logoutForm.submit();
                        } else {
                            window.location.href = '/admin/login';
                        }
                    });
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
