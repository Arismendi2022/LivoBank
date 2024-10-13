@extends('backend.layouts.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page title here')
@section('content')
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <div class="input-group">
            <h1><i class="fa-solid fa-users mr-2"></i>Clientes</h1>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-bd-primary ml-3" data-bs-toggle="modal" data-bs-target="#modalClient"><i class="fa-solid fa-circle-plus mr-2"></i>Nuevo
            </button>
          </div><!-- /.col -->
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Inicio</a></li>
            <li class="breadcrumb-item active">Clientes</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">Listado de Clientes</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <div class="card-body">
              <div class="table-responsive">
                <table id="tableClients" class="table table table-striped table-hover table-bordered" style="width:100%">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Identificación</th>
                    <th>Nombres</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th>Genero</th>
                    <th class="text-center">Fecha Creado</th>
                    <th class="text-center">Acciones</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td>1</td>
                    <td>64520589</td>
                    <td>Camila Torres</td>
                    <td>camila@gmail.com</td>
                    <td>3134562041</td>
                    <td>Femenino</td>
                    <td class="text-center">6th Dic, 2023</td>
                    <td>
                      <div class="text-center">
                        <button type="button" class="btn btn-primary btn-sm" title="Ver cliente"><i class="fa-solid fa-pencil"></i></button>
                        <button type="button" class="btn btn-danger btn-sm" title="Eliminar cliente"><i class="fa-solid fa-trash-can"></i></button>
                      </div>
                    </td>
                  </tr>
                  </tbody>
                </table>
                <!-- /.Table -->
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->

  @include('backend.pages.Client.Modals.add-client')

@endsection
@push('scripts')
  <script>
    let table = new DataTable('#tableClients', {
	    language: {
		    url: '//cdn.datatables.net/plug-ins/2.0.0/i18n/es-ES.json',
	    },
    });
  </script>
@endpush

