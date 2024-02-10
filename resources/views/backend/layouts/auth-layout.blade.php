<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('pageTitle')</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/backend/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="/backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/backend/dist/css/adminlte.min.css">
  <!-- botstrap 5 css -->
  <link rel="stylesheet" href="/backend/assets/css/bootstrap.min.css">
  <!-- toastr CSS -->
  <link rel="stylesheet" href="/backend/plugins/toastr/toastr.min.css">

  @livewireStyles
</head>

<body class="hold-transition login-page">

<div class="login-box">
  <!-- /.login-logo -->
  @yield('content')
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="/backend/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/backend/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Bootstrap 5 -->
<script src="/backend/assets/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="/backend/dist/js/adminlte.min.js"></script>

<script>
  if (navigator.userAgent.indexOf("Firefox") != -1) {
    history.pushState(null, null, document.URL);
    window.addEventListener('popstate', function () {
      history.pushState(null, null, document.URL);
    });
  }
</script>

<!-- ijabo Crop -->
<script src="/extra-assets/ijaboCropTool/ijaboCropTool.min.js"></script>
<!-- toastr -->
<script src="/backend/plugins/toastr/toastr.min.js"></script>

<script>
  window.addEventListener('showToastr', function (event) {
    toastr.remove();
    if (event.detail.type === 'info'){ toastr.info(event.detail.message);
    } else if ( event.detail.type === 'success') { toastr.success(event.detail.message);
    } else if ( event.detail.type === 'error') {toastr.error(event.detail.message);
    } else if ( event.detail.type === 'warning') { toastr.warning(event.detail.message);
    } else { return false; }
  });
</script>
@livewireScripts

</body>
</html>
