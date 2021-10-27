@include('common.modalHead')
<div class="row">
	<div class="col-sm-12">
		<label>Nombre de el proveedor</label>
		<div class="input-group">
			<div class="input-group-prepend">
				<span class="input-group-text">
					<span class="fas fa-edit">

					</span>
				</span>
			</div>
			<input type="text" wire:model.lazy="nombreProveedor" class="form-control" placeholder="Ingrese Nombre de el proveedor">
		</div>
		@error('nombreProveedor') <span class="text-danger er">{{ $message }}</span> @enderror
	</div>

		<div class="col-sm-12 mt-3">
			<label>telefono del Proveedor</label>
		<div class="input-group">
			<div class="input-group-prepend">
				<span class="input-group-text">
					<span class="fas fa-edit">

					</span>
				</span>
			</div>
			<input type="text" wire:model.lazy="telefonoProveedor" class="form-control" placeholder="Telefono del proveedor">
		</div>
		@error('telefonoProveedor') <span class="text-danger er">{{ $message }}</span> @enderror
	</div>

		<div class="col-sm-12 mt-3">
			<label>Direccion del Proveedor</label>
		<div class="input-group">
			<div class="input-group-prepend">
				<span class="input-group-text">
					<span class="fas fa-edit">

					</span>
				</span>
			</div>
			<input type="text" wire:model.lazy="direccionProveedor" class="form-control" placeholder="Direccion del proveedor">
		</div>
		@error('direccionProveedor') <span class="text-danger er">{{ $message }}</span> @enderror
	</div>
</div>
@include('common.modalFooter')