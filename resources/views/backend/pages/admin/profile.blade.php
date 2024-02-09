@extends('backend.layouts.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Perfil')
@section('content')
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Perfil</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Inicio</a></li>
            <li class="breadcrumb-item active">Perfil</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-4">
          <!-- Profile Image -->
          <!-- Widget: user widget style 1 -->
          <div class="card card-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header text-white"
                 style="background: url('/images/users/photo1.png') center center;">
            </div>
            <div class="widget-user-image">
              <img class="img-circle" src="{{ $admin->picture }}" alt="User Avatar" id="adminProfilePicture">
            </div>
            <div class="card-footer">
              <div class="text-center">
                <a href="" class="edit-avatar"><i class="fa-solid fa-camera text-dark fs-5"></i></a>
              </div>
              <div class="row py-2">
                <h3 class="widget-user-desc text-center" id="adminProfileName">{{ $admin->fullname }}</h3>
                <h5 class="widget-user-desc text-center" id="adminProfileEmail">{{ $admin->email }}</h5>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
          </div>
          <!-- /.card -->
          <!-- About Me Box -->
        </div>
        <!-- /.col -->
        <div class="col-md-8">

          @livewire('admin-profile-tabs')

        </div>
        <!-- /.card -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
  <!-- /.content-header -->
@endsection

@push('scripts')
  <script>
    window.addEventListener('updateAdminInfo', function (event) {
      $('#adminProfileName').html(event.detail.adminName);
      $('#adminProfileEmail').html(event.detail.adminEmail);

    });
  </script>
@endpush
