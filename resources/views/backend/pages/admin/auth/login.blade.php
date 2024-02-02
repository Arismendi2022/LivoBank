@extends('backend.layouts.auth-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Admin login')
@section('content')
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <p class="h2"><b>Admin</b>Panel</p>
    </div>
    <div class="card-body">
      <p class="login-box-msg"><i>Inicia sesión para continuar</i></p>
      <form action="{{route('admin.login_handler')}}" method="POST">
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
          <input type="text" class="form-control" placeholder="Correo electronico" name="login_id" value="{{old('login_id')}}" autofocus>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        @error('login_id')
        <div class="d-block text-danger" style="margin-top: -15px; margin-bottom: 15px;">
          {{$message}}
        </div>
        @enderror
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Contraseña" name="password" value="{{old('password')}}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        @error('password')
        <div class="d-block text-danger" style="margin-top: -15px; margin-bottom: 15px;">
          {{$message}}
        </div>
        @enderror
        <div class="row">
          <div class="col-7">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Recuerdame?
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-5">
            <button type="submit" class="btn btn-primary btn-block">Iniciar Sesión</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <p class="mb-1">
        <a href="{{ route('admin.forgot-password') }}">Olvidé mi contraseña</a>
      </p>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
@endsection

