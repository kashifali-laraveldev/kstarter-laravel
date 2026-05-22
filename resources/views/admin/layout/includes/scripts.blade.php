<!-- Core JS -->
<script src="{{ asset('admin_assets') }}/vendor/libs/jquery/jquery.js"></script>
<script src="{{ asset('admin_assets') }}/vendor/libs/popper/popper.js"></script>
<script src="{{ asset('admin_assets') }}/vendor/js/bootstrap.js"></script>
<script src="{{ asset('admin_assets') }}/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
<script src="{{ asset('admin_assets') }}/vendor/js/menu.js"></script>

<!-- Vendors JS -->
<script src="{{ asset('admin_assets') }}/vendor/libs/apex-charts/apexcharts.js"></script>

<!-- Main JS -->
<script src="{{ asset('admin_assets') }}/js/main.js"></script>

{{-- Select2 JS --}}
<script src="{{ asset('admin_assets') }}/plugins/Select2/js/select2.min.js"></script>

{{-- DataTable JS --}}
<script src="{{ asset('admin_assets') }}/plugins/DataTable/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('admin_assets') }}/plugins/DataTable/js/dataTables.bootstrap5.min.js"></script>
<script src="{{ asset('admin_assets') }}/plugins/js/jszip.min.js"></script>
<script src="{{ asset('admin_assets') }}/plugins/DataTable/js/dataTables.buttons.min.js"></script>
<script src="{{ asset('admin_assets') }}/plugins/DataTable/js/buttons.bootstrap5.min.js"></script>
<script src="{{ asset('admin_assets') }}/plugins/DataTable/js/buttons.html5.min.js"></script>

{{-- Sweet Alert JS --}}
<script src="{{ asset('admin_assets') }}/plugins/Sweetalert2/js/sweetalert.min.js"></script>

{{-- KStarter JS --}}
<script src="{{ asset('admin_assets') }}/custom/js/admin_master.js?v={{ time() }}"></script>

@yield('script')
