<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="/images/site/{{ get_settings()->site_favicon }}">
  <title>@yield('pageTitle')</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="/backend/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/backend/dist/css/adminlte.min.css">
  <!-- botstrap 5 css -->
  <link rel="stylesheet" href="/backend/assets/css/bootstrap.min.css">
  <!-- ijabo Crop -->
  <link rel="stylesheet" href="/extra-assets/ijaboCropTool/ijaboCropTool.min.css">
  <!-- ijabo CSS -->
  <link rel="stylesheet" href="/backend/plugins/ijabo/ijabo.min.css">
  <!-- style CSS -->
  <link rel="stylesheet" href="/backend/dist/css/style.css">
  <!-- Datatables CSS -->
  <link rel="stylesheet" href="/backend/plugins/DataTables/datatables.min.css">

  @livewireStyles
</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  @include('backend.layouts.partials.navbar')

  <!-- Main Sidebar Container -->
  @include('backend.layouts.partials.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @yield('content')
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  @include('backend.layouts.partials.footer')

</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="/backend/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/backend/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Bootstrap 5 -->
<script src="/backend/assets/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="/backend/dist/js/adminlte.min.js"></script>
<!-- ijabo Crop -->
<script src="/extra-assets/ijaboCropTool/ijaboCropTool.min.js"></script>
<!-- ijabo -->
<script src="/backend/plugins/ijabo/ijabo.min.js"></script>
<script src="/backend/plugins/ijabo/jquery.ijaboViewer.min.js"></script>
{{-- sweetalert2 --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Datatables JS -->
<script src="/backend/plugins/DataTables/datatables.min.js"></script>

@livewireScripts
@stack('scripts')

<script>
  if (navigator.userAgent.indexOf("Firefox") != -1) {
    history.pushState(null, null, document.URL);
    window.addEventListener('popstate', function () {
      history.pushState(null, null, document.URL);
    });
  }
</script>

<script>
  window.addEventListener('showToastr', function (event) {
    toastr.remove();
    const data = event.detail

    if (data[0]['type'] === 'info') {
      toastr.info(data[0]['message']);
    } else if (data[0]['type'] === 'success') {
      toastr.success(data[0]['message']);
    } else if (data[0]['type'] === 'error') {
      toastr.error(data[0]['message']);
    } else if (data[0]['type'] === 'warning') {
      toastr.warning(data[0]['message']);
    } else {
      return false;
    }

  });
</script>

</body>
</html>
