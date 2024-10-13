<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="/images/site/{{ get_settings()->site_favicon }}">
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
  <!-- ijabo CSS -->
  <link rel="stylesheet" href="/backend/plugins/ijabo/ijabo.min.css">

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
<!-- ijabo Crop -->
<script src="/extra-assets/ijaboCropTool/ijaboCropTool.min.js"></script>
<!-- ijabo -->
<script src="/backend/plugins/ijabo/ijabo.min.js"></script>

<script>
  if (navigator.userAgent.indexOf("Firefox") != -1) {
    history.pushState(null, null, document.URL);
    window.addEventListener('popstate', function () {
    history.pushState(null, null, document.URL);
    });
  }
</script>

@livewireScripts

</body>
</html>
