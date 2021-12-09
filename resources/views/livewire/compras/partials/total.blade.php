<div class="row">
	<div class="col-sm-12">
		<div>
			 <div class="connect-sorting">
			 	<p class="text-center mb-3">Resumen de Compra</p>
			 	<div class="connect-sorting-content">
			 		<div class="card simple-title-task ui-sortable-handle">
			 			<div class="card-body">
			 				<div class="task-header">
			 					<div>
			 						<h4>Total: ${{number_format($total,2)}}</h4>
			 						<input type="hidden" id="hiddenTotal" value="{{$total}}">
			 					</div>
			 					<div>
			 						<h5 class="mt-3">Articulos: {{$itemsQuantity}}</h5>
			 					</div>
			 				</div>
			 			</div>
			 		</div>
			 	</div>
			 </div>
			 <div class="connect-sorting mt-2">
				<p class="text-center mb-3">Datos de Compra</p>
				<div class="connect-sorting-content">
					<div class="card simple-title-task ui-sortable-handle">
						<div class="card-body">
							<div class="task-header">
								<div class="col-sm-12 mt-3">
									<label>Seleccione Proveedor</label>
									<div class="form-group">
										<select wire:model='proveedor' class="form-control">
											<option value="Seleccionar" disabled>Seleccionar</option>
											@foreach($proveedores as $proveedor)
											<option value="{{$proveedor->id}}">{{$proveedor->nombreProveedor}}</option>
											@endforeach
										</select>
										@error('proveedor') <span class="text-danger er">{{ $message }}</span> @enderror
									</div>
								</div>
								<div class="col-sm-12 mt-3">
									<label>Numero de Factura</label>
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text">
											<span class="fas fa-edit">
						
											</span>
										</span>
									</div>
									<input type="text" wire:model.lazy="factura" class="form-control" placeholder="Descripcion de la Sub Categoría">
								</div>
								@error('factura') <span class="text-danger er">{{ $message }}</span> @enderror
							</div>
							<div class="col-sm-12 col-md-12 col-lg-12 mt-3">
							
								<button wire:click.prevent="saveShop" class="btn btn-dark btn-block">
									GUARDAR F9
								</button>
						
							</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>