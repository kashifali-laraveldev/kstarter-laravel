// ─── Global AJAX CSRF setup ───────────────────────────────────────────────────
$(function () {
    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
    });
});

// ─── Drawer backdrop ──────────────────────────────────────────────────────────
(function () {
    var bd = document.createElement('div');
    bd.id = 'ksDrawerBackdrop';
    document.body.appendChild(bd);

    document.addEventListener('show.bs.offcanvas', function () {
        bd.style.display = 'block';
        requestAnimationFrame(function () { bd.classList.add('ks-bd-show'); });
        var sbw = window.innerWidth - document.documentElement.clientWidth;
        if (sbw > 0) document.documentElement.style.paddingRight = sbw + 'px';
        document.documentElement.style.overflowY = 'hidden';
        document.body.style.overflow = 'hidden';
    });

    document.addEventListener('hidden.bs.offcanvas', function () {
        document.documentElement.style.overflowY = '';
        document.documentElement.style.paddingRight = '';
        document.body.style.overflow = '';
    });

    document.addEventListener('hide.bs.offcanvas', function () {
        bd.classList.remove('ks-bd-show');
    });

    bd.addEventListener('transitionend', function () {
        if (!bd.classList.contains('ks-bd-show')) { bd.style.display = 'none'; }
    });
}());

// ─── Common SweetAlert2 helpers ───────────────────────────────────────────────

function successSwal(message) {
    return Swal.fire({
        icon: 'success',
        title: 'Success!',
        text: message,
        confirmButtonColor: '#696cff',
        timer: 3000,
        timerProgressBar: true,
    });
}

function errorSwal(message) {
    return Swal.fire({
        icon: 'error',
        title: 'Error!',
        text: message || 'Something went wrong. Please try again.',
        confirmButtonColor: '#696cff',
    });
}

function warningSwal(message, confirmText) {
    return Swal.fire({
        icon: 'warning',
        title: 'Are you sure?',
        text: message || 'This action cannot be undone.',
        showCancelButton: true,
        confirmButtonColor: '#ff3e1d',
        cancelButtonColor: '#8592a3',
        confirmButtonText: confirmText || 'Yes, proceed!',
        cancelButtonText: 'Cancel',
    });
}

function loadSpinnerSwal() {
    Swal.fire({
        html: '<div class="ks-spin-ring"></div><div class="ks-spin-label">Please wait&hellip;</div>',
        showConfirmButton: false,
        allowOutsideClick: false,
        allowEscapeKey: false,
        customClass: { popup: 'ks-spin-popup' },
    });
}

function hideSpinnerSwal() {
    Swal.close();
}
