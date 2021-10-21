<div>
  <div class="account-settings-container layout-top-spacing">
    <div class="account-content">
      <div class="scrollspy-example" data-spy="scroll" data-target="#account-settings-scroll" data-offset="-100">
        <div class="row">
          <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
            <form id="general-info" class="section general-info">
              <div class="info">
                <h6 class="">informacion general de la Sucursal</h6>
                <div class="row">
                  <div class="col-lg-11 mx-auto">
                    <div class="row">
                      <div class="col-xl-2 col-lg-12 col-md-4">
                        <div class="upload mt-4 pr-md-4">
                          <input type="file" id="input-file-max-fs" class="dropify" data-default-file="assets/img/user-profile.jpeg" data-max-file-size="2M" />
                          <p class="mt-2"><i class="flaticon-cloud-upload mr-1"></i>Subir Imagen</p>
                        </div>
                      </div>
                      <div class="col-xl-10 col-lg-12 col-md-8 mt-md-0 mt-4">
                        <div class="form">
                          <div class="row">
                            <div class="col-sm-6">
                              <div class="form-group">
                                <label for="fullName">Nombre de la Sucursal</label>
                                <input wire:model.lazy="nameShop" type="text" class="form-control mb-4" placeholder="Ejemplo: Sucursal Ciudad Toledo">
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="form-group">
                                <label for="fullName">Telefono de la Sucursal</label>
                                <input wire:model.lazy="phoneShop" type="text" class="form-control mb-4" placeholder="Ejemplo: 2667-3030">
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="profession">Direccion</label>
                            <input wire:model.lazy="addressShop" type="text" class="form-control mb-4" placeholder="Ejemplo: Ciudad Toledo San Miguel">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="account-settings-footer">
      <div class="as-footer-container">
        <button id="multiple-reset" class="btn btn-warning">limpiar</button>
        <div class="blockui-growl-message">
          <i class="flaticon-double-check"></i>&nbsp; Settings Saved Successfully
        </div>
        <button id="multiple-messages" class="btn btn-primary">Guardar</button>
      </div>
    </div>
  </div>
</div>
