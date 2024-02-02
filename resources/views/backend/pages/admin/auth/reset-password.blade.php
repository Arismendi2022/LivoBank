@extends('backend.layouts.auth-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Restablecer contraseña')
@section('content')
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <p class="h3"><b>Admin</b>Panel</p>
    </div>
    <div class="card-body">
      <p class="login-box-msg"><i>Sólo estás a un paso de tu nueva contraseña, recupérala ahora.</i></p>
      <form action="{{ route('admin.reset-password-handler',['token'=>request()->token]) }}" method="POST">
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
          <input type="password" class="form-control" placeholder="Contraseña" autofocus name="new_password" value="{{ old('new_password') }}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        @error('new_password')
        <div class="d-block text-danger" style="margin-top: -15px; margin-bottom: 15px;">
          {{$message}}
        </div>
        @enderror
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Confirmar contraseña" name="new_password_confirmation" value="{{ old('new_password_confirmation') }}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        @error('new_password_confirmation')
        <div class="d-block text-danger" style="margin-top: -15px; margin-bottom: 15px;">
          {{$message}}
        </div>
        @enderror
        <div class="row py-2">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Cambiar contraseña</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.login-card-body -->
  </div>
@endsection
