@include('common.modalHead')
<div class="row">
	<div class="col-sm-12">
		<label>Nombre de la Sub-Categoría</label>
		<div class="input-group">
			<div class="input-group-prepend">
				<span class="input-group-text">
					<span class="fas fa-edit">

					</span>
				</span>
			</div>
			<input type="text" wire:model.lazy="name" class="form-control" placeholder="Nombre de la Sub Categoría">
		</div>
		@error('name') <span class="text-danger er">{{ $message }}</span> @enderror
	</div>

		<div class="col-sm-12 mt-3">
			<label>Descripción de la Categoría</label>
		<div class="input-group">
			<div class="input-group-prepend">
				<span class="input-group-text">
					<span class="fas fa-edit">

					</span>
				</span>
			</div>
			<input type="text" wire:model.lazy="description" class="form-control" placeholder="Descripcion de la Sub Categoría">
		</div>
		@error('description') <span class="text-danger er">{{ $message }}</span> @enderror
	</div>

	<div class="col-sm-12 mt-3" wire:ignore>
		<label>Seleccione Categoría</label>
		<div class="form-group">
			<select wire:model='categoryid' class="form-control"> 
				<option value="Seleccionar">Seleccionar</option>
				@foreach($categories as $category)
				<option value="{{$category->id}}">{{$category->name}}</option>
				@endforeach
			</select>
			@error('categoryid') <span class="text-danger er">{{ $message }}</span> @enderror
		</div>
	</div>
</div>
@include('common.modalFooter')

