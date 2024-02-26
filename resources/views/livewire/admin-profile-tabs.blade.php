<div>
  {{-- Success is as dangerous as failure. --}}
  <div class="card">
    <div class="card-header p-2">
      <ul class="nav nav-pills">
        <li class="nav-item"><a wire:click.prevent='selectTab("personal_details")' class="nav-link {{ $tab == 'personal_details' ? 'active' : ''}}"
                                href="#personal_details" data-toggle="tab">Datos personales</a></li>
        <li class="nav-item"><a wire:click.prevent='selectTab("update_password")' class="nav-link {{ $tab == 'update_password' ? 'active' : ''}}" href="#update_password"
                                data-toggle="tab">Cambiar contraseña</a></li>
      </ul>
    </div><!-- /.card-header -->
    <div class="card-body">
      <div class="tab-content">
        <div class="tab-pane {{ $tab == 'personal_details' ? 'active show' : '' }}" id="personal_details">
          <form wire:submit.prevent="updateAdminPersonalDetails()">
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="">Nombre completo</label>
                  <input type="text" class="form-control" wire:model="fullname" placeholder="Ingrese nombre completo" autofocus>
                  @error('fullname')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="">Email</label>
                  <input type="text" class="form-control" wire:model="email" placeholder="Ingrese email">
                  @error('email')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="">Usuario</label>
                  <input type="text" class="form-control" wire:model="username" placeholder="Ingrese nombre usuario">
                  @error('username')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
              </div>
            </div>
            <div class="row py-3">
              <div class="col-md-6">
                <button type="submit" class="btn btn-bd-primary"><i class="fa-solid fa-circle-check mr-2"></i>Guardar cambios</button>
              </div>
            </div>
          </form>
        </div>
        <!-- /.tab-pane -->
        <div class="tab-pane {{ $tab == 'update_password' ? 'active show' : '' }}" id="update_password">
          <form wire:submit.prevent="updatePassword()">
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="">Contraseña actual</label>
                  <input type="password" class="form-control" wire:model.defer="current_password" placeholder="Introduce la contraseña actual" autofocus>
                  @error('current_password')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="">Nueva contraseña</label>
                  <input type="password" class="form-control" wire:model.defer="new_password" placeholder="Ingrese nueva contraseña">
                  @error('new_password')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="">Confirme nueva contraseña</label>
                  <input type="password" class="form-control" wire:model.defer="new_password_confirmation" placeholder="Confirme nueva contraseña">
                  @error('new_password_confirmation')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
              </div>
            </div>
            <!-- /.row -->
            <div class="row py-3">
              <div class="col-md-6">
                <button type="submit" class="btn btn-bd-primary"><i class="fa-solid fa-circle-check mr-2"></i>Actualizar contraseña</button>
              </div>
            </div>
          </form>
        </div>
        <!-- /.tab-pane -->
      </div>
      <!-- /.tab-pane -->
    </div>
    <!-- /.tab-content -->
  </div><!-- /.card-body -->
</div>

