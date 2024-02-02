@extends('backend.layouts.auth-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Olvide mi contraseña')
@section('content')
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <p class="h3"><b>Admin</b>Panel</p>
    </div>
    <div class="card-body">
      <p class="login-box-msg"><i>Olvidaste tu contraseña? Aquí puede recuperar una nueva contraseña.</i></p>
      <form action="{{ route('admin.send-password-reset-link') }}" method="POST">
        @csrf
        @if(Session::get('fail'))
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{Session::get('fail')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif
        @if(Session::get('success'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{Session::get('success')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}" autofocus>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        @error('email')
        <div class="d-block text-danger" style="margin-top: -15px; margin-bottom: 15px;">
          {{$message}}
        </div>
        @enderror
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Solicitar nueva contraseña</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <p class="mt-3 mb-1">
        <a href="{{ route('admin.login') }}">Login</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
@endsection
