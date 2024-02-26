<div>
  {{-- The whole world belongs to you. --}}
  <div class="row">
    <div class="col-md-12">
      <div class="card card-primary card-outline card-outline-tabs">
        <div class="card-header p-0 border-bottom-0">
          <ul class="nav nav-tabs mb-2" id="custom-tabs-four-tab" role="tablist">
            <li class="nav-item">
              <a wire:click.prevent='selectTab("general_settings")'
                 class="nav-link {{ $tab == 'general_settings' ? 'active' : '' }}" data-toggle="pill"
                 href="#general_settings" role="tab" aria-selected="true">Configuración general</a>
            </li>
            <li class="nav-item">
              <a wire:click.prevent='selectTab("logo_favicon")'
                 class="nav-link {{ $tab == 'logo_favicon' ? 'active' : '' }}" id="c"
                 data-toggle="pill" href="#logo_favicon" role="tab" aria-selected="false">Logo &
                Favicon</a>
            </li>
            <li class="nav-item">
              <a wire:click.prevent='selectTab("social_networks")'
                 class="nav-link {{ $tab == 'social_networks' ? 'active' : '' }}" id=""
                 data-toggle="pill" href="#social_networks" role="tab" aria-selected="false">Redes
                sociales</a>
            </li>
            <li class="nav-item">
              <a wire:click.prevent='selectTab("payment_methods")'
                 class="nav-link {{ $tab == 'payment_methods' ? 'active' : '' }}" id=""
                 data-toggle="pill" href="#payment_methods" role="tab" aria-selected="false">Métodos
                de pago</a>
            </li>
          </ul>
        </div>
        <div class="card-body">
          <div class="tab-content" id="custom-tabs-four-tabContent">
            <div class="tab-pane fade {{ $tab == 'general_settings' ? 'active show' : '' }}"
                 id="general_settings" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
              <form wire:submit.prevent="updateGeneralSettings()">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="">Nombre del sitio</label>
                      <input type="text" class="form-control" wire:model.defer="site_name"
                             placeholder="Ingrese nombre del sitio" autofocus>
                      @error('site_name')
                      <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="">Email del sitio</label>
                      <input type="text" class="form-control" wire:model.defer="site_email"
                             placeholder="Ingrese email del sitio">
                      @error('site_email')
                      <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="">Teléfono del sitio</label>
                      <input type="text" class="form-control" wire:model.defer="site_phone"
                             placeholder="Ingrese telefono del sitio">
                      @error('site_phone')
                      <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="">Clave meta del sitio</label>
                      <input type="text" class="form-control"
                             wire:model.defer="site_meta_keywords"
                             placeholder="Ingrese clave meta del sitio">
                      @error('site_meta_keywords')
                      <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Dirección del sitio</label>
                    <input type="text" class="form-control"
                           wire:model.defer="site_address"
                           placeholder="Ingrese dirección del sitio">
                    @error('site_address')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
                <div class="form-group">
                  <label for="">Descripción meta del sitio</label>
                  <textarea id="" cols="4" rows="4" placeholder="Descripción meta del sitio" class="form-control"
                            wire:model.defer="site_meta_description"></textarea>
                  @error('site_meta_description')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <div class="row py-3">
                  <div class="col-md-6">
                    <button type="submit" class="btn btn-bd-primary"><i
                        class="fa-solid fa-circle-check mr-2"></i>Guardar cambios
                    </button>
                  </div>
                </div>
              </form>
            </div>
            <div class="tab-pane fade {{ $tab == 'logo_favicon' ? 'active show' : '' }}" id="logo_favicon"
                 role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
              <div class="row">
                <div class="col-md-6">
                  <h5><b>Logo del sitio</b></h5>
                  <div class="py-3 mt-2" style="max-width: 200px;">
                    <img wire:ignore src="" class="img-thumbnail" data-ijabo-default-img="/images/site/{{ $site_logo }}" id="site_logo_image_preview">
                  </div>
                  <form action="{{ route('admin.change-logo') }}" method="POST" enctype="multipart/form-data" id="change_site_logo_form">
                    @csrf
                    <div class="mb-2">
                      <input type="file" name="site_logo" id="site_logo" class="form-control">
                      <span class="text-danger error-text site_logo_error"></span>
                    </div>
                    <div class="row py-3">
                      <div class="col-md-6">
                        <button type="submit" class="btn btn-bd-primary"><i class="fa-solid fa-circle-check mr-2"></i>Guardar logo
                        </button>
                      </div>
                    </div>
                  </form>
                </div>
                <div class="col-md-6">
                  <h5><b>Favicon del sitio</b></h5>
                  <div class="py-3 mt-2" style="max-width: 100px;">
                    <img wire:ignore src="" class="img-thumbnail" data-ijabo-default-img="/images/site/{{ $site_favicon }}" id="site_favicon_image_preview">
                  </div>
                  <form action="{{ route('admin.change-favicon') }}" method="POST" enctype="multipart/form-data" id="change_site_favicon_form">
                    @csrf
                    <div class="mb-2">
                      <input type="file" name="site_favicon" id="site_favicon" class="form-control">
                      <span class="text-danger error-text site_favicon_error"></span>
                    </div>
                    <div class="row py-3">
                      <div class="col-md-6">
                        <button type="submit" class="btn btn-bd-primary"><i class="fa-solid fa-circle-check mr-2"></i>Guardar favicon
                        </button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>

            <div class="tab-pane fade {{ $tab == 'social_networks' ? 'active show' : '' }}"
                 id="social_networks" role="tabpanel" aria-labelledby="custom-tabs-four-messages-tab">
              <form wire:submit.prevent="updateSocialNetworks()">
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="">URL Facebook</label>
                      <input type="text" class="form-control" wire:model.defer="facebook_url" placeholder="Ingrese URL de Facebook" autofocus>
                      @error('facebook_url'){{ $message }} @enderror
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="">URL Twitter</label>
                      <input type="text" class="form-control" wire:model.defer="twitter_url" placeholder="Ingrese URL de Twitter">
                      @error('twitter_url'){{ $message }} @enderror
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="">URL Instagram</label>
                      <input type="text" class="form-control" wire:model.defer="instagram_url" placeholder="Ingrese URL de Instagram">
                      @error('instagram_url'){{ $message }} @enderror
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="">URL YouTube</label>
                      <input type="text" class="form-control" wire:model.defer="youtube_url" placeholder="Ingrese URL de YouTube" autofocus>
                      @error('youtube_url'){{ $message }} @enderror
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="">URL GitHub</label>
                      <input type="text" class="form-control" wire:model.defer="github_url" placeholder="Ingrese URL de GitHub">
                      @error('github_url'){{ $message }} @enderror
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="">URL Linkedin</label>
                      <input type="text" class="form-control" wire:model.defer="linkedin_url" placeholder="Ingrese URL de Linkedin">
                      @error('linkedin_url'){{ $message }} @enderror
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
            <div class="tab-pane fade {{ $tab == 'payment_methods' ? 'active show' : '' }}"
                 id="payment_methods" role="tabpanel" aria-labelledby="custom-tabs-four-settings-tab">
              ---Payment methods ---
            </div>
          </div>
        </div>
        <!-- /.card -->
      </div>
      <!-- /.card -->
    </div>
  </div>
  <!-- /.row -->
</div>
