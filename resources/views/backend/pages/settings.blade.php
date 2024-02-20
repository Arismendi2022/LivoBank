@extends('backend.layouts.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Ajustes')
@section('content')
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Ajustes</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Inicio</a></li>
            <li class="breadcrumb-item active">Ajustes</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      @livewire('admin-settings')
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->

@endsection
@push('scripts')
  <script>
    $('input[type="file"][name="site_logo"][id="site_logo"]').ijaboViewer({
      preview: '#site_logo_image_preview',
      imageShape: 'rectangular', //Ponerse cuadrada si es favicon
      allowedExtensions: ['png', 'jpg'],
      onErrorShape: function (message, element) {
        alert('message');
      },
      onInvalidType: function (message, element) {
        alert(message);
      },
      onSuccess: function (message, element) {
      }
    });

    $('#change_site_logo_form').on('submit', function (e) {
      e.preventDefault();
      var form = this;
      var formdata = new FormData(form);
      var inputFileVal = $(form).find('input[type="file"][name="site_logo"]').val();

      if (inputFileVal.length > 0) {
        $.ajax({
          url: $(form).attr('action'),
          method: $(form).attr('method'),
          data: formdata,
          processData: false,
          dataType: 'json',
          contentType: false,
          beforeSend: function () {
            toastr.remove();
            $(form).find('span.error-text').text('');
          },
          success: function (response) {
            if (response.status == 1) {
              toastr.success(response.msg);
              $(form)[0].reset();
            } else {
              toastr.error(response.msg);
            }
          }
        });

      } else {
        $(form).find('span.error-text').text('Por favor, seleccione el archivo de imagen del logo. Se recomienda el tipo de archivo PNG.');
      }
    });

    $('input[type="file"][name="site_favicon"][id="site_favicon"]').ijaboViewer({
      preview: '#site_favicon_image_preview',
      imageShape: 'square', //Ponerse cuadrada si es favicon
      allowedExtensions: ['png'],
      onErrorShape: function (message, element) {
        alert('message');
      },
      onInvalidType: function (message, element) {
        alert(message);
      },
      onSuccess: function (message, element) {
      }
    });

    $('#change_site_favicon_form').on('submit', function (e) {
      e.preventDefault();
      var form = this;
      var formdata = new FormData(form);
      var inputFileVal = $(form).find('input[type="file"][name="site_favicon"]').val();

      if (inputFileVal.length > 0) {
        $.ajax({
          url: $(form).attr('action'),
          method: $(form).attr('method'),
          data: formdata,
          processData: false,
          dataType: 'json',
          contentType: false,
          beforeSend: function () {
            toastr.remove();
            $(form).find('span.error-text').text('');
          },
          success: function (response) {
            if (response.status == 1) {
              toastr.success(response.msg);
              $(form)[0].reset();
            } else {
              toastr.error(response.msg);
            }
          }
        });
      } else {
        $(form).find('span.error-text').text('Por favor, seleccione el archivo de imagen del favicon. Se recomienda el tipo de archivo PNG.');
      }
    });
  </script>
@endpush
