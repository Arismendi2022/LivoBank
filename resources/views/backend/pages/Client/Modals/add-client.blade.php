<!-- add client Modal -->
<div class="modal fade" id="modalClient" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-gradient-primary">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo cliente</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="row mb-3">
            <label class="d-flex justify-content-around" style="align-items: center">
              <img src="" class="img-thumbnail" style="cursor:pointer;width:140px;height:140px;object-fit: cover;">
              <input onchange="" type="file" name="image" class="d-none">
            </label>
          </div>
          <div class="row">
            <div class="col-md-4 mb-3">
              <label for="" class="form-label">Identificación</label>
              <input type="text" class="form-control" name="identity" placeholder="ingrese identificación" value="{{ old('identity') }}" autofocus>
              @error('identity')
              <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
            <div class="col-md-4 mb-3">
              <label for="" class="form-label">Nombre</label>
              <input type="text" class="form-control" name="first_name" placeholder="ingrese nombre" value="{{ old('first_name') }}" autofocus>
              @error('first_name')
              <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
            <div class="col-md-4 mb-3">
              <label for="" class="form-label">Apellidos</label>
              <input type="text" class="form-control" name="last_name" placeholder="ingrese apellidos" value="{{ old('last_name') }}" autofocus>
              @error('last_name')
              <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
          </div>
          <div class="row">
            <div class="col-md-4 mb-3">
              <label for="" class="form-label">Dirección</label>
              <input type="text" class="form-control" name="address" placeholder="ingrese dirección" value="{{ old('address') }}" autofocus>
              @error('address')
              <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
            <div class="col-md-4 mb-3">
              <label for="" class="form-label">Telefono</label>
              <input type="text" class="form-control" name="phone" placeholder="ingrese telefono" value="{{ old('phone') }}" autofocus>
              @error('phone')
              <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
            <div class="col-md-4 mb-3">
              <label for="" class="form-label">Email</label>
              <input type="email" class="form-control" name="email" placeholder="ingrese email" value="{{ old('email') }}" autofocus>
              @error('email')
              <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
          </div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
